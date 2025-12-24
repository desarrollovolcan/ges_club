<?php
	$crudConfig = [
		'title' => 'Egresos y gastos',
		'description' => 'Registra egresos, proveedores y centros de costo.',
		'table' => 'contabilidad_gastos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'proveedor', 'label' => 'Proveedor', 'type' => 'text', 'required' => true],
			['name' => 'descripcion', 'label' => 'Descripción', 'type' => 'text', 'required' => true],
			['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'centro_costo', 'label' => 'Centro de costo', 'type' => 'text'],
			['name' => 'comprobante', 'label' => 'Comprobante', 'type' => 'text'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'pendiente', 'label' => 'Pendiente'],
				['value' => 'pagado', 'label' => 'Pagado'],
			]],
		],
		'list' => [
			['name' => 'proveedor', 'label' => 'Proveedor'],
			['name' => 'monto', 'label' => 'Monto'],
			['name' => 'fecha', 'label' => 'Fecha'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
