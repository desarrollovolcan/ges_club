<?php
	$crudConfig = [
		'title' => 'Actas de reuniones',
		'description' => 'Registro de actas de directiva y asambleas.',
		'table' => 'actas_reuniones',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'text', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'resumen', 'label' => 'Resumen', 'type' => 'textarea'],
			['name' => 'archivo', 'label' => 'Archivo', 'type' => 'text'],
		],
		'list' => [
			['name' => 'tipo', 'label' => 'Tipo'],
			['name' => 'fecha', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
