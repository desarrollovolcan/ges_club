<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/locations.php';

	 $locations = gesclub_load_locations();
	 $paises = $locations['paises'] ?? [];
	 $historial = $locations['historial'] ?? [];
	 $message = $_GET['msg'] ?? '';

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = $_POST['action'] ?? '';
	 	$id = (int)($_POST['id'] ?? 0);

	 	if ($action === 'save') {
	 		$codigo = trim($_POST['codigo'] ?? '');
	 		$nombre = trim($_POST['nombre'] ?? '');
	 		$estado = $_POST['estado'] ?? 'activo';
	 		if ($id > 0) {
	 			foreach ($paises as &$pais) {
	 				if ((int)($pais['id'] ?? 0) === $id) {
	 					$pais['codigo'] = $codigo;
	 					$pais['nombre'] = $nombre;
	 					$pais['estado'] = $estado;
	 					$message = 'Pais actualizado con exito.';
	 					gesclub_add_location_history($locations, 'pais', 'actualizar', "Pais {$codigo} - {$nombre}");
	 					break;
	 				}
	 			}
	 			unset($pais);
	 		} else {
	 			$paises[] = [
	 				'id' => gesclub_next_location_id($paises),
	 				'codigo' => $codigo,
	 				'nombre' => $nombre,
	 				'estado' => $estado,
	 			];
	 			$message = 'Pais guardado con exito.';
	 			gesclub_add_location_history($locations, 'pais', 'crear', "Pais {$codigo} - {$nombre}");
	 		}
	 	} elseif ($action === 'toggle' && $id > 0) {
	 		foreach ($paises as &$pais) {
	 			if ((int)($pais['id'] ?? 0) === $id) {
	 				$pais['estado'] = ($pais['estado'] ?? 'activo') === 'activo' ? 'deshabilitado' : 'activo';
	 				$message = $pais['estado'] === 'activo' ? 'Pais habilitado con exito.' : 'Pais deshabilitado con exito.';
	 				$accion = $pais['estado'] === 'activo' ? 'habilitar' : 'deshabilitar';
	 				gesclub_add_location_history($locations, 'pais', $accion, "Pais {$pais['codigo']} - {$pais['nombre']}");
	 				break;
	 			}
	 		}
	 		unset($pais);
	 	} elseif ($action === 'delete' && $id > 0) {
	 		$eliminado = gesclub_find_location($paises, $id);
	 		$paises = array_values(array_filter($paises, fn($pais) => (int)($pais['id'] ?? 0) !== $id));
	 		$message = 'Pais borrado con exito.';
	 		if ($eliminado) {
	 			gesclub_add_location_history($locations, 'pais', 'borrar', "Pais {$eliminado['codigo']} - {$eliminado['nombre']}");
	 		}
	 	}

	 	$locations['paises'] = $paises;
	 	gesclub_save_locations($locations);
	 	header('Location: ubicacion-pais.php?msg=' . urlencode($message));
	 	exit;
	 }

	 $locations = gesclub_load_locations();
	 $paises = $locations['paises'] ?? [];
	 $historial = $locations['historial'] ?? [];
	 $editId = (int)($_GET['edit'] ?? 0);
	 $editPais = $editId > 0 ? gesclub_find_location($paises, $editId) : null;
	 $historialPais = array_values(array_filter($historial, fn($item) => ($item['tipo'] ?? '') === 'pais'));
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
						<h3 class="mb-1 font-w600 main-text">Pais</h3>
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
								<h5 class="mb-3">Nuevo Pais</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editPais['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Codigo</label>
										<input type="text" name="codigo" class="form-control" placeholder="CL" value="<?php echo htmlspecialchars($editPais['codigo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" name="nombre" class="form-control" placeholder="Chile" value="<?php echo htmlspecialchars($editPais['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control" name="estado">
											<?php $estadoActual = $editPais['estado'] ?? 'activo'; ?>
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
								<h5 class="mb-3">Paises registrados</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Codigo</th>
												<th>Nombre</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($paises as $pais) { ?>
												<tr>
													<td><?php echo htmlspecialchars($pais['codigo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($pais['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($pais['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="ubicacion-pais.php?edit=<?php echo (int)($pais['id'] ?? 0); ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)($pais['id'] ?? 0); ?>">
																<button type="submit" class="btn btn-sm <?php echo ($pais['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($pais['estado'] ?? 'activo') === 'activo' ? 'Deshabilitar' : 'Habilitar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)($pais['id'] ?? 0); ?>">
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
									<?php foreach ($historialPais as $item) { ?>
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
