<?php
	$crudConfig = [
		'title' => 'Solicitudes y gestiones',
		'description' => 'Gestiona solicitudes de incorporación, certificados y reclamos.',
		'table' => 'solicitudes',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text', 'required' => true],
			['name' => 'solicitante', 'label' => 'Solicitante', 'type' => 'text', 'required' => true],
			['name' => 'detalle', 'label' => 'Detalle', 'type' => 'text'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'recibida', 'label' => 'Recibida'],
				['value' => 'en_proceso', 'label' => 'En proceso'],
				['value' => 'cerrada', 'label' => 'Cerrada'],
			]],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
		],
		'list' => [
			['name' => 'tipo', 'label' => 'Tipo'],
			['name' => 'solicitante', 'label' => 'Solicitante'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
