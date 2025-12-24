<?php
	$crudConfig = [
		'title' => 'Permisos por módulo',
		'description' => 'Define permisos disponibles para cada módulo del sistema.',
		'table' => 'permisos_modulo',
		'fields' => [
			['name' => 'nombre', 'label' => 'Nombre', 'type' => 'text', 'required' => true],
			['name' => 'descripcion', 'label' => 'Descripción', 'type' => 'text'],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Permiso'],
			['name' => 'descripcion', 'label' => 'Descripción'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
