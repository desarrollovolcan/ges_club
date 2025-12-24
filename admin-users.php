<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/users.php';

	 if (!gesclub_is_admin()) {
	 	header('Location: index.php');
	 	exit;
	 }

	 $actionMessage = '';
	 $actionType = 'success';
	 $roles = gesclub_load_user_roles();
	 $usuarioActual = gesclub_current_username();
	 $ipActual = $_SERVER['REMOTE_ADDR'] ?? null;

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = trim($_POST['action'] ?? '');
	 	$userId = (int)($_POST['id'] ?? 0);

	 	if ($action === 'save') {
	 		$payload = [
	 			'id' => $userId,
	 			'username' => $_POST['username'] ?? '',
	 			'email' => $_POST['email'] ?? '',
	 			'password' => $_POST['password'] ?? '',
	 			'account_status' => $_POST['account_status'] ?? 'activo',
	 			'run_numero' => $_POST['run_numero'] ?? '',
	 			'run_dv' => $_POST['run_dv'] ?? '',
	 			'nombres' => $_POST['nombres'] ?? '',
	 			'apellido_paterno' => $_POST['apellido_paterno'] ?? '',
	 			'apellido_materno' => $_POST['apellido_materno'] ?? '',
	 			'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? '',
	 			'sexo' => $_POST['sexo'] ?? '',
	 			'nacionalidad' => $_POST['nacionalidad'] ?? 'Chilena',
	 			'telefono_movil' => $_POST['telefono_movil'] ?? '',
	 			'telefono_fijo' => $_POST['telefono_fijo'] ?? null,
	 			'direccion_calle' => $_POST['direccion_calle'] ?? '',
	 			'direccion_numero' => $_POST['direccion_numero'] ?? '',
	 			'comuna' => $_POST['comuna'] ?? '',
	 			'region' => $_POST['region'] ?? '',
	 			'numero_socio' => $_POST['numero_socio'] ?? null,
	 			'tipo_socio' => $_POST['tipo_socio'] ?? null,
	 			'disciplinas' => $_POST['disciplinas'] ?? null,
	 			'categoria_rama' => $_POST['categoria_rama'] ?? null,
	 			'fecha_incorporacion' => $_POST['fecha_incorporacion'] ?? null,
	 			'consentimiento_fecha' => $_POST['consentimiento_fecha'] ?? '',
	 			'consentimiento_medio' => $_POST['consentimiento_medio'] ?? '',
	 			'usuario_creador' => $_POST['usuario_creador'] ?? $usuarioActual,
	 			'estado_civil' => $_POST['estado_civil'] ?? null,
	 			'prevision_salud' => $_POST['prevision_salud'] ?? null,
	 			'contacto_emergencia_nombre' => $_POST['contacto_emergencia_nombre'] ?? null,
	 			'contacto_emergencia_telefono' => $_POST['contacto_emergencia_telefono'] ?? null,
	 			'contacto_emergencia_parentesco' => $_POST['contacto_emergencia_parentesco'] ?? null,
	 			'menor_run' => $_POST['menor_run'] ?? null,
	 			'apoderado_run' => $_POST['apoderado_run'] ?? null,
	 			'relacion_apoderado' => $_POST['relacion_apoderado'] ?? null,
	 			'autorizacion_apoderado' => $_POST['autorizacion_apoderado'] ?? null,
	 			'history_action' => $userId > 0 ? 'actualizar' : 'crear',
	 			'history_detail' => $userId > 0 ? 'Actualización desde panel' : 'Creación desde panel',
	 		];
	 		$roleIds = array_map('intval', $_POST['roles'] ?? []);
	 		$result = gesclub_save_user_profile($payload, $roleIds, $usuarioActual, $ipActual);
	 		if (!empty($result['ok'])) {
	 			$actionMessage = $userId > 0 ? 'Usuario actualizado.' : 'Usuario creado.';
	 		} else {
	 			$actionMessage = $result['message'] ?? 'No se pudo guardar la información.';
	 			$actionType = 'error';
	 		}
	 	} elseif ($action === 'delete' && $userId > 0) {
	 		if (gesclub_delete_user($userId, $usuarioActual)) {
	 			$actionMessage = 'Usuario eliminado.';
	 		} else {
	 			$actionMessage = 'No se pudo eliminar el usuario.';
	 			$actionType = 'error';
	 		}
	 	}

	 	if ($actionMessage !== '') {
	 		header('Location: admin-users.php?msg=' . urlencode($actionMessage) . '&msg_type=' . urlencode($actionType));
	 		exit;
	 	}
	 }

	 $users = gesclub_load_user_profiles();
	 $message = $_GET['msg'] ?? '';
	 $messageType = $_GET['msg_type'] ?? 'success';
	 $editId = (int)($_GET['edit'] ?? 0);
	 $editUser = $editId > 0 ? gesclub_load_user_profile($editId) : null;
	 $consentimientoValue = '';
	 if (!empty($editUser['consentimiento_fecha'])) {
	 	$timestamp = strtotime((string)$editUser['consentimiento_fecha']);
	 	if ($timestamp) {
	 		$consentimientoValue = date('Y-m-d\\TH:i', $timestamp);
	 	}
	 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'].' | ' : '' ; echo $DexignZoneSettings['site_level']['site_title'] ?></title>

	<?php include 'elements/meta.php';?>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include 'elements/page-css.php'; ?>

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
	<?php include 'elements/preloader.php'; ?>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
			<?php include 'elements/nav-header.php'; ?>

        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<?php include 'elements/chatbox.php'; ?>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
       		<?php include 'elements/header.php'; ?>

                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include 'elements/sidebar.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between flex-wrap">
					<div>
						<h3 class="mb-1 font-w600 main-text">Administración Usuarios</h3>
						<p>Listado de usuarios registrados.</p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="card mb-4">
					<div class="card-body">
						<h5 class="mb-3">Formulario de usuarios</h5>
						<form method="post">
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="id" value="<?php echo (int)($editUser['id'] ?? 0); ?>">
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Usuario</label>
									<input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($editUser['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Correo electrónico</label>
									<input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($editUser['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Contraseña <?php echo !empty($editUser) ? '(dejar en blanco para mantener)' : ''; ?></label>
									<input type="password" name="password" class="form-control" <?php echo empty($editUser) ? 'required' : ''; ?>>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Estado</label>
									<?php $accountStatus = $editUser['account_status'] ?? 'activo'; ?>
									<select class="form-control" name="account_status">
										<option value="activo" <?php echo $accountStatus === 'activo' ? 'selected' : ''; ?>>Activo</option>
										<option value="inactivo" <?php echo $accountStatus === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
										<option value="bloqueado" <?php echo $accountStatus === 'bloqueado' ? 'selected' : ''; ?>>Bloqueado</option>
									</select>
								</div>
								<div class="col-lg-9 mb-3">
									<label class="form-label">Roles</label>
									<div class="d-flex flex-wrap gap-3">
										<?php $selectedRoles = $editUser['roles'] ?? []; ?>
										<?php foreach ($roles as $role) { ?>
											<label class="form-check-label">
												<input class="form-check-input me-1" type="checkbox" name="roles[]" value="<?php echo (int)$role['id']; ?>" <?php echo in_array((int)$role['id'], $selectedRoles, true) ? 'checked' : ''; ?>>
												<?php echo htmlspecialchars($role['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
											</label>
										<?php } ?>
									</div>
								</div>
							</div>

							<h6 class="mt-4">Datos obligatorios</h6>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">RUN (RUT)</label>
									<div class="input-group">
										<input type="text" name="run_numero" class="form-control" placeholder="12345678" value="<?php echo htmlspecialchars($editUser['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										<span class="input-group-text">-</span>
										<input type="text" name="run_dv" class="form-control" placeholder="9" value="<?php echo htmlspecialchars($editUser['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Nombres</label>
									<input type="text" name="nombres" class="form-control" value="<?php echo htmlspecialchars($editUser['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido paterno</label>
									<input type="text" name="apellido_paterno" class="form-control" value="<?php echo htmlspecialchars($editUser['apellido_paterno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Apellido materno</label>
									<input type="text" name="apellido_materno" class="form-control" value="<?php echo htmlspecialchars($editUser['apellido_materno'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Fecha de nacimiento</label>
									<input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo htmlspecialchars($editUser['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Sexo</label>
									<input type="text" name="sexo" class="form-control" value="<?php echo htmlspecialchars($editUser['sexo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Nacionalidad</label>
									<input type="text" name="nacionalidad" class="form-control" value="<?php echo htmlspecialchars($editUser['nacionalidad'] ?? 'Chilena', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
							</div>

							<h6 class="mt-3">Datos de contacto</h6>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Teléfono móvil</label>
									<input type="text" name="telefono_movil" class="form-control" value="<?php echo htmlspecialchars($editUser['telefono_movil'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Teléfono fijo</label>
									<input type="text" name="telefono_fijo" class="form-control" value="<?php echo htmlspecialchars($editUser['telefono_fijo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Calle</label>
									<input type="text" name="direccion_calle" class="form-control" value="<?php echo htmlspecialchars($editUser['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-2 mb-3">
									<label class="form-label">Número</label>
									<input type="text" name="direccion_numero" class="form-control" value="<?php echo htmlspecialchars($editUser['direccion_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Comuna</label>
									<input type="text" name="comuna" class="form-control" value="<?php echo htmlspecialchars($editUser['comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Región</label>
									<input type="text" name="region" class="form-control" value="<?php echo htmlspecialchars($editUser['region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
							</div>

							<h6 class="mt-3">Datos de club</h6>
							<div class="row">
								<div class="col-lg-3 mb-3">
									<label class="form-label">Número de socio</label>
									<input type="text" name="numero_socio" class="form-control" value="<?php echo htmlspecialchars($editUser['numero_socio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Tipo de socio</label>
									<select class="form-control" name="tipo_socio">
										<?php $tipoSocio = $editUser['tipo_socio'] ?? ''; ?>
										<option value="">Selecciona</option>
										<option value="activo" <?php echo $tipoSocio === 'activo' ? 'selected' : ''; ?>>Activo</option>
										<option value="cadete" <?php echo $tipoSocio === 'cadete' ? 'selected' : ''; ?>>Cadete</option>
										<option value="honorario" <?php echo $tipoSocio === 'honorario' ? 'selected' : ''; ?>>Honorario</option>
										<option value="apoderado" <?php echo $tipoSocio === 'apoderado' ? 'selected' : ''; ?>>Apoderado</option>
									</select>
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Disciplinas</label>
									<input type="text" name="disciplinas" class="form-control" value="<?php echo htmlspecialchars($editUser['disciplinas'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Categoría / Rama</label>
									<input type="text" name="categoria_rama" class="form-control" value="<?php echo htmlspecialchars($editUser['categoria_rama'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Fecha incorporación</label>
									<input type="date" name="fecha_incorporacion" class="form-control" value="<?php echo htmlspecialchars($editUser['fecha_incorporacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
							</div>

							<h6 class="mt-3">Datos legales</h6>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento fecha</label>
									<input type="datetime-local" name="consentimiento_fecha" class="form-control" value="<?php echo htmlspecialchars($consentimientoValue, ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Consentimiento medio</label>
									<input type="text" name="consentimiento_medio" class="form-control" value="<?php echo htmlspecialchars($editUser['consentimiento_medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Usuario creador</label>
									<input type="text" name="usuario_creador" class="form-control" value="<?php echo htmlspecialchars($editUser['usuario_creador'] ?? $usuarioActual, ENT_QUOTES, 'UTF-8'); ?>">
								</div>
							</div>

							<h6 class="mt-3">Datos opcionales</h6>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Estado civil</label>
									<input type="text" name="estado_civil" class="form-control" value="<?php echo htmlspecialchars($editUser['estado_civil'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Previsión de salud</label>
									<select class="form-control" name="prevision_salud">
										<?php $prevision = $editUser['prevision_salud'] ?? ''; ?>
										<option value="">Selecciona</option>
										<option value="Fonasa" <?php echo $prevision === 'Fonasa' ? 'selected' : ''; ?>>Fonasa</option>
										<option value="Isapre" <?php echo $prevision === 'Isapre' ? 'selected' : ''; ?>>Isapre</option>
									</select>
								</div>
							</div>

							<h6 class="mt-3">Contacto de emergencia</h6>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<label class="form-label">Nombre</label>
									<input type="text" name="contacto_emergencia_nombre" class="form-control" value="<?php echo htmlspecialchars($editUser['contacto_emergencia_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Teléfono</label>
									<input type="text" name="contacto_emergencia_telefono" class="form-control" value="<?php echo htmlspecialchars($editUser['contacto_emergencia_telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-4 mb-3">
									<label class="form-label">Parentesco</label>
									<input type="text" name="contacto_emergencia_parentesco" class="form-control" value="<?php echo htmlspecialchars($editUser['contacto_emergencia_parentesco'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
							</div>

							<h6 class="mt-3">Menores de edad</h6>
							<div class="row">
								<div class="col-lg-3 mb-3">
									<label class="form-label">RUN menor</label>
									<input type="text" name="menor_run" class="form-control" value="<?php echo htmlspecialchars($editUser['menor_run'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">RUN apoderado</label>
									<input type="text" name="apoderado_run" class="form-control" value="<?php echo htmlspecialchars($editUser['apoderado_run'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Relación</label>
									<input type="text" name="relacion_apoderado" class="form-control" value="<?php echo htmlspecialchars($editUser['relacion_apoderado'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
								<div class="col-lg-3 mb-3">
									<label class="form-label">Autorización firmada</label>
									<input type="text" name="autorizacion_apoderado" class="form-control" value="<?php echo htmlspecialchars($editUser['autorizacion_apoderado'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
								</div>
							</div>

							<button type="submit" class="btn btn-primary">Guardar</button>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Usuarios registrados</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>RUT</th>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Contacto</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) { ?>
										<tr>
											<td><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(($user['run_numero'] ?? '') . '-' . ($user['run_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(trim(($user['nombres'] ?? '') . ' ' . ($user['apellido_paterno'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['account_status'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['telefono_movil'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<div class="d-flex gap-2">
													<a class="btn btn-warning btn-sm" href="admin-users.php?edit=<?php echo (int)$user['id']; ?>">Editar</a>
													<form method="post">
														<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
														<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
													</form>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->

	</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
	
</body>
</html>
