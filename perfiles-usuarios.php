<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/user-roles.php';

	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$roles = gesclub_load_user_roles();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		$id = (int)($_POST['id'] ?? 0);

		if ($action === 'save') {
			$nombre = trim($_POST['nombre'] ?? '');
			$estado = $_POST['estado'] ?? 'activo';
			if ($id > 0) {
				foreach ($roles as &$role) {
					if ((int)($role['id'] ?? 0) === $id) {
						$role['nombre'] = $nombre;
						$role['estado'] = $estado;
						$message = 'Perfil actualizado con éxito.';
						break;
					}
				}
				unset($role);
			} else {
				$roles[] = [
					'id' => gesclub_next_user_role_id($roles),
					'nombre' => $nombre,
					'estado' => $estado,
				];
				$message = 'Perfil guardado con éxito.';
			}
		} elseif ($action === 'toggle' && $id > 0) {
			foreach ($roles as &$role) {
				if ((int)($role['id'] ?? 0) === $id) {
					$role['estado'] = ($role['estado'] ?? 'activo') === 'activo' ? 'deshabilitado' : 'activo';
					$message = $role['estado'] === 'activo' ? 'Perfil habilitado con éxito.' : 'Perfil deshabilitado con éxito.';
					break;
				}
			}
			unset($role);
		} elseif ($action === 'delete' && $id > 0) {
			$roles = array_values(array_filter($roles, fn($role) => (int)($role['id'] ?? 0) !== $id));
			$message = 'Perfil borrado con éxito.';
		}

		$saved = gesclub_save_user_roles($roles);
		if (!$saved) {
			$message = 'No se pudo guardar la información.';
			$messageType = 'error';
		}

		header('Location: perfiles-usuarios.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
		exit;
	}

	$roles = gesclub_load_user_roles();
	$editId = (int)($_GET['edit'] ?? 0);
	$editRole = $editId > 0 ? gesclub_find_user_role($roles, $editId) : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'].' | ' : '' ; echo $DexignZoneSettings['site_level']['site_title'] ?></title>
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
				<div class="d-flex align-items-center justify-content-between flex-wrap">
					<div>
						<h3 class="mb-1 font-w600 main-text">Perfiles de usuarios</h3>
						<p>Gestión de perfiles para el control de acceso.</p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Nuevo perfil</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editRole['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" name="nombre" class="form-control" placeholder="Administrador" value="<?php echo htmlspecialchars($editRole['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoActual = $editRole['estado'] ?? 'activo'; ?>
											<option value="activo" <?php echo $estadoActual === 'activo' ? 'selected' : ''; ?>>activo</option>
											<option value="deshabilitado" <?php echo $estadoActual === 'deshabilitado' ? 'selected' : ''; ?>>deshabilitado</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary">Guardar</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Perfiles registrados</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($roles as $role) { ?>
												<tr>
													<td><?php echo htmlspecialchars($role['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($role['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="perfiles-usuarios.php?edit=<?php echo (int)($role['id'] ?? 0); ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)($role['id'] ?? 0); ?>">
																<button type="submit" class="btn btn-sm <?php echo ($role['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($role['estado'] ?? 'activo') === 'activo' ? 'Deshabilitar' : 'Habilitar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)($role['id'] ?? 0); ?>">
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
			</div>
		</div>

		<?php include 'elements/footer.php'; ?>
	</div>

	<?php include 'elements/page-js.php'; ?>
</body>
</html>
