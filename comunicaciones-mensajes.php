<?php
	$crudConfig = [
		'title' => 'Mensajería interna',
		'description' => 'Gestiona mensajes entre administración y miembros del club.',
		'table' => 'mensajes',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'emisor', 'label' => 'Emisor', 'type' => 'text', 'required' => true],
			['name' => 'receptor', 'label' => 'Receptor', 'type' => 'text', 'required' => true],
			['name' => 'asunto', 'label' => 'Asunto', 'type' => 'text'],
			['name' => 'contenido', 'label' => 'Contenido', 'type' => 'textarea', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'leido', 'label' => 'Leído'],
				['value' => 'no_leido', 'label' => 'No leído'],
			]],
		],
		'list' => [
			['name' => 'emisor', 'label' => 'Emisor'],
			['name' => 'receptor', 'label' => 'Receptor'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
