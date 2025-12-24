<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';

	gesclub_require_login();

	$db = gesclub_db();
	$usuario = gesclub_current_username();
	$activities = [];

	try {
		$sql = "
			SELECT 'Usuarios' AS modulo, accion, detalle, usuario, fecha
			FROM user_profile_history
			WHERE usuario = ?
			UNION ALL
			SELECT 'Clubes' AS modulo, accion, detalle, usuario, fecha
			FROM historial_clubes
			WHERE usuario = ?
			UNION ALL
			SELECT 'Deportistas' AS modulo, accion, detalle, usuario, fecha
			FROM historial_deportistas
			WHERE usuario = ?
			UNION ALL
			SELECT 'Entrenadores' AS modulo, accion, detalle, usuario, fecha
			FROM historial_entrenadores
			WHERE usuario = ?
			UNION ALL
			SELECT 'Colaboradores' AS modulo, accion, detalle, usuario, fecha
			FROM historial_colaboradores
			WHERE usuario = ?
			UNION ALL
			SELECT CONCAT('Ubicación - ', tipo) AS modulo, accion, detalle, usuario, fecha
			FROM historial_ubicaciones
			WHERE usuario = ?
			ORDER BY fecha DESC
		";
		$stmt = $db->prepare($sql);
		$stmt->execute([$usuario, $usuario, $usuario, $usuario, $usuario, $usuario]);
		$activities = $stmt->fetchAll() ?: [];
	} catch (Throwable $e) {
		$activities = [];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Control de actividades | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
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
						<h3 class="mb-1 font-w600 main-text">Control de actividades</h3>
						<p class="mb-0 text-muted">Historial consolidado de acciones del usuario: <?php echo htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8'); ?>.</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<?php if ($activities === []) { ?>
							<div class="text-muted">Aún no hay actividades registradas para tu usuario.</div>
						<?php } else { ?>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Módulo</th>
											<th>Acción</th>
											<th>Detalle</th>
											<th>Usuario</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($activities as $item) { ?>
											<tr>
												<td><?php echo htmlspecialchars($item['modulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($item['accion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($item['detalle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($item['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($item['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php include 'elements/footer.php'; ?>
	</div>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
