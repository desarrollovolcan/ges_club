<?php
	 require_once __DIR__ . '/config/dz.php';

	 $loginError = '';
	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 	$password = trim($_POST['super_root_password'] ?? '');

	 	if (gesclub_verify_super_root_password($password)) {
	 		$_SESSION['super_root_authenticated'] = true;
	 		header('Location: index.php');
	 		exit;
	 	}

	 	$loginError = 'Contraseña incorrecta. Intenta de nuevo.';
	 }

	 if (gesclub_is_authenticated()) {
	 	header('Location: index.php');
	 	exit;
	 }
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
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center d-none d-sm-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-4 pt-5">
					<a href="index.php"><img src="assets/images/logo-full.png" class="dark-login"  alt=""></a>
					<a href="index.php"><img src="assets/images/logo-full-white.png" class="light-login" alt=""></a>
				</div>
				<h3 class="mb-2">Welcome back!</h3>
				<p>User Experience & Interface Design <br>Kubayar Invoicing Admin Dashboard</p>
			</div>
			<div class="aside-image" style="background-image:url(assets/images/pic1.svg);"></div>
		</div>
		<div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<div class="d-flex justify-content-center h-100 align-items-center">
				<div class="authincation-content style-2">
					<div class="row no-gutters">
						<div class="col-xl-12">
							<div class="auth-form">
								<div class="text-center d-block d-lg-none mb-4 pt-5">
									<a href="index.php"><img src="assets/images/logo-full.png" class="dark-login"  alt=""></a>
									<a href="index.php"><img src="assets/images/logo-full-white.png" class="light-login" alt=""></a>
								</div>
								
								<h4 class="text-center mb-4">Acceso Super Root</h4>
								<?php if (!empty($loginError)) { ?>
									<div class="alert alert-danger" role="alert">
										<?php echo $loginError; ?>
									</div>
								<?php } ?>
								<form action="page-login.php" method="post">
									<div class="mb-3">
										<label class="mb-1 form-label">Contraseña</label>
										<div class="position-relative">
											<input type="password" id="dz-password" name="super_root_password" class="form-control" required>
											<span class="show-pass eye">
												<i class="fa fa-eye-slash"></i>
												<i class="fa fa-eye"></i>
											</span>
										</div>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
									</div>
								</form>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
	
</body>
</html>
