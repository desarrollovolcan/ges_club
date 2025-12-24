<?php
	$crudConfig = [
		'title' => 'Becas y subsidios',
		'description' => 'Gestiona becas y beneficios económicos.',
		'table' => 'becas',
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
			['name' => 'porcentaje', 'label' => 'Porcentaje', 'type' => 'number', 'required' => true],
			['name' => 'motivo', 'label' => 'Motivo', 'type' => 'text'],
			['name' => 'fecha_inicio', 'label' => 'Fecha inicio', 'type' => 'date', 'required' => true],
			['name' => 'fecha_fin', 'label' => 'Fecha término', 'type' => 'date', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activa', 'label' => 'Activa'],
				['value' => 'finalizada', 'label' => 'Finalizada'],
			]],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT b.id, b.porcentaje, b.fecha_inicio, b.fecha_fin, b.estado, CONCAT(d.nombres, " ", d.apellidos) AS deportista FROM becas b JOIN deportistas d ON d.id = b.deportista_id WHERE b.club_id = :club_id ORDER BY b.fecha_inicio DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'deportista', 'label' => 'Deportista'],
			['name' => 'porcentaje', 'label' => 'Porcentaje'],
			['name' => 'fecha_inicio', 'label' => 'Inicio'],
			['name' => 'fecha_fin', 'label' => 'Término'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
