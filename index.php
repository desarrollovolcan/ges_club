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
						<h3 class="mb-1 font-w600 main-text">Panel general</h3>
						<p class="mb-0 text-muted">Hola <?php echo htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8'); ?>, este es el resumen del club.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Clubes activos</h6>
								<h3 class="mb-0"><?php echo $clubesTotal; ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Deportistas</h6>
								<h3 class="mb-0"><?php echo $deportistasTotal; ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Entrenadores</h6>
								<h3 class="mb-0"><?php echo $entrenadoresTotal; ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Morosidad</h6>
								<h3 class="mb-0"><?php echo number_format($morosidadTotal, 0, ',', '.'); ?></h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
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
