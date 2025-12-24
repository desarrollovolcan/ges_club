<?php
	$crudConfig = [
		'title' => 'Notificaciones automatizadas',
		'description' => 'Configura alertas automáticas y seguimiento de envíos.',
		'table' => 'notificaciones',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text', 'required' => true],
			['name' => 'mensaje', 'label' => 'Mensaje', 'type' => 'textarea', 'required' => true],
			['name' => 'destino', 'label' => 'Destino', 'type' => 'text', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'enviada', 'label' => 'Enviada'],
				['value' => 'fallida', 'label' => 'Fallida'],
			]],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
		],
		'list' => [
			['name' => 'tipo', 'label' => 'Tipo'],
			['name' => 'destino', 'label' => 'Destino'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
