<?php
	require_once __DIR__ . '/../config/auth.php';
	$db = gesclub_db();
	$headerUser = $_SESSION['auth_user']['username'] ?? 'Usuario';
	$headerRole = $_SESSION['auth_user']['role'] ?? 'Perfil';
	$notifications = $db->query('SELECT tipo, mensaje, destino, fecha, estado FROM notificaciones ORDER BY fecha DESC LIMIT 5')->fetchAll() ?: [];
?>
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						<?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'] : '' ; ?>
					</div>
					<div class="nav-item d-flex align-items-center">
						<form class="input-group search-area" action="busqueda.php" method="get">
							<input type="text" class="form-control" name="q" placeholder="Buscar club, deportista o entrenador...">
							<button class="input-group-text" type="submit">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M8.11625 0.609436C3.98398 0.609436 0.617874 3.97554 0.617874 8.10782C0.617874 12.2401 3.98398 15.6127 8.11625 15.6127C9.88126 15.6127 11.5045 14.9942 12.7875 13.9672L15.9108 17.0889C16.0685 17.24 16.279 17.3234 16.4973 17.3211C16.7156 17.3189 16.9244 17.2313 17.0789 17.077C17.2334 16.9227 17.3213 16.7141 17.3239 16.4958C17.3264 16.2775 17.2434 16.0668 17.0925 15.909L13.9691 12.7856C14.997 11.5007 15.6162 9.87488 15.6162 8.10782C15.6162 3.97554 12.2485 0.609436 8.11625 0.609436ZM8.11625 2.27613C11.3478 2.27613 13.948 4.87629 13.948 8.10782C13.948 11.3393 11.3478 13.946 8.11625 13.946C4.88472 13.946 2.28454 11.3393 2.28454 8.10782C2.28454 4.87629 4.88472 2.27613 8.11625 2.27613Z" fill="#717579" />
								</svg>
							</button>
						</form>
					</div>
				</div>
				<ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link bell dz-theme-mode p-0" href="javascript:void(0);">
							<i id="icon-light" class="flaticon-sun"></i>
							<i id="icon-dark" class="flaticon-night-mode"></i>
						</a>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_1_194)">
									<path
										d="M16.875 0H13.9062C12.1831 0 10.7812 1.40188 10.7812 3.125V6.09375C10.7812 7.81687 12.1831 9.21875 13.9062 9.21875H16.875C18.5981 9.21875 20 7.81687 20 6.09375V3.125C20 1.40188 18.5981 0 16.875 0ZM18.4375 6.09375C18.4375 6.95531 17.7366 7.65625 16.875 7.65625H13.9062C13.0447 7.65625 12.3438 6.95531 12.3438 6.09375V3.125C12.3438 2.26344 13.0447 1.5625 13.9062 1.5625H16.875C17.7366 1.5625 18.4375 2.26344 18.4375 3.125V6.09375Z"
										fill="#58626D" />
									<path
										d="M6.09375 0H3.125C1.40188 0 0 1.40188 0 3.125V6.09375C0 7.81687 1.40188 9.21875 3.125 9.21875H6.09375C7.81687 9.21875 9.21875 7.81687 9.21875 6.09375V3.125C9.21875 1.40188 7.81687 0 6.09375 0ZM7.65625 6.09375C7.65625 6.95531 6.95531 7.65625 6.09375 7.65625H3.125C2.26344 7.65625 1.5625 6.95531 1.5625 6.09375V3.125C1.5625 2.26344 2.26344 1.5625 3.125 1.5625H6.09375C6.95531 1.5625 7.65625 2.26344 7.65625 3.125V6.09375Z"
										fill="#58626D" />
									<path
										d="M6.09375 10.7812H3.125C1.40188 10.7812 0 12.1831 0 13.9062V16.875C0 18.5981 1.40188 20 3.125 20H6.09375C7.81687 20 9.21875 18.5981 9.21875 16.875V13.9062C9.21875 12.1831 7.81687 10.7812 6.09375 10.7812ZM7.65625 16.875C7.65625 17.7366 6.95531 18.4375 6.09375 18.4375H3.125C2.26344 18.4375 1.5625 17.7366 1.5625 16.875V13.9062C1.5625 13.0447 2.26344 12.3438 3.125 12.3438H6.09375C6.95531 12.3438 7.65625 13.0447 7.65625 13.9062V16.875Z"
										fill="#58626D" />
									<path
										d="M19.2188 16.0938C18.7873 16.0938 18.4375 16.4435 18.4375 16.875C18.4375 17.7366 17.7366 18.4375 16.875 18.4375H13.9062C13.0447 18.4375 12.3438 17.7366 12.3438 16.875V13.9062C12.3438 13.0447 13.0447 12.3438 13.9062 12.3438H16.875C17.4963 12.3438 18.0586 12.7117 18.3076 13.2811C18.4805 13.6764 18.9411 13.8567 19.3364 13.6839C19.7318 13.511 19.9121 13.0504 19.7393 12.6551C19.2415 11.5168 18.1172 10.7812 16.875 10.7812H13.9062C12.1831 10.7812 10.7812 12.1831 10.7812 13.9062V16.875C10.7812 18.5981 12.1831 20 13.9062 20H16.875C18.5981 20 20 18.5981 20 16.875C20 16.4435 19.6502 16.0938 19.2188 16.0938Z"
										fill="#58626D" />
								</g>
								<defs>
									<clipPath id="clip0_1_194">
										<rect width="20" height="20" fill="white" />
									</clipPath>
								</defs>
							</svg>
						</a>
						<div class="dropdown-menu dropdown-menu-end pb-0">
							<div class="card mb-0">
								<div class="card-header p-3">
									<h2 class="card-title--small mb-0">Accesos rápidos</h2>
								</div>
								<div class="card-body p-3">
									<div class="row g-2">
										<div class="col-xl-6">
											<a class="btn btn-light w-100" href="registrar-club.php">Clubes</a>
										</div>
										<div class="col-xl-6">
											<a class="btn btn-light w-100" href="registrar-deportistas.php">Deportistas</a>
										</div>
										<div class="col-xl-6">
											<a class="btn btn-light w-100" href="finanzas-cobros.php">Cobros</a>
										</div>
										<div class="col-xl-6">
											<a class="btn btn-light w-100" href="calendario-eventos.php">Calendario</a>
										</div>
									</div>
								</div>
								<div class="card-footer p-3">
									<a class="all-notification" href="index.php">Ir al panel<i class="ti-arrow-end"></i></a>
								</div>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link dz-notifiction" href="javascript:void(0);" role="button"
							data-bs-toggle="dropdown">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12 23C12.5304 23 13.0391 22.7893 13.4142 22.4142C13.7893 22.0391 14 21.5304 14 21H10C10 21.5304 10.2107 22.0391 10.5858 22.4142C10.9609 22.7893 11.4696 23 12 23Z"
									fill="#58626D" />
								<path
									d="M20.924 18.383C20.9997 18.2002 21.0195 17.9991 20.9808 17.8051C20.9422 17.6111 20.8469 17.4328 20.707 17.293L19 15.586V10C18.998 8.31815 18.3906 6.69324 17.2888 5.42253C16.187 4.15181 14.6646 3.32026 13 3.08V2C13 1.73478 12.8946 1.48043 12.7071 1.29289C12.5195 1.10536 12.2652 1 12 1C11.7348 1 11.4804 1.10536 11.2929 1.29289C11.1053 1.48043 11 1.73478 11 2V3.08C9.33537 3.32026 7.81292 4.15181 6.71115 5.42253C5.60938 6.69324 5.00194 8.31815 4.99997 10V15.586L3.29297 17.293C3.15316 17.4329 3.05795 17.611 3.01939 17.805C2.98082 17.9989 3.00062 18.2 3.07629 18.3827C3.15196 18.5654 3.2801 18.7215 3.44451 18.8314C3.60892 18.9413 3.80222 19 3.99997 19H20C20.1977 19 20.3911 18.9415 20.5555 18.8316C20.72 18.7218 20.8482 18.5657 20.924 18.383ZM6.41397 17L6.70697 16.707C6.89452 16.5195 6.99991 16.2652 6.99997 16V10C6.99997 8.67392 7.52675 7.40215 8.46444 6.46447C9.40212 5.52678 10.6739 5 12 5C13.3261 5 14.5978 5.52678 15.5355 6.46447C16.4732 7.40215 17 8.67392 17 10V16C17 16.2652 17.1054 16.5195 17.293 16.707L17.586 17H6.41397Z"
									fill="#58626D" />
							</svg>

						</a>
						<div class="dropdown-menu notification-bx dropdown-menu-end pb-0">
							<div class="card mb-0">
								<div class="card-header py-3 px-4">
									<h2 class="card-title--small mb-0">Notificaciones</h2>
								</div>
								<div class="card-body dz-scroll height370 px-4">
									<div class="row">
										<?php if (!$notifications) { ?>
											<div class="col-xl-12">
												<div class="text-muted">Sin notificaciones recientes.</div>
											</div>
										<?php } ?>
										<?php foreach ($notifications as $notification) { ?>
											<div class="col-xl-12">
												<div class="notification-sub-bx mb-3">
													<div>
														<img src="assets/images/user.jpg" width="38"
															class="rounded-circle me-2" alt="">
													</div>
													<div>
														<h6 class="card-title--small mb-2"><?php echo htmlspecialchars($notification['tipo'] ?? 'Aviso', ENT_QUOTES, 'UTF-8'); ?></h6>
														<small class="dz-notipication-para"><?php echo htmlspecialchars($notification['mensaje'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
														<div class="d-flex align-items-center justify-content-between mt-2">
															<small class="text-dark fs-11 font-w500 mb-2"><?php echo htmlspecialchars($notification['destino'] ?? 'General', ENT_QUOTES, 'UTF-8'); ?></small>
															<small class="text-dark fs-11 font-w500 mb-2"><?php echo htmlspecialchars($notification['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="card-footer px-4 py-3">
									<a href="comunicaciones-notificaciones.php" class="btn btn-primary btn-block btn-sm">Ver todas</a>
								</div>
							</div>
						</div>
					</li>

					<li class="nav-item dropdown notification_dropdown pe30">
						<a class="nav-link bell-link" href="javascript:void(0);" data-bs-toggle="dropdown">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_1_184)">
									<path
										d="M4.71313 20.0381C4.42993 20.0381 4.14886 19.9591 3.90213 19.8035C3.47519 19.5338 3.2106 19.0717 3.19443 18.5667L3.14514 16.9499C1.11755 15.1318 0 12.5792 0 9.76273C0 7.07458 1.03043 4.60251 2.90115 2.80182C4.75235 1.0202 7.27341 0.0390625 10 0.0390625C12.7266 0.0390625 15.2477 1.0202 17.0988 2.80182C18.9696 4.60251 20 7.07458 20 9.76273C20 12.4507 18.9696 14.9228 17.0988 16.7235C15.2477 18.5051 12.7266 19.4864 10 19.4864C9.01703 19.4864 8.05511 19.3593 7.14081 19.1087L5.32578 19.9095C5.12909 19.9957 4.92065 20.0381 4.71313 20.0381ZM10 1.60156C5.18982 1.60156 1.5625 5.11002 1.5625 9.76273C1.5625 12.1326 2.49832 14.2749 4.19754 15.795C4.51096 16.0773 4.69086 16.4597 4.70596 16.8735L4.70612 16.8784L4.75433 18.4538L6.5239 17.673C6.8425 17.5328 7.20184 17.5058 7.53647 17.597C8.32291 17.814 9.151 17.9237 10 17.9237C14.8102 17.9237 18.4375 14.4153 18.4375 9.76273C18.4375 5.11002 14.8102 1.60156 10 1.60156ZM5.08347 12.9543L8.00323 10.7031C8.20053 10.5551 8.47214 10.5531 8.67126 10.7013L10.8318 12.3807C11.4793 12.8639 12.4062 12.6935 12.8378 12.0122L15.5534 7.70584C15.8157 7.29477 15.3059 6.83014 14.917 7.12448L11.9986 9.33594C11.8013 9.4841 11.5297 9.48593 11.3306 9.33777L9.17007 7.6976C8.52249 7.21436 7.59567 7.38464 7.164 8.06595L4.44702 12.3727C4.18472 12.7838 4.69452 13.2486 5.08347 12.9543Z"
										fill="#58626D" />
								</g>
								<defs>
									<clipPath id="clip0_1_184">
										<rect width="20" height="20" fill="white" />
									</clipPath>
								</defs>
							</svg>

						</a>

					</li>
					<li class="nav-item dropdown header-profile ps30">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="assets/images/user.jpg" width="20" alt="">
							<div class="header-info ms-2 me-3">
								<span class="fs-13 font-w500 mb-0"><?php echo htmlspecialchars($headerUser, ENT_QUOTES, 'UTF-8'); ?></span>
								<small class="fs-12"><?php echo htmlspecialchars($headerRole, ENT_QUOTES, 'UTF-8'); ?></small>
							</div>
							<div class="ms-auto me-1">
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M1.2803 2.8447L5.99998 7.56435L10.7197 2.8447C10.8606 2.70545 11.0509 2.62764 11.249 2.62824C11.4472 2.62884 11.637 2.70781 11.7771 2.8479C11.9172 2.988 11.9962 3.17784 11.9968 3.37596C11.9974 3.57408 11.9195 3.76439 11.7803 3.90534L6.5303 9.15534C6.38965 9.29599 6.19889 9.375 5.99998 9.375C5.80108 9.375 5.61031 9.29599 5.46966 9.15534L0.219662 3.90534C0.0804205 3.76439 0.00260448 3.57408 0.0032053 3.37596C0.00380707 3.17784 0.082778 2.988 0.222872 2.8479C0.362967 2.70781 0.552803 2.62884 0.750925 2.62824C0.949048 2.62764 1.13936 2.70545 1.2803 2.8447Z"
										fill="#ADADAD" />
								</svg>

							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div class="card shadow-none border-0 mb-0">
								<div class="card-header px-4 py-2">
									<div class="d-flex align-items-center">
										<img src="assets/images/user.jpg" class="avatar me-2" alt="">
										<div>
											<h6 class="mb-0"><?php echo htmlspecialchars($headerUser, ENT_QUOTES, 'UTF-8'); ?></h6>
											<small><?php echo htmlspecialchars($headerRole, ENT_QUOTES, 'UTF-8'); ?></small>
										</div>

									</div>
									<div class="ms-auto">
										<a href="app-profile.php"><i
												class="flaticon-editing text-primary fs-18"></i></a>
									</div>
								</div>
								<div class="card-body px-0 py-2">
									<a href="index.php" class="dropdown-item ai-icon ">
										<i class="flaticon-bar-chart fs-18"></i>
										<span class="ms-2">Panel general</span>
									</a>
									<a href="app-profile.php" class="dropdown-item ai-icon ">
										<i class="flaticon-user fs-18"></i>
										<span class="ms-2">Mi perfil</span>
									</a>
									<a href="configuracion-club.php" class="dropdown-item ai-icon ">
										<i class="flaticon-settings fs-18"></i>
										<span class="ms-2">Configuración</span>
									</a>
									<a href="documentos-internos.php" class="dropdown-item ai-icon ">
										<i class="flaticon-folder fs-18"></i>
										<span class="ms-2">Documentos internos</span>
									</a>
								</div>
								<div class="card-footer px-0 py-2">

									<a href="logout.php" class="dropdown-item ai-icon">
										<i class="flaticon-logout-1 fs-18 text-danger"></i>
										<span class="ms-2 text-danger">Cerrar Sesion</span>
									</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
