<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/users.php';

function gesclub_permissions_catalog(): array
{
	return [
		'admin-users' => 'Administración de usuarios',
		'edit-profile' => 'Creación y edición de usuarios',
		'permisos-modulos' => 'Permisos por módulo',
		'permisos-roles' => 'Permisos por rol',
		'registrar-club' => 'Registro de clubes',
		'documentos-club' => 'Documentos del club',
		'club-disciplinas' => 'Gestión de disciplinas',
		'club-categorias' => 'Gestión de categorías deportivas',
		'club-equipos' => 'Equipos y plantillas',
		'club-temporadas' => 'Temporadas deportivas',
		'configuracion-club' => 'Configuración del club',
		'bitacora' => 'Bitácora y auditoría',
		'registrar-deportistas' => 'Registro de deportistas',
		'registrar-entrenadores' => 'Registro de entrenadores',
		'registrar-colaboradores' => 'Registro de colaboradores',
		'apoderados' => 'Apoderados y familias',
		'importacion-masiva' => 'Importación masiva',
		'reportes' => 'Reportes generales',
		'entrenamientos-planificacion' => 'Planificación de entrenamientos',
		'entrenamientos-sesiones' => 'Sesiones de entrenamiento',
		'entrenamientos-asistencia' => 'Asistencia de entrenamientos',
		'competencias' => 'Calendario de competencias',
		'competencias-inscripciones' => 'Inscripciones a competencias',
		'competencias-resultados' => 'Resultados de competencias',
		'calendario-eventos' => 'Calendario de eventos',
		'reservas' => 'Reservas',
		'finanzas-cuotas' => 'Planes y cuotas',
		'finanzas-cobros' => 'Cobros',
		'finanzas-pagos' => 'Pagos',
		'finanzas-becas' => 'Becas',
		'finanzas-presupuesto' => 'Presupuesto',
		'contabilidad-gastos' => 'Egresos y gastos',
		'contabilidad-rendiciones' => 'Rendiciones',
		'comunicaciones-anuncios' => 'Anuncios',
		'comunicaciones-notificaciones' => 'Notificaciones',
		'comunicaciones-mensajes' => 'Mensajería',
		'documentos-internos' => 'Biblioteca interna',
		'actas-reuniones' => 'Actas de reuniones',
		'solicitudes' => 'Solicitudes',
		'inventario' => 'Inventario de ítems',
		'inventario-movimientos' => 'Movimientos de inventario',
		'reportes-deportivos' => 'Reportes deportivos',
		'reportes-asistencia' => 'Reportes de asistencia',
		'reportes-financieros' => 'Reportes financieros',
		'ubicacion-pais' => 'Ubicación - País',
		'ubicacion-region' => 'Ubicación - Región',
		'ubicacion-comuna' => 'Ubicación - Comuna',
	];
}

function gesclub_bootstrap_permissions(): void
{
	static $loaded = false;
	if ($loaded) {
		return;
	}
	$loaded = true;

	$db = gesclub_db();
	$catalog = gesclub_permissions_catalog();
	if ($catalog === []) {
		return;
	}

	$existing = $db->query('SELECT id, nombre FROM permisos_modulo')->fetchAll();
	$existingMap = [];
	foreach ($existing ?: [] as $row) {
		$existingMap[$row['nombre']] = (int)$row['id'];
	}

	$insert = $db->prepare('INSERT INTO permisos_modulo (nombre, descripcion) VALUES (:nombre, :descripcion)');
	foreach ($catalog as $name => $description) {
		if (isset($existingMap[$name])) {
			continue;
		}
		$insert->execute([
			':nombre' => $name,
			':descripcion' => $description,
		]);
	}

	$roleNames = ['Admin General', 'Admin Club', 'Administrador'];
	$roles = $db->query('SELECT id, nombre FROM user_roles')->fetchAll() ?: [];
	$roleIds = [];
	foreach ($roles as $role) {
		if (in_array($role['nombre'], $roleNames, true)) {
			$roleIds[] = (int)$role['id'];
		}
	}

	if ($roleIds !== []) {
		$permissionNames = array_keys($catalog);
		$permStmt = $db->prepare('SELECT id, nombre FROM permisos_modulo WHERE nombre = :nombre');
		$permIds = [];
		foreach ($permissionNames as $permName) {
			$permStmt->execute([':nombre' => $permName]);
			$permIds[$permName] = (int)$permStmt->fetchColumn();
		}

		$insertPerm = $db->prepare(
			'INSERT IGNORE INTO role_permissions (role_id, permiso_id, can_view, can_create, can_edit, can_delete, can_export)
			VALUES (:role_id, :permiso_id, 1, 1, 1, 1, 1)'
		);
		foreach ($roleIds as $roleId) {
			foreach ($permIds as $permId) {
				if ($permId <= 0) {
					continue;
				}
				$insertPerm->execute([
					':role_id' => $roleId,
					':permiso_id' => $permId,
				]);
			}
		}
	}
}

