<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_roles(['Admin Club', 'Coordinador Deportivo']);

	$db = gesclub_db();
	$rama = trim($_GET['rama'] ?? '');
	$categoria = trim($_GET['categoria'] ?? '');
	$estado = trim($_GET['estado'] ?? '');
	$export = (int)($_GET['export'] ?? 0);

	$where = [];
	$params = [];
	if ($rama !== '') {
		$where[] = 'rama = :rama';
		$params[':rama'] = $rama;
	}
	if ($categoria !== '') {
		$where[] = 'categoria = :categoria';
		$params[':categoria'] = $categoria;
	}
	if ($estado !== '') {
		$where[] = 'estado = :estado';
		$params[':estado'] = $estado;
	}
	$query = 'SELECT * FROM deportistas';
	if ($where) {
		$query .= ' WHERE ' . implode(' AND ', $where);
	}
	$query .= ' ORDER BY apellidos, nombres';

	$stmt = $db->prepare($query);
	$stmt->execute($params);
	$deportistas = $stmt->fetchAll() ?: [];

	if ($export === 1) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="reporte-deportistas.csv"');
		$output = fopen('php://output', 'w');
		fputcsv($output, ['RUN', 'Nombre', 'Disciplina', 'Categoría', 'Rama', 'Estado']);
		foreach ($deportistas as $deportista) {
			fputcsv($output, [
				($deportista['run_numero'] ?? '') . '-' . ($deportista['run_dv'] ?? ''),
				trim(($deportista['nombres'] ?? '') . ' ' . ($deportista['apellidos'] ?? '')),
				$deportista['disciplinas'] ?? '',
				$deportista['categoria'] ?? '',
				$deportista['rama'] ?? '',
				$deportista['estado'] ?? '',
			]);
		}
		fclose($output);
		exit;
	}
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
						<h3 class="mb-1 font-w600 main-text">Exportación y reportes</h3>
						<p>Listados filtrados por rama, categoría y estado.</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<form method="get" class="row g-3 align-items-end">
							<div class="col-lg-3">
								<label class="form-label">Rama</label>
								<input type="text" class="form-control" name="rama" value="<?php echo htmlspecialchars($rama, ENT_QUOTES, 'UTF-8'); ?>">
							</div>
							<div class="col-lg-3">
								<label class="form-label">Categoría</label>
								<input type="text" class="form-control" name="categoria" value="<?php echo htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8'); ?>">
							</div>
							<div class="col-lg-3">
								<label class="form-label">Estado</label>
								<select class="form-control" name="estado">
									<option value="">Todos</option>
									<option value="activo" <?php echo $estado === 'activo' ? 'selected' : ''; ?>>Activo</option>
									<option value="suspendido" <?php echo $estado === 'suspendido' ? 'selected' : ''; ?>>Suspendido</option>
									<option value="retirado" <?php echo $estado === 'retirado' ? 'selected' : ''; ?>>Retirado</option>
								</select>
							</div>
							<div class="col-lg-3">
								<button type="submit" class="btn btn-primary">Filtrar</button>
								<a class="btn btn-outline-primary" href="reportes.php?rama=<?php echo urlencode($rama); ?>&categoria=<?php echo urlencode($categoria); ?>&estado=<?php echo urlencode($estado); ?>&export=1">Exportar CSV</a>
							</div>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Listado de deportistas</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>RUN</th>
										<th>Nombre</th>
										<th>Disciplina</th>
										<th>Categoría</th>
										<th>Rama</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($deportistas as $deportista) { ?>
										<tr>
											<td><?php echo htmlspecialchars(($deportista['run_numero'] ?? '') . '-' . ($deportista['run_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(trim(($deportista['nombres'] ?? '') . ' ' . ($deportista['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['disciplinas'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['categoria'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['rama'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['estado'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
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
