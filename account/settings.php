<!DOCTYPE html>
<html lang="en">

<?php 
	 require_once '../config/dz.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<base href="../">
	
	<title><?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'].' | ' : '' ; echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include '../elements/meta.php';?>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include '../elements/page-css.php'; ?>

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
<?php include '../elements/preloader.php'; ?>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper" class="show">

		<!--**********************************
            Nav header start
        ***********************************-->
		<?php include '../elements/nav-header.php'; ?>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->
		<?php include '../elements/chatbox.php'; ?>
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<?php include '../elements/header.php'; ?>

		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<?php include '../elements/sidebar.php'; ?>
		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body default-height">
			<div class="container-fluid">
				<div class="card profile-overview">
					<div class="card-body d-flex">
						<div class="clearfix">
							<div class="d-inline-block position-relative me-sm-4 me-3 mb-3 mb-lg-0">
								<img src="assets/images/avatar/pic7.jpg" alt="" class="rounded-4 profile-avatar">
								<span
									class="fa fa-circle border border-3 border-white text-success position-absolute bottom-0 end-0 rounded-circle"></span>
							</div>
						</div>
						<div class="clearfix d-xl-flex flex-grow-1">
							<div class="clearfix pe-md-5">
								<h3 class="fw-semibold mb-1">Atkinson <img src="assets/images/blue-tick.png" alt="Blue Tick">
								</h3>
								<ul class="d-flex flex-wrap fs-6 align-items-center">
									<li class="me-3 d-inline-flex align-items-center"><i
											class="las la-user me-1 fs-18"></i>Web Designer</li>
									<li class="me-3 d-inline-flex align-items-center"><i
											class="las la-map-marker me-1 fs-18"></i>420 City Path, AU 123-456</li>
									<li class="me-3 d-inline-flex align-items-center"><i
											class="las la-envelope me-1 fs-18"></i>info@gmail.com</li>
								</ul>
								<div class="d-md-flex d-none flex-wrap">
									<div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
										<div
											class="avatar  style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path d="M12 1V23" stroke="var(--primary)" stroke-width="2"
													stroke-linecap="round" stroke-linejoin="round" />
												<path
													d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
											</svg>
										</div>
										<div class="clearfix ms-2">
											<h3 class="mb-0 fw-semibold lh-1">$1,250</h3>
											<span class="fs-14">Total Earnings</span>
										</div>
									</div>
									<div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
										<div
											class="avatar  style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
											</svg>
										</div>
										<div class="clearfix ms-2">
											<h3 class="mb-0 fw-semibold lh-1">125</h3>
											<span class="fs-14">New Referrals</span>
										</div>
									</div>
									<div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
										<div
											class="avatar  style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M16 21V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V21"
													stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
											</svg>
										</div>
										<div class="clearfix ms-2">
											<h3 class="mb-0 fw-semibold lh-1">25</h3>
											<span class="fs-14">New Deals</span>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix mt-3 mt-xl-0 ms-auto d-flex flex-column col-xl-3">
								<div class="clearfix mb-3 text-xl-end">
									<a href="javascript:void(0);" class="btn btn-light text-dark">Follow</a>
									<a href="javascript:void(0);" class="btn btn-primary ms-2">Hire Me</a>
								</div>
								<div class="mt-auto d-flex align-items-center">
									<div class="clearfix me-3">
										<span class="fw-medium text-black d-block mb-1">Progress</span>
										<p class="mb-0 d-flex">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path d="M5.83334 14.1668L14.1667 5.8335" stroke="var(--bs-success)"
													stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
												</path>
												<path d="M5.83334 5.8335H14.1667V14.1668" stroke="var(--bs-success)"
													stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
											<span class="text-success me-1">+3.50%</span>
										</p>
									</div>
									<div id="chartProfileProgress"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer py-0 d-flex flex-wrap justify-content-between align-items-center">
						<ul class="nav nav-underline nav-underline-primary nav-underline-text-dark nav-underline-gap-x-0"
							id="tabMyProfileBottom" role="tablist">
							<li class="nav-item ms-1" role="presentation">
								<a href="account/overview.php" class="nav-link py-3 border-3 text-black">Overview</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/settings.php"
									class="nav-link py-3 border-3 text-black active">Settings</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/security.php" class="nav-link py-3 border-3 text-black">Security</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/activity.php" class="nav-link py-3 border-3 text-black">Activity</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/billing.php" class="nav-link py-3 border-3 text-black">Billing</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/statements.php"
									class="nav-link py-3 border-3 text-black">Statements</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/referrals.php" class="nav-link py-3 border-3 text-black">Referrals</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/api-keys.php" class="nav-link py-3 border-3 text-black">API Keys</a>
							</li>
							<li class="nav-item ms-1" role="presentation">
								<a href="account/logs.php" class="nav-link py-3 border-3 text-black">Logs</a>
							</li>
						</ul>
						<ul class="d-xl-flex d-none py-2">
							<li class="px-1">
								<a class="btn btn-light text-dark" href="javascript:void(0);">
									<i class="fa-brands fa-linkedin-in"></i>
								</a>
							</li>
							<li class="px-1">
								<a class="btn btn-light text-dark" href="javascript:void(0);">
									<i class="fa-brands fa-instagram"></i>
								</a>
							</li>
							<li class="px-1">
								<a class="btn btn-light text-dark" href="javascript:void(0);">
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							</li>
							<li class="px-1">
								<a class="btn btn-light text-dark" href="javascript:void(0);">
									<i class="fa-brands fa-telegram"></i>
								</a>
							</li>
							<li class="px-1">
								<a class="btn btn-light text-dark" href="javascript:void(0);">
									<i class="fa-brands fa-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="tab-content" id="tabContentMyProfileBottom">
					<div class="row">
						<div class="col-xl-8">
							<div class="card">
								<div class="card-header">
									<h6 class="card-title">Basic Info</h6>
								</div>
								<div class="card-body">
									<form action="#" class="mt-2">
										<div class="row mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Avatar</label>
											</div>
											<div class="col-md-9">
												<div
													class="d-inline-block position-relative me-4 mb-3 mb-lg-0 account-profile">
													<div class="avatar-preview rounded">
														<div id="imagePreview" class="rounded-4 profile-avatar"
															style="background-image: url(assets/images/avatar/pic7.jpg);">
														</div>
													</div>
													<div class="upload-link" title="" data-toggle="tooltip"
														data-placement="right" data-original-title="update">
														<input type="file" class="update-flie" id="imageUpload">
														<i class="fa-solid fa-pen-to-square fs-16"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Full Name</label>
											</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control"
															placeholder="First Name">
													</div>
													<div class="col-sm-6 mt-2 mt-sm-0">
														<input type="text" class="form-control" placeholder="Last Name">
													</div>
												</div>
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Company</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="DexignZone">
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Contact Phone</label>
											</div>
											<div class="col-md-9">
												<input type="number" class="form-control"
													placeholder="044 3276 454 935">
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Company Site</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"
													placeholder="https://dexignzone.com/">
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Country</label>
											</div>
											<div class="col-md-9">
												<select class="default-select form-control">
													<option>Please select</option>
													<option>India</option>
													<option>China</option>
													<option>USA</option>
												</select>
											</div>
										</div>
										<div class="row align-items-center mb-4">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Notifications</label>
											</div>
											<div class="col-md-9">
												<div class="form-check custom-checkbox me-4 mb-0 d-inline-block">
													<input type="checkbox" class="form-check-input mb-0"
														id="checkboxEmail" required>
													<label class="form-check-label" for="checkboxEmail">Email</label>
												</div>
												<div class="form-check custom-checkbox me-4 mb-0 d-inline-block">
													<input type="checkbox" class="form-check-input mb-0"
														id="checkboxPhone" required>
													<label class="form-check-label" for="checkboxPhone">Phone</label>
												</div>
											</div>
										</div>
										<div class="row align-items-center mb-3">
											<div class="col-md-3">
												<label class="form-label mb-md-0">Allow Changes</label>
											</div>
											<div class="col-md-9">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" role="switch"
														id="flexSwitchCheckChecked" checked>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="card-footer text-end">
									<a href="javascript:void(0);" class="btn btn-white">Discard</a>
									<a href="javascript:void(0);" class="btn btn-primary ms-2">Save Changes</a>
								</div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<div class="clearfix">
												<h4 class="card-title mb-0">Connected Accounts</h4>
											</div>
										</div>
										<div class="card-body">
											<div
												class="alert alert-primary border-primary outline-dashed py-3 px-3 mt-1 mb-3 mb-0 text-black d-flex">
												<div class="clearfix">
													<svg width="36" height="36" viewBox="0 0 36 36" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
															d="M27.75 12C29.8211 12 31.5 10.3211 31.5 8.25C31.5 6.17893 29.8211 4.5 27.75 4.5C25.6789 4.5 24 6.17893 24 8.25C24 10.3211 25.6789 12 27.75 12ZM27.75 31.5C29.8211 31.5 31.5 29.8211 31.5 27.75C31.5 25.6789 29.8211 24 27.75 24C25.6789 24 24 25.6789 24 27.75C24 29.8211 25.6789 31.5 27.75 31.5ZM12 27.75C12 29.8211 10.3211 31.5 8.25 31.5C6.17893 31.5 4.5 29.8211 4.5 27.75C4.5 25.6789 6.17893 24 8.25 24C10.3211 24 12 25.6789 12 27.75Z"
															fill="#0D99FF" />
														<path fill-rule="evenodd" clip-rule="evenodd"
															d="M8.25 12C10.3211 12 12 10.3211 12 8.25C12 6.17893 10.3211 4.5 8.25 4.5C6.17893 4.5 4.5 6.17893 4.5 8.25C4.5 10.3211 6.17893 12 8.25 12ZM15 7C15 6.44772 15.4477 6 16 6H20C20.5523 6 21 6.44772 21 7V8C21 8.55229 20.5523 9 20 9H16C15.4477 9 15 8.55229 15 8V7ZM16 27C15.4477 27 15 27.4477 15 28V29C15 29.5523 15.4477 30 16 30H20C20.5523 30 21 29.5523 21 29V28C21 27.4477 20.5523 27 20 27H16ZM6 16C6 15.4477 6.44772 15 7 15H8C8.55229 15 9 15.4477 9 16V20C9 20.5523 8.55229 21 8 21H7C6.44772 21 6 20.5523 6 20V16ZM28 15C27.4477 15 27 15.4477 27 16V20C27 20.5523 27.4477 21 28 21H29C29.5523 21 30 20.5523 30 20V16C30 15.4477 29.5523 15 29 15H28Z"
															fill="#0D99FF" />
													</svg>
												</div>
												<div class="mx-3">
													Two-factor authentication adds an extra layer of security to your
													account. To log in, in you'll need to provide a 4 digit amazing code
													<a href="javascript:void(0);" class="text-primary">Learn More</a>
												</div>
											</div>
											<div class="d-flex align-items-center border-bottom py-3">
												<div
													class="avatar avatar-md rounded d-flex align-items-center justify-content-center bg-white">
													<img src="assets/images/logo/google.png" alt="">
												</div>
												<div class="clearfix ms-2">
													<h6 class="mb-0 fw-semibold">Google</h6>
													<span class="fs-13">Plan properly your workflow</span>
												</div>
												<div class="clearfix ms-auto">
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch"
															id="flexSwitchGoogle" checked="">
													</div>
												</div>
											</div>
											<div class="d-flex align-items-center border-bottom py-3">
												<div
													class="avatar avatar-md rounded d-flex align-items-center justify-content-center bg-white">
													<img src="assets/images/logo/github.png" alt="">
												</div>
												<div class="clearfix ms-2">
													<h6 class="mb-0 fw-semibold">Github</h6>
													<span class="fs-13">Keep eye on on your Repositories</span>
												</div>
												<div class="clearfix ms-auto">
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch"
															id="flexSwitchGithub" checked="">
													</div>
												</div>
											</div>
											<div class="d-flex align-items-center py-3">
												<div
													class="avatar avatar-md d-flex align-items-center justify-content-center bg-white">
													<img src="assets/images/logo/slack.png" alt="">
												</div>
												<div class="clearfix ms-2">
													<h6 class="mb-0 fw-semibold">Slack</h6>
													<span class="fs-13">Integrate Projects Discussions</span>
												</div>
												<div class="clearfix ms-auto">
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch"
															id="flexSwitchSlack">
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-end">
											<a href="javascript:void(0);" class="btn btn-white">Discard</a>
											<a href="javascript:void(0);" class="btn btn-primary ms-2">Save Changes</a>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h4 class="heading mb-0">Notifications</h4>
										</div>
										<div class="card-body">
											<form action="#">
												<div class="clearfix border-bottom py-3 pt-0">
													<div class="row align-items-center">
														<div class="col-sm-6">
															<label class="form-label mb-md-0">Notifications</label>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxNotEmail" required="">
																<label class="form-check-label mb-0"
																	for="checkboxNotEmail">Email</label>
															</div>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxNotPhone" required="">
																<label class="form-check-label mb-0"
																	for="checkboxNotPhone">Phone</label>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix border-bottom py-3">
													<div class="row align-items-center">
														<div class="col-sm-6">
															<label class="form-label mb-md-0">Billing Updates</label>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxBillEmail" required="">
																<label class="form-check-label mb-0"
																	for="checkboxBillEmail">Email</label>
															</div>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxBillPhone" required="">
																<label class="form-check-label mb-0"
																	for="checkboxBillPhone">Phone</label>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix border-bottom py-3">
													<div class="row align-items-center">
														<div class="col-sm-6">
															<label class="form-label mb-md-0">New Team Members</label>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxTeamEmail" required="">
																<label class="form-check-label mb-0"
																	for="checkboxTeamEmail">Email</label>
															</div>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxTeamPhone" required="">
																<label class="form-check-label mb-0"
																	for="checkboxTeamPhone">Phone</label>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix border-bottom py-3">
													<div class="row align-items-center">
														<div class="col-sm-6">
															<label class="form-label mb-md-0">Completed Projects</label>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxProEmail" required="">
																<label class="form-check-label mb-0"
																	for="checkboxProEmail">Email</label>
															</div>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxProPhone" required="">
																<label class="form-check-label mb-0"
																	for="checkboxProPhone">Phone</label>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix py-3 pb-0">
													<div class="row align-items-center">
														<div class="col-sm-6">
															<label class="form-label mb-md-0">Newsletters</label>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxNewsEmail" required="">
																<label class="form-check-label mb-0"
																	for="checkboxNewsEmail">Email</label>
															</div>
														</div>
														<div class="col-sm-3 col-6">
															<div
																class="form-check custom-checkbox me-4 mb-0 d-inline-block">
																<input type="checkbox" class="form-check-input mb-0"
																	id="checkboxNewsPhone" required="">
																<label class="form-check-label mb-0"
																	for="checkboxNewsPhone">Phone</label>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="card-footer text-end">
											<a href="javascript:void(0);" class="btn btn-white">Discard</a>
											<a href="javascript:void(0);" class="btn btn-primary ms-2">Save Changes</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header">
									<h4 class="heading mb-0">Deactivate Account</h4>
								</div>
								<div class="card-body">
									<div
										class="alert alert-warning border-warning outline-dashed py-3 px-3 mt-1 mb-4 mb-0 text-dark d-flex align-items-center">
										<div class="clearfix">
											<svg width="30" height="30" viewBox="0 0 30 30" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M15 30C18.9782 30 22.7936 28.4196 25.6066 25.6066C28.4196 22.7936 30 18.9782 30 15C30 11.0218 28.4196 7.20644 25.6066 4.3934C22.7936 1.58035 18.9782 0 15 0C11.0218 0 7.20644 1.58035 4.3934 4.3934C1.58035 7.20644 0 11.0218 0 15C0 18.9782 1.58035 22.7936 4.3934 25.6066C7.20644 28.4196 11.0218 30 15 30ZM12.6562 19.6875H14.0625V15.9375H12.6562C11.877 15.9375 11.25 15.3105 11.25 14.5312C11.25 13.752 11.877 13.125 12.6562 13.125H15.4688C16.248 13.125 16.875 13.752 16.875 14.5312V19.6875H17.3438C18.123 19.6875 18.75 20.3145 18.75 21.0938C18.75 21.873 18.123 22.5 17.3438 22.5H12.6562C11.877 22.5 11.25 21.873 11.25 21.0938C11.25 20.3145 11.877 19.6875 12.6562 19.6875ZM15 7.5C15.4973 7.5 15.9742 7.69754 16.3258 8.04918C16.6775 8.40081 16.875 8.87772 16.875 9.375C16.875 9.87228 16.6775 10.3492 16.3258 10.7008C15.9742 11.0525 15.4973 11.25 15 11.25C14.5027 11.25 14.0258 11.0525 13.6742 10.7008C13.3225 10.3492 13.125 9.87228 13.125 9.375C13.125 8.87772 13.3225 8.40081 13.6742 8.04918C14.0258 7.69754 14.5027 7.5 15 7.5Z"
													fill="#FF8A11" />
											</svg>
										</div>
										<div class="mx-3">
											<h6 class="mb-0 fw-semibold">You are deactivatiing your account</h6>
											<p class="mb-0">For extra security, this requires you to confirm your email
												or phone number when you reset your password. <a
													href="javascript:void(0);" class="text-warning">Learn More</a></p>
										</div>
									</div>
									<div class="form-check custom-checkbox me-4 my-3 d-inline-block">
										<input type="checkbox" class="form-check-input mb-0" id="checkboxDeactivation"
											required="">
										<label class="form-check-label mb-0" for="checkboxDeactivation">Confirm Account
											Deactivation</label>
									</div>
								</div>
								<div class="card-footer text-end">
									<a href="javascript:void(0);" class="btn btn-danger ms-2">Deactivate Account</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<!--**********************************
            Footer start
        ***********************************-->
		<?php include '../elements/footer.php'; ?>
		<!--**********************************
            Footer end
        ***********************************-->

	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
	Scripts
***********************************-->
	<!-- Required vendors -->
<?php include '../elements/page-js.php'; ?>
	

	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
					$('#imagePreview').hide();
					$('#imagePreview').fadeIn(650);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").change(function () {
			readURL(this);
		});
	</script>

</body>

</html>