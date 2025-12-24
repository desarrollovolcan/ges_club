<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_roles(['Admin Club']);

	$db = gesclub_db();
	$usuarioActual = gesclub_current_username();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$colaboradores = $db->query('SELECT co.*, c.nombre_oficial AS club_nombre FROM colaboradores co LEFT JOIN clubes c ON c.id = co.club_id ORDER BY co.id DESC')->fetchAll() ?: [];
	$clubes = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];

	$editId = (int)($_GET['edit'] ?? 0);
	$editColaborador = null;
	if ($editId > 0) {
		$stmt = $db->prepare('SELECT * FROM colaboradores WHERE id = :id');
		$stmt->execute([':id' => $editId]);
		$editColaborador = $stmt->fetch();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		if ($action === 'save') {
			$id = (int)($_POST['id'] ?? 0);
			$isUpdate = $id > 0;
			$clubId = (int)($_POST['club_id'] ?? 0);
			$tipo = trim($_POST['tipo'] ?? '');
			$runNumero = trim($_POST['run_numero'] ?? '');
			$runDv = trim($_POST['run_dv'] ?? '');
			$nombres = trim($_POST['nombres'] ?? '');
			$apellidos = trim($_POST['apellidos'] ?? '');
			$email = trim($_POST['email'] ?? '');
			$telefono = trim($_POST['telefono'] ?? '');
			$region = trim($_POST['direccion_region'] ?? '');
			$comuna = trim($_POST['direccion_comuna'] ?? '');
			$funcion = trim($_POST['funcion'] ?? '');
			$area = trim($_POST['area'] ?? '');
			$fechaInicio = $_POST['fecha_inicio'] ?? '';
			$jornada = trim($_POST['jornada'] ?? '');
			$estado = $_POST['estado'] ?? 'activo';
			$permisos = trim($_POST['permisos'] ?? '');

			$required = [$tipo, $runNumero, $runDv, $nombres, $apellidos, $email, $telefono, $region, $comuna, $funcion, $fechaInicio];
			foreach ($required as $value) {
				if ($value === '') {
					$message = 'Completa los campos obligatorios del colaborador.';
					$messageType = 'error';
					break;
				}
			}

			if ($messageType !== 'error' && $clubId <= 0) {
				$message = 'Selecciona el club del colaborador.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !gesclub_validate_rut($runNumero, $runDv)) {
				$message = 'El RUN del colaborador no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message = 'El correo del colaborador no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error') {
				if ($isUpdate) {
					$stmt = $db->prepare(
						'UPDATE colaboradores SET club_id = :club_id, tipo = :tipo, run_numero = :run_numero, run_dv = :run_dv, nombres = :nombres,
						apellidos = :apellidos, email = :email, telefono = :telefono, direccion_region = :region, direccion_comuna = :comuna,
						funcion = :funcion, area = :area, fecha_inicio = :fecha_inicio, jornada = :jornada, estado = :estado, permisos = :permisos
						WHERE id = :id'
					);
					$stmt->execute([
						':id' => $id,
						':club_id' => $clubId,
						':tipo' => $tipo,
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':funcion' => $funcion,
						':area' => $area !== '' ? $area : null,
						':fecha_inicio' => $fechaInicio,
						':jornada' => $jornada !== '' ? $jornada : null,
						':estado' => $estado,
						':permisos' => $permisos !== '' ? $permisos : null,
					]);
					$detalle = "Actualización colaborador {$nombres} {$apellidos}";
					$message = 'Colaborador actualizado.';
				} else {
					$stmt = $db->prepare(
						'INSERT INTO colaboradores (club_id, tipo, run_numero, run_dv, nombres, apellidos, email, telefono, direccion_region, direccion_comuna,
						funcion, area, fecha_inicio, jornada, estado, permisos, created_at)
						VALUES (:club_id, :tipo, :run_numero, :run_dv, :nombres, :apellidos, :email, :telefono, :region, :comuna, :funcion, :area,
						:fecha_inicio, :jornada, :estado, :permisos, :created_at)'
					);
					$stmt->execute([
						':club_id' => $clubId,
						':tipo' => $tipo,
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':funcion' => $funcion,
						':area' => $area !== '' ? $area : null,
						':fecha_inicio' => $fechaInicio,
						':jornada' => $jornada !== '' ? $jornada : null,
						':estado' => $estado,
						':permisos' => $permisos !== '' ? $permisos : null,
						':created_at' => date('Y-m-d H:i:s'),
					]);
					$id = (int)$db->lastInsertId();
					$detalle = "Nuevo colaborador {$nombres} {$apellidos}";
					$message = 'Colaborador registrado.';
				}

				$hist = $db->prepare('INSERT INTO historial_colaboradores (colaborador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
				$hist->execute([
					':id' => $id,
					':accion' => $isUpdate ? 'actualizar' : 'crear',
					':detalle' => $detalle,
					':usuario' => $usuarioActual,
					':fecha' => date('Y-m-d H:i:s'),
				]);
			}
		} elseif ($action === 'toggle') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombres, apellidos, estado FROM colaboradores WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$colaborador = $stmt->fetch();
				if ($colaborador) {
					$nuevoEstado = ($colaborador['estado'] ?? 'activo') === 'activo' ? 'inactivo' : 'activo';
					$update = $db->prepare('UPDATE colaboradores SET estado = :estado WHERE id = :id');
					$update->execute([':estado' => $nuevoEstado, ':id' => $id]);
					$hist = $db->prepare('INSERT INTO historial_colaboradores (colaborador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => $nuevoEstado === 'activo' ? 'activar' : 'desactivar',
						':detalle' => "Estado {$nuevoEstado} para {$colaborador['nombres']} {$colaborador['apellidos']}",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
					$message = 'Estado actualizado.';
				}
			}
		} elseif ($action === 'delete') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombres, apellidos FROM colaboradores WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$colaborador = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM colaboradores WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Colaborador eliminado.';
				if ($colaborador) {
					$hist = $db->prepare('INSERT INTO historial_colaboradores (colaborador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => 'eliminar',
						':detalle' => "Colaborador {$colaborador['nombres']} {$colaborador['apellidos']} eliminado",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		}

		header('Location: registrar-colaboradores.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
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
						<h3 class="mb-1 font-w600 main-text">Registrar colaboradores</h3>
						<p>Administrativos, médicos, comunicación y más.</p>
					</div>
				</div>
				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="card mb-4">
					<div class="card-body">
						<h5 class="mb-3">Ficha del colaborador</h5>
						<form method="post">
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="id" value="<?php echo htmlspecialchars($editColaborador['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Club</label>
										<select class="form-control" name="club_id" required>
											<option value="">Selecciona</option>
											<?php foreach ($clubes as $club) { ?>
												<option value="<?php echo (int)$club['id']; ?>" <?php echo ((int)($editColaborador['club_id'] ?? 0) === (int)$club['id']) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Tipo</label>
										<select class="form-control" name="tipo" required>
											<?php $tipoColaborador = $editColaborador['tipo'] ?? ''; ?>
											<option value="">Selecciona</option>
											<option value="Administrativo" <?php echo $tipoColaborador === 'Administrativo' ? 'selected' : ''; ?>>Administrativo</option>
											<option value="Médico" <?php echo $tipoColaborador === 'Médico' ? 'selected' : ''; ?>>Médico</option>
											<option value="Kinesiólogo" <?php echo $tipoColaborador === 'Kinesiólogo' ? 'selected' : ''; ?>>Kinesiólogo</option>
											<option value="Utilero" <?php echo $tipoColaborador === 'Utilero' ? 'selected' : ''; ?>>Utilero</option>
											<option value="Comunicación" <?php echo $tipoColaborador === 'Comunicación' ? 'selected' : ''; ?>>Comunicación</option>
											<option value="Mantención" <?php echo $tipoColaborador === 'Mantención' ? 'selected' : ''; ?>>Mantención</option>
											<option value="Seguridad" <?php echo $tipoColaborador === 'Seguridad' ? 'selected' : ''; ?>>Seguridad</option>
										</select>
									</div>
									<h6>Identificación y contacto</h6>
									<div class="row">
										<div class="col-lg-8 mb-3">
										<label class="form-label">RUN</label>
										<input type="text" class="form-control" name="run_numero" inputmode="numeric" value="<?php echo htmlspecialchars($editColaborador['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">DV</label>
											<input type="text" class="form-control" name="run_dv" value="<?php echo htmlspecialchars($editColaborador['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Nombres</label>
											<input type="text" class="form-control" name="nombres" value="<?php echo htmlspecialchars($editColaborador['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Apellidos</label>
											<input type="text" class="form-control" name="apellidos" value="<?php echo htmlspecialchars($editColaborador['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($editColaborador['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
										<label class="form-label">Teléfono</label>
										<input type="tel" class="form-control" name="telefono" value="<?php echo htmlspecialchars($editColaborador['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Región</label>
											<input type="text" class="form-control" name="direccion_region" value="<?php echo htmlspecialchars($editColaborador['direccion_region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Comuna</label>
											<input type="text" class="form-control" name="direccion_comuna" value="<?php echo htmlspecialchars($editColaborador['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<h6>Rol y contrato</h6>
									<div class="row">
										<div class="col-lg-12 mb-3">
											<label class="form-label">Función</label>
											<input type="text" class="form-control" name="funcion" value="<?php echo htmlspecialchars($editColaborador['funcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Área asignada</label>
											<input type="text" class="form-control" name="area" value="<?php echo htmlspecialchars($editColaborador['area'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Fecha inicio</label>
											<input type="date" class="form-control" name="fecha_inicio" value="<?php echo htmlspecialchars($editColaborador['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Jornada</label>
											<input type="text" class="form-control" name="jornada" value="<?php echo htmlspecialchars($editColaborador['jornada'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Estado</label>
											<select class="form-control" name="estado">
												<?php $estadoColaborador = $editColaborador['estado'] ?? 'activo'; ?>
												<option value="activo" <?php echo $estadoColaborador === 'activo' ? 'selected' : ''; ?>>Activo</option>
												<option value="inactivo" <?php echo $estadoColaborador === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
											</select>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Permisos / accesos</label>
											<textarea class="form-control" name="permisos" rows="2"><?php echo htmlspecialchars($editColaborador['permisos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
										</div>
									</div>

							<button type="submit" class="btn btn-primary">Guardar colaborador</button>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Colaboradores registrados</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Tipo</th>
										<th>Club</th>
										<th>Función</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($colaboradores as $colaborador) { ?>
										<tr>
											<td><?php echo htmlspecialchars($colaborador['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($colaborador['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($colaborador['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($colaborador['club_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($colaborador['funcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($colaborador['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<div class="d-flex gap-2">
													<a class="btn btn-warning btn-sm" href="registrar-colaboradores.php?edit=<?php echo (int)$colaborador['id']; ?>">Editar</a>
													<form method="post">
														<input type="hidden" name="action" value="toggle">
														<input type="hidden" name="id" value="<?php echo (int)$colaborador['id']; ?>">
														<button type="submit" class="btn btn-sm <?php echo ($colaborador['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
															<?php echo ($colaborador['estado'] ?? 'activo') === 'activo' ? 'Desactivar' : 'Activar'; ?>
														</button>
													</form>
													<form method="post">
														<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?php echo (int)$colaborador['id']; ?>">
														<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
													</form>
												</div>
											</td>
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
