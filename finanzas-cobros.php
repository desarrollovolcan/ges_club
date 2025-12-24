<?php
	$crudConfig = [
		'title' => 'Gestión de cobros',
		'description' => 'Emite cobros y controla fechas de vencimiento.',
		'table' => 'cobros',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'deportista_id', 'label' => 'Deportista', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, CONCAT(nombres, " ", apellidos) AS nombre FROM deportistas WHERE club_id = :club_id ORDER BY nombres');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'plan_id', 'label' => 'Plan', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM planes_cuota WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'required' => true],
			['name' => 'fecha_emision', 'label' => 'Fecha emisión', 'type' => 'date', 'required' => true],
			['name' => 'fecha_vencimiento', 'label' => 'Fecha vencimiento', 'type' => 'date', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'pagado', 'label' => 'Pagado'],
				['value' => 'vencido', 'label' => 'Vencido'],
			]],
			['name' => 'referencia', 'label' => 'Referencia', 'type' => 'text'],
		],
		'list' => [
			['name' => 'monto', 'label' => 'Monto'],
			['name' => 'fecha_vencimiento', 'label' => 'Vencimiento'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
