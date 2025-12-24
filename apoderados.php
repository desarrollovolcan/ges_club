<?php
	$crudConfig = [
		'title' => 'Apoderados y familias',
		'description' => 'Registro de apoderados y responsables legales por deportista.',
		'table' => 'apoderados',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'run_numero', 'label' => 'RUN', 'type' => 'text', 'required' => true],
			['name' => 'run_dv', 'label' => 'DV', 'type' => 'text', 'required' => true],
			['name' => 'nombres', 'label' => 'Nombres', 'type' => 'text', 'required' => true],
			['name' => 'apellidos', 'label' => 'Apellidos', 'type' => 'text', 'required' => true],
			['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
			['name' => 'telefono', 'label' => 'Teléfono', 'type' => 'text', 'required' => true],
			['name' => 'direccion', 'label' => 'Dirección', 'type' => 'text'],
			['name' => 'relacion', 'label' => 'Relación', 'type' => 'text', 'required' => true],
			['name' => 'consentimiento_datos', 'label' => 'Consentimiento datos', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
			['name' => 'created_at', 'label' => 'Fecha creación', 'type' => 'date', 'auto' => 'insert', 'value' => function() { return date('Y-m-d'); }],
		],
		'list' => [
			['name' => 'nombres', 'label' => 'Nombre'],
			['name' => 'apellidos', 'label' => 'Apellidos'],
			['name' => 'telefono', 'label' => 'Teléfono'],
			['name' => 'relacion', 'label' => 'Relación'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
