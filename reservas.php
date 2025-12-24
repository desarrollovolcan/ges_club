<?php
	$crudConfig = [
		'title' => 'Reservas de espacios',
		'description' => 'Gestiona reservas de canchas, salas y espacios deportivos.',
		'table' => 'reservas',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'sede_id', 'label' => 'Sede', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_sedes WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'espacio', 'label' => 'Espacio', 'type' => 'text', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'hora_inicio', 'label' => 'Hora inicio', 'type' => 'time', 'required' => true],
			['name' => 'hora_fin', 'label' => 'Hora fin', 'type' => 'time', 'required' => true],
			['name' => 'cupos', 'label' => 'Cupos', 'type' => 'number'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'confirmada', 'label' => 'Confirmada'],
				['value' => 'cancelada', 'label' => 'Cancelada'],
			]],
		],
		'list' => [
			['name' => 'espacio', 'label' => 'Espacio'],
			['name' => 'fecha', 'label' => 'Fecha'],
			['name' => 'hora_inicio', 'label' => 'Inicio'],
			['name' => 'hora_fin', 'label' => 'Fin'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
