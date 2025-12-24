<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/permissions.php';
require_once __DIR__ . '/../config/db.php';

header('Content-Type: application/json; charset=utf-8');

function calendario_responder(array $payload, int $status = 200): void
{
	http_response_code($status);
	echo json_encode($payload);
	exit;
}

function calendario_datetime(?string $value): ?string
{
	if ($value === null || $value === '') {
		return null;
	}
	try {
		$date = new DateTime($value);
		return $date->format('Y-m-d H:i:s');
	} catch (Throwable $e) {
		return null;
	}
}

if (!gesclub_is_authenticated()) {
	calendario_responder(['ok' => false, 'message' => 'Debes iniciar sesión para continuar.'], 401);
}

if (!gesclub_can('calendario-eventos', 'view')) {
	calendario_responder(['ok' => false, 'message' => 'No tienes permisos para ver el calendario.'], 403);
}

$db = gesclub_db();

$statusColors = [
	'programado' => ['background' => '#0d6efd', 'border' => '#0a58ca', 'text' => '#ffffff'],
	'confirmado' => ['background' => '#198754', 'border' => '#146c43', 'text' => '#ffffff'],
	'cancelado' => ['background' => '#dc3545', 'border' => '#b02a37', 'text' => '#ffffff'],
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$clubId = (int)($_GET['club_id'] ?? 0);
	$where = '';
	$params = [];
	if ($clubId > 0) {
		$where = 'WHERE ce.club_id = :club_id';
		$params[':club_id'] = $clubId;
	}

	$sql = "SELECT ce.*, c.nombre_oficial AS club_nombre
		FROM calendario_eventos ce
		JOIN clubes c ON c.id = ce.club_id
		{$where}
		ORDER BY ce.fecha_inicio";
	$stmt = $db->prepare($sql);
	$stmt->execute($params);
	$rows = $stmt->fetchAll() ?: [];

	$events = [];
	foreach ($rows as $row) {
		$estado = $row['estado'] ?? 'programado';
		$colors = $statusColors[$estado] ?? $statusColors['programado'];
		$events[] = [
			'id' => (int)$row['id'],
			'title' => $row['titulo'],
			'start' => date('c', strtotime($row['fecha_inicio'])),
			'end' => date('c', strtotime($row['fecha_fin'])),
			'backgroundColor' => $colors['background'],
			'borderColor' => $colors['border'],
			'textColor' => $colors['text'],
			'extendedProps' => [
				'club_id' => (int)$row['club_id'],
				'club_nombre' => $row['club_nombre'],
				'tipo' => $row['tipo'],
				'sede' => $row['sede'],
				'cupos' => $row['cupos'],
				'estado' => $estado,
			],
		];
	}

	calendario_responder($events);
}

$payload = json_decode((string)file_get_contents('php://input'), true);
if (!is_array($payload)) {
	$payload = $_POST;
}

$action = $payload['action'] ?? '';

if ($action === 'create') {
	if (!gesclub_can('calendario-eventos', 'create')) {
		calendario_responder(['ok' => false, 'message' => 'No tienes permisos para crear eventos.'], 403);
	}

	$clubId = (int)($payload['club_id'] ?? 0);
	$titulo = trim((string)($payload['titulo'] ?? ''));
	$tipo = trim((string)($payload['tipo'] ?? ''));
	$fechaInicio = calendario_datetime($payload['fecha_inicio'] ?? null);
	$fechaFin = calendario_datetime($payload['fecha_fin'] ?? null);
	$sede = trim((string)($payload['sede'] ?? '')) ?: null;
	$cupos = $payload['cupos'] ?? null;
	$estado = $payload['estado'] ?? 'programado';

	if ($clubId <= 0 || $titulo === '' || $tipo === '' || !$fechaInicio || !$fechaFin) {
		calendario_responder(['ok' => false, 'message' => 'Completa los campos obligatorios.'], 422);
	}

	$stmt = $db->prepare(
		'INSERT INTO calendario_eventos (club_id, titulo, tipo, fecha_inicio, fecha_fin, sede, cupos, estado)
		VALUES (:club_id, :titulo, :tipo, :fecha_inicio, :fecha_fin, :sede, :cupos, :estado)'
	);
	$stmt->execute([
		':club_id' => $clubId,
		':titulo' => $titulo,
		':tipo' => $tipo,
		':fecha_inicio' => $fechaInicio,
		':fecha_fin' => $fechaFin,
		':sede' => $sede,
		':cupos' => $cupos !== '' ? $cupos : null,
		':estado' => $estado,
	]);

	calendario_responder(['ok' => true, 'id' => (int)$db->lastInsertId()]);
}

if ($action === 'update') {
	if (!gesclub_can('calendario-eventos', 'edit')) {
		calendario_responder(['ok' => false, 'message' => 'No tienes permisos para editar eventos.'], 403);
	}

	$id = (int)($payload['id'] ?? 0);
	if ($id <= 0) {
		calendario_responder(['ok' => false, 'message' => 'Evento inválido.'], 422);
	}

	$allowed = [
		'club_id' => 'club_id',
		'titulo' => 'titulo',
		'tipo' => 'tipo',
		'fecha_inicio' => 'fecha_inicio',
		'fecha_fin' => 'fecha_fin',
		'sede' => 'sede',
		'cupos' => 'cupos',
		'estado' => 'estado',
	];

	$updates = [];
	$params = [':id' => $id];
	foreach ($allowed as $key => $column) {
		if (!array_key_exists($key, $payload)) {
			continue;
		}
		$value = $payload[$key];
		if ($key === 'fecha_inicio' || $key === 'fecha_fin') {
			$value = calendario_datetime($value);
		}
		if ($key === 'titulo' || $key === 'tipo' || $key === 'sede' || $key === 'estado') {
			$value = trim((string)$value);
		}
		if ($key === 'cupos' && $value === '') {
			$value = null;
		}
		$updates[] = "{$column} = :{$column}";
		$params[":{$column}"] = $value;
	}

	if ($updates === []) {
		calendario_responder(['ok' => false, 'message' => 'No hay cambios para aplicar.'], 422);
	}

	$sql = 'UPDATE calendario_eventos SET ' . implode(', ', $updates) . ' WHERE id = :id';
	$stmt = $db->prepare($sql);
	$stmt->execute($params);

	calendario_responder(['ok' => true]);
}

if ($action === 'delete') {
	if (!gesclub_can('calendario-eventos', 'delete')) {
		calendario_responder(['ok' => false, 'message' => 'No tienes permisos para eliminar eventos.'], 403);
	}

	$id = (int)($payload['id'] ?? 0);
	if ($id <= 0) {
		calendario_responder(['ok' => false, 'message' => 'Evento inválido.'], 422);
	}

	$stmt = $db->prepare('DELETE FROM calendario_eventos WHERE id = :id');
	$stmt->execute([':id' => $id]);

	calendario_responder(['ok' => true]);
}

calendario_responder(['ok' => false, 'message' => 'Acción no soportada.'], 400);
