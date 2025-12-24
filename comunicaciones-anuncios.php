<?php
	$crudConfig = [
		'title' => 'Anuncios del club',
		'description' => 'Publica comunicados oficiales del club.',
		'table' => 'comunicados',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'titulo', 'label' => 'Título', 'type' => 'text', 'required' => true],
			['name' => 'contenido', 'label' => 'Contenido', 'type' => 'textarea', 'required' => true],
			['name' => 'canal', 'label' => 'Canal', 'type' => 'text', 'required' => true],
			['name' => 'fecha_publicacion', 'label' => 'Fecha publicación', 'type' => 'date', 'required' => true],
			['name' => 'autor', 'label' => 'Autor', 'type' => 'text', 'required' => true],
		],
		'list' => [
			['name' => 'titulo', 'label' => 'Título'],
			['name' => 'canal', 'label' => 'Canal'],
			['name' => 'fecha_publicacion', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
