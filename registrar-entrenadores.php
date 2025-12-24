<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_roles(['Admin Club', 'Coordinador Deportivo']);

	$db = gesclub_db();
	$usuarioActual = gesclub_current_username();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$entrenadores = $db->query('SELECT * FROM entrenadores ORDER BY id DESC')->fetchAll() ?: [];
	$historial = $db->query('SELECT h.*, e.nombres, e.apellidos FROM historial_entrenadores h JOIN entrenadores e ON e.id = h.entrenador_id ORDER BY h.id DESC')->fetchAll() ?: [];

	$editId = (int)($_GET['edit'] ?? 0);
	$editEntrenador = null;
	if ($editId > 0) {
		$stmt = $db->prepare('SELECT * FROM entrenadores WHERE id = :id');
		$stmt->execute([':id' => $editId]);
		$editEntrenador = $stmt->fetch();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		if ($action === 'save') {
			$id = (int)($_POST['id'] ?? 0);
			$isUpdate = $id > 0;
			$runNumero = trim($_POST['run_numero'] ?? '');
			$runDv = trim($_POST['run_dv'] ?? '');
			$nombres = trim($_POST['nombres'] ?? '');
			$apellidos = trim($_POST['apellidos'] ?? '');
			$fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';
			$email = trim($_POST['email'] ?? '');
			$telefono = trim($_POST['telefono'] ?? '');
			$region = trim($_POST['direccion_region'] ?? '');
			$comuna = trim($_POST['direccion_comuna'] ?? '');
			$disciplina = trim($_POST['disciplina'] ?? '');
			$categorias = trim($_POST['categorias_asignadas'] ?? '');
			$equipos = trim($_POST['equipos_asignados'] ?? '');
			$tipo = trim($_POST['tipo'] ?? '');
			$fechaInicio = $_POST['fecha_inicio'] ?? '';
			$estado = $_POST['estado'] ?? 'activo';
			$certificaciones = trim($_POST['certificaciones'] ?? '');
			$documentosAdjuntos = trim($_POST['documentos_adjuntos'] ?? '');
			$permisosAcceso = trim($_POST['permisos_acceso'] ?? '');

			$required = [$runNumero, $runDv, $nombres, $apellidos, $fechaNacimiento, $email, $telefono, $region, $comuna, $disciplina, $categorias, $tipo, $fechaInicio];
			foreach ($required as $value) {
				if ($value === '') {
					$message = 'Completa los campos obligatorios del entrenador.';
					$messageType = 'error';
					break;
				}
			}

			if ($messageType !== 'error' && !gesclub_validate_rut($runNumero, $runDv)) {
				$message = 'El RUN del entrenador no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message = 'El correo del entrenador no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error') {
				if ($isUpdate) {
					$stmt = $db->prepare(
						'UPDATE entrenadores SET run_numero = :run_numero, run_dv = :run_dv, nombres = :nombres, apellidos = :apellidos,
						fecha_nacimiento = :fecha_nacimiento, email = :email, telefono = :telefono, direccion_region = :region,
						direccion_comuna = :comuna, disciplina = :disciplina, categorias_asignadas = :categorias, equipos_asignados = :equipos,
						tipo = :tipo, fecha_inicio = :fecha_inicio, estado = :estado, certificaciones = :certificaciones,
						documentos_adjuntos = :documentos_adjuntos, permisos_acceso = :permisos_acceso
						WHERE id = :id'
					);
					$stmt->execute([
						':id' => $id,
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':fecha_nacimiento' => $fechaNacimiento,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':disciplina' => $disciplina,
						':categorias' => $categorias,
						':equipos' => $equipos !== '' ? $equipos : null,
						':tipo' => $tipo,
						':fecha_inicio' => $fechaInicio,
						':estado' => $estado,
						':certificaciones' => $certificaciones !== '' ? $certificaciones : null,
						':documentos_adjuntos' => $documentosAdjuntos !== '' ? $documentosAdjuntos : null,
						':permisos_acceso' => $permisosAcceso !== '' ? $permisosAcceso : null,
					]);
					$detalle = "Actualización entrenador {$nombres} {$apellidos}";
					$message = 'Entrenador actualizado.';
				} else {
					$stmt = $db->prepare(
						'INSERT INTO entrenadores (run_numero, run_dv, nombres, apellidos, fecha_nacimiento, email, telefono, direccion_region,
						direccion_comuna, disciplina, categorias_asignadas, equipos_asignados, tipo, fecha_inicio, estado, certificaciones,
						documentos_adjuntos, permisos_acceso, created_at)
						VALUES (:run_numero, :run_dv, :nombres, :apellidos, :fecha_nacimiento, :email, :telefono, :region, :comuna,
						:disciplina, :categorias, :equipos, :tipo, :fecha_inicio, :estado, :certificaciones, :documentos_adjuntos,
						:permisos_acceso, :created_at)'
					);
					$stmt->execute([
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':fecha_nacimiento' => $fechaNacimiento,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':disciplina' => $disciplina,
						':categorias' => $categorias,
						':equipos' => $equipos !== '' ? $equipos : null,
						':tipo' => $tipo,
						':fecha_inicio' => $fechaInicio,
						':estado' => $estado,
						':certificaciones' => $certificaciones !== '' ? $certificaciones : null,
						':documentos_adjuntos' => $documentosAdjuntos !== '' ? $documentosAdjuntos : null,
						':permisos_acceso' => $permisosAcceso !== '' ? $permisosAcceso : null,
						':created_at' => date('Y-m-d H:i:s'),
					]);
					$id = (int)$db->lastInsertId();
					$detalle = "Nuevo entrenador {$nombres} {$apellidos}";
					$message = 'Entrenador registrado.';
				}

				$hist = $db->prepare('INSERT INTO historial_entrenadores (entrenador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
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
				$stmt = $db->prepare('SELECT nombres, apellidos, estado FROM entrenadores WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$entrenador = $stmt->fetch();
				if ($entrenador) {
					$nuevoEstado = ($entrenador['estado'] ?? 'activo') === 'activo' ? 'inactivo' : 'activo';
					$update = $db->prepare('UPDATE entrenadores SET estado = :estado WHERE id = :id');
					$update->execute([':estado' => $nuevoEstado, ':id' => $id]);
					$hist = $db->prepare('INSERT INTO historial_entrenadores (entrenador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => $nuevoEstado === 'activo' ? 'activar' : 'desactivar',
						':detalle' => "Estado {$nuevoEstado} para {$entrenador['nombres']} {$entrenador['apellidos']}",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
					$message = 'Estado actualizado.';
				}
			}
		} elseif ($action === 'delete') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombres, apellidos FROM entrenadores WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$entrenador = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM entrenadores WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Entrenador eliminado.';
				if ($entrenador) {
					$hist = $db->prepare('INSERT INTO historial_entrenadores (entrenador_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => 'eliminar',
						':detalle' => "Entrenador {$entrenador['nombres']} {$entrenador['apellidos']} eliminado",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		}

		header('Location: registrar-entrenadores.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
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
						<h3 class="mb-1 font-w600 main-text">Registrar entrenadores</h3>
						<p>Credenciales, asignaciones y permisos de acceso.</p>
					</div>
				</div>
				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="row">
					<div class="col-xl-5">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Ficha del entrenador</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editEntrenador['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<h6>Identificación</h6>
									<div class="row">
										<div class="col-lg-8 mb-3">
											<label class="form-label">RUN</label>
											<input type="text" class="form-control" name="run_numero" value="<?php echo htmlspecialchars($editEntrenador['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">DV</label>
											<input type="text" class="form-control" name="run_dv" value="<?php echo htmlspecialchars($editEntrenador['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Nombres</label>
											<input type="text" class="form-control" name="nombres" value="<?php echo htmlspecialchars($editEntrenador['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Apellidos</label>
											<input type="text" class="form-control" name="apellidos" value="<?php echo htmlspecialchars($editEntrenador['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Fecha nacimiento</label>
											<input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo htmlspecialchars($editEntrenador['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<h6>Contacto</h6>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($editEntrenador['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Teléfono</label>
											<input type="text" class="form-control" name="telefono" value="<?php echo htmlspecialchars($editEntrenador['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Región</label>
											<input type="text" class="form-control" name="direccion_region" value="<?php echo htmlspecialchars($editEntrenador['direccion_region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Comuna</label>
											<input type="text" class="form-control" name="direccion_comuna" value="<?php echo htmlspecialchars($editEntrenador['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<h6>Rol deportivo</h6>
									<div class="row">
										<div class="col-lg-12 mb-3">
											<label class="form-label">Disciplina</label>
											<input type="text" class="form-control" name="disciplina" value="<?php echo htmlspecialchars($editEntrenador['disciplina'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Categorías asignadas</label>
											<input type="text" class="form-control" name="categorias_asignadas" value="<?php echo htmlspecialchars($editEntrenador['categorias_asignadas'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Equipos asignados</label>
											<input type="text" class="form-control" name="equipos_asignados" value="<?php echo htmlspecialchars($editEntrenador['equipos_asignados'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Tipo</label>
											<select class="form-control" name="tipo" required>
												<?php $tipoEntrenador = $editEntrenador['tipo'] ?? ''; ?>
												<option value="">Selecciona</option>
												<option value="principal" <?php echo $tipoEntrenador === 'principal' ? 'selected' : ''; ?>>Principal</option>
												<option value="ayudante" <?php echo $tipoEntrenador === 'ayudante' ? 'selected' : ''; ?>>Ayudante</option>
											</select>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Fecha inicio</label>
											<input type="date" class="form-control" name="fecha_inicio" value="<?php echo htmlspecialchars($editEntrenador['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Estado</label>
											<select class="form-control" name="estado">
												<?php $estadoEntrenador = $editEntrenador['estado'] ?? 'activo'; ?>
												<option value="activo" <?php echo $estadoEntrenador === 'activo' ? 'selected' : ''; ?>>Activo</option>
												<option value="inactivo" <?php echo $estadoEntrenador === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
											</select>
										</div>
									</div>

									<h6>Credenciales</h6>
									<div class="row">
										<div class="col-lg-12 mb-3">
											<label class="form-label">Certificaciones y cursos</label>
											<textarea class="form-control" name="certificaciones" rows="2"><?php echo htmlspecialchars($editEntrenador['certificaciones'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Documentos adjuntos (CV, certificados)</label>
											<textarea class="form-control" name="documentos_adjuntos" rows="2"><?php echo htmlspecialchars($editEntrenador['documentos_adjuntos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
										</div>
									</div>

									<h6>Permisos</h6>
									<div class="mb-3">
										<label class="form-label">Permisos de acceso</label>
										<textarea class="form-control" name="permisos_acceso" rows="2"><?php echo htmlspecialchars($editEntrenador['permisos_acceso'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
									</div>

									<button type="submit" class="btn btn-primary">Guardar entrenador</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-7">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Entrenadores registrados</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>RUN</th>
												<th>Disciplina</th>
												<th>Tipo</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($entrenadores as $entrenador) { ?>
												<tr>
													<td><?php echo htmlspecialchars($entrenador['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($entrenador['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars(($entrenador['run_numero'] ?? '') . '-' . ($entrenador['run_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($entrenador['disciplina'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($entrenador['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($entrenador['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="registrar-entrenadores.php?edit=<?php echo (int)$entrenador['id']; ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)$entrenador['id']; ?>">
																<button type="submit" class="btn btn-sm <?php echo ($entrenador['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($entrenador['estado'] ?? 'activo') === 'activo' ? 'Desactivar' : 'Activar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)$entrenador['id']; ?>">
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

						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Historial</h5>
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
											<?php foreach ($historial as $item) { ?>
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
			</div>
		</div>
		<?php include 'elements/footer.php'; ?>
	</div>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
