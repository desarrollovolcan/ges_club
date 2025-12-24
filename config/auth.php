<?php

function gesclub_users_path(): string
{
	return __DIR__ . '/../data/users.json';
}

function gesclub_default_users(): array
{
	return [
		[
			'username' => 'Admin_super',
			'password_hash' => password_hash('Gesclub2026', PASSWORD_DEFAULT),
			'status' => 'approved',
			'role' => 'super_root',
			'created_at' => date('c'),
		],
	];
}

function gesclub_load_users(): array
{
	$path = gesclub_users_path();
	if (!file_exists($path)) {
		$default = gesclub_default_users();
		file_put_contents($path, json_encode($default, JSON_PRETTY_PRINT));
		return $default;
	}

	$contents = file_get_contents($path);
	$data = json_decode($contents, true);
	if (!is_array($data)) {
		$data = gesclub_default_users();
		file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
	}

	return $data;
}

function gesclub_save_users(array $users): void
{
	file_put_contents(gesclub_users_path(), json_encode($users, JSON_PRETTY_PRINT));
}

function gesclub_find_user(string $username): ?array
{
	$needle = mb_strtolower(trim($username));
	foreach (gesclub_load_users() as $user) {
		if (!empty($user['username']) && mb_strtolower($user['username']) === $needle) {
			return $user;
		}
	}

	return null;
}

function gesclub_register_user(string $username, string $password): array
{
	$username = trim($username);
	if ($username === '' || $password === '') {
		return ['ok' => false, 'message' => 'Completa usuario y contraseña.'];
	}

	$users = gesclub_load_users();
	foreach ($users as $user) {
		if (!empty($user['username']) && mb_strtolower($user['username']) === mb_strtolower($username)) {
			return ['ok' => false, 'message' => 'El usuario ya existe.'];
		}
	}

	$users[] = [
		'username' => $username,
		'password_hash' => password_hash($password, PASSWORD_DEFAULT),
		'status' => 'pending',
		'role' => 'user',
		'created_at' => date('c'),
	];
	gesclub_save_users($users);

	return ['ok' => true, 'message' => 'Registro recibido. Tu cuenta queda pendiente de aprobación.'];
}

function gesclub_verify_credentials(string $username, string $password): array
{
	$user = gesclub_find_user($username);
	if (!$user) {
		return ['ok' => false, 'message' => 'Usuario o contraseña inválidos.'];
	}

	if (!password_verify($password, $user['password_hash'] ?? '')) {
		return ['ok' => false, 'message' => 'Usuario o contraseña inválidos.'];
	}

	if (($user['status'] ?? 'pending') !== 'approved') {
		return ['ok' => false, 'message' => 'Tu usuario está pendiente de aprobación.'];
	}

	return ['ok' => true, 'user' => $user];
}

function gesclub_is_authenticated(): bool
{
	return !empty($_SESSION['auth_user']);
}

function gesclub_current_username(): string
{
	if (!empty($_SESSION['auth_user']['username'])) {
		return (string)$_SESSION['auth_user']['username'];
	}

	return 'sistema';
}

function gesclub_is_admin(): bool
{
	return !empty($_SESSION['auth_user']['role']) && $_SESSION['auth_user']['role'] === 'super_root';
}

function gesclub_require_login(): void
{
	if (!gesclub_is_authenticated()) {
		header('Location: page-login.php');
		exit;
	}
}
