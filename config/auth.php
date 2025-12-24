<?php

require_once __DIR__ . '/db.php';

function gesclub_default_users(): array
{
	return [
		[
			'username' => 'Admin_super',
			'password_hash' => password_hash('Gesclub2026', PASSWORD_DEFAULT),
			'status' => 'approved',
			'role' => 'super_root',
			'created_at' => date('Y-m-d H:i:s'),
		],
	];
}

function gesclub_load_users(): array
{
	$db = gesclub_db();
	$stmt = $db->query('SELECT username, password_hash, status, role, created_at FROM users ORDER BY id');
	$users = $stmt->fetchAll();

	if ($users === [] || $users === false) {
		$defaults = gesclub_default_users();
		$insert = $db->prepare('INSERT INTO users (username, password_hash, status, role, created_at) VALUES (:username, :password_hash, :status, :role, :created_at)');
		foreach ($defaults as $user) {
			$insert->execute([
				':username' => $user['username'],
				':password_hash' => $user['password_hash'],
				':status' => $user['status'],
				':role' => $user['role'],
				':created_at' => $user['created_at'],
			]);
		}
		return $defaults;
	}

	return $users;
}

function gesclub_save_users(array $users): void
{
	$db = gesclub_db();
	$upsert = $db->prepare(
		'INSERT INTO users (username, password_hash, status, role, created_at) VALUES (:username, :password_hash, :status, :role, :created_at)
		ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash), status = VALUES(status), role = VALUES(role), created_at = VALUES(created_at)'
	);

	foreach ($users as $user) {
		$username = trim((string)($user['username'] ?? ''));
		if ($username === '') {
			continue;
		}
		$params = [
			':username' => $username,
			':password_hash' => (string)($user['password_hash'] ?? ''),
			':status' => (string)($user['status'] ?? 'pending'),
			':role' => (string)($user['role'] ?? 'user'),
			':created_at' => (string)($user['created_at'] ?? date('Y-m-d H:i:s')),
		];
		$upsert->execute($params);
	}
}

function gesclub_find_user(string $username): ?array
{
	$db = gesclub_db();
	$stmt = $db->prepare('SELECT username, password_hash, status, role, created_at FROM users WHERE LOWER(username) = LOWER(:username) LIMIT 1');
	$stmt->execute([':username' => trim($username)]);
	$user = $stmt->fetch();
	if (!$user) {
		return null;
	}

	return $user;
}

function gesclub_register_user(string $username, string $password): array
{
	$username = trim($username);
	if ($username === '' || $password === '') {
		return ['ok' => false, 'message' => 'Completa usuario y contraseña.'];
	}

	if (gesclub_find_user($username)) {
		return ['ok' => false, 'message' => 'El usuario ya existe.'];
	}

	$db = gesclub_db();
	$stmt = $db->prepare('INSERT INTO users (username, password_hash, status, role, created_at) VALUES (:username, :password_hash, :status, :role, :created_at)');
	$stmt->execute([
		':username' => $username,
		':password_hash' => password_hash($password, PASSWORD_DEFAULT),
		':status' => 'pending',
		':role' => 'user',
		':created_at' => date('Y-m-d H:i:s'),
	]);

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
