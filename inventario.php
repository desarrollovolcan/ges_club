<?php
	$crudConfig = [
		'title' => 'Inventario de activos',
		'description' => 'Gestiona implementos, stock y estado de activos.',
		'table' => 'inventario_items',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Ítem', 'type' => 'text', 'required' => true],
			['name' => 'categoria', 'label' => 'Categoría', 'type' => 'text'],
			['name' => 'stock', 'label' => 'Stock', 'type' => 'number', 'required' => true],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'baja', 'label' => 'Baja'],
			]],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Ítem'],
			['name' => 'categoria', 'label' => 'Categoría'],
			['name' => 'stock', 'label' => 'Stock'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
