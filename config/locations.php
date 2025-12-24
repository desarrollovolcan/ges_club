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

function gesclub_save_locations(array $locations): void
{
	file_put_contents(gesclub_locations_path(), json_encode($locations, JSON_PRETTY_PRINT));
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

function gesclub_add_location_history(array &$locations, string $tipo, string $accion, string $detalle): void
{
	if (!isset($locations['historial']) || !is_array($locations['historial'])) {
		$locations['historial'] = [];
	}

	$locations['historial'][] = [
		'tipo' => $tipo,
		'accion' => $accion,
		'detalle' => $detalle,
		'fecha' => date('c'),
	];
}
