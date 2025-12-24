<?php

function gesclub_db_config(): array
{
	return [
		'host' => getenv('GESCLUB_DB_HOST') ?: '127.0.0.1',
		'port' => getenv('GESCLUB_DB_PORT') ?: '3306',
		'name' => getenv('GESCLUB_DB_NAME') ?: 'ges_club',
		'user' => getenv('GESCLUB_DB_USER') ?: 'ges_club',
		'pass' => getenv('GESCLUB_DB_PASS') ?: 'ges_club',
	];
}

function gesclub_db(): PDO
{
	static $pdo = null;
	if ($pdo instanceof PDO) {
		return $pdo;
	}

	$config = gesclub_db_config();
	$dsn = sprintf(
		'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
		$config['host'],
		$config['port'],
		$config['name']
	);

	$pdo = new PDO($dsn, $config['user'], $config['pass'], [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);

	return $pdo;
}
