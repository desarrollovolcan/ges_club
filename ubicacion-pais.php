<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/locations.php';

	 $locations = gesclub_load_locations();
	 $paises = $locations['paises'] ?? [];
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

				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Nuevo Pais</h5>
								<form>
									<div class="mb-3">
										<label class="form-label">Codigo</label>
										<input type="text" class="form-control" placeholder="CL">
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre</label>
										<input type="text" class="form-control" placeholder="Chile">
									</div>
									<div class="mb-3">
										<label class="form-label">Estado</label>
										<select class="form-control">
											<option>activo</option>
											<option>deshabilitado</option>
										</select>
									</div>
									<button type="button" class="btn btn-primary">Guardar</button>
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
															<button type="button" class="btn btn-warning btn-sm">Editar</button>
															<button type="button" class="btn btn-secondary btn-sm">Deshabilitar</button>
															<button type="button" class="btn btn-danger btn-sm">Borrar</button>
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
