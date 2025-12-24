<?php
	$crudConfig = [
		'title' => 'Biblioteca de documentos',
		'description' => 'Administra estatutos, reglamentos y protocolos internos.',
		'table' => 'documentos_internos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text', 'required' => true],
			['name' => 'titulo', 'label' => 'Título', 'type' => 'text', 'required' => true],
			['name' => 'archivo', 'label' => 'Archivo', 'type' => 'text'],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
		],
		'list' => [
			['name' => 'titulo', 'label' => 'Título'],
			['name' => 'tipo', 'label' => 'Tipo'],
			['name' => 'fecha', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
