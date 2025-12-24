<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();
	$historialClubes = $db->query('SELECT h.*, c.nombre_oficial FROM historial_clubes h JOIN clubes c ON c.id = h.club_id ORDER BY h.id DESC')->fetchAll() ?: [];
	$historialDeportistas = $db->query('SELECT h.*, d.nombres, d.apellidos FROM historial_deportistas h JOIN deportistas d ON d.id = h.deportista_id ORDER BY h.id DESC')->fetchAll() ?: [];
	$historialEntrenadores = $db->query('SELECT h.*, e.nombres, e.apellidos FROM historial_entrenadores h JOIN entrenadores e ON e.id = h.entrenador_id ORDER BY h.id DESC')->fetchAll() ?: [];
	$historialColaboradores = $db->query('SELECT h.*, c.nombres, c.apellidos FROM historial_colaboradores h JOIN colaboradores c ON c.id = h.colaborador_id ORDER BY h.id DESC')->fetchAll() ?: [];
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
						<h3 class="mb-1 font-w600 main-text">Bitácora / Auditoría</h3>
						<p>Trazabilidad de cambios por módulo.</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Clubes</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Club</th>
										<th>Acción</th>
										<th>Detalle</th>
										<th>Usuario</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialClubes as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars($item['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Deportistas</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Deportista</th>
										<th>Acción</th>
										<th>Detalle</th>
										<th>Usuario</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialDeportistas as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars(($item['nombres'] ?? '') . ' ' . ($item['apellidos'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Entrenadores</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Entrenador</th>
										<th>Acción</th>
										<th>Detalle</th>
										<th>Usuario</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialEntrenadores as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars(($item['nombres'] ?? '') . ' ' . ($item['apellidos'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Colaboradores</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Colaborador</th>
										<th>Acción</th>
										<th>Detalle</th>
										<th>Usuario</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historialColaboradores as $item) { ?>
										<tr>
											<td><?php echo htmlspecialchars(($item['nombres'] ?? '') . ' ' . ($item['apellidos'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
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
