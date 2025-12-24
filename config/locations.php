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
		];
	}

	return $data;
}
