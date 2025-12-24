<?php
	require_once __DIR__ . '/../config/dz.php';
	$pageTitle = $pageTitle ?? 'Gestión';
	$pageDescription = $pageDescription ?? 'Administra la operación del club.';
	$pageHighlights = $pageHighlights ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?> | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include __DIR__ . '/../elements/meta.php';?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include __DIR__ . '/../elements/page-css.php'; ?>
</head>

<body>
	<?php include __DIR__ . '/../elements/preloader.php'; ?>
	<div id="main-wrapper">
		<?php include __DIR__ . '/../elements/nav-header.php'; ?>
		<?php include __DIR__ . '/../elements/chatbox.php'; ?>
		<?php include __DIR__ . '/../elements/header.php'; ?>
		<?php include __DIR__ . '/../elements/sidebar.php'; ?>

		<div class="content-body">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
					<div>
						<h3 class="mb-1 font-w600 main-text"><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
						<p class="mb-0 text-muted"><?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-8">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Resumen operativo</h5>
								<p class="text-muted mb-0">
									Este módulo concentra la gestión diaria del club, con foco en trazabilidad, control y cumplimiento normativo.
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-3">Estado de implementación</h6>
								<ul class="list-unstyled mb-0">
									<li class="d-flex align-items-center justify-content-between mb-2">
										<span>Flujos base</span>
										<span class="badge badge-success">Listo</span>
									</li>
									<li class="d-flex align-items-center justify-content-between mb-2">
										<span>Integraciones</span>
										<span class="badge badge-warning">En curso</span>
									</li>
									<li class="d-flex align-items-center justify-content-between">
										<span>Reportes avanzados</span>
										<span class="badge badge-light">Planificado</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<?php foreach ($pageHighlights as $highlight) { ?>
						<div class="col-xl-4 col-lg-6">
							<div class="card">
								<div class="card-body">
									<h6 class="mb-2"><?php echo htmlspecialchars($highlight['title'], ENT_QUOTES, 'UTF-8'); ?></h6>
									<p class="text-muted mb-0"><?php echo htmlspecialchars($highlight['description'], ENT_QUOTES, 'UTF-8'); ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php include __DIR__ . '/../elements/footer.php'; ?>
	</div>
	<?php include __DIR__ . '/../elements/page-js.php'; ?>
</body>
</html>
