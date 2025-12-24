<?php
	$crudConfig = [
		'title' => 'Rendiciones y viáticos',
		'description' => 'Controla rendiciones, reembolsos y viáticos.',
		'table' => 'contabilidad_rendiciones',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'solicitante', 'label' => 'Solicitante', 'type' => 'text', 'required' => true],
			['name' => 'descripcion', 'label' => 'Descripción', 'type' => 'text', 'required' => true],
			['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'aprobada', 'label' => 'Aprobada'],
				['value' => 'rechazada', 'label' => 'Rechazada'],
			]],
		],
		'list' => [
			['name' => 'solicitante', 'label' => 'Solicitante'],
			['name' => 'monto', 'label' => 'Monto'],
			['name' => 'fecha', 'label' => 'Fecha'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
