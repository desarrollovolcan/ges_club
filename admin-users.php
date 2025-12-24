<?php
	 require_once __DIR__ . '/config/dz.php';

	 if (!gesclub_is_admin()) {
	 	header('Location: index.php');
	 	exit;
	 }

	 $actionMessage = '';
	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$target = trim($_POST['username'] ?? '');
	 	$action = trim($_POST['action'] ?? '');
	 	$users = gesclub_load_users();

	 	foreach ($users as &$user) {
	 		if (!empty($user['username']) && mb_strtolower($user['username']) === mb_strtolower($target)) {
	 			if ($action === 'approve') {
	 				$user['status'] = 'approved';
	 				$actionMessage = 'Usuario aprobado.';
	 			} elseif ($action === 'reject') {
	 				$user['status'] = 'rejected';
	 				$actionMessage = 'Usuario rechazado.';
	 			}
	 			break;
	 		}
	 	}
	 	unset($user);
	 	if ($actionMessage !== '') {
	 		gesclub_save_users($users);
	 	}
	 }

	 $users = gesclub_load_users();
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

				<?php if (!empty($actionMessage)) { ?>
					<div class="alert alert-success" role="alert">
						<?php echo $actionMessage; ?>
					</div>
				<?php } ?>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>Estado</th>
										<th>Rol</th>
										<th>Registro</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) { ?>
										<tr>
											<td><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['status'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['role'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user['created_at'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<?php if (($user['status'] ?? '') === 'pending') { ?>
													<form method="post" class="d-inline">
														<input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
														<input type="hidden" name="action" value="approve">
														<button type="submit" class="btn btn-success btn-sm">Aprobar</button>
													</form>
													<form method="post" class="d-inline">
														<input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
														<input type="hidden" name="action" value="reject">
														<button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
													</form>
												<?php } else { ?>
													<span class="text-muted">Sin acciones</span>
												<?php } ?>
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
