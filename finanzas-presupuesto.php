<?php
	$crudConfig = [
		'title' => 'Presupuesto del club',
		'description' => 'Controla presupuesto anual y proyecciones.',
		'table' => 'presupuestos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'periodo', 'label' => 'Periodo', 'type' => 'text', 'required' => true],
			['name' => 'ingreso_estimado', 'label' => 'Ingreso estimado', 'type' => 'number', 'required' => true],
			['name' => 'gasto_estimado', 'label' => 'Gasto estimado', 'type' => 'number', 'required' => true],
			['name' => 'observaciones', 'label' => 'Observaciones', 'type' => 'textarea'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'borrador', 'label' => 'Borrador'],
				['value' => 'aprobado', 'label' => 'Aprobado'],
				['value' => 'cerrado', 'label' => 'Cerrado'],
			]],
		],
		'list' => [
			['name' => 'periodo', 'label' => 'Periodo'],
			['name' => 'ingreso_estimado', 'label' => 'Ingreso'],
			['name' => 'gasto_estimado', 'label' => 'Gasto'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
