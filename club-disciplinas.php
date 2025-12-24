<?php
	$crudConfig = [
		'title' => 'Disciplinas del club',
		'description' => 'Administra las disciplinas deportivas oficiales del club.',
		'table' => 'club_disciplinas',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Disciplina', 'type' => 'text', 'required' => true],
			['name' => 'rama', 'label' => 'Rama', 'type' => 'text'],
			['name' => 'nivel', 'label' => 'Nivel', 'type' => 'text'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'inactivo', 'label' => 'Inactivo'],
			]],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Disciplina'],
			['name' => 'rama', 'label' => 'Rama'],
			['name' => 'nivel', 'label' => 'Nivel'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
