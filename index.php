<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/auth.php';

	gesclub_require_login();

	$db = gesclub_db();
	$usuario = gesclub_current_username();

	$clubesTotal = (int)($db->query('SELECT COUNT(*) FROM clubes')->fetchColumn() ?: 0);
	$deportistasTotal = (int)($db->query('SELECT COUNT(*) FROM deportistas')->fetchColumn() ?: 0);
	$entrenadoresTotal = (int)($db->query('SELECT COUNT(*) FROM entrenadores')->fetchColumn() ?: 0);
	$morosidadTotal = (float)($db->query("SELECT COALESCE(SUM(monto),0) FROM cobros WHERE estado = 'vencido'")->fetchColumn() ?: 0);
	$cobrosPendientes = (int)($db->query("SELECT COUNT(*) FROM cobros WHERE estado = 'pendiente'")->fetchColumn() ?: 0);
	$cobrosPagados = (int)($db->query("SELECT COUNT(*) FROM cobros WHERE estado = 'pagado'")->fetchColumn() ?: 0);
	$pagosRecientes = $db->query("SELECT fecha_pago, monto FROM pagos ORDER BY fecha_pago DESC LIMIT 5")->fetchAll() ?: [];
	$deportistasPorClub = $clubesTotal > 0 ? round($deportistasTotal / $clubesTotal, 1) : 0;
	$entrenadoresPorClub = $clubesTotal > 0 ? round($entrenadoresTotal / $clubesTotal, 1) : 0;

	function gesclub_format_money($value)
	{
		return number_format((float)$value, 0, ',', '.');
	}

	$months = [];
	$labels = [];
	for ($i = 5; $i >= 0; $i--) {
		$date = new DateTime("first day of -{$i} months");
		$key = $date->format('Y-m');
		$months[$key] = ['cobros' => 0, 'pagos' => 0];
		$labels[] = $date->format('M Y');
	}

	$cobrosRows = $db->query("SELECT DATE_FORMAT(fecha_emision, '%Y-%m') AS periodo, SUM(monto) AS total FROM cobros GROUP BY periodo")->fetchAll() ?: [];
	foreach ($cobrosRows as $row) {
		$periodo = $row['periodo'];
		if (isset($months[$periodo])) {
			$months[$periodo]['cobros'] = (float)$row['total'];
		}
	}

	$pagosRows = $db->query("SELECT DATE_FORMAT(fecha_pago, '%Y-%m') AS periodo, SUM(monto) AS total FROM pagos GROUP BY periodo")->fetchAll() ?: [];
	foreach ($pagosRows as $row) {
		$periodo = $row['periodo'];
		if (isset($months[$periodo])) {
			$months[$periodo]['pagos'] = (float)$row['total'];
		}
	}

	$chartCobros = array_values(array_column($months, 'cobros'));
	$chartPagos = array_values(array_column($months, 'pagos'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dashboard | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include 'elements/meta.php';?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include 'elements/page-css.php'; ?>
	<style>
		.dashboard-hero {
			background: linear-gradient(120deg, #0f172a 0%, #1e293b 40%, #1d4ed8 100%);
			border-radius: 24px;
			padding: 32px;
			color: #f8fafc;
			box-shadow: 0 20px 40px rgba(15, 23, 42, 0.18);
			position: relative;
			overflow: hidden;
		}

		.dashboard-hero::after {
			content: '';
			position: absolute;
			right: -80px;
			top: -80px;
			width: 220px;
			height: 220px;
			background: radial-gradient(circle, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0));
			opacity: 0.7;
		}

		.dashboard-hero p {
			opacity: 0.85;
		}

		.dashboard-metric {
			background: #fff;
			border-radius: 18px;
			padding: 20px;
			border: 1px solid rgba(148, 163, 184, 0.3);
			box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
			height: 100%;
		}

		.dashboard-metric h6 {
			color: #475569;
			font-weight: 600;
		}

		.dashboard-metric .metric-value {
			font-size: 28px;
			font-weight: 700;
			color: #0f172a;
		}

		.badge-soft {
			background: rgba(59, 130, 246, 0.12);
			color: #2563eb;
			border-radius: 999px;
			padding: 4px 12px;
			font-weight: 600;
			font-size: 12px;
		}

		.quick-action {
			background: #fff;
			border-radius: 16px;
			padding: 18px;
			border: 1px solid rgba(148, 163, 184, 0.25);
			transition: transform 0.2s ease, box-shadow 0.2s ease;
			height: 100%;
		}

		.quick-action:hover {
			transform: translateY(-4px);
			box-shadow: 0 16px 32px rgba(15, 23, 42, 0.12);
		}

		.quick-action .btn {
			padding: 6px 14px;
		}

		.soft-panel {
			background: #f8fafc;
			border-radius: 18px;
			padding: 20px;
			border: 1px solid rgba(226, 232, 240, 0.8);
		}

		.list-clean li {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 10px 0;
			border-bottom: 1px dashed rgba(148, 163, 184, 0.3);
		}

		.list-clean li:last-child {
			border-bottom: none;
		}

		.progress-ring {
			height: 6px;
			border-radius: 999px;
			background: rgba(148, 163, 184, 0.3);
		}

		.progress-ring span {
			display: block;
			height: 100%;
			border-radius: 999px;
		}
	</style>
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
				<div class="dashboard-hero mb-4">
					<div class="row align-items-center">
						<div class="col-lg-8">
							<span class="badge-soft">Plataforma integral de clubes</span>
							<h2 class="mt-3 mb-2">Hola <?php echo htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8'); ?> 👋</h2>
							<p class="mb-4">Centraliza la gestión deportiva: controla membresías, pagos, entrenamientos y reportes en un solo lugar.</p>
							<div class="d-flex flex-wrap gap-2">
								<a class="btn btn-light" href="registrar-club.php">Crear nuevo club</a>
								<a class="btn btn-outline-light" href="registrar-deportistas.php">Registrar deportista</a>
								<a class="btn btn-outline-light" href="finanzas-cobros.php">Gestionar cobros</a>
							</div>
						</div>
						<div class="col-lg-4 mt-4 mt-lg-0">
							<div class="soft-panel text-dark">
								<h6 class="mb-2">Estado operativo</h6>
								<p class="text-muted mb-3">Indicadores clave por club.</p>
								<div class="mb-3">
									<div class="d-flex justify-content-between mb-1">
										<span>Deportistas por club</span>
										<strong><?php echo $deportistasPorClub; ?></strong>
									</div>
									<div class="progress-ring"><span style="width: <?php echo min(100, $deportistasPorClub * 10); ?>%; background: #2563eb;"></span></div>
								</div>
								<div>
									<div class="d-flex justify-content-between mb-1">
										<span>Entrenadores por club</span>
										<strong><?php echo $entrenadoresPorClub; ?></strong>
									</div>
									<div class="progress-ring"><span style="width: <?php echo min(100, $entrenadoresPorClub * 20); ?>%; background: #10b981;"></span></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="dashboard-metric">
							<h6 class="mb-2">Clubes activos</h6>
							<div class="metric-value"><?php echo $clubesTotal; ?></div>
							<p class="text-muted mb-0">Clubes registrados en plataforma.</p>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="dashboard-metric">
							<h6 class="mb-2">Deportistas activos</h6>
							<div class="metric-value"><?php echo $deportistasTotal; ?></div>
							<p class="text-muted mb-0">Base total de atletas activos.</p>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="dashboard-metric">
							<h6 class="mb-2">Entrenadores</h6>
							<div class="metric-value"><?php echo $entrenadoresTotal; ?></div>
							<p class="text-muted mb-0">Equipo técnico disponible.</p>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="dashboard-metric">
							<h6 class="mb-2">Morosidad</h6>
							<div class="metric-value">$<?php echo gesclub_format_money($morosidadTotal); ?></div>
							<p class="text-muted mb-0">Cobros vencidos acumulados.</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-7">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-3">
									<div>
										<h5 class="mb-1">Acciones rápidas</h5>
										<p class="text-muted mb-0">Flujos clave para el día a día.</p>
									</div>
									<span class="badge-soft">Operación diaria</span>
								</div>
								<div class="row g-3">
									<div class="col-md-6">
										<div class="quick-action">
											<h6>Inscribir deportista</h6>
											<p class="text-muted mb-3">Añade nuevos atletas y asigna disciplina.</p>
											<a class="btn btn-primary btn-sm" href="registrar-deportistas.php">Abrir</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="quick-action">
											<h6>Programar entrenamiento</h6>
											<p class="text-muted mb-3">Gestiona sesiones y asistencia.</p>
											<a class="btn btn-primary btn-sm" href="entrenamientos-planificacion.php">Abrir</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="quick-action">
											<h6>Emitir cobro</h6>
											<p class="text-muted mb-3">Crea cobros por cuotas y eventos.</p>
											<a class="btn btn-primary btn-sm" href="finanzas-cobros.php">Abrir</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="quick-action">
											<h6>Reportes ejecutivos</h6>
											<p class="text-muted mb-3">Visualiza desempeño deportivo y financiero.</p>
											<a class="btn btn-primary btn-sm" href="reportes.php">Abrir</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-5">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Cobros en curso</h5>
								<div class="soft-panel">
									<div class="d-flex justify-content-between align-items-center mb-3">
										<div>
											<p class="mb-1 text-muted">Pendientes</p>
											<h4 class="mb-0"><?php echo $cobrosPendientes; ?></h4>
										</div>
										<div>
											<p class="mb-1 text-muted">Pagados</p>
											<h4 class="mb-0"><?php echo $cobrosPagados; ?></h4>
										</div>
									</div>
									<p class="text-muted mb-2">Morosidad acumulada</p>
									<h3 class="mb-0">$<?php echo gesclub_format_money($morosidadTotal); ?></h3>
								</div>
								<div class="mt-3">
									<a class="btn btn-outline-primary btn-sm" href="finanzas-cobros.php">Ver detalle financiero</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Cobros vs pagos (últimos 6 meses)</h5>
								<canvas id="finanzasChart" height="120"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Distribución base</h5>
								<canvas id="baseChart" height="180"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-6">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Pagos recientes</h5>
								<ul class="list-clean mb-0">
									<?php if (count($pagosRecientes) === 0) : ?>
										<li>
											<span class="text-muted">No hay pagos registrados.</span>
											<span class="text-muted">—</span>
										</li>
									<?php else : ?>
										<?php foreach ($pagosRecientes as $pago) : ?>
											<li>
												<span><?php echo htmlspecialchars($pago['fecha_pago'], ENT_QUOTES, 'UTF-8'); ?></span>
												<strong>$<?php echo gesclub_format_money($pago['monto']); ?></strong>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Resumen operativo</h5>
								<div class="soft-panel">
									<div class="d-flex justify-content-between align-items-center mb-3">
										<div>
											<p class="mb-1 text-muted">Promedio deportistas/club</p>
											<h4 class="mb-0"><?php echo $deportistasPorClub; ?></h4>
										</div>
										<div>
											<p class="mb-1 text-muted">Promedio entrenadores/club</p>
											<h4 class="mb-0"><?php echo $entrenadoresPorClub; ?></h4>
										</div>
									</div>
									<p class="text-muted mb-2">Accesos rápidos a comunicaciones</p>
									<div class="d-flex flex-wrap gap-2">
										<a class="btn btn-outline-secondary btn-sm" href="comunicaciones-anuncios.php">Anuncios</a>
										<a class="btn btn-outline-secondary btn-sm" href="comunicaciones-notificaciones.php">Notificaciones</a>
										<a class="btn btn-outline-secondary btn-sm" href="comunicaciones-mensajes.php">Mensajes</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'elements/footer.php'; ?>
	</div>
	<script src="assets/vendor/chart-js/chart.bundle.min.js"></script>
	<script>
		const chartLabels = <?php echo json_encode($labels); ?>;
		const chartCobros = <?php echo json_encode($chartCobros); ?>;
		const chartPagos = <?php echo json_encode($chartPagos); ?>;

		const ctx = document.getElementById('finanzasChart');
		if (ctx) {
			new Chart(ctx, {
				type: 'line',
				data: {
					labels: chartLabels,
					datasets: [
						{
							label: 'Cobros',
							data: chartCobros,
							borderColor: '#ff6d4d',
							backgroundColor: 'rgba(255,109,77,0.1)',
							fill: true,
							tension: 0.3
						},
						{
							label: 'Pagos',
							data: chartPagos,
							borderColor: '#2bc155',
							backgroundColor: 'rgba(43,193,85,0.1)',
							fill: true,
							tension: 0.3
						}
					]
				},
				options: {
					plugins: { legend: { position: 'bottom' } },
					scales: { y: { beginAtZero: true } }
				}
			});
		}

		const ctxBase = document.getElementById('baseChart');
		if (ctxBase) {
			new Chart(ctxBase, {
				type: 'doughnut',
				data: {
					labels: ['Clubes', 'Deportistas', 'Entrenadores'],
					datasets: [{
						data: [<?php echo $clubesTotal; ?>, <?php echo $deportistasTotal; ?>, <?php echo $entrenadoresTotal; ?>],
						backgroundColor: ['#1eaae7', '#ffb72b', '#2bc155']
					}]
				},
				options: { plugins: { legend: { position: 'bottom' } } }
			});
		}
	</script>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
