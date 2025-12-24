<?php
	$crudConfig = [
		'title' => 'Planes y cuotas',
		'description' => 'Define planes de membresía y cuotas recurrentes.',
		'table' => 'planes_cuota',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Plan', 'type' => 'text', 'required' => true],
			['name' => 'descripcion', 'label' => 'Descripción', 'type' => 'textarea'],
			['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'required' => true],
			['name' => 'periodicidad', 'label' => 'Periodicidad', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'mensual', 'label' => 'Mensual'],
				['value' => 'trimestral', 'label' => 'Trimestral'],
				['value' => 'semestral', 'label' => 'Semestral'],
				['value' => 'anual', 'label' => 'Anual'],
			]],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'inactivo', 'label' => 'Inactivo'],
			]],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Plan'],
			['name' => 'monto', 'label' => 'Monto'],
			['name' => 'periodicidad', 'label' => 'Periodicidad'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
