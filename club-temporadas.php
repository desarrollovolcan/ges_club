<?php
	$crudConfig = [
		'title' => 'Temporadas deportivas',
		'description' => 'Planifica y controla periodos deportivos por club.',
		'table' => 'club_temporadas',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Nombre temporada', 'type' => 'text', 'required' => true],
			['name' => 'fecha_inicio', 'label' => 'Fecha inicio', 'type' => 'date', 'required' => true],
			['name' => 'fecha_fin', 'label' => 'Fecha término', 'type' => 'date', 'required' => true],
			['name' => 'objetivo', 'label' => 'Objetivo', 'type' => 'textarea'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'planificada', 'label' => 'Planificada'],
				['value' => 'activa', 'label' => 'Activa'],
				['value' => 'cerrada', 'label' => 'Cerrada'],
			]],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Temporada'],
			['name' => 'fecha_inicio', 'label' => 'Inicio'],
			['name' => 'fecha_fin', 'label' => 'Término'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
