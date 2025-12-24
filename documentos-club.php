<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();
	$clubes = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];
	$clubId = (int)($_GET['club_id'] ?? 0);

	if ($clubId > 0) {
		$stmt = $db->prepare('SELECT d.*, c.nombre_oficial FROM club_documentos d JOIN clubes c ON c.id = d.club_id WHERE c.id = :id ORDER BY d.id DESC');
		$stmt->execute([':id' => $clubId]);
		$documentos = $stmt->fetchAll() ?: [];
	} else {
		$documentos = $db->query('SELECT d.*, c.nombre_oficial FROM club_documentos d JOIN clubes c ON c.id = d.club_id ORDER BY d.id DESC')->fetchAll() ?: [];
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
						<h3 class="mb-1 font-w600 main-text">Documentos del club</h3>
						<p>Repositorio central de estatutos, certificados y actas.</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<form method="get" class="row g-3 align-items-end">
							<div class="col-lg-6">
								<label class="form-label">Filtrar por club</label>
								<select class="form-control" name="club_id">
									<option value="0">Todos</option>
									<?php foreach ($clubes as $club) { ?>
										<option value="<?php echo (int)$club['id']; ?>" <?php echo $clubId === (int)$club['id'] ? 'selected' : ''; ?>>
											<?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-3">
								<button type="submit" class="btn btn-primary">Aplicar filtro</button>
							</div>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Listado de documentos</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Club</th>
										<th>Tipo</th>
										<th>Archivo</th>
										<th>Fecha carga</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($documentos as $doc) { ?>
										<tr>
											<td><?php echo htmlspecialchars($doc['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($doc['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<a href="<?php echo htmlspecialchars($doc['ruta'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
													<?php echo htmlspecialchars($doc['nombre_archivo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</a>
											</td>
											<td><?php echo htmlspecialchars($doc['created_at'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
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
