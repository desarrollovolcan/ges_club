<?php
	$crudConfig = [
		'title' => 'Asignación de permisos',
		'description' => 'Relaciona roles con permisos y niveles de acceso.',
		'table' => 'role_permissions',
		'fields' => [
			['name' => 'role_id', 'label' => 'Rol', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($r) => ['value' => $r['id'], 'label' => $r['nombre']], $db->query('SELECT id, nombre FROM user_roles ORDER BY nombre')->fetchAll() ?: []);
			}],
			['name' => 'permiso_id', 'label' => 'Permiso', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($r) => ['value' => $r['id'], 'label' => $r['nombre']], $db->query('SELECT id, nombre FROM permisos_modulo ORDER BY nombre')->fetchAll() ?: []);
			}],
			['name' => 'can_view', 'label' => 'Ver', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
			['name' => 'can_create', 'label' => 'Crear', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
			['name' => 'can_edit', 'label' => 'Editar', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
			['name' => 'can_delete', 'label' => 'Eliminar', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
			['name' => 'can_export', 'label' => 'Exportar', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 1, 'label' => 'Sí'],
				['value' => 0, 'label' => 'No'],
			]],
		],
		'listQuery' => function($db, $selectedClubId) {
			$sql = 'SELECT rp.id, rp.can_view, rp.can_create, rp.can_edit, rp.can_delete, rp.can_export, ur.nombre AS rol, pm.nombre AS permiso FROM role_permissions rp JOIN user_roles ur ON ur.id = rp.role_id JOIN permisos_modulo pm ON pm.id = rp.permiso_id ORDER BY ur.nombre, pm.nombre';
			return $db->query($sql)->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'rol', 'label' => 'Rol'],
			['name' => 'permiso', 'label' => 'Permiso'],
			['name' => 'can_view', 'label' => 'Ver'],
			['name' => 'can_create', 'label' => 'Crear'],
			['name' => 'can_edit', 'label' => 'Editar'],
			['name' => 'can_delete', 'label' => 'Eliminar'],
			['name' => 'can_export', 'label' => 'Exportar'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
