<?php
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/auth.php';
	 require_once __DIR__ . '/config/users.php';

	 if (!gesclub_is_admin()) {
	 	header('Location: index.php');
	 	exit;
	 }

	 $actionMessage = '';
	 $actionType = 'success';
	 $usuarioActual = gesclub_current_username();

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$action = trim($_POST['action'] ?? '');
	 	$userId = (int)($_POST['id'] ?? 0);
		$existingUser = $userId > 0 ? gesclub_load_user_profile($userId) : null;

		if ($action === 'save') {
			if (!empty($_FILES['foto']['name'])) {
				$uploadDir = __DIR__ . '/uploads/usuarios';
				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0775, true);
				}
				$basename = basename($_FILES['foto']['name']);
				$destino = $uploadDir . '/' . time() . '-' . $basename;
				if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
					$_POST['foto'] = 'uploads/usuarios/' . basename($destino);
				}
			}

	 	if ($action === 'delete' && $userId > 0) {
	 		if (gesclub_delete_user($userId, $usuarioActual)) {
	 			$actionMessage = 'Usuario eliminado.';
	 		} else {
	 			$actionMessage = 'No se pudo eliminar el usuario.';
	 			$actionType = 'error';
	 		}
	 	}

	 	if ($actionMessage !== '') {
	 		header('Location: admin-users.php?msg=' . urlencode($actionMessage) . '&msg_type=' . urlencode($actionType));
	 		exit;
	 	}
	 }

	 $users = gesclub_load_user_profiles();
	 $message = $_GET['msg'] ?? '';
	 $messageType = $_GET['msg_type'] ?? 'success';
	 $editId = (int)($_GET['edit'] ?? 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'].' | ' : '' ; echo $DexignZoneSettings['site_level']['site_title'] ?></title>

	<?php include 'elements/meta.php';?>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include 'elements/page-css.php'; ?>

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
	<?php include 'elements/preloader.php'; ?>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
			<?php include 'elements/nav-header.php'; ?>

        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<?php include 'elements/chatbox.php'; ?>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
       		<?php include 'elements/header.php'; ?>

                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include 'elements/sidebar.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between flex-wrap">
					<div>
						<h3 class="mb-1 font-w600 main-text">Administración Usuarios</h3>
						<p>Listado de usuarios registrados.</p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo $message; ?>
					</div>
				<?php } ?>

				<div class="card mb-4">
					<div class="card-body d-flex align-items-center justify-content-between">
						<h5 class="mb-0">Gestión de usuarios</h5>
						<a class="btn btn-primary btn-sm" href="edit-profile.php">Crear usuario</a>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Usuarios registrados</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>RUT</th>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Contacto</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) { ?>
										<tr>
											<td><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(($user['run_numero'] ?? '') . '-' . ($user['run_dv'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars(trim(($user['nombres'] ?? '') . ' ' . ($user['apellido_paterno'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['account_status'] ?? 'activo', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['telefono_movil'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<div class="d-flex gap-2">
													<a class="btn btn-warning btn-sm" href="edit-profile.php?edit=<?php echo (int)$user['id']; ?>">Editar</a>
													<form method="post">
														<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
														<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
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
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->

	</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
	
</body>
</html>
