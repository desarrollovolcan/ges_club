<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/auth.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_roles(['Admin General']);

	$db = gesclub_db();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';
	$rolesDisponibles = gesclub_load_user_roles();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$payload = $_POST;
		$payload['account_status'] = $_POST['account_status'] ?? 'activo';

		if (!empty($_FILES['foto']['name'])) {
			$uploadDir = __DIR__ . '/uploads/usuarios';
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0775, true);
			}
			$basename = basename($_FILES['foto']['name']);
			$destino = $uploadDir . '/' . time() . '-' . $basename;
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
				$payload['foto'] = 'uploads/usuarios/' . basename($destino);
			}
		}

		$roleIds = array_map('intval', $_POST['roles'] ?? []);
		$result = gesclub_save_user_profile($payload, $roleIds, gesclub_current_username(), $_SERVER['REMOTE_ADDR'] ?? null);

		if ($result['ok']) {
			$message = 'Usuario registrado correctamente.';
			$messageType = 'success';
		} else {
			$message = $result['message'] ?? 'No se pudo registrar.';
			$messageType = 'error';
		}

		header('Location: edit-profile.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registro de usuarios | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
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
						<h3 class="mb-1 font-w600 main-text">Registro de usuarios</h3>
						<p class="mb-0 text-muted">Crea cuentas para directiva, administración y equipo técnico.</p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
					</div>
				<?php } ?>

				<div class="card mb-4">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Usuario</label>
									<input type="text" class="form-control" name="username" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" name="email" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Contraseña</label>
									<input type="password" class="form-control" name="password" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">RUN</label>
									<input type="text" class="form-control" name="run_numero" required>
								</div>
								<div class="col-lg-1 mb-3">
									<label class="form-label">DV</label>
									<input type="text" class="form-control" name="run_dv" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Nombres</label>
									<input type="text" class="form-control" name="nombres" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido paterno</label>
									<input type="text" class="form-control" name="apellido_paterno" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido materno</label>
									<input type="text" class="form-control" name="apellido_materno" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Fecha nacimiento</label>
									<input type="date" class="form-control" name="fecha_nacimiento" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Sexo</label>
									<input type="text" class="form-control" name="sexo" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Teléfono móvil</label>
									<input type="text" class="form-control" name="telefono_movil" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Nacionalidad</label>
									<input type="text" class="form-control" name="nacionalidad" value="Chilena">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Dirección</label>
									<input type="text" class="form-control" name="direccion_calle" required>
								</div>
								<div class="col-lg-2 mb-3">
									<label class="form-label">Número</label>
									<input type="text" class="form-control" name="direccion_numero" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Comuna</label>
									<input type="text" class="form-control" name="comuna" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Región</label>
									<input type="text" class="form-control" name="region" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento fecha</label>
									<input type="datetime-local" class="form-control" name="consentimiento_fecha" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento medio</label>
									<input type="text" class="form-control" name="consentimiento_medio" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Foto de perfil</label>
									<input type="file" class="form-control" name="foto">
								</div>
								<div class="col-lg-6 mb-3">
									<label class="form-label">Estado de cuenta</label>
									<select class="form-control" name="account_status">
										<option value="activo">Activo</option>
										<option value="inactivo">Inactivo</option>
										<option value="bloqueado">Bloqueado</option>
									</select>
								</div>
								<div class="col-lg-6 mb-3">
									<label class="form-label">Roles</label>
									<select class="form-control" name="roles[]" multiple>
										<?php foreach ($rolesDisponibles as $rol) { ?>
											<option value="<?php echo (int)$rol['id']; ?>"><?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Crear usuario</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php include 'elements/footer.php'; ?>
	</div>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
