<?php
	require_once __DIR__ . '/config/dz.php';
	require_once __DIR__ . '/config/permissions.php';
	require_once __DIR__ . '/config/users.php';

	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();
	$usuarioActual = gesclub_current_username();
	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$clubes = $db->query('SELECT * FROM clubes ORDER BY id DESC')->fetchAll() ?: [];
	$sedes = $db->query('SELECT s.*, c.nombre_oficial FROM club_sedes s JOIN clubes c ON c.id = s.club_id ORDER BY s.id DESC')->fetchAll() ?: [];
	$documentos = $db->query('SELECT d.*, c.nombre_oficial FROM club_documentos d JOIN clubes c ON c.id = d.club_id ORDER BY d.id DESC')->fetchAll() ?: [];
	$historial = $db->query('SELECT h.*, c.nombre_oficial FROM historial_clubes h JOIN clubes c ON c.id = h.club_id ORDER BY h.id DESC')->fetchAll() ?: [];

	$editId = (int)($_GET['edit'] ?? 0);
	$editClub = null;
	if ($editId > 0) {
		$stmt = $db->prepare('SELECT * FROM clubes WHERE id = :id');
		$stmt->execute([':id' => $editId]);
		$editClub = $stmt->fetch();
	}

	$editSedeId = (int)($_GET['edit_sede'] ?? 0);
	$editSede = null;
	if ($editSedeId > 0) {
		$stmt = $db->prepare('SELECT * FROM club_sedes WHERE id = :id');
		$stmt->execute([':id' => $editSedeId]);
		$editSede = $stmt->fetch();
	}

	$editDocId = (int)($_GET['edit_doc'] ?? 0);
	$editDoc = null;
	if ($editDocId > 0) {
		$stmt = $db->prepare('SELECT * FROM club_documentos WHERE id = :id');
		$stmt->execute([':id' => $editDocId]);
		$editDoc = $stmt->fetch();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';

		if ($action === 'save') {
			$id = (int)($_POST['id'] ?? 0);
			$isUpdate = $id > 0;
			$nombreOficial = trim($_POST['nombre_oficial'] ?? '');
			$nombreFantasia = trim($_POST['nombre_fantasia'] ?? '');
			$rutNumero = trim($_POST['rut_numero'] ?? '');
			$rutDv = trim($_POST['rut_dv'] ?? '');
			$tipoOrganizacion = trim($_POST['tipo_organizacion'] ?? '');
			$region = trim($_POST['direccion_region'] ?? '');
			$comuna = trim($_POST['direccion_comuna'] ?? '');
			$calle = trim($_POST['direccion_calle'] ?? '');
			$numero = trim($_POST['direccion_numero'] ?? '');
			$email = trim($_POST['email'] ?? '');
			$telefono = trim($_POST['telefono'] ?? '');
			$fechaFundacion = $_POST['fecha_fundacion'] ?? '';
			$estado = $_POST['estado'] ?? 'activo';
			$repRunNumero = trim($_POST['representante_run_numero'] ?? '');
			$repRunDv = trim($_POST['representante_run_dv'] ?? '');
			$repNombre = trim($_POST['representante_nombre'] ?? '');
			$repEmail = trim($_POST['representante_email'] ?? '');
			$repTelefono = trim($_POST['representante_telefono'] ?? '');

			$required = [$nombreOficial, $tipoOrganizacion, $region, $comuna, $calle, $numero, $email, $telefono, $fechaFundacion, $repRunNumero, $repRunDv, $repNombre, $repEmail, $repTelefono];
			foreach ($required as $value) {
				if ($value === '') {
					$message = 'Completa los campos obligatorios del club.';
					$messageType = 'error';
					break;
				}
			}

			if ($messageType !== 'error' && ($rutNumero !== '' || $rutDv !== '')) {
				if (!gesclub_validate_rut($rutNumero, $rutDv)) {
					$message = 'El RUT del club no es válido.';
					$messageType = 'error';
				}
			}

			if ($messageType !== 'error' && !gesclub_validate_rut($repRunNumero, $repRunDv)) {
				$message = 'El RUN del representante legal no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message = 'El correo del club no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error' && !filter_var($repEmail, FILTER_VALIDATE_EMAIL)) {
				$message = 'El correo del representante no es válido.';
				$messageType = 'error';
			}

			if ($messageType !== 'error') {
				if ($isUpdate) {
					$stmt = $db->prepare(
						'UPDATE clubes SET nombre_oficial = :nombre_oficial, nombre_fantasia = :nombre_fantasia, rut_numero = :rut_numero, rut_dv = :rut_dv,
						tipo_organizacion = :tipo_organizacion, direccion_region = :direccion_region, direccion_comuna = :direccion_comuna,
						direccion_calle = :direccion_calle, direccion_numero = :direccion_numero, email = :email, telefono = :telefono,
						fecha_fundacion = :fecha_fundacion, estado = :estado, representante_run_numero = :rep_run_numero,
						representante_run_dv = :rep_run_dv, representante_nombre = :rep_nombre, representante_email = :rep_email,
						representante_telefono = :rep_telefono
						WHERE id = :id'
					);
					$stmt->execute([
						':id' => $id,
						':nombre_oficial' => $nombreOficial,
						':nombre_fantasia' => $nombreFantasia !== '' ? $nombreFantasia : null,
						':rut_numero' => $rutNumero !== '' ? $rutNumero : null,
						':rut_dv' => $rutDv !== '' ? $rutDv : null,
						':tipo_organizacion' => $tipoOrganizacion,
						':direccion_region' => $region,
						':direccion_comuna' => $comuna,
						':direccion_calle' => $calle,
						':direccion_numero' => $numero,
						':email' => $email,
						':telefono' => $telefono,
						':fecha_fundacion' => $fechaFundacion,
						':estado' => $estado,
						':rep_run_numero' => $repRunNumero,
						':rep_run_dv' => $repRunDv,
						':rep_nombre' => $repNombre,
						':rep_email' => $repEmail,
						':rep_telefono' => $repTelefono,
					]);
					$detalle = "Actualización club {$nombreOficial}";
					$message = 'Club actualizado con éxito.';
				} else {
					$stmt = $db->prepare(
						'INSERT INTO clubes (nombre_oficial, nombre_fantasia, rut_numero, rut_dv, tipo_organizacion, direccion_region, direccion_comuna,
						direccion_calle, direccion_numero, email, telefono, fecha_fundacion, estado, representante_run_numero, representante_run_dv,
						representante_nombre, representante_email, representante_telefono, created_at)
						VALUES (:nombre_oficial, :nombre_fantasia, :rut_numero, :rut_dv, :tipo_organizacion, :direccion_region, :direccion_comuna,
						:direccion_calle, :direccion_numero, :email, :telefono, :fecha_fundacion, :estado, :rep_run_numero, :rep_run_dv,
						:rep_nombre, :rep_email, :rep_telefono, :created_at)'
					);
					$stmt->execute([
						':nombre_oficial' => $nombreOficial,
						':nombre_fantasia' => $nombreFantasia !== '' ? $nombreFantasia : null,
						':rut_numero' => $rutNumero !== '' ? $rutNumero : null,
						':rut_dv' => $rutDv !== '' ? $rutDv : null,
						':tipo_organizacion' => $tipoOrganizacion,
						':direccion_region' => $region,
						':direccion_comuna' => $comuna,
						':direccion_calle' => $calle,
						':direccion_numero' => $numero,
						':email' => $email,
						':telefono' => $telefono,
						':fecha_fundacion' => $fechaFundacion,
						':estado' => $estado,
						':rep_run_numero' => $repRunNumero,
						':rep_run_dv' => $repRunDv,
						':rep_nombre' => $repNombre,
						':rep_email' => $repEmail,
						':rep_telefono' => $repTelefono,
						':created_at' => date('Y-m-d H:i:s'),
					]);
					$id = (int)$db->lastInsertId();
					$detalle = "Nuevo club {$nombreOficial}";
					$message = 'Club registrado con éxito.';
				}

				$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
				$hist->execute([
					':club_id' => $id,
					':accion' => $isUpdate ? 'actualizar' : 'crear',
					':detalle' => $detalle,
					':usuario' => $usuarioActual,
					':fecha' => date('Y-m-d H:i:s'),
				]);
			}
		} elseif ($action === 'toggle') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombre_oficial, estado FROM clubes WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$club = $stmt->fetch();
				if ($club) {
					$nuevoEstado = ($club['estado'] ?? 'activo') === 'activo' ? 'inactivo' : 'activo';
					$update = $db->prepare('UPDATE clubes SET estado = :estado WHERE id = :id');
					$update->execute([':estado' => $nuevoEstado, ':id' => $id]);
					$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':club_id' => $id,
						':accion' => $nuevoEstado === 'activo' ? 'activar' : 'desactivar',
						':detalle' => "Club {$club['nombre_oficial']} {$nuevoEstado}",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
					$message = $nuevoEstado === 'activo' ? 'Club activado.' : 'Club desactivado.';
				}
			}
		} elseif ($action === 'delete') {
			$id = (int)($_POST['id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombre_oficial FROM clubes WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$club = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM clubes WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Club eliminado.';
				if ($club) {
					$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':club_id' => $id,
						':accion' => 'eliminar',
						':detalle' => "Club {$club['nombre_oficial']} eliminado",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		} elseif ($action === 'save_sede') {
			$id = (int)($_POST['sede_id'] ?? 0);
			$clubId = (int)($_POST['club_id'] ?? 0);
			$nombre = trim($_POST['sede_nombre'] ?? '');
			$region = trim($_POST['sede_region'] ?? '');
			$comuna = trim($_POST['sede_comuna'] ?? '');
			$calle = trim($_POST['sede_calle'] ?? '');
			$numero = trim($_POST['sede_numero'] ?? '');
			$tipo = trim($_POST['sede_tipo'] ?? '');
			$horarios = trim($_POST['sede_horarios'] ?? '');
			$capacidad = $_POST['sede_capacidad'] !== '' ? (int)$_POST['sede_capacidad'] : null;
			$estado = $_POST['sede_estado'] ?? 'activo';

			if ($clubId === 0 || $nombre === '' || $region === '' || $comuna === '' || $calle === '' || $numero === '' || $tipo === '' || $horarios === '') {
				$message = 'Completa los campos obligatorios de la sede.';
				$messageType = 'error';
			} else {
				if ($id > 0) {
					$stmt = $db->prepare(
						'UPDATE club_sedes SET club_id = :club_id, nombre = :nombre, direccion_region = :region, direccion_comuna = :comuna,
						direccion_calle = :calle, direccion_numero = :numero, tipo = :tipo, horarios = :horarios, capacidad = :capacidad, estado = :estado
						WHERE id = :id'
					);
					$stmt->execute([
						':id' => $id,
						':club_id' => $clubId,
						':nombre' => $nombre,
						':region' => $region,
						':comuna' => $comuna,
						':calle' => $calle,
						':numero' => $numero,
						':tipo' => $tipo,
						':horarios' => $horarios,
						':capacidad' => $capacidad,
						':estado' => $estado,
					]);
					$detalle = "Sede {$nombre} actualizada";
					$message = 'Sede actualizada.';
				} else {
					$stmt = $db->prepare(
						'INSERT INTO club_sedes (club_id, nombre, direccion_region, direccion_comuna, direccion_calle, direccion_numero, tipo, horarios, capacidad, estado)
						VALUES (:club_id, :nombre, :region, :comuna, :calle, :numero, :tipo, :horarios, :capacidad, :estado)'
					);
					$stmt->execute([
						':club_id' => $clubId,
						':nombre' => $nombre,
						':region' => $region,
						':comuna' => $comuna,
						':calle' => $calle,
						':numero' => $numero,
						':tipo' => $tipo,
						':horarios' => $horarios,
						':capacidad' => $capacidad,
						':estado' => $estado,
					]);
					$detalle = "Sede {$nombre} creada";
					$message = 'Sede registrada.';
				}
				$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
				$hist->execute([
					':club_id' => $clubId,
					':accion' => $id > 0 ? 'actualizar_sede' : 'crear_sede',
					':detalle' => $detalle,
					':usuario' => $usuarioActual,
					':fecha' => date('Y-m-d H:i:s'),
				]);
			}
		} elseif ($action === 'delete_sede') {
			$id = (int)($_POST['sede_id'] ?? 0);
			$clubId = (int)($_POST['club_id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT nombre FROM club_sedes WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$sede = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM club_sedes WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Sede eliminada.';
				if ($clubId > 0 && $sede) {
					$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':club_id' => $clubId,
						':accion' => 'eliminar_sede',
						':detalle' => "Sede {$sede['nombre']} eliminada",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		} elseif ($action === 'save_doc') {
			$id = (int)($_POST['doc_id'] ?? 0);
			$clubId = (int)($_POST['doc_club_id'] ?? 0);
			$tipo = trim($_POST['doc_tipo'] ?? '');
			$nombreArchivo = trim($_POST['doc_nombre'] ?? '');
			$ruta = trim($_POST['doc_ruta'] ?? '');

			if (!empty($_FILES['doc_file']['name'])) {
				$uploadDir = __DIR__ . '/uploads/clubes';
				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0775, true);
				}
				$basename = basename($_FILES['doc_file']['name']);
				$destino = $uploadDir . '/' . time() . '-' . $basename;
				if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $destino)) {
					$nombreArchivo = $basename;
					$ruta = 'uploads/clubes/' . basename($destino);
				}
			}

			if ($clubId === 0 || $tipo === '' || $nombreArchivo === '' || $ruta === '') {
				$message = 'Completa los campos obligatorios del documento.';
				$messageType = 'error';
			} else {
				if ($id > 0) {
					$stmt = $db->prepare('UPDATE club_documentos SET club_id = :club_id, tipo = :tipo, nombre_archivo = :nombre, ruta = :ruta WHERE id = :id');
					$stmt->execute([
						':id' => $id,
						':club_id' => $clubId,
						':tipo' => $tipo,
						':nombre' => $nombreArchivo,
						':ruta' => $ruta,
					]);
					$detalle = "Documento {$tipo} actualizado";
					$message = 'Documento actualizado.';
				} else {
					$stmt = $db->prepare('INSERT INTO club_documentos (club_id, tipo, nombre_archivo, ruta, created_at) VALUES (:club_id, :tipo, :nombre, :ruta, :created_at)');
					$stmt->execute([
						':club_id' => $clubId,
						':tipo' => $tipo,
						':nombre' => $nombreArchivo,
						':ruta' => $ruta,
						':created_at' => date('Y-m-d H:i:s'),
					]);
					$detalle = "Documento {$tipo} creado";
					$message = 'Documento registrado.';
				}
				$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
				$hist->execute([
					':club_id' => $clubId,
					':accion' => $id > 0 ? 'actualizar_doc' : 'crear_doc',
					':detalle' => $detalle,
					':usuario' => $usuarioActual,
					':fecha' => date('Y-m-d H:i:s'),
				]);
			}
		} elseif ($action === 'delete_doc') {
			$id = (int)($_POST['doc_id'] ?? 0);
			$clubId = (int)($_POST['doc_club_id'] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare('SELECT tipo FROM club_documentos WHERE id = :id');
				$stmt->execute([':id' => $id]);
				$doc = $stmt->fetch();
				$delete = $db->prepare('DELETE FROM club_documentos WHERE id = :id');
				$delete->execute([':id' => $id]);
				$message = 'Documento eliminado.';
				if ($clubId > 0 && $doc) {
					$hist = $db->prepare('INSERT INTO historial_clubes (club_id, accion, detalle, usuario, fecha) VALUES (:club_id, :accion, :detalle, :usuario, :fecha)');
					$hist->execute([
						':club_id' => $clubId,
						':accion' => 'eliminar_doc',
						':detalle' => "Documento {$doc['tipo']} eliminado",
						':usuario' => $usuarioActual,
						':fecha' => date('Y-m-d H:i:s'),
					]);
				}
			}
		}

		header('Location: registrar-club.php?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType));
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
						<h3 class="mb-1 font-w600 main-text">Registrar club</h3>
						<p>Gestión legal, administrativa y operativa del club.</p>
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
								<h5 class="mb-3">Datos legales y administrativos</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($editClub['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Nombre oficial</label>
										<input type="text" class="form-control" name="nombre_oficial" value="<?php echo htmlspecialchars($editClub['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre de fantasía</label>
										<input type="text" class="form-control" name="nombre_fantasia" value="<?php echo htmlspecialchars($editClub['nombre_fantasia'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="row">
										<div class="col-lg-8 mb-3">
											<label class="form-label">RUT club</label>
											<input type="text" class="form-control" name="rut_numero" value="<?php echo htmlspecialchars($editClub['rut_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">DV</label>
											<input type="text" class="form-control" name="rut_dv" value="<?php echo htmlspecialchars($editClub['rut_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Tipo de organización</label>
										<input type="text" class="form-control" name="tipo_organizacion" value="<?php echo htmlspecialchars($editClub['tipo_organizacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>

									<h6 class="mt-3">Dirección</h6>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Región</label>
											<input type="text" class="form-control" name="direccion_region" value="<?php echo htmlspecialchars($editClub['direccion_region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Comuna</label>
											<input type="text" class="form-control" name="direccion_comuna" value="<?php echo htmlspecialchars($editClub['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-8 mb-3">
											<label class="form-label">Calle</label>
											<input type="text" class="form-control" name="direccion_calle" value="<?php echo htmlspecialchars($editClub['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">Número</label>
											<input type="text" class="form-control" name="direccion_numero" value="<?php echo htmlspecialchars($editClub['direccion_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($editClub['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Teléfono</label>
											<input type="text" class="form-control" name="telefono" value="<?php echo htmlspecialchars($editClub['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Fecha de fundación</label>
											<input type="date" class="form-control" name="fecha_fundacion" value="<?php echo htmlspecialchars($editClub['fecha_fundacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Estado</label>
											<select class="form-control" name="estado">
												<?php $estadoClub = $editClub['estado'] ?? 'activo'; ?>
												<option value="activo" <?php echo $estadoClub === 'activo' ? 'selected' : ''; ?>>Activo</option>
												<option value="inactivo" <?php echo $estadoClub === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
											</select>
										</div>
									</div>

									<h6 class="mt-3">Representante legal</h6>
									<div class="row">
										<div class="col-lg-8 mb-3">
											<label class="form-label">RUN</label>
											<input type="text" class="form-control" name="representante_run_numero" value="<?php echo htmlspecialchars($editClub['representante_run_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">DV</label>
											<input type="text" class="form-control" name="representante_run_dv" value="<?php echo htmlspecialchars($editClub['representante_run_dv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-12 mb-3">
											<label class="form-label">Nombre</label>
											<input type="text" class="form-control" name="representante_nombre" value="<?php echo htmlspecialchars($editClub['representante_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="representante_email" value="<?php echo htmlspecialchars($editClub['representante_email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Teléfono</label>
											<input type="text" class="form-control" name="representante_telefono" value="<?php echo htmlspecialchars($editClub['representante_telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>

									<button type="submit" class="btn btn-primary">Guardar club</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-7">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Clubes registrados</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Club</th>
												<th>RUT</th>
												<th>Tipo</th>
												<th>Estado</th>
												<th>Contacto</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($clubes as $club) { ?>
												<tr>
													<td><?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars(($club['rut_numero'] ?? '') . '-' . ($club['rut_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($club['tipo_organizacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($club['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div><?php echo htmlspecialchars($club['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
														<div><?php echo htmlspecialchars($club['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
													</td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="registrar-club.php?edit=<?php echo (int)$club['id']; ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="toggle">
																<input type="hidden" name="id" value="<?php echo (int)$club['id']; ?>">
																<button type="submit" class="btn btn-sm <?php echo ($club['estado'] ?? 'activo') === 'activo' ? 'btn-info' : 'btn-success'; ?>">
																	<?php echo ($club['estado'] ?? 'activo') === 'activo' ? 'Desactivar' : 'Activar'; ?>
																</button>
															</form>
															<form method="post">
																<input type="hidden" name="action" value="delete">
																<input type="hidden" name="id" value="<?php echo (int)$club['id']; ?>">
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

				<div class="row">
					<div class="col-xl-5">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Sedes / instalaciones</h5>
								<form method="post">
									<input type="hidden" name="action" value="save_sede">
									<input type="hidden" name="sede_id" value="<?php echo htmlspecialchars($editSede['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Club</label>
										<select class="form-control" name="club_id" required>
											<option value="">Selecciona</option>
											<?php foreach ($clubes as $club) { ?>
												<option value="<?php echo (int)$club['id']; ?>" <?php echo ((int)($editSede['club_id'] ?? 0) === (int)$club['id']) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre sede</label>
										<input type="text" class="form-control" name="sede_nombre" value="<?php echo htmlspecialchars($editSede['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
									</div>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Región</label>
											<input type="text" class="form-control" name="sede_region" value="<?php echo htmlspecialchars($editSede['direccion_region'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Comuna</label>
											<input type="text" class="form-control" name="sede_comuna" value="<?php echo htmlspecialchars($editSede['direccion_comuna'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-8 mb-3">
											<label class="form-label">Calle</label>
											<input type="text" class="form-control" name="sede_calle" value="<?php echo htmlspecialchars($editSede['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-4 mb-3">
											<label class="form-label">Número</label>
											<input type="text" class="form-control" name="sede_numero" value="<?php echo htmlspecialchars($editSede['direccion_numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Tipo</label>
											<input type="text" class="form-control" name="sede_tipo" value="<?php echo htmlspecialchars($editSede['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Horarios</label>
											<input type="text" class="form-control" name="sede_horarios" value="<?php echo htmlspecialchars($editSede['horarios'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Capacidad</label>
											<input type="number" class="form-control" name="sede_capacidad" value="<?php echo htmlspecialchars($editSede['capacidad'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Estado</label>
											<select class="form-control" name="sede_estado">
												<?php $estadoSede = $editSede['estado'] ?? 'activo'; ?>
												<option value="activo" <?php echo $estadoSede === 'activo' ? 'selected' : ''; ?>>Activo</option>
												<option value="inactivo" <?php echo $estadoSede === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Guardar sede</button>
								</form>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Documentos del club</h5>
								<form method="post" enctype="multipart/form-data">
									<input type="hidden" name="action" value="save_doc">
									<input type="hidden" name="doc_id" value="<?php echo htmlspecialchars($editDoc['id'] ?? 0, ENT_QUOTES, 'UTF-8'); ?>">
									<div class="mb-3">
										<label class="form-label">Club</label>
										<select class="form-control" name="doc_club_id" required>
											<option value="">Selecciona</option>
											<?php foreach ($clubes as $club) { ?>
												<option value="<?php echo (int)$club['id']; ?>" <?php echo ((int)($editDoc['club_id'] ?? 0) === (int)$club['id']) ? 'selected' : ''; ?>>
													<?php echo htmlspecialchars($club['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Tipo documento</label>
										<select class="form-control" name="doc_tipo" required>
											<?php $docTipo = $editDoc['tipo'] ?? ''; ?>
											<option value="">Selecciona</option>
											<option value="estatutos" <?php echo $docTipo === 'estatutos' ? 'selected' : ''; ?>>Estatutos</option>
											<option value="personalidad_juridica" <?php echo $docTipo === 'personalidad_juridica' ? 'selected' : ''; ?>>Personalidad jurídica</option>
											<option value="certificados" <?php echo $docTipo === 'certificados' ? 'selected' : ''; ?>>Certificados</option>
											<option value="actas" <?php echo $docTipo === 'actas' ? 'selected' : ''; ?>>Actas</option>
											<option value="logo" <?php echo $docTipo === 'logo' ? 'selected' : ''; ?>>Logo</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">Archivo (PDF/imagen)</label>
										<input type="file" class="form-control" name="doc_file">
									</div>
									<div class="mb-3">
										<label class="form-label">Nombre archivo</label>
										<input type="text" class="form-control" name="doc_nombre" value="<?php echo htmlspecialchars($editDoc['nombre_archivo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Ruta / enlace</label>
										<input type="text" class="form-control" name="doc_ruta" value="<?php echo htmlspecialchars($editDoc['ruta'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
									</div>
									<button type="submit" class="btn btn-primary">Guardar documento</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-7">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Sedes registradas</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Club</th>
												<th>Nombre</th>
												<th>Dirección</th>
												<th>Tipo</th>
												<th>Horario</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($sedes as $sede) { ?>
												<tr>
													<td><?php echo htmlspecialchars($sede['nombre_oficial'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($sede['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<?php echo htmlspecialchars($sede['direccion_calle'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
														<?php echo htmlspecialchars(' ' . ($sede['direccion_numero'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
													</td>
													<td><?php echo htmlspecialchars($sede['tipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($sede['horarios'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($sede['estado'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="registrar-club.php?edit_sede=<?php echo (int)$sede['id']; ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="delete_sede">
																<input type="hidden" name="sede_id" value="<?php echo (int)$sede['id']; ?>">
																<input type="hidden" name="club_id" value="<?php echo (int)$sede['club_id']; ?>">
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
								<h5 class="mb-3">Documentos cargados</h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Club</th>
												<th>Tipo</th>
												<th>Archivo</th>
												<th>Acciones</th>
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
													<td>
														<div class="d-flex gap-2">
															<a class="btn btn-warning btn-sm" href="registrar-club.php?edit_doc=<?php echo (int)$doc['id']; ?>">Editar</a>
															<form method="post">
																<input type="hidden" name="action" value="delete_doc">
																<input type="hidden" name="doc_id" value="<?php echo (int)$doc['id']; ?>">
																<input type="hidden" name="doc_club_id" value="<?php echo (int)$doc['club_id']; ?>">
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
								<h5 class="mb-3">Historial de cambios</h5>
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
											<?php foreach ($historial as $item) { ?>
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
					</div>
				</div>
			</div>
		</div>
		<?php include 'elements/footer.php'; ?>
	</div>
	<?php include 'elements/page-js.php'; ?>
</body>
</html>
