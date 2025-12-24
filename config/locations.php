<?php

require_once __DIR__ . '/db.php';

function gesclub_default_locations(): array
{
	$path = __DIR__ . '/../data/locations.json';
	if (file_exists($path)) {
		$contents = file_get_contents($path);
		$data = json_decode($contents, true);
		if (is_array($data)) {
			return $data;
		}
	}

	return [
		'paises' => [],
		'regiones' => [],
		'comunas' => [],
		'ciudades' => [],
		'historial' => [],
	];
}

function gesclub_load_locations(): array
{
	$db = gesclub_db();
	$paises = $db->query('SELECT id, codigo, nombre, estado FROM paises ORDER BY id')->fetchAll();
	$regiones = $db->query('SELECT id, pais_id, codigo, nombre, estado FROM regiones ORDER BY id')->fetchAll();
	$comunas = $db->query('SELECT id, region_id, nombre, estado FROM comunas ORDER BY id')->fetchAll();
	$ciudades = $db->query('SELECT id, comuna_id, nombre, estado FROM ciudades ORDER BY id')->fetchAll();
	$historial = $db->query('SELECT tipo, accion, detalle, usuario, fecha FROM historial_ubicaciones ORDER BY id')->fetchAll();

	if ($paises === [] && $regiones === [] && $comunas === [] && $ciudades === []) {
		$defaults = gesclub_default_locations();
		gesclub_seed_locations($db, $defaults);
		return $defaults;
	}

	return [
		'paises' => $paises ?: [],
		'regiones' => $regiones ?: [],
		'comunas' => $comunas ?: [],
		'ciudades' => $ciudades ?: [],
		'historial' => $historial ?: [],
	];
}

function gesclub_seed_locations(PDO $db, array $defaults): void
{
	$db->beginTransaction();
	$insertPais = $db->prepare('INSERT INTO paises (id, codigo, nombre, estado) VALUES (:id, :codigo, :nombre, :estado)');
	foreach ($defaults['paises'] ?? [] as $pais) {
		$insertPais->execute([
			':id' => (int)($pais['id'] ?? 0),
			':codigo' => (string)($pais['codigo'] ?? ''),
			':nombre' => (string)($pais['nombre'] ?? ''),
			':estado' => (string)($pais['estado'] ?? 'activo'),
		]);
	}
	$insertRegion = $db->prepare('INSERT INTO regiones (id, pais_id, codigo, nombre, estado) VALUES (:id, :pais_id, :codigo, :nombre, :estado)');
	foreach ($defaults['regiones'] ?? [] as $region) {
		$insertRegion->execute([
			':id' => (int)($region['id'] ?? 0),
			':pais_id' => (int)($region['pais_id'] ?? 0),
			':codigo' => (string)($region['codigo'] ?? ''),
			':nombre' => (string)($region['nombre'] ?? ''),
			':estado' => (string)($region['estado'] ?? 'activo'),
		]);
	}
	$insertComuna = $db->prepare('INSERT INTO comunas (id, region_id, nombre, estado) VALUES (:id, :region_id, :nombre, :estado)');
	foreach ($defaults['comunas'] ?? [] as $comuna) {
		$insertComuna->execute([
			':id' => (int)($comuna['id'] ?? 0),
			':region_id' => (int)($comuna['region_id'] ?? 0),
			':nombre' => (string)($comuna['nombre'] ?? ''),
			':estado' => (string)($comuna['estado'] ?? 'activo'),
		]);
	}
	$insertCiudad = $db->prepare('INSERT INTO ciudades (id, comuna_id, nombre, estado) VALUES (:id, :comuna_id, :nombre, :estado)');
	foreach ($defaults['ciudades'] ?? [] as $ciudad) {
		$insertCiudad->execute([
			':id' => (int)($ciudad['id'] ?? 0),
			':comuna_id' => (int)($ciudad['comuna_id'] ?? 0),
			':nombre' => (string)($ciudad['nombre'] ?? ''),
			':estado' => (string)($ciudad['estado'] ?? 'activo'),
		]);
	}
	$insertHist = $db->prepare('INSERT INTO historial_ubicaciones (tipo, accion, detalle, usuario, fecha) VALUES (:tipo, :accion, :detalle, :usuario, :fecha)');
	foreach ($defaults['historial'] ?? [] as $hist) {
		$insertHist->execute([
			':tipo' => (string)($hist['tipo'] ?? ''),
			':accion' => (string)($hist['accion'] ?? ''),
			':detalle' => (string)($hist['detalle'] ?? ''),
			':usuario' => (string)($hist['usuario'] ?? ''),
			':fecha' => (string)($hist['fecha'] ?? date('Y-m-d H:i:s')),
		]);
	}
	$db->commit();
}

