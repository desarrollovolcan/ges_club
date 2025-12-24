<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/users.php';

function gesclub_require_roles(array $roles): void
{
	if (!gesclub_is_authenticated()) {
		header('Location: page-login.php');
		exit;
	}

	if (!empty($_SESSION['auth_user']['role']) && $_SESSION['auth_user']['role'] === 'super_root') {
		return;
	}

	$userId = (int)($_SESSION['auth_user']['id'] ?? 0);
	foreach ($roles as $role) {
		if (gesclub_user_has_role($userId, $role)) {
			return;
		}
	}

	header('Location: page-error-403.php');
	exit;
}
