<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();
	$usuarioActual = gesclub_current_username();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$catalogos = $db->query('SELECT * FROM configuracion_catalogos ORDER BY id DESC')->fetchAll() ?: [];

	$editId = (int)($_GET['edit'] ?? 0);
	$editItem = null;
	if ($editId > 0) {
		$stmt = $db->prepare('SELECT * FROM configuracion_catalogos WHERE id = :id');
		$stmt->execute([':id' => $editId]);
		$editItem = $stmt->fetch();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		if ($action === 'save') {
			$id = (int)($_POST['id'] ?? 0);
			$tipo = trim($_POST['tipo'] ?? '');
			$nombre = trim($_POST['nombre'] ?? '');
			$estado = $_POST['estado'] ?? 'activo';

			if ($tipo === '' || $nombre === '') {
				$message = 'Completa los campos obligatorios.';
				$messageType = 'error';
			} else {
				if ($id > 0) {
					$stmt = $db->prepare('UPDATE configuracion_catalogos SET tipo = :tipo, nombre = :nombre, estado = :estado WHERE id = :id');
					$stmt->execute([
						':id' => $id,
						':tipo' => $tipo,
						':nombre' => $nombre,
						':estado' => $estado,
					]);
					$message = 'Configuración actualizada.';
				} else {
					$stmt = $db->prepare('INSERT INTO configuracion_catalogos (tipo, nombre, estado) VALUES (:tipo, :nombre, :estado)');
					$stmt->execute([
						':tipo' => $tipo,
						':nombre' => $nombre,
						':estado' => $estado,
					]);
					$message = 'Configuración registrada.';
				}
			}
		} elseif ($action === 'toggle') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT estado FROM configuracion_catalogos WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$item = $stmt->fetch();
				if ($item) {
					$nuevoEstado = ($item['estado'] ?? 'activo') === 'activo' ? 'inactivo' : 'activo';
					$update = $db->prepare('UPDATE configuracion_catalogos SET estado = :estado WHERE id = :id');
					$update->execute([':estado' => $nuevoEstado, ':id' => $id]);
					$message = 'Estado actualizado.';
				}
			}
		} elseif ($action === 'delete') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$delete = $db->prepare('DELETE FROM configuracion_catalogos WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Elemento eliminado.';
			}
		}

		header('Location: configuracion-club.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
		exit;
	}
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
						<h3 class="mb-1 font-w600 main-text">Configuración del club</h3>
						<p>Disciplinas, categorías, sedes y temporadas.</p>
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
								<h5 class="mb-3">Nuevo ítem</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editItem['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Tipo</label>
										<select class="form-control" name="tipo" required>
											<?php $tipoItem = $editItem['tipo'] ?? ''; ?>
											<option value="">Selecciona</option>
											<option value="disciplina" <?php echo $tipoItem === 'disciplina' ? 'selected' : ''; ?>>Disciplina</option>
											<option value="categoria" <?php echo $tipoItem === 'categoria' ? 'selected' : ''; ?>>Categoría</option>
											<option value="sede" <?php echo $tipoItem === 'sede' ? 'selected' : ''; ?>>Sede</option>
											<option value="temporada" <?php echo $tipoItem === 'temporada' ? 'selected' : ''; ?>>Temporada</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($editItem['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoItem = $editItem['estado'] ?? 'activo'; ?>
											<option value="activo" <?php echo $estadoItem === 'activo' ? 'selected' : ''; ?>>Activo</option>
											<option value="inactivo" <?php echo $estadoItem === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
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
								<h5 class="mb-3">Listado de configuración</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Tipo</th>
												<th>Nombre</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($catalogos as $item) { ?>
												<tr>
													<td><?php echo htmlspecialchars($item['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($item['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($item['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="configuracion-club.php?edit=<?php echo (int)$item['id']; ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)$item['id']; ?>">
																<button type="submit" class="btn btn-sm <?php echo ($item['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($item['estado'] ?? 'activo') === 'activo' ? 'Desactivar' : 'Activar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)$item['id']; ?>">
																<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
