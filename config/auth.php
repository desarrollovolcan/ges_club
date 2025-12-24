<?php

function gesclub_super_root_path(): string
{
	return __DIR__ . '/../data/super_root.json';
}

function gesclub_load_super_root(): array
{
	$path = gesclub_super_root_path();
	if (!file_exists($path)) {
		$default = [
			'username' => 'Admin_super',
			'password_hash' => password_hash('Gesclub2026', PASSWORD_DEFAULT),
		];
		file_put_contents($path, json_encode($default, JSON_PRETTY_PRINT));
		return $default;
	}

	$contents = file_get_contents($path);
	$data = json_decode($contents, true);
	if (!is_array($data)) {
		return [
			'username' => 'Admin_super',
			'password_hash' => password_hash('Gesclub2026', PASSWORD_DEFAULT),
		];
	}

	return $data;
}

function gesclub_verify_super_root_password(string $password): bool
{
	$record = gesclub_load_super_root();
	if (empty($record['password_hash'])) {
		return false;
	}

	return password_verify($password, $record['password_hash']);
}

function gesclub_is_authenticated(): bool
{
	return !empty($_SESSION['super_root_authenticated']);
}

function gesclub_require_login(): void
{
	if (!gesclub_is_authenticated()) {
		header('Location: page-login.php');
		exit;
	}
}
