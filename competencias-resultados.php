<?php
	$crudConfig = [
		'title' => 'Resultados deportivos',
		'description' => 'Registra resultados y estadísticas por competencia.',
		'table' => 'competencia_resultados',
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
			['name' => 'resultado', 'label' => 'Resultado', 'type' => 'text'],
			['name' => 'posicion', 'label' => 'Posición', 'type' => 'text'],
			['name' => 'marca', 'label' => 'Marca', 'type' => 'text'],
			['name' => 'observaciones', 'label' => 'Observaciones', 'type' => 'text'],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT r.id, r.resultado, r.posicion, c.nombre AS competencia, CONCAT(d.nombres, " ", d.apellidos) AS deportista FROM competencia_resultados r JOIN competencias c ON c.id = r.competencia_id JOIN deportistas d ON d.id = r.deportista_id WHERE c.club_id = :club_id ORDER BY r.id DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'competencia', 'label' => 'Competencia'],
			['name' => 'deportista', 'label' => 'Deportista'],
			['name' => 'resultado', 'label' => 'Resultado'],
			['name' => 'posicion', 'label' => 'Posición'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
