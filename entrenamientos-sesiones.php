<?php
	$crudConfig = [
		'title' => 'Sesiones de entrenamiento',
		'description' => 'Registra sesiones y objetivos de entrenamiento.',
		'table' => 'entrenamiento_sesiones',
		'clubAware' => true,
		'fields' => [
			['name' => 'entrenamiento_id', 'label' => 'Entrenamiento', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM entrenamientos WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'objetivo', 'label' => 'Objetivo', 'type' => 'textarea'],
			['name' => 'observaciones', 'label' => 'Observaciones', 'type' => 'textarea'],
			['name' => 'created_at', 'label' => 'Creado', 'type' => 'date', 'auto' => 'insert', 'value' => function() { return date('Y-m-d'); }],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT s.id, s.fecha, e.nombre AS entrenamiento FROM entrenamiento_sesiones s JOIN entrenamientos e ON e.id = s.entrenamiento_id WHERE e.club_id = :club_id ORDER BY s.fecha DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'entrenamiento', 'label' => 'Entrenamiento'],
			['name' => 'fecha', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
