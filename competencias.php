<?php
	$crudConfig = [
		'title' => 'Competencias y torneos',
		'description' => 'Registra competencias oficiales y amistosas.',
		'table' => 'competencias',
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
			['name' => 'nombre', 'label' => 'Nombre', 'type' => 'text', 'required' => true],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text'],
			['name' => 'fecha_inicio', 'label' => 'Fecha inicio', 'type' => 'date', 'required' => true],
			['name' => 'fecha_fin', 'label' => 'Fecha término', 'type' => 'date', 'required' => true],
			['name' => 'sede', 'label' => 'Sede', 'type' => 'text'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'planificada', 'label' => 'Planificada'],
				['value' => 'en_curso', 'label' => 'En curso'],
				['value' => 'finalizada', 'label' => 'Finalizada'],
			]],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT c.id, c.nombre, c.fecha_inicio, c.fecha_fin, c.estado, d.nombre AS disciplina, cat.nombre AS categoria FROM competencias c LEFT JOIN club_disciplinas d ON d.id = c.disciplina_id LEFT JOIN club_categorias cat ON cat.id = c.categoria_id WHERE c.club_id = :club_id ORDER BY c.fecha_inicio DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'nombre', 'label' => 'Competencia'],
			['name' => 'disciplina', 'label' => 'Disciplina'],
			['name' => 'categoria', 'label' => 'Categoría'],
			['name' => 'fecha_inicio', 'label' => 'Inicio'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
