<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/locations.php';

	 $locations = gesclub_load_locations();
	 $regiones = $locations['regiones'] ?? [];
	 $paises = $locations['paises'] ?? [];
	 $historial = $locations['historial'] ?? [];
	 $message = '';
	 $paisesById = [];
	 foreach ($paises as $pais) {
	 	if (isset($pais['id'])) {
	 		$paisesById[$pais['id']] = $pais;
	 	}
	 }

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = $_POST['action'] ?? '';
	 	$id = (int)($_POST['id'] ?? 0);

	 	if ($action === 'save') {
	 		$paisId = (int)($_POST['pais_id'] ?? 0);
	 		$codigo = trim($_POST['codigo'] ?? '');
	 		$nombre = trim($_POST['nombre'] ?? '');
	 		$estado = $_POST['estado'] ?? 'activo';
	 		if ($id > 0) {
	 			foreach ($regiones as &$region) {
	 				if ((int)($region['id'] ?? 0) === $id) {
	 					$region['pais_id'] = $paisId;
	 					$region['codigo'] = $codigo;
	 					$region['nombre'] = $nombre;
	 					$region['estado'] = $estado;
	 					$message = 'Region actualizada.';
	 					$nombrePais = $paisesById[$paisId]['nombre'] ?? '';
	 					gesclub_add_location_history($locations, 'region', 'actualizar', "Region {$codigo} - {$nombre} ({$nombrePais})");
	 					break;
	 				}
	 			}
	 			unset($region);
	 		} else {
	 			$regiones[] = [
	 				'id' => gesclub_next_location_id($regiones),
	 				'pais_id' => $paisId,
	 				'codigo' => $codigo,
	 				'nombre' => $nombre,
	 				'estado' => $estado,
	 			];
	 			$message = 'Region creada.';
	 			$nombrePais = $paisesById[$paisId]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'region', 'crear', "Region {$codigo} - {$nombre} ({$nombrePais})");
	 		}
	 	} elseif ($action === 'toggle' && $id > 0) {
	 		foreach ($regiones as &$region) {
	 			if ((int)($region['id'] ?? 0) === $id) {
	 				$region['estado'] = ($region['estado'] ?? 'activo') === 'activo' ? 'deshabilitado' : 'activo';
	 				$message = 'Estado actualizado.';
	 				$accion = $region['estado'] === 'activo' ? 'habilitar' : 'deshabilitar';
	 				$nombrePais = $paisesById[$region['pais_id'] ?? 0]['nombre'] ?? '';
	 				gesclub_add_location_history($locations, 'region', $accion, "Region {$region['codigo']} - {$region['nombre']} ({$nombrePais})");
	 				break;
	 			}
	 		}
	 		unset($region);
	 	} elseif ($action === 'delete' && $id > 0) {
	 		$eliminado = gesclub_find_location($regiones, $id);
	 		$regiones = array_values(array_filter($regiones, fn($region) => (int)($region['id'] ?? 0) !== $id));
	 		$message = 'Region eliminada.';
	 		if ($eliminado) {
	 			$nombrePais = $paisesById[$eliminado['pais_id'] ?? 0]['nombre'] ?? '';
	 			gesclub_add_location_history($locations, 'region', 'borrar', "Region {$eliminado['codigo']} - {$eliminado['nombre']} ({$nombrePais})");
	 		}
	 	}

	 	$locations['regiones'] = $regiones;
	 	gesclub_save_locations($locations);
	 }

	 $editId = (int)($_GET['edit'] ?? 0);
	 $editRegion = $editId > 0 ? gesclub_find_location($regiones, $editId) : null;
	 $historialRegion = array_values(array_filter($historial, fn($item) => ($item['tipo'] ?? '') === 'region'));
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
						<h3 class="mb-1 font-w600 main-text">Region</h3>
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
								<h5 class="mb-3">Nueva Region</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editRegion['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Pais</label>
										<select class="form-control" name="pais_id">
											<?php foreach ($paises as $pais) { ?>
												<option value="<?php echo (int)($pais['id'] ?? 0); ?>" <?php echo ((int)($editRegion['pais_id'] ?? 0) === (int)($pais['id'] ?? 0)) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($pais['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Codigo</label>
										<input type="text" name="codigo" class="form-control" placeholder="RM" value="<?php echo htmlspecialchars($editRegion['codigo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" name="nombre" class="form-control" placeholder="Región Metropolitana de Santiago" value="<?php echo htmlspecialchars($editRegion['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoActual = $editRegion['estado'] ?? 'activo'; ?>
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
								<h5 class="mb-3">Regiones registradas</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Pais</th>
												<th>Codigo</th>
												<th>Nombre</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($regiones as $region) { ?>
												<?php $pais = $paisesById[$region['pais_id'] ?? null] ?? null; ?>
												<tr>
													<td><?php echo htmlspecialchars($pais['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($region['codigo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($region['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($region['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="ubicacion-region.php?edit=<?php echo (int)($region['id'] ?? 0); ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)($region['id'] ?? 0); ?>">
																<button type="submit" class="btn btn-sm <?php echo ($region['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($region['estado'] ?? 'activo') === 'activo' ? 'Deshabilitar' : 'Habilitar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)($region['id'] ?? 0); ?>">
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
										<th>Detalle</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialRegion as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
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
