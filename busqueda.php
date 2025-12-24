<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/auth.php';

	gesclub_require_login();

	$db = gesclub_db();
	$query = trim($_GET['q'] ?? '');
	$results = ['clubes' => [], 'deportistas' => [], 'entrenadores' => []];

	if ($query !== '') {
		$like = '%' . $query . '%';

		$stmt = $db->prepare('SELECT id, nombre_oficial, direccion_comuna FROM clubes WHERE nombre_oficial LIKE :q OR nombre_fantasia LIKE :q ORDER BY nombre_oficial');
		$stmt->execute([':q' => $like]);
		$results['clubes'] = $stmt->fetchAll() ?: [];

		$stmt = $db->prepare('SELECT id, nombres, apellidos, email FROM deportistas WHERE nombres LIKE :q OR apellidos LIKE :q ORDER BY nombres');
		$stmt->execute([':q' => $like]);
		$results['deportistas'] = $stmt->fetchAll() ?: [];

		$stmt = $db->prepare('SELECT id, nombres, apellidos, email FROM entrenadores WHERE nombres LIKE :q OR apellidos LIKE :q ORDER BY nombres');
		$stmt->execute([':q' => $like]);
		$results['entrenadores'] = $stmt->fetchAll() ?: [];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Búsqueda | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
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
						<h3 class="mb-1 font-w600 main-text">Búsqueda global</h3>
						<p class="mb-0 text-muted">Resultados para "<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>"</p>
					</div>
				</div>

				<div class="card mb-4">
					<div class="card-body">
						<form method="get" class="input-group">
							<input type="text" class="form-control" name="q" value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Buscar club, deportista o entrenador">
							<button class="btn btn-primary" type="submit">Buscar</button>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-4">
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-3">Clubes</h5>
								<?php if ($results['clubes']) { ?>
									<ul class="list-unstyled mb-0">
										<?php foreach ($results['clubes'] as $club) { ?>
											<li class="mb-2">
												<strong><?php echo htmlspecialchars($club['nombre_oficial'], ENT_QUOTES, 'UTF-8'); ?></strong>
												<div class="text-muted small"><?php echo htmlspecialchars($club['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
											</li>
										<?php } ?>
									</ul>
								<?php } else { ?>
									<div class="text-muted">Sin resultados.</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-3">Deportistas</h5>
								<?php if ($results['deportistas']) { ?>
									<ul class="list-unstyled mb-0">
										<?php foreach ($results['deportistas'] as $dep) { ?>
											<li class="mb-2">
												<strong><?php echo htmlspecialchars($dep['nombres'] . ' ' . $dep['apellidos'], ENT_QUOTES, 'UTF-8'); ?></strong>
												<div class="text-muted small"><?php echo htmlspecialchars($dep['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
											</li>
										<?php } ?>
									</ul>
								<?php } else { ?>
									<div class="text-muted">Sin resultados.</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-3">Entrenadores</h5>
								<?php if ($results['entrenadores']) { ?>
									<ul class="list-unstyled mb-0">
										<?php foreach ($results['entrenadores'] as $ent) { ?>
											<li class="mb-2">
												<strong><?php echo htmlspecialchars($ent['nombres'] . ' ' . $ent['apellidos'], ENT_QUOTES, 'UTF-8'); ?></strong>
												<div class="text-muted small"><?php echo htmlspecialchars($ent['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
											</li>
										<?php } ?>
									</ul>
								<?php } else { ?>
									<div class="text-muted">Sin resultados.</div>
								<?php } ?>
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
