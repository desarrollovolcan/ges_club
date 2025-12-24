<?php
	$crudConfig = [
		'title' => 'Calendario de actividades',
		'description' => 'Planifica entrenamientos, reuniones y eventos del club.',
		'table' => 'calendario_eventos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'titulo', 'label' => 'Título', 'type' => 'text', 'required' => true],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text', 'required' => true],
			['name' => 'fecha_inicio', 'label' => 'Inicio', 'type' => 'datetime-local', 'required' => true],
			['name' => 'fecha_fin', 'label' => 'Término', 'type' => 'datetime-local', 'required' => true],
			['name' => 'sede', 'label' => 'Sede', 'type' => 'text'],
			['name' => 'cupos', 'label' => 'Cupos', 'type' => 'number'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'programado', 'label' => 'Programado'],
				['value' => 'confirmado', 'label' => 'Confirmado'],
				['value' => 'cancelado', 'label' => 'Cancelado'],
			]],
		],
		'list' => [
			['name' => 'titulo', 'label' => 'Actividad'],
			['name' => 'fecha_inicio', 'label' => 'Inicio'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
