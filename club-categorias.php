<?php
	$crudConfig = [
		'title' => 'Categorías deportivas',
		'description' => 'Gestiona categorías por edad, género y disciplina.',
		'table' => 'club_categorias',
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
			['name' => 'nombre', 'label' => 'Categoría', 'type' => 'text', 'required' => true],
			['name' => 'edad_min', 'label' => 'Edad mínima', 'type' => 'number'],
			['name' => 'edad_max', 'label' => 'Edad máxima', 'type' => 'number'],
			['name' => 'genero', 'label' => 'Género', 'type' => 'select', 'options' => [
				['value' => 'mixto', 'label' => 'Mixto'],
				['value' => 'masculino', 'label' => 'Masculino'],
				['value' => 'femenino', 'label' => 'Femenino'],
			]],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'inactivo', 'label' => 'Inactivo'],
			]],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Categoría'],
			['name' => 'edad_min', 'label' => 'Edad mín.'],
			['name' => 'edad_max', 'label' => 'Edad máx.'],
			['name' => 'genero', 'label' => 'Género'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
