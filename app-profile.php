<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/auth.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_login();

	$db = gesclub_db();
	$userId = (int)($_SESSION['auth_user']['id'] ?? 0);
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$profile = $userId > 0 ? gesclub_load_user_profile($userId) : null;
	$roles = $profile['roles'] ?? [];

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $profile) {
		$payload = $_POST;
		$payload['id'] = $profile['id'];
		$payload['account_status'] = $profile['account_status'] ?? 'activo';

		if (!empty($_FILES['foto']['name'])) {
			$uploadDir = __DIR__ . '/uploads/usuarios';
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0775, true);
			}
			$basename = basename($_FILES['foto']['name']);
			$destino = $uploadDir . '/' . time() . '-' . $basename;
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
				$payload['foto'] = 'uploads/usuarios/' . basename($destino);
			} else {
				$payload['foto'] = $profile['foto'] ?? '';
			}
		} else {
			$payload['foto'] = $profile['foto'] ?? '';
		}

		$result = gesclub_save_user_profile($payload, $roles, gesclub_current_username(), $_SERVER['REMOTE_ADDR'] ?? null);
		if ($result['ok']) {
			$message = 'Perfil actualizado correctamente.';
			$messageType = 'success';
		} else {
			$message = $result['message'] ?? 'No se pudo actualizar el perfil.';
			$messageType = 'error';
		}
		header('Location: app-profile.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
		exit;
	}

	$fotoPerfil = $profile['foto'] ?? 'assets/images/profile/profile.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mi perfil | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include 'elements/meta.php';?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include 'elements/page-css.php'; ?>
</head>
<body>
	<?php include 'elements/preloader.php'; ?>
	<div id="main-wrapper">
		<?php include 'elements/nav-header.php'; ?>
		<?php include 'elements/chatbox.php'; ?>
		<?php include 'elements/header.php'; ?>
		<?php include 'elements/sidebar.php'; ?>

		<div class="content-body">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
					<div>
						<h3 class="mb-1 font-w600 main-text">Mi perfil</h3>
						<p class="mb-0 text-muted">Gestiona tu información personal y fotografía.</p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
					</div>
				<?php } ?>

				<?php if ($profile) { ?>
					<div class="row">
						<div class="col-xl-4">
							<div class="card mb-4">
								<div class="card-body text-center">
									<img src="<?php echo htmlspecialchars($fotoPerfil, ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid rounded-circle mb-3" width="120" alt="Perfil">
									<h5 class="mb-1"><?php echo htmlspecialchars($profile['nombres'] . ' ' . $profile['apellido_paterno'], ENT_QUOTES, 'UTF-8'); ?></h5>
									<p class="text-muted mb-0"><?php echo htmlspecialchars($profile['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="card mb-4">
								<div class="card-body">
									<h5 class="mb-3">Actualizar datos</h5>
									<form method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6 mb-3">
												<label class="form-label">Usuario</label>
												<input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($profile['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($profile['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-4 mb-3">
												<label class="form-label">RUN</label>
												<input type="text" class="form-control" name="run_numero" value="<?php echo htmlspecialchars($profile['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-2 mb-3">
												<label class="form-label">DV</label>
												<input type="text" class="form-control" name="run_dv" value="<?php echo htmlspecialchars($profile['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Fecha nacimiento</label>
												<input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo htmlspecialchars($profile['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Nombres</label>
												<input type="text" class="form-control" name="nombres" value="<?php echo htmlspecialchars($profile['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Apellido paterno</label>
												<input type="text" class="form-control" name="apellido_paterno" value="<?php echo htmlspecialchars($profile['apellido_paterno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Apellido materno</label>
												<input type="text" class="form-control" name="apellido_materno" value="<?php echo htmlspecialchars($profile['apellido_materno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Sexo</label>
												<input type="text" class="form-control" name="sexo" value="<?php echo htmlspecialchars($profile['sexo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Teléfono móvil</label>
												<input type="text" class="form-control" name="telefono_movil" value="<?php echo htmlspecialchars($profile['telefono_movil'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Dirección</label>
												<input type="text" class="form-control" name="direccion_calle" value="<?php echo htmlspecialchars($profile['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Número</label>
												<input type="text" class="form-control" name="direccion_numero" value="<?php echo htmlspecialchars($profile['direccion_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Comuna</label>
												<input type="text" class="form-control" name="comuna" value="<?php echo htmlspecialchars($profile['comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Región</label>
												<input type="text" class="form-control" name="region" value="<?php echo htmlspecialchars($profile['region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Consentimiento fecha</label>
												<input type="datetime-local" class="form-control" name="consentimiento_fecha" value="<?php echo htmlspecialchars($profile['consentimiento_fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Consentimiento medio</label>
												<input type="text" class="form-control" name="consentimiento_medio" value="<?php echo htmlspecialchars($profile['consentimiento_medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Nacionalidad</label>
												<input type="text" class="form-control" name="nacionalidad" value="<?php echo htmlspecialchars($profile['nacionalidad'] ?? 'Chilena', ENT_QUOTES, 'UTF-8'); ?>">
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Foto de perfil</label>
												<input type="file" class="form-control" name="foto">
											</div>
											<div class="col-lg-6 mb-3">
												<label class="form-label">Contraseña nueva</label>
												<input type="password" class="form-control" name="password" placeholder="Opcional">
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Guardar cambios</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php include 'elements/footer.php'; ?>
	</div>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