function gesclub_save_locations(array $locations): bool
{
	$db = gesclub_db();
	try {
		$db->beginTransaction();
		gesclub_sync_locations_table($db, 'paises', $locations['paises'] ?? [], ['codigo', 'nombre', 'estado']);
		gesclub_sync_locations_table($db, 'regiones', $locations['regiones'] ?? [], ['pais_id', 'codigo', 'nombre', 'estado']);
		gesclub_sync_locations_table($db, 'comunas', $locations['comunas'] ?? [], ['region_id', 'nombre', 'estado']);
		gesclub_sync_locations_table($db, 'ciudades', $locations['ciudades'] ?? [], ['comuna_id', 'nombre', 'estado']);
		gesclub_replace_location_history($db, $locations['historial'] ?? []);
		$db->commit();
		return true;
	} catch (Throwable $e) {
		if ($db->inTransaction()) {
			$db->rollBack();
		}
		return false;
	}
}

function gesclub_sync_locations_table(PDO $db, string $table, array $rows, array $columns): void
{
	$setClauses = [];
	foreach ($columns as $column) {
		$setClauses[] = sprintf('%s = :%s', $column, $column);
	}
	$update = $db->prepare(sprintf(
		'UPDATE %s SET %s WHERE id = :id',
		$table,
		implode(', ', $setClauses)
	));
	$insertColumns = array_merge(['id'], $columns);
	$insert = $db->prepare(sprintf(
		'INSERT INTO %s (%s) VALUES (%s)',
		$table,
		implode(', ', $insertColumns),
		':' . implode(', :', $insertColumns)
	));

	$ids = [];
	foreach ($rows as $row) {
		$id = (int)($row['id'] ?? 0);
		if ($id <= 0) {
			continue;
		}
		$ids[] = $id;
		$params = [':id' => $id];
		foreach ($columns as $column) {
			$default = $column === 'estado' ? 'activo' : '';
			$params[':' . $column] = $row[$column] ?? $default;
		}
		$update->execute($params);
		if ($update->rowCount() === 0) {
			$insert->execute($params);
		}
	}

	if ($ids === []) {
		$db->exec(sprintf('DELETE FROM %s', $table));
		return;
	}

	$placeholders = implode(',', array_fill(0, count($ids), '?'));
	$delete = $db->prepare(sprintf('DELETE FROM %s WHERE id NOT IN (%s)', $table, $placeholders));
	$delete->execute($ids);
}

function gesclub_replace_location_history(PDO $db, array $history): void
{
	$db->exec('DELETE FROM historial_ubicaciones');
	$insert = $db->prepare('INSERT INTO historial_ubicaciones (tipo, accion, detalle, usuario, fecha) VALUES (:tipo, :accion, :detalle, :usuario, :fecha)');
	foreach ($history as $item) {
		$insert->execute([
			':tipo' => (string)($item['tipo'] ?? ''),
			':accion' => (string)($item['accion'] ?? ''),
			':detalle' => (string)($item['detalle'] ?? ''),
			':usuario' => (string)($item['usuario'] ?? ''),
			':fecha' => (string)($item['fecha'] ?? date('Y-m-d H:i:s')),
		]);
	}
}

function gesclub_next_location_id(array $items): int
{
	$max = 0;
	foreach ($items as $item) {
		$id = (int)($item['id'] ?? 0);
		if ($id > $max) {
			$max = $id;
		}
	}

	return $max + 1;
}

function gesclub_find_location(array $items, int $id): ?array
{
	foreach ($items as $item) {
		if ((int)($item['id'] ?? 0) === $id) {
			return $item;
		}
	}

	return null;
}

function gesclub_add_location_history(array &$locations, string $tipo, string $accion, string $detalle, string $usuario): void
{
	if (!isset($locations['historial']) || !is_array($locations['historial'])) {
		$locations['historial'] = [];
	}

	$locations['historial'][] = [
		'tipo' => $tipo,
		'accion' => $accion,
		'detalle' => $detalle,
		'usuario' => $usuario,
		'fecha' => date('Y-m-d H:i:s'),
	];
}
