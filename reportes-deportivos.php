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
		'deportistas' => 0,
		'entrenamientos' => 0,
		'competencias' => 0,
	];

	if ($selectedClubId > 0) {
		$stmt = $db->prepare('SELECT COUNT(*) FROM deportistas WHERE club_id = :club_id');
		$stmt->execute([':club_id' => $selectedClubId]);
		$stats['deportistas'] = (int)$stmt->fetchColumn();

		$fechaFiltro = '';
		$params = [':club_id' => $selectedClubId];
		if ($fechaInicio !== '' && $fechaFin !== '') {
			$fechaFiltro = ' AND fecha_inicio >= :inicio AND fecha_fin <= :fin';
			$params[':inicio'] = $fechaInicio;
			$params[':fin'] = $fechaFin;
		}

		$stmt = $db->prepare('SELECT COUNT(*) FROM entrenamientos WHERE club_id = :club_id' . $fechaFiltro);
		$stmt->execute($params);
		$stats['entrenamientos'] = (int)$stmt->fetchColumn();

		$stmt = $db->prepare('SELECT COUNT(*) FROM competencias WHERE club_id = :club_id' . $fechaFiltro);
		$stmt->execute($params);
		$stats['competencias'] = (int)$stmt->fetchColumn();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reportes deportivos | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
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
						<h3 class="mb-1 font-w600 main-text">Reportes deportivos</h3>
						<p class="mb-0 text-muted">Indicadores de rendimiento y participación deportiva.</p>
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
								<h6 class="mb-2">Deportistas activos</h6>
								<h3 class="mb-0"><?php echo $stats['deportistas']; ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Entrenamientos</h6>
								<h3 class="mb-0"><?php echo $stats['entrenamientos']; ?></h3>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card">
							<div class="card-body">
								<h6 class="mb-2">Competencias</h6>
								<h3 class="mb-0"><?php echo $stats['competencias']; ?></h3>
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
