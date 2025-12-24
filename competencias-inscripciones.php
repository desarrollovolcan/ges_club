<?php
	$crudConfig = [
		'title' => 'Inscripciones a competencias',
		'description' => 'Controla inscripciones y estados por deportista.',
		'table' => 'competencia_inscripciones',
		'clubAware' => true,
		'fields' => [
			['name' => 'competencia_id', 'label' => 'Competencia', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM competencias WHERE club_id = :club_id ORDER BY fecha_inicio DESC');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
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
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'aprobada', 'label' => 'Aprobada'],
				['value' => 'rechazada', 'label' => 'Rechazada'],
			]],
			['name' => 'costo', 'label' => 'Costo', 'type' => 'number'],
			['name' => 'created_at', 'label' => 'Fecha', 'type' => 'date', 'auto' => 'insert', 'value' => function() { return date('Y-m-d'); }],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT i.id, i.estado, i.costo, i.created_at, c.nombre AS competencia, CONCAT(d.nombres, " ", d.apellidos) AS deportista FROM competencia_inscripciones i JOIN competencias c ON c.id = i.competencia_id JOIN deportistas d ON d.id = i.deportista_id WHERE c.club_id = :club_id ORDER BY i.created_at DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'competencia', 'label' => 'Competencia'],
			['name' => 'deportista', 'label' => 'Deportista'],
			['name' => 'estado', 'label' => 'Estado'],
			['name' => 'costo', 'label' => 'Costo'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
