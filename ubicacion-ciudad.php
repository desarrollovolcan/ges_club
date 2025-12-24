<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/locations.php';

	 $locations = gesclub_load_locations();
	 $ciudades = $locations['ciudades'] ?? [];
	 $comunas = $locations['comunas'] ?? [];
	 $historial = $locations['historial'] ?? [];
	 $usuarioActual = gesclub_current_username();
	 $message = $_GET['msg'] ?? '';
	 $comunasById = [];
	 foreach ($comunas as $comuna) {
	 	if (isset($comuna['id'])) {
	 		$comunasById[$comuna['id']] = $comuna;
	 	}
	 }

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = $_POST['action'] ?? '';
	 	$id = (int)($_POST['id'] ?? 0);

	 	if ($action === 'save') {
	 		$comunaId = (int)($_POST['comuna_id'] ?? 0);
	 		$nombre = trim($_POST['nombre'] ?? '');
	 		$estado = $_POST['estado'] ?? 'activo';
	 		if ($id > 0) {
	 			foreach ($ciudades as &$ciudad) {
	 				if ((int)($ciudad['id'] ?? 0) === $id) {
	 					$ciudad['comuna_id'] = $comunaId;
	 					$ciudad['nombre'] = $nombre;
	 					$ciudad['estado'] = $estado;
	 					$message = 'Ciudad actualizada con exito.';
	 					$nombreComuna = $comunasById[$comunaId]['nombre'] ?? '';
	 					gesclub_add_location_history($locations, 'ciudad', 'actualizar', "Ciudad {$nombre} ({$nombreComuna})", $usuarioActual);
	 					break;
	 				}
	 			}
	 			unset($ciudad);
	 		} else {
	 			$ciudades[] = [
	 				'id' => gesclub_next_location_id($ciudades),
	 				'comuna_id' => $comunaId,
	 				'nombre' => $nombre,
	 				'estado' => $estado,
	 			];
	 			$message = 'Ciudad guardada con exito.';
	 			$nombreComuna = $comunasById[$comunaId]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'ciudad', 'crear', "Ciudad {$nombre} ({$nombreComuna})", $usuarioActual);
	 		}
	 	} elseif ($action === 'toggle' && $id > 0) {
	 		foreach ($ciudades as &$ciudad) {
	 			if ((int)($ciudad['id'] ?? 0) === $id) {
	 				$ciudad['estado'] = ($ciudad['estado'] ?? 'activo') === 'activo' ? 'deshabilitado' : 'activo';
	 				$message = $ciudad['estado'] === 'activo' ? 'Ciudad habilitada con exito.' : 'Ciudad deshabilitada con exito.';
	 				$accion = $ciudad['estado'] === 'activo' ? 'habilitar' : 'deshabilitar';
	 				$nombreComuna = $comunasById[$ciudad['comuna_id'] ?? 0]['nombre'] ?? '';
	 				gesclub_add_location_history($locations, 'ciudad', $accion, "Ciudad {$ciudad['nombre']} ({$nombreComuna})", $usuarioActual);
	 				break;
	 			}
	 		}
	 		unset($ciudad);
	 	} elseif ($action === 'delete' && $id > 0) {
	 		$eliminado = gesclub_find_location($ciudades, $id);
	 		$ciudades = array_values(array_filter($ciudades, fn($ciudad) => (int)($ciudad['id'] ?? 0) !== $id));
	 		$message = 'Ciudad borrada con exito.';
	 		if ($eliminado) {
	 			$nombreComuna = $comunasById[$eliminado['comuna_id'] ?? 0]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'ciudad', 'borrar', "Ciudad {$eliminado['nombre']} ({$nombreComuna})", $usuarioActual);
	 		}
	 	}

	 	$locations['ciudades'] = $ciudades;
	 	gesclub_save_locations($locations);
	 	header('Location: ubicacion-ciudad.php?msg=' . urlencode($message));
	 	exit;
	 }

	 $locations = gesclub_load_locations();
	 $ciudades = $locations['ciudades'] ?? [];
	 $comunas = $locations['comunas'] ?? [];
	 $historial = $locations['historial'] ?? [];
	 $comunasById = [];
	 foreach ($comunas as $comuna) {
	 	if (isset($comuna['id'])) {
	 		$comunasById[$comuna['id']] = $comuna;
	 	}
	 }
	 $editId = (int)($_GET['edit'] ?? 0);
	 $editCiudad = $editId > 0 ? gesclub_find_location($ciudades, $editId) : null;
	 $historialCiudad = array_values(array_filter($historial, fn($item) => ($item['tipo'] ?? '') === 'ciudad'));
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
						<h3 class="mb-1 font-w600 main-text">Ciudad</h3>
						<p>Formulario y registros precargados de Chile.</p>
					</div>
				</div>
				<?php if (!empty($message)) { ?>
					<div class="alert alert-success" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Nueva Ciudad</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editCiudad['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" name="nombre" class="form-control" placeholder="Santiago" value="<?php echo htmlspecialchars($editCiudad['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Comuna</label>
										<select class="form-control" name="comuna_id">
											<?php foreach ($comunas as $comuna) { ?>
												<option value="<?php echo (int)($comuna['id'] ?? 0); ?>" <?php echo ((int)($editCiudad['comuna_id'] ?? 0) === (int)($comuna['id'] ?? 0)) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($comuna['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoActual = $editCiudad['estado'] ?? 'activo'; ?>
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
								<h5 class="mb-3">Ciudades registradas</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Ciudad</th>
												<th>Comuna</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($ciudades as $ciudad) { ?>
												<?php $comuna = $comunasById[$ciudad['comuna_id'] ?? null] ?? null; ?>
												<tr>
													<td><?php echo htmlspecialchars($ciudad['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($comuna['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($ciudad['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="ubicacion-ciudad.php?edit=<?php echo (int)($ciudad['id'] ?? 0); ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)($ciudad['id'] ?? 0); ?>">
																<button type="submit" class="btn btn-sm <?php echo ($ciudad['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($ciudad['estado'] ?? 'activo') === 'activo' ? 'Deshabilitar' : 'Habilitar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)($ciudad['id'] ?? 0); ?>">
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
				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Historial de cambios</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Accion</th>
										<th>Usuario</th>
										<th>Detalle</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialCiudad as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
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
