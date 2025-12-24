<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/locations.php';

	 $locations = gesclub_load_locations();
	 $comunas = $locations['comunas'] ?? [];
	 $regiones = $locations['regiones'] ?? [];
	 $usuarioActual = gesclub_current_username();
	 $message = $_GET['msg'] ?? '';
	 $messageType = $_GET['msg_type'] ?? 'success';
	 $regionesById = [];
	 foreach ($regiones as $region) {
	 	if (isset($region['id'])) {
	 		$regionesById[$region['id']] = $region;
	 	}
	 }

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = $_POST['action'] ?? '';
	 	$id = (int)($_POST['id'] ?? 0);

	 	if ($action === 'save') {
	 		$regionId = (int)($_POST['region_id'] ?? 0);
	 		$nombre = trim($_POST['nombre'] ?? '');
	 		$estado = $_POST['estado'] ?? 'activo';
	 		if ($id > 0) {
	 			foreach ($comunas as &$comuna) {
	 				if ((int)($comuna['id'] ?? 0) === $id) {
	 					$comuna['region_id'] = $regionId;
	 					$comuna['nombre'] = $nombre;
	 					$comuna['estado'] = $estado;
	 					$message = 'Comuna actualizada con exito.';
	 					$nombreRegion = $regionesById[$regionId]['nombre'] ?? '';
	 					gesclub_add_location_history($locations, 'comuna', 'actualizar', "Comuna {$nombre} ({$nombreRegion})", $usuarioActual);
	 					break;
	 				}
	 			}
	 			unset($comuna);
	 		} else {
	 			$comunas[] = [
	 				'id' => gesclub_next_location_id($comunas),
	 				'region_id' => $regionId,
	 				'nombre' => $nombre,
	 				'estado' => $estado,
	 			];
	 			$message = 'Comuna guardada con exito.';
	 			$nombreRegion = $regionesById[$regionId]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'comuna', 'crear', "Comuna {$nombre} ({$nombreRegion})", $usuarioActual);
	 		}
	 	} elseif ($action === 'toggle' && $id > 0) {
	 		foreach ($comunas as &$comuna) {
	 			if ((int)($comuna['id'] ?? 0) === $id) {
	 				$comuna['estado'] = ($comuna['estado'] ?? 'activo') === 'activo' ? 'deshabilitado' : 'activo';
	 				$message = $comuna['estado'] === 'activo' ? 'Comuna habilitada con exito.' : 'Comuna deshabilitada con exito.';
	 				$accion = $comuna['estado'] === 'activo' ? 'habilitar' : 'deshabilitar';
	 				$nombreRegion = $regionesById[$comuna['region_id'] ?? 0]['nombre'] ?? '';
	 				gesclub_add_location_history($locations, 'comuna', $accion, "Comuna {$comuna['nombre']} ({$nombreRegion})", $usuarioActual);
	 				break;
	 			}
	 		}
	 		unset($comuna);
	 	} elseif ($action === 'delete' && $id > 0) {
	 		$eliminado = gesclub_find_location($comunas, $id);
	 		$comunas = array_values(array_filter($comunas, fn($comuna) => (int)($comuna['id'] ?? 0) !== $id));
	 		$message = 'Comuna borrada con exito.';
	 		if ($eliminado) {
	 			$nombreRegion = $regionesById[$eliminado['region_id'] ?? 0]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'comuna', 'borrar', "Comuna {$eliminado['nombre']} ({$nombreRegion})", $usuarioActual);
	 		}
	 	}

	 	$locations['comunas'] = $comunas;
	 	$saved = gesclub_save_locations($locations);
	 	if (!$saved) {
	 		$message = 'No se pudo guardar la informacion.';
	 		$messageType = 'error';
	 	}
	 	header('Location: ubicacion-comuna.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
	 	exit;
	 }

	 $locations = gesclub_load_locations();
	 $comunas = $locations['comunas'] ?? [];
	 $regiones = $locations['regiones'] ?? [];
	 $regionesById = [];
	 foreach ($regiones as $region) {
	 	if (isset($region['id'])) {
	 		$regionesById[$region['id']] = $region;
	 	}
	 }
	 $editId = (int)($_GET['edit'] ?? 0);
	 $editComuna = $editId > 0 ? gesclub_find_location($comunas, $editId) : null;
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
						<h3 class="mb-1 font-w600 main-text">Comuna</h3>
						<p>Formulario y registros precargados de Chile.</p>
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
								<h5 class="mb-3">Nueva Comuna</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editComuna['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" name="nombre" class="form-control" placeholder="Providencia" value="<?php echo htmlspecialchars($editComuna['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Region</label>
										<select class="form-control" name="region_id">
											<?php foreach ($regiones as $region) { ?>
												<option value="<?php echo (int)($region['id'] ?? 0); ?>" <?php echo ((int)($editComuna['region_id'] ?? 0) === (int)($region['id'] ?? 0)) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($region['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoActual = $editComuna['estado'] ?? 'activo'; ?>
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
								<h5 class="mb-3">Comunas registradas</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Comuna</th>
												<th>Region</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($comunas as $comuna) { ?>
												<?php $region = $regionesById[$comuna['region_id'] ?? null] ?? null; ?>
												<tr>
													<td><?php echo htmlspecialchars($comuna['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($region['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($comuna['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="ubicacion-comuna.php?edit=<?php echo (int)($comuna['id'] ?? 0); ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)($comuna['id'] ?? 0); ?>">
																<button type="submit" class="btn btn-sm <?php echo ($comuna['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($comuna['estado'] ?? 'activo') === 'activo' ? 'Deshabilitar' : 'Habilitar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)($comuna['id'] ?? 0); ?>">
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
