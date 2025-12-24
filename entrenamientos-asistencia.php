<?php
	$crudConfig = [
		'title' => 'Asistencia a entrenamientos',
		'description' => 'Controla la asistencia por sesión y deportista.',
		'table' => 'entrenamiento_asistencias',
		'clubAware' => true,
		'fields' => [
			['name' => 'sesion_id', 'label' => 'Sesión', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$sql = 'SELECT s.id, s.fecha, e.nombre FROM entrenamiento_sesiones s JOIN entrenamientos e ON e.id = s.entrenamiento_id WHERE e.club_id = :club_id ORDER BY s.fecha DESC';
				$stmt = $db->prepare($sql);
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre'] . ' - ' . $row['fecha']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'deportista_id', 'label' => 'Deportista', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, CONCAT(nombres, " ", apellidos) AS nombre FROM deportistas WHERE club_id = :club_id ORDER BY nombres');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'presente', 'label' => 'Presente'],
				['value' => 'ausente', 'label' => 'Ausente'],
				['value' => 'justificado', 'label' => 'Justificado'],
			]],
			['name' => 'observaciones', 'label' => 'Observaciones', 'type' => 'text'],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT a.id, a.estado, a.observaciones, s.fecha, e.nombre AS entrenamiento, CONCAT(d.nombres, " ", d.apellidos) AS deportista FROM entrenamiento_asistencias a JOIN entrenamiento_sesiones s ON s.id = a.sesion_id JOIN entrenamientos e ON e.id = s.entrenamiento_id JOIN deportistas d ON d.id = a.deportista_id WHERE e.club_id = :club_id ORDER BY s.fecha DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'entrenamiento', 'label' => 'Entrenamiento'],
			['name' => 'deportista', 'label' => 'Deportista'],
			['name' => 'fecha', 'label' => 'Fecha'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
