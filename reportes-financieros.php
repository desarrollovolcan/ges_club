<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';
	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();
	$clubes = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];
	$selectedClubId = (int)($_GET['club_id'] ?? 0);
	$fechaInicio = $_GET['fecha_inicio'] ?? '';
	$fechaFin = $_GET['fecha_fin'] ?? '';

	$stats = [
		'cobros' => 0,
		'pagos' => 0,
		'morosidad' => 0,
	];

	if ($selectedClubId > 0) {
		$params = [':club_id' => $selectedClubId];
		$fechaFiltro = '';
		if ($fechaInicio !== '' && $fechaFin !== '') {
			$fechaFiltro = ' AND fecha_emision BETWEEN :inicio AND :fin';
			$params[':inicio'] = $fechaInicio;
			$params[':fin'] = $fechaFin;
		}
		$stmt = $db->prepare('SELECT SUM(monto) FROM cobros WHERE club_id = :club_id' . $fechaFiltro);
		$stmt->execute($params);
		$stats['cobros'] = (float)$stmt->fetchColumn();

		$stmt = $db->prepare('SELECT SUM(p.monto) FROM pagos p JOIN cobros c ON c.id = p.cobro_id WHERE c.club_id = :club_id' . ($fechaFiltro ? ' AND c.fecha_emision BETWEEN :inicio AND :fin' : ''));
		$stmt->execute($params);
		$stats['pagos'] = (float)$stmt->fetchColumn();

		$stmt = $db->prepare('SELECT SUM(monto) FROM cobros WHERE club_id = :club_id AND estado = "vencido"' . $fechaFiltro);
		$stmt->execute($params);
		$stats['morosidad'] = (float)$stmt->fetchColumn();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reportes financieros | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include 'elements/meta.php';?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon'] ?>">
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
				<div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
					<div>
						<h3 class="mb-1 font-w600 main-text">Reportes financieros</h3>
						<p class="mb-0 text-muted">Control de ingresos, pagos y morosidad.</p>
					</div>
				</div>

				<div class="card mb-4">
					<div class="card-body">
						<form method="get" class="row g-3">
							<div class="col-lg-4">
								<label class="form-label">Club</label>
								<select class="form-control" name="club_id">
									<option value="">Selecciona</option>
									<?php foreach ($clubes as $club) { ?>
										<option value="<?php echo (int)$club['id']; ?>" <?php echo $selectedClubId === (int)$club['id'] ? 'selected' : ''; ?>>
											<?php echo htmlspecialchars($club['nombre_oficial'], ENT_QUOTES, 'UTF-8'); ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-3">
								<label class="form-label">Fecha inicio</label>
								<input type="date" class="form-control" name="fecha_inicio" value="<?php echo htmlspecialchars($fechaInicio, ENT_QUOTES, 'UTF-8'); ?>">
							</div>
							<div class="col-lg-3">
								<label class="form-label">Fecha término</label>
								<input type="date" class="form-control" name="fecha_fin" value="<?php echo htmlspecialchars($fechaFin, ENT_QUOTES, 'UTF-8'); ?>">
							</div>
							<div class="col-lg-2 d-flex align-items-end">
								<button type="submit" class="btn btn-primary w-100">Filtrar</button>
							</div>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Cobros emitidos</h6>
								<h3 class="mb-0"><?php echo number_format($stats['cobros'], 0, ',', '.'); ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Pagos recibidos</h6>
								<h3 class="mb-0"><?php echo number_format($stats['pagos'], 0, ',', '.'); ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Morosidad</h6>
								<h3 class="mb-0"><?php echo number_format($stats['morosidad'], 0, ',', '.'); ?></h3>
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
