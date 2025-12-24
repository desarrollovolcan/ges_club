<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_permission('edit-profile');

	$db = gesclub_db();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';
	$rolesDisponibles = gesclub_load_user_roles();
	$editId = (int)($_GET['edit'] ?? 0);
	$editUser = $editId > 0 ? gesclub_load_user_profile($editId) : null;
	$isEditing = !empty($editUser);
	$formData = $editUser ?? [];
	$formErrors = [];
	if ($editId > 0 && !$editUser && $message === '') {
		$message = 'No se encontró el usuario solicitado.';
		$messageType = 'error';
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$payload = $_POST;
		$payload['id'] = (int)($_POST['id'] ?? 0);
		$payload['account_status'] = $_POST['account_status'] ?? 'activo';
		if ($payload['id'] > 0) {
			gesclub_require_permission('edit-profile', 'edit');
		} else {
			gesclub_require_permission('edit-profile', 'create');
		}

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
		} elseif ($payload['id'] > 0 && $editUser) {
			$payload['foto'] = $editUser['foto'] ?? null;
		}

		$roleIds = array_map('intval', $_POST['roles'] ?? []);
		$result = gesclub_save_user_profile($payload, $roleIds, gesclub_current_username(), $_SERVER['REMOTE_ADDR'] ?? null);

		if ($result['ok']) {
			$message = $payload['id'] > 0 ? 'Usuario actualizado correctamente.' : 'Usuario registrado correctamente.';
			$messageType = 'success';
			$redirectParams = [
				'msg' => $message,
				'msg_type' => $messageType,
			];
			if ($payload['id'] > 0) {
				$redirectParams['edit'] = (int)$payload['id'];
			}
			header('Location: edit-profile.php?' . http_build_query($redirectParams));
			exit;
		}

		$message = $result['message'] ?? 'No se pudo registrar.';
		$messageType = 'error';
		$formErrors = $result['errors'] ?? [];
		$formData = $payload;
		$formData['roles'] = $roleIds;
	}

	$consentimientoValue = '';
	if (!empty($formData['consentimiento_fecha'])) {
		$timestamp = strtotime((string)$formData['consentimiento_fecha']);
		if ($timestamp) {
			$consentimientoValue = date('Y-m-d\\TH:i', $timestamp);
		}
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
						<h3 class="mb-1 font-w600 main-text"><?php echo $isEditing ? 'Editar usuario' : 'Registro de usuarios'; ?></h3>
						<p class="mb-0 text-muted">
							<?php echo $isEditing ? 'Actualiza la información del usuario seleccionado.' : 'Crea cuentas para directiva, administración y equipo técnico.'; ?>
						</p>
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
							<input type="hidden" name="id" value="<?php echo (int)($formData['id'] ?? ($editUser['id'] ?? 0)); ?>">
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Usuario</label>
									<input type="text" class="form-control <?php echo isset($formErrors['username']) ? 'is-invalid' : ''; ?>" name="username" value="<?php echo htmlspecialchars($formData['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['username'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['username'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Email</label>
									<input type="email" class="form-control <?php echo isset($formErrors['email']) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo htmlspecialchars($formData['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['email'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['email'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Contraseña</label>
									<input type="password" class="form-control <?php echo isset($formErrors['password']) ? 'is-invalid' : ''; ?>" name="password" <?php echo $isEditing ? '' : 'required'; ?>>
									<?php if (isset($formErrors['password'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['password'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">RUN</label>
									<input type="text" class="form-control <?php echo isset($formErrors['run_numero']) ? 'is-invalid' : ''; ?>" name="run_numero" value="<?php echo htmlspecialchars($formData['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['run_numero'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['run_numero'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-1 mb-3">
									<label class="form-label">DV</label>
									<input type="text" class="form-control <?php echo isset($formErrors['run_dv']) ? 'is-invalid' : ''; ?>" name="run_dv" value="<?php echo htmlspecialchars($formData['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['run_dv'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['run_dv'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Nombres</label>
									<input type="text" class="form-control <?php echo isset($formErrors['nombres']) ? 'is-invalid' : ''; ?>" name="nombres" value="<?php echo htmlspecialchars($formData['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['nombres'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['nombres'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido paterno</label>
									<input type="text" class="form-control <?php echo isset($formErrors['apellido_paterno']) ? 'is-invalid' : ''; ?>" name="apellido_paterno" value="<?php echo htmlspecialchars($formData['apellido_paterno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['apellido_paterno'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['apellido_paterno'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido materno</label>
									<input type="text" class="form-control <?php echo isset($formErrors['apellido_materno']) ? 'is-invalid' : ''; ?>" name="apellido_materno" value="<?php echo htmlspecialchars($formData['apellido_materno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['apellido_materno'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['apellido_materno'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Fecha nacimiento</label>
									<input type="date" class="form-control <?php echo isset($formErrors['fecha_nacimiento']) ? 'is-invalid' : ''; ?>" name="fecha_nacimiento" value="<?php echo htmlspecialchars($formData['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['fecha_nacimiento'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['fecha_nacimiento'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Sexo</label>
									<input type="text" class="form-control <?php echo isset($formErrors['sexo']) ? 'is-invalid' : ''; ?>" name="sexo" value="<?php echo htmlspecialchars($formData['sexo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['sexo'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['sexo'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Teléfono móvil</label>
									<input type="text" class="form-control <?php echo isset($formErrors['telefono_movil']) ? 'is-invalid' : ''; ?>" name="telefono_movil" value="<?php echo htmlspecialchars($formData['telefono_movil'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['telefono_movil'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['telefono_movil'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Nacionalidad</label>
									<input type="text" class="form-control" name="nacionalidad" value="<?php echo htmlspecialchars($formData['nacionalidad'] ?? 'Chilena', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Dirección</label>
									<input type="text" class="form-control <?php echo isset($formErrors['direccion_calle']) ? 'is-invalid' : ''; ?>" name="direccion_calle" value="<?php echo htmlspecialchars($formData['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['direccion_calle'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['direccion_calle'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-2 mb-3">
									<label class="form-label">Número</label>
									<input type="text" class="form-control <?php echo isset($formErrors['direccion_numero']) ? 'is-invalid' : ''; ?>" name="direccion_numero" value="<?php echo htmlspecialchars($formData['direccion_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['direccion_numero'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['direccion_numero'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Comuna</label>
									<input type="text" class="form-control <?php echo isset($formErrors['comuna']) ? 'is-invalid' : ''; ?>" name="comuna" value="<?php echo htmlspecialchars($formData['comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['comuna'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['comuna'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Región</label>
									<input type="text" class="form-control <?php echo isset($formErrors['region']) ? 'is-invalid' : ''; ?>" name="region" value="<?php echo htmlspecialchars($formData['region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['region'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['region'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento fecha</label>
									<input type="datetime-local" class="form-control <?php echo isset($formErrors['consentimiento_fecha']) ? 'is-invalid' : ''; ?>" name="consentimiento_fecha" value="<?php echo htmlspecialchars($consentimientoValue, ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['consentimiento_fecha'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['consentimiento_fecha'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento medio</label>
									<input type="text" class="form-control <?php echo isset($formErrors['consentimiento_medio']) ? 'is-invalid' : ''; ?>" name="consentimiento_medio" value="<?php echo htmlspecialchars($formData['consentimiento_medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									<?php if (isset($formErrors['consentimiento_medio'])) { ?>
										<div class="invalid-feedback"><?php echo htmlspecialchars($formErrors['consentimiento_medio'], ENT_QUOTES, 'UTF-8'); ?></div>
									<?php } ?>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Foto de perfil</label>
									<input type="file" class="form-control" name="foto">
								</div>
								<div class="col-lg-6 mb-3">
									<label class="form-label">Estado de cuenta</label>
									<?php $accountStatus = $formData['account_status'] ?? 'activo'; ?>
									<select class="form-control" name="account_status">
										<option value="activo" <?php echo $accountStatus === 'activo' ? 'selected' : ''; ?>>Activo</option>
										<option value="inactivo" <?php echo $accountStatus === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
										<option value="bloqueado" <?php echo $accountStatus === 'bloqueado' ? 'selected' : ''; ?>>Bloqueado</option>
									</select>
								</div>
								<div class="col-lg-6 mb-3">
									<label class="form-label">Roles</label>
									<?php $selectedRoles = array_map('intval', $formData['roles'] ?? ($editUser['roles'] ?? [])); ?>
									<div class="row">
										<?php foreach ($rolesDisponibles as $rol) { ?>
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" name="roles[]" id="rol-<?php echo (int)$rol['id']; ?>" value="<?php echo (int)$rol['id']; ?>" <?php echo in_array((int)$rol['id'], $selectedRoles, true) ? 'checked' : ''; ?>>
													<label class="form-check-label" for="rol-<?php echo (int)$rol['id']; ?>">
														<?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?>
													</label>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary"><?php echo $isEditing ? 'Guardar cambios' : 'Crear usuario'; ?></button>
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
