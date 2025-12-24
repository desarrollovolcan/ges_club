<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_roles(['Admin Club', 'Coordinador Deportivo']);

	$db = gesclub_db();
	$usuarioActual = gesclub_current_username();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$deportistas = $db->query('SELECT d.*, c.nombre_oficial AS club_nombre, cat.nombre AS categoria_nombre, eq.nombre AS equipo_nombre
		FROM deportistas d
		LEFT JOIN clubes c ON c.id = d.club_id
		LEFT JOIN club_categorias cat ON cat.id = d.categoria_id
		LEFT JOIN club_equipos eq ON eq.id = d.equipo_id
		ORDER BY d.id DESC')->fetchAll() ?: [];

	$clubes = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];
	$categorias = $db->query('SELECT id, club_id, nombre FROM club_categorias ORDER BY nombre')->fetchAll() ?: [];
	$equipos = $db->query('SELECT id, club_id, nombre FROM club_equipos ORDER BY nombre')->fetchAll() ?: [];

	$editId = (int)($_GET['edit'] ?? 0);
	$editDeportista = null;
	if ($editId > 0) {
		$stmt = $db->prepare('SELECT * FROM deportistas WHERE id = :id');
		$stmt->execute([':id' => $editId]);
		$editDeportista = $stmt->fetch();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		if ($action === 'save') {
			$id = (int)($_POST['id'] ?? 0);
			$isUpdate = $id > 0;
			$clubId = (int)($_POST['club_id'] ?? 0);
			$runNumero = trim($_POST['run_numero'] ?? '');
			$runDv = trim($_POST['run_dv'] ?? '');
			$nombres = trim($_POST['nombres'] ?? '');
			$apellidos = trim($_POST['apellidos'] ?? '');
			$fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';
			$sexo = trim($_POST['sexo'] ?? '');
			$nacionalidad = trim($_POST['nacionalidad'] ?? '');
			$email = trim($_POST['email'] ?? '');
			$telefono = trim($_POST['telefono'] ?? '');
			$region = trim($_POST['direccion_region'] ?? '');
			$comuna = trim($_POST['direccion_comuna'] ?? '');
			$disciplinas = trim($_POST['disciplinas'] ?? '');
			$categoriaId = (int)($_POST['categoria_id'] ?? 0);
			$rama = trim($_POST['rama'] ?? '');
			$equipoId = (int)($_POST['equipo_id'] ?? 0);
			$posicion = trim($_POST['posicion'] ?? '');
			$nivel = trim($_POST['nivel'] ?? '');
			$fechaIngreso = $_POST['fecha_ingreso'] ?? '';
			$estado = $_POST['estado'] ?? 'activo';
			$contactoNombre = trim($_POST['contacto_emergencia_nombre'] ?? '');
			$contactoTelefono = trim($_POST['contacto_emergencia_telefono'] ?? '');
			$alergias = trim($_POST['alergias'] ?? '');
			$prevision = trim($_POST['prevision'] ?? '');
			$apoderadoRun = trim($_POST['apoderado_run'] ?? '');
			$apoderadoNombre = trim($_POST['apoderado_nombre'] ?? '');
			$apoderadoContacto = trim($_POST['apoderado_contacto'] ?? '');
			$apoderadoParentesco = trim($_POST['apoderado_parentesco'] ?? '');
			$consentimientoDatos = isset($_POST['consentimiento_datos']) ? 1 : 0;
			$autorizacionEntrenamientos = isset($_POST['autorizacion_entrenamientos']) ? 1 : 0;
			$documentosAdjuntos = trim($_POST['documentos_adjuntos'] ?? '');

			$required = [$runNumero, $runDv, $nombres, $apellidos, $fechaNacimiento, $sexo, $nacionalidad, $email, $telefono, $region, $comuna, $disciplinas, $rama, $nivel, $fechaIngreso, $contactoNombre, $contactoTelefono];
			foreach ($required as $value) {
				if ($value === '') {
					$message = 'Completa los campos obligatorios del deportista.';
					$messageType = 'error';
					break;
				}
			}

			if ($messageType !== 'error' && $clubId <= 0) {
				$message = 'Selecciona el club del deportista.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && $categoriaId <= 0) {
				$message = 'Selecciona la categoría del deportista.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !gesclub_validate_rut($runNumero, $runDv)) {
				$message = 'El RUN del deportista no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message = 'El correo del deportista no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error') {
				if ($isUpdate) {
					$stmt = $db->prepare(
						'UPDATE deportistas SET club_id = :club_id, run_numero = :run_numero, run_dv = :run_dv, nombres = :nombres, apellidos = :apellidos,
						fecha_nacimiento = :fecha_nacimiento, sexo = :sexo, nacionalidad = :nacionalidad, email = :email, telefono = :telefono,
						direccion_region = :region, direccion_comuna = :comuna, disciplinas = :disciplinas, categoria_id = :categoria_id, rama = :rama,
						equipo_id = :equipo_id, posicion = :posicion, nivel = :nivel, fecha_ingreso = :fecha_ingreso, estado = :estado,
						contacto_emergencia_nombre = :contacto_nombre, contacto_emergencia_telefono = :contacto_telefono, alergias = :alergias,
						prevision = :prevision, apoderado_run = :apoderado_run, apoderado_nombre = :apoderado_nombre,
						apoderado_contacto = :apoderado_contacto, apoderado_parentesco = :apoderado_parentesco, consentimiento_datos = :consentimiento_datos,
						autorizacion_entrenamientos = :autorizacion_entrenamientos, documentos_adjuntos = :documentos_adjuntos
						WHERE id = :id'
					);
					$stmt->execute([
						':id' => $id,
						':club_id' => $clubId,
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':fecha_nacimiento' => $fechaNacimiento,
						':sexo' => $sexo,
						':nacionalidad' => $nacionalidad,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':disciplinas' => $disciplinas,
						':categoria_id' => $categoriaId,
						':rama' => $rama,
						':equipo_id' => $equipoId > 0 ? $equipoId : null,
						':posicion' => $posicion !== '' ? $posicion : null,
						':nivel' => $nivel,
						':fecha_ingreso' => $fechaIngreso,
						':estado' => $estado,
						':contacto_nombre' => $contactoNombre,
						':contacto_telefono' => $contactoTelefono,
						':alergias' => $alergias !== '' ? $alergias : null,
						':prevision' => $prevision !== '' ? $prevision : null,
						':apoderado_run' => $apoderadoRun !== '' ? $apoderadoRun : null,
						':apoderado_nombre' => $apoderadoNombre !== '' ? $apoderadoNombre : null,
						':apoderado_contacto' => $apoderadoContacto !== '' ? $apoderadoContacto : null,
						':apoderado_parentesco' => $apoderadoParentesco !== '' ? $apoderadoParentesco : null,
						':consentimiento_datos' => $consentimientoDatos,
						':autorizacion_entrenamientos' => $autorizacionEntrenamientos,
						':documentos_adjuntos' => $documentosAdjuntos !== '' ? $documentosAdjuntos : null,
					]);
					$detalle = "Actualización deportista {$nombres} {$apellidos}";
					$message = 'Deportista actualizado.';
				} else {
					$stmt = $db->prepare(
						'INSERT INTO deportistas (club_id, run_numero, run_dv, nombres, apellidos, fecha_nacimiento, sexo, nacionalidad, email, telefono,
						direccion_region, direccion_comuna, disciplinas, categoria_id, rama, equipo_id, posicion, nivel, fecha_ingreso, estado,
						contacto_emergencia_nombre, contacto_emergencia_telefono, alergias, prevision, apoderado_run, apoderado_nombre,
						apoderado_contacto, apoderado_parentesco, consentimiento_datos, autorizacion_entrenamientos, documentos_adjuntos, created_at)
						VALUES (:club_id, :run_numero, :run_dv, :nombres, :apellidos, :fecha_nacimiento, :sexo, :nacionalidad, :email, :telefono,
						:region, :comuna, :disciplinas, :categoria_id, :rama, :equipo_id, :posicion, :nivel, :fecha_ingreso, :estado,
						:contacto_nombre, :contacto_telefono, :alergias, :prevision, :apoderado_run, :apoderado_nombre,
						:apoderado_contacto, :apoderado_parentesco, :consentimiento_datos, :autorizacion_entrenamientos, :documentos_adjuntos, :created_at)'
					);
					$stmt->execute([
						':club_id' => $clubId,
						':run_numero' => $runNumero,
						':run_dv' => $runDv,
						':nombres' => $nombres,
						':apellidos' => $apellidos,
						':fecha_nacimiento' => $fechaNacimiento,
						':sexo' => $sexo,
						':nacionalidad' => $nacionalidad,
						':email' => $email,
						':telefono' => $telefono,
						':region' => $region,
						':comuna' => $comuna,
						':disciplinas' => $disciplinas,
						':categoria_id' => $categoriaId,
						':rama' => $rama,
						':equipo_id' => $equipoId > 0 ? $equipoId : null,
						':posicion' => $posicion !== '' ? $posicion : null,
						':nivel' => $nivel,
						':fecha_ingreso' => $fechaIngreso,
						':estado' => $estado,
						':contacto_nombre' => $contactoNombre,
						':contacto_telefono' => $contactoTelefono,
						':alergias' => $alergias !== '' ? $alergias : null,
						':prevision' => $prevision !== '' ? $prevision : null,
						':apoderado_run' => $apoderadoRun !== '' ? $apoderadoRun : null,
						':apoderado_nombre' => $apoderadoNombre !== '' ? $apoderadoNombre : null,
						':apoderado_contacto' => $apoderadoContacto !== '' ? $apoderadoContacto : null,
						':apoderado_parentesco' => $apoderadoParentesco !== '' ? $apoderadoParentesco : null,
						':consentimiento_datos' => $consentimientoDatos,
						':autorizacion_entrenamientos' => $autorizacionEntrenamientos,
						':documentos_adjuntos' => $documentosAdjuntos !== '' ? $documentosAdjuntos : null,
						':created_at' => date('Y-m-d H:i:s'),
					]);
					$id = (int)$db->lastInsertId();
					$detalle = "Nuevo deportista {$nombres} {$apellidos}";
					$message = 'Deportista registrado.';
				}

				$hist = $db->prepare('INSERT INTO historial_deportistas (deportista_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
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
				$stmt = $db->prepare('SELECT nombres, apellidos, estado FROM deportistas WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$deportista = $stmt->fetch();
				if ($deportista) {
					$nuevoEstado = ($deportista['estado'] ?? 'activo') === 'activo' ? 'suspendido' : 'activo';
					$update = $db->prepare('UPDATE deportistas SET estado = :estado WHERE id = :id');
					$update->execute([':estado' => $nuevoEstado, ':id' => $id]);
					$hist = $db->prepare('INSERT INTO historial_deportistas (deportista_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => $nuevoEstado === 'activo' ? 'activar' : 'suspender',
						':detalle' => "Estado {$nuevoEstado} para {$deportista['nombres']} {$deportista['apellidos']}",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
					$message = 'Estado actualizado.';
				}
			}
		} elseif ($action === 'delete') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombres, apellidos FROM deportistas WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$deportista = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM deportistas WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Deportista eliminado.';
				if ($deportista) {
					$hist = $db->prepare('INSERT INTO historial_deportistas (deportista_id, accion, detalle, usuario, fecha) VALUES (:id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':id' => $id,
						':accion' => 'eliminar',
						':detalle' => "Deportista {$deportista['nombres']} {$deportista['apellidos']} eliminado",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		}

		header('Location: registrar-deportistas.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
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
						<h3 class="mb-1 font-w600 main-text">Registrar deportistas</h3>
						<p>Identificación, contacto, datos deportivos y salud.</p>
					</div>
				</div>
				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="card mb-4">
					<div class="card-body">
						<h5 class="mb-3">Ficha del deportista</h5>
						<form method="post">
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="id" value="<?php echo htmlspecialchars($editDeportista['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
							<h6>Identificación</h6>
							<div class="row">
								<div class="col-lg-8 mb-3">
											<label class="form-label">Club</label>
											<select class="form-control" name="club_id" id="clubSelector" required>
												<option value="">Selecciona</option>
												<?php foreach ($clubes as $club) { ?>
													<option value="<?php echo (int)$club['id']; ?>" <?php echo ((int)($editDeportista['club_id'] ?? 0) === (int)$club['id']) ? 'selected' : ''; ?>>
														<?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
													</option>
												<?php } ?>
											</select>
										</div>
								<div class="col-lg-4 mb-3">
											<label class="form-label">RUN</label>
											<input type="text" class="form-control" name="run_numero" inputmode="numeric" value="<?php echo htmlspecialchars($editDeportista['run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-2 mb-3">
											<label class="form-label">DV</label>
											<input type="text" class="form-control" name="run_dv" value="<?php echo htmlspecialchars($editDeportista['run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Nombres</label>
											<input type="text" class="form-control" name="nombres" value="<?php echo htmlspecialchars($editDeportista['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Apellidos</label>
											<input type="text" class="form-control" name="apellidos" value="<?php echo htmlspecialchars($editDeportista['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Fecha nacimiento</label>
											<input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo htmlspecialchars($editDeportista['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Sexo</label>
											<select class="form-control" name="sexo" required>
												<?php $sexoActual = $editDeportista['sexo'] ?? ''; ?>
												<option value="">Selecciona</option>
												<option value="Masculino" <?php echo $sexoActual === 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
												<option value="Femenino" <?php echo $sexoActual === 'Femenino' ? 'selected' : ''; ?>>Femenino</option>
												<option value="Otro" <?php echo $sexoActual === 'Otro' ? 'selected' : ''; ?>>Otro</option>
												<?php if ($sexoActual !== '' && !in_array($sexoActual, ['Masculino', 'Femenino', 'Otro'], true)) { ?>
													<option value="<?php echo htmlspecialchars($sexoActual, ENT_QUOTES, 'UTF-8'); ?>" selected><?php echo htmlspecialchars($sexoActual, ENT_QUOTES, 'UTF-8'); ?></option>
												<?php } ?>
											</select>
										</div>
								<div class="col-lg-12 mb-3">
											<label class="form-label">Nacionalidad</label>
											<input type="text" class="form-control" name="nacionalidad" value="<?php echo htmlspecialchars($editDeportista['nacionalidad'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<h6>Contacto</h6>
									<div class="row">
								<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($editDeportista['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Teléfono</label>
											<input type="tel" class="form-control" name="telefono" value="<?php echo htmlspecialchars($editDeportista['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Región</label>
											<input type="text" class="form-control" name="direccion_region" value="<?php echo htmlspecialchars($editDeportista['direccion_region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Comuna</label>
											<input type="text" class="form-control" name="direccion_comuna" value="<?php echo htmlspecialchars($editDeportista['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

							<h6>Datos deportivos</h6>
							<div class="row">
								<div class="col-lg-12 mb-3">
											<label class="form-label">Disciplina(s)</label>
											<input type="text" class="form-control" name="disciplinas" value="<?php echo htmlspecialchars($editDeportista['disciplinas'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Categoría / Serie</label>
											<select class="form-control" name="categoria_id" id="categoriaSelector" required>
												<option value="">Selecciona</option>
												<?php foreach ($categorias as $categoria) { ?>
													<option value="<?php echo (int)$categoria['id']; ?>" data-club="<?php echo (int)$categoria['club_id']; ?>" <?php echo ((int)($editDeportista['categoria_id'] ?? 0) === (int)$categoria['id']) ? 'selected' : ''; ?>>
														<?php echo htmlspecialchars($categoria['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
													</option>
												<?php } ?>
											</select>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Rama</label>
											<input type="text" class="form-control" name="rama" value="<?php echo htmlspecialchars($editDeportista['rama'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Equipo asignado</label>
											<select class="form-control" name="equipo_id" id="equipoSelector">
												<option value="">Sin equipo</option>
												<?php foreach ($equipos as $equipo) { ?>
													<option value="<?php echo (int)$equipo['id']; ?>" data-club="<?php echo (int)$equipo['club_id']; ?>" <?php echo ((int)($editDeportista['equipo_id'] ?? 0) === (int)$equipo['id']) ? 'selected' : ''; ?>>
														<?php echo htmlspecialchars($equipo['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
													</option>
												<?php } ?>
											</select>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Posición</label>
											<input type="text" class="form-control" name="posicion" value="<?php echo htmlspecialchars($editDeportista['posicion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Nivel</label>
											<input type="text" class="form-control" name="nivel" value="<?php echo htmlspecialchars($editDeportista['nivel'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Fecha ingreso</label>
											<input type="date" class="form-control" name="fecha_ingreso" value="<?php echo htmlspecialchars($editDeportista['fecha_ingreso'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-12 mb-3">
											<label class="form-label">Estado</label>
											<select class="form-control" name="estado">
												<?php $estadoDep = $editDeportista['estado'] ?? 'activo'; ?>
												<option value="activo" <?php echo $estadoDep === 'activo' ? 'selected' : ''; ?>>Activo</option>
												<option value="suspendido" <?php echo $estadoDep === 'suspendido' ? 'selected' : ''; ?>>Suspendido</option>
												<option value="retirado" <?php echo $estadoDep === 'retirado' ? 'selected' : ''; ?>>Retirado</option>
											</select>
										</div>
									</div>

							<h6>Salud y emergencia</h6>
							<div class="row">
								<div class="col-lg-6 mb-3">
											<label class="form-label">Contacto emergencia</label>
											<input type="text" class="form-control" name="contacto_emergencia_nombre" value="<?php echo htmlspecialchars($editDeportista['contacto_emergencia_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Teléfono emergencia</label>
											<input type="tel" class="form-control" name="contacto_emergencia_telefono" value="<?php echo htmlspecialchars($editDeportista['contacto_emergencia_telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
								<div class="col-lg-12 mb-3">
											<label class="form-label">Alergias/condiciones</label>
											<textarea class="form-control" name="alergias" rows="2"><?php echo htmlspecialchars($editDeportista['alergias'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
										</div>
								<div class="col-lg-12 mb-3">
											<label class="form-label">Previsión (Fonasa/Isapre)</label>
											<input type="text" class="form-control" name="prevision" value="<?php echo htmlspecialchars($editDeportista['prevision'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
									</div>

							<h6>Menores de edad</h6>
							<div class="row">
								<div class="col-lg-6 mb-3">
											<label class="form-label">RUN apoderado</label>
											<input type="text" class="form-control" name="apoderado_run" value="<?php echo htmlspecialchars($editDeportista['apoderado_run'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Nombre apoderado</label>
											<input type="text" class="form-control" name="apoderado_nombre" value="<?php echo htmlspecialchars($editDeportista['apoderado_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Contacto apoderado</label>
											<input type="tel" class="form-control" name="apoderado_contacto" value="<?php echo htmlspecialchars($editDeportista['apoderado_contacto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
								<div class="col-lg-6 mb-3">
											<label class="form-label">Parentesco</label>
											<input type="text" class="form-control" name="apoderado_parentesco" value="<?php echo htmlspecialchars($editDeportista['apoderado_parentesco'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
									</div>

							<h6>Autorizaciones</h6>
							<div class="row">
								<div class="col-lg-6 mb-3">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="consentimiento_datos" id="consentimientoDatos" <?php echo !empty($editDeportista['consentimiento_datos']) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="consentimientoDatos">Consentimiento datos</label>
											</div>
										</div>
								<div class="col-lg-6 mb-3">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="autorizacion_entrenamientos" id="autorizacionEntrenamientos" <?php echo !empty($editDeportista['autorizacion_entrenamientos']) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="autorizacionEntrenamientos">Autorización entrenamientos/traslados</label>
											</div>
										</div>
								<div class="col-lg-12 mb-3">
											<label class="form-label">Documentos adjuntos</label>
											<textarea class="form-control" name="documentos_adjuntos" rows="2"><?php echo htmlspecialchars($editDeportista['documentos_adjuntos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
										</div>
									</div>

							<button type="submit" class="btn btn-primary">Guardar deportista</button>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Deportistas registrados</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>RUN</th>
										<th>Club</th>
										<th>Disciplina</th>
										<th>Categoría</th>
										<th>Equipo</th>
										<th>Rama</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($deportistas as $deportista) { ?>
										<tr>
											<td><?php echo htmlspecialchars($deportista['nombres'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($deportista['apellidos'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(($deportista['run_numero'] ?? '') . '-' . ($deportista['run_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['club_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['disciplinas'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['categoria_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['equipo_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['rama'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($deportista['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<div class="d-flex gap-2">
													<a class="btn btn-warning btn-sm" href="registrar-deportistas.php?edit=<?php echo (int)$deportista['id']; ?>">Editar</a>
													<form method="post">
														<input type="hidden" name="action" value="toggle">
														<input type="hidden" name="id" value="<?php echo (int)$deportista['id']; ?>">
														<button type="submit" class="btn btn-sm <?php echo ($deportista['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
															<?php echo ($deportista['estado'] ?? 'activo') === 'activo' ? 'Suspender' : 'Activar'; ?>
														</button>
													</form>
													<form method="post">
														<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?php echo (int)$deportista['id']; ?>">
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
	<script>
		const clubSelector = document.getElementById('clubSelector');
		const categoriaSelector = document.getElementById('categoriaSelector');
		const equipoSelector = document.getElementById('equipoSelector');

		function filterOptions(select, clubId) {
			if (!select) {
				return;
			}
			Array.from(select.options).forEach((option) => {
				if (!option.dataset.club) {
					option.hidden = false;
					return;
				}
				option.hidden = clubId && option.dataset.club !== clubId;
			});
			if (select.value && select.selectedOptions[0]?.hidden) {
				select.value = '';
			}
		}

		function handleClubChange() {
			const clubId = clubSelector?.value ?? '';
			filterOptions(categoriaSelector, clubId);
			filterOptions(equipoSelector, clubId);
		}

		if (clubSelector) {
			clubSelector.addEventListener('change', handleClubChange);
			handleClubChange();
		}
	</script>
</body>
</html>