function gesclub_permission_for_page(string $page): ?string
{
	$catalog = gesclub_permissions_catalog();
	return array_key_exists($page, $catalog) ? $page : null;
}

function gesclub_user_role_ids(int $userId): array
{
	$db = gesclub_db();
	$stmt = $db->prepare('SELECT role_id FROM user_role_assignments WHERE user_id = :id');
	$stmt->execute([':id' => $userId]);
	return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN) ?: []);
}

function gesclub_user_permissions(int $userId): array
{
	$db = gesclub_db();
	$roleIds = gesclub_user_role_ids($userId);
	if ($roleIds === []) {
		return [];
	}

	$placeholders = implode(',', array_fill(0, count($roleIds), '?'));
	$sql = 'SELECT pm.nombre,
			MAX(rp.can_view) AS can_view,
			MAX(rp.can_create) AS can_create,
			MAX(rp.can_edit) AS can_edit,
			MAX(rp.can_delete) AS can_delete,
			MAX(rp.can_export) AS can_export
		FROM role_permissions rp
		JOIN permisos_modulo pm ON pm.id = rp.permiso_id
		WHERE rp.role_id IN (' . $placeholders . ')
		GROUP BY pm.nombre';
	$stmt = $db->prepare($sql);
	$stmt->execute($roleIds);
	$rows = $stmt->fetchAll() ?: [];

	$permissions = [];
	foreach ($rows as $row) {
		$permissions[$row['nombre']] = [
			'view' => (int)$row['can_view'] === 1,
			'create' => (int)$row['can_create'] === 1,
			'edit' => (int)$row['can_edit'] === 1,
			'delete' => (int)$row['can_delete'] === 1,
			'export' => (int)$row['can_export'] === 1,
		];
	}

	return $permissions;
}

function gesclub_can(string $permission, string $action = 'view'): bool
{
	if (!gesclub_is_authenticated()) {
		return false;
	}
	if (!empty($_SESSION['auth_user']['role']) && $_SESSION['auth_user']['role'] === 'super_root') {
		return true;
	}

	gesclub_bootstrap_permissions();

	$userId = (int)($_SESSION['auth_user']['id'] ?? 0);
	if ($userId <= 0) {
		return false;
	}

	$permissions = gesclub_user_permissions($userId);
	if (!isset($permissions[$permission])) {
		return false;
	}

	return (bool)($permissions[$permission][$action] ?? false);
}

function gesclub_can_any(array $permissions, string $action = 'view'): bool
{
	foreach ($permissions as $permission) {
		if (gesclub_can($permission, $action)) {
			return true;
		}
	}

	return false;
}

function gesclub_require_permission(string $permission, string $action = 'view'): void
{
	if (!gesclub_can($permission, $action)) {
		header('Location: page-error-403.php');
		exit;
	}
}

function gesclub_require_roles(array $roles): void
{
	if (!gesclub_is_authenticated()) {
		header('Location: page-login.php');
		exit;
	}

	if (!empty($_SESSION['auth_user']['role']) && $_SESSION['auth_user']['role'] === 'super_root') {
		return;
	}

	$userId = (int)($_SESSION['auth_user']['id'] ?? 0);
	foreach ($roles as $role) {
		if (gesclub_user_has_role($userId, $role)) {
			return;
		}
	}

	header('Location: page-error-403.php');
	exit;
}
