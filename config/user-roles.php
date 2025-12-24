<?php

require_once __DIR__ . '/db.php';

function gesclub_default_user_roles(): array
{
	return [
		['id' => 1, 'nombre' => 'Super Root', 'estado' => 'activo'],
		['id' => 2, 'nombre' => 'Administrador', 'estado' => 'activo'],
		['id' => 3, 'nombre' => 'Socio', 'estado' => 'activo'],
		['id' => 4, 'nombre' => 'Entrenador', 'estado' => 'activo'],
		['id' => 5, 'nombre' => 'Apoderado', 'estado' => 'activo'],
		['id' => 6, 'nombre' => 'Funcionario', 'estado' => 'activo'],
		['id' => 7, 'nombre' => 'Invitado', 'estado' => 'activo'],
		['id' => 8, 'nombre' => 'Admin General', 'estado' => 'activo'],
		['id' => 9, 'nombre' => 'Admin Club', 'estado' => 'activo'],
		['id' => 10, 'nombre' => 'Coordinador Deportivo', 'estado' => 'activo'],
	];
}

function gesclub_load_user_roles(): array
{
	$db = gesclub_db();
	$roles = $db->query('SELECT id, nombre, estado FROM user_roles ORDER BY id')->fetchAll();
	if (!$roles) {
		$defaults = gesclub_default_user_roles();
		gesclub_save_user_roles($defaults);
		return $defaults;
	}

	return $roles;
}

function gesclub_save_user_roles(array $roles): bool
{
	$db = gesclub_db();
	try {
		$db->beginTransaction();
		$upsert = $db->prepare(
			'INSERT INTO user_roles (id, nombre, estado) VALUES (:id, :nombre, :estado)
			ON DUPLICATE KEY UPDATE nombre = VALUES(nombre), estado = VALUES(estado)'
		);
		$ids = [];
		foreach ($roles as $role) {
			$id = (int)($role['id'] ?? 0);
			if ($id <= 0) {
				continue;
			}
			$ids[] = $id;
			$upsert->execute([
				':id' => $id,
				':nombre' => (string)($role['nombre'] ?? ''),
				':estado' => (string)($role['estado'] ?? 'activo'),
			]);
		}

		if ($ids === []) {
			$db->exec('DELETE FROM user_roles');
		} else {
			$placeholders = implode(',', array_fill(0, count($ids), '?'));
			$delete = $db->prepare(sprintf('DELETE FROM user_roles WHERE id NOT IN (%s)', $placeholders));
			$delete->execute($ids);
		}
		$db->commit();
		return true;
	} catch (Throwable $e) {
		if ($db->inTransaction()) {
			$db->rollBack();
		}
		return false;
	}
}

function gesclub_next_user_role_id(array $roles): int
{
	$max = 0;
	foreach ($roles as $role) {
		$id = (int)($role['id'] ?? 0);
		if ($id > $max) {
			$max = $id;
		}
	}

	return $max + 1;
}

function gesclub_find_user_role(array $roles, int $id): ?array
{
	foreach ($roles as $role) {
		if ((int)($role['id'] ?? 0) === $id) {
			return $role;
		}
	}

	return null;
}
