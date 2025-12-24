<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_roles(['Admin Club', 'Coordinador Deportivo']);
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
						<h3 class="mb-1 font-w600 main-text">Importación masiva (CSV)</h3>
						<p>Plantillas para deportistas, entrenadores y colaboradores.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Deportistas</h5>
								<p class="text-muted">Incluye RUN, datos deportivos, salud y apoderado.</p>
								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<input type="file" class="form-control" name="csv_deportistas" accept=".csv">
									</div>
									<button type="button" class="btn btn-primary">Cargar CSV</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Entrenadores</h5>
								<p class="text-muted">Disciplina, categorías asignadas y certificaciones.</p>
								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<input type="file" class="form-control" name="csv_entrenadores" accept=".csv">
									</div>
									<button type="button" class="btn btn-primary">Cargar CSV</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Colaboradores</h5>
								<p class="text-muted">Tipo, función, jornada y permisos.</p>
								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<input type="file" class="form-control" name="csv_colaboradores" accept=".csv">
									</div>
									<button type="button" class="btn btn-primary">Cargar CSV</button>
								</form>
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
