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
								<a href="account/settings.php" class="nav-link py-3 border-3 text-black">Settings</a>
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
									class="nav-link py-3 border-3 text-black active">Statements</a>
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
						<div class="col-xl-4">
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h4 class="heading mb-0">Earnings</h4>
										</div>
										<div class="card-body">
											<p class="fs-14">Last 30 day earnings calculated. Apart from arranging the
												order of topics.</p>
											<div class="row g-2 mb-3">
												<div class="col-sm-4 col-6">
													<div class="bg-light rounded p-3">
														<h5 class="mb-0 text-dark">$6,840</h5>
														<span class="fs-13">Net Earnings</span>
													</div>
												</div>
												<div class="col-sm-4 col-6">
													<div class="bg-light rounded p-3">
														<h5 class="mb-0 text-dark">+17,8%</h5>
														<span class="fs-13">Change</span>
													</div>
												</div>
												<div class="col-sm-4 col-12">
													<div class="bg-light rounded p-3">
														<h5 class="mb-0 text-dark">$1,240</h5>
														<span class="fs-13">Fees</span>
													</div>
												</div>
											</div>
											<a href="javascript:void(0);" class="btn btn-primary">Withdraw Earnings</a>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h4 class="heading mb-0">Invoices</h4>
										</div>
										<div class="card-body">
											<p class="fs-14">Download apart from order of the good awesome invoice
												topics.</p>
											<form action="#">
												<div class="d-flex">
													<div class="clearfix flex-grow-1">
														<select class="default-select form-control">
															<option>Seller Annual Fee</option>
															<option>Seller Monthly Fee</option>
														</select>
													</div>
													<div class="clearfix ms-3">
														<button type="button" class="btn btn-primary px-3"><i
																class="fa fa-arrow-down"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="card">
								<div class="card-header border-0 py-3 d-block d-sm-flex pb-0">
									<h4 class="heading mb-0">Statement</h4>
									<ul class="nav nav-pills mt-3 mt-sm-0 mix-chart-tab" id="myTab1" role="tablist">
										<li class="nav-item ms-1" role="presentation">
											<button class="nav-link btn btn-light active" id="week-tab1"
												data-bs-toggle="tab" data-bs-target="#tabWeek1" type="button" role="tab"
												aria-controls="tabWeek1" aria-selected="true">Week</button>
										</li>
										<li class="nav-item ms-1" role="presentation">
											<button class="nav-link btn btn-light" id="month-tab1" data-bs-toggle="tab"
												data-bs-target="#tabMonth1" type="button" role="tab"
												aria-controls="tabMonth1" aria-selected="false">Month</button>
										</li>
										<li class="nav-item ms-1" role="presentation">
											<button class="nav-link btn btn-light" id="year-tab1" data-bs-toggle="tab"
												data-bs-target="#tabYear1" type="button" role="tab"
												aria-controls="tabYear1" aria-selected="false">Year</button>
										</li>
										<li class="nav-item ms-1" role="presentation">
											<button class="nav-link btn btn-light" id="all-tab1" data-bs-toggle="tab"
												data-bs-target="#tabAll1" type="button" role="tab"
												aria-controls="tabAll1" aria-selected="false">All</button>
										</li>
									</ul>
								</div>
								<div class="card-body">
									<div class="tab-content">
										<div class="tab-pane active" id="tabWeek1" role="tabpanel"
											aria-labelledby="week-tab1" tabindex="0">
											<div class="table-responsive">
												<table
													class="table mb-1 table-striped-thead table-wide table-sm table-border-last-0">
													<thead>
														<tr>
															<th>Date</th>
															<th>Order ID</th>
															<th>Details</th>
															<th>Amount</th>
															<th class="text-end">Invoice</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Nov 01, 2024</td>
															<td>002445788</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td><span class="text-success">$38.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Oct 24, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-2.60</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Oct 08, 2024</td>
															<td>002445788</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td><span class="text-success">$76.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Sep 15, 2024</td>
															<td>002445788</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td><span class="text-success">$5.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>May 30, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-1.30</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Apr 22, 2024</td>
															<td>002445788</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td><span class="text-success">$204.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Feb 09, 2024</td>
															<td>002445788</td>
															<td>Visual Design Illustration</td>
															<td><span class="text-success">$31.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 17, 2024</td>
															<td>002445788</td>
															<td>Abstract Vusial Pack</td>
															<td><span class="text-success">$52.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 04, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-0.80</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="tabMonth1" role="tabpanel"
											aria-labelledby="month-tab1" tabindex="0">
											<div class="table-responsive">
												<table
													class="table mb-1 table-striped-thead table-wide table-sm table-border-last-0">
													<thead>
														<tr>
															<th>Date</th>
															<th>Order ID</th>
															<th>Details</th>
															<th>Amount</th>
															<th class="text-end">Invoice</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Nov 01, 2024</td>
															<td>002445788</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td><span class="text-success">$38.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Oct 24, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-2.60</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Sep 15, 2024</td>
															<td>002445788</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td><span class="text-success">$5.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>May 30, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-1.30</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Apr 22, 2024</td>
															<td>002445788</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td><span class="text-success">$204.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Feb 09, 2024</td>
															<td>002445788</td>
															<td>Visual Design Illustration</td>
															<td><span class="text-success">$31.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 17, 2024</td>
															<td>002445788</td>
															<td>Abstract Vusial Pack</td>
															<td><span class="text-success">$52.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 04, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-0.80</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-sm btn-light">Download</button></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="tabYear1" role="tabpanel" aria-labelledby="year-tab1"
											tabindex="0">
											<div class="table-responsive">
												<table
													class="table mb-1 table-striped-thead table-wide table-sm table-border-last-0">
													<thead>
														<tr>
															<th>Date</th>
															<th>Order ID</th>
															<th>Details</th>
															<th>Amount</th>
															<th class="text-end">Invoice</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Oct 24, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-2.60</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Oct 08, 2024</td>
															<td>002445788</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td><span class="text-success">$76.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Sep 15, 2024</td>
															<td>002445788</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td><span class="text-success">$5.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>May 30, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-1.30</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Apr 22, 2024</td>
															<td>002445788</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td><span class="text-success">$204.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Feb 09, 2024</td>
															<td>002445788</td>
															<td>Visual Design Illustration</td>
															<td><span class="text-success">$31.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 04, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-0.80</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="tabAll1" role="tabpanel" aria-labelledby="all-tab1"
											tabindex="0">
											<div class="table-responsive">
												<table
													class="table mb-1 table-striped-thead table-wide table-sm table-border-last-0">
													<thead>
														<tr>
															<th>Date</th>
															<th>Order ID</th>
															<th>Details</th>
															<th>Amount</th>
															<th class="text-end">Invoice</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Nov 01, 2024</td>
															<td>002445788</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td><span class="text-success">$38.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Oct 24, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-2.60</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Sep 15, 2024</td>
															<td>002445788</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td><span class="text-success">$5.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>May 30, 2024</td>
															<td>002445788</td>
															<td>Seller Fee</td>
															<td><span class="text-danger">$-1.30</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Apr 22, 2024</td>
															<td>002445788</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td><span class="text-success">$204.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Feb 09, 2024</td>
															<td>002445788</td>
															<td>Visual Design Illustration</td>
															<td><span class="text-success">$31.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
														<tr>
															<td>Jan 17, 2024</td>
															<td>002445788</td>
															<td>Abstract Vusial Pack</td>
															<td><span class="text-success">$52.00</span></td>
															<td class="text-end"><button type="button"
																	class="btn btn-xxs btn-light">Download</button></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
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
	
	
</body>

</html>