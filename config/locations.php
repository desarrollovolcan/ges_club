<?php

function gesclub_locations_path(): string
{
	return __DIR__ . '/../data/locations.json';
}

function gesclub_load_locations(): array
{
	$path = gesclub_locations_path();
	if (!file_exists($path)) {
		return [
			'paises' => [],
			'regiones' => [],
			'comunas' => [],
			'ciudades' => [],
			'historial' => [],
		];
	}

	$contents = file_get_contents($path);
	$data = json_decode($contents, true);
	if (!is_array($data)) {
		return [
			'paises' => [],
			'regiones' => [],
			'comunas' => [],
			'ciudades' => [],
			'historial' => [],
		];
	}

	return $data;
}

function gesclub_save_locations(array $locations): bool
{
	$path = gesclub_locations_path();
	$dir = dirname($path);
	if (!is_dir($dir)) {
		if (!mkdir($dir, 0775, true) && !is_dir($dir)) {
			return false;
		}
	}
	if (!is_writable($dir)) {
		@chmod($dir, 0775);
	}
	if (file_exists($path) && !is_writable($path)) {
		@chmod($path, 0664);
	}

	$payload = json_encode($locations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	if ($payload === false) {
		return false;
	}

	$tempPath = $path . '.tmp';
	$written = file_put_contents($tempPath, $payload, LOCK_EX);
	if ($written === false) {
		return false;
	}

	if (!@rename($tempPath, $path)) {
		$written = file_put_contents($path, $payload, LOCK_EX);
		@unlink($tempPath);
		return $written !== false;
	}

	return true;
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
		'fecha' => date('c'),
	];
}
