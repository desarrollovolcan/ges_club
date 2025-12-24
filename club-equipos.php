<?php
	$crudConfig = [
		'title' => 'Equipos y plantillas',
		'description' => 'Organiza equipos por disciplina, categoría y temporada.',
		'table' => 'club_equipos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'disciplina_id', 'label' => 'Disciplina', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_disciplinas WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'categoria_id', 'label' => 'Categoría', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_categorias WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'temporada_id', 'label' => 'Temporada', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_temporadas WHERE club_id = :club_id ORDER BY fecha_inicio DESC');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Nombre equipo', 'type' => 'text', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'inactivo', 'label' => 'Inactivo'],
			]],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT e.id, e.nombre, e.estado, d.nombre AS disciplina, c.nombre AS categoria, t.nombre AS temporada FROM club_equipos e LEFT JOIN club_disciplinas d ON d.id = e.disciplina_id LEFT JOIN club_categorias c ON c.id = e.categoria_id LEFT JOIN club_temporadas t ON t.id = e.temporada_id WHERE e.club_id = :club_id ORDER BY e.id DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'nombre', 'label' => 'Equipo'],
			['name' => 'disciplina', 'label' => 'Disciplina'],
			['name' => 'categoria', 'label' => 'Categoría'],
			['name' => 'temporada', 'label' => 'Temporada'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
