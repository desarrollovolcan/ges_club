<?php 
	 require_once __DIR__ . '/config/dz.php';
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
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex align-items-center justify-content-between">
							<div>
								<h3 class="mb-1 font-w600 main-text">Dashboard</h3>
								<p>Your Invoice Super Admin.</p>
							</div>
							<div>
								<a href="javascript:void(0);" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Export Data</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-3 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<p class="mb-0">Sales</p>
										<div class="dropdown ms-auto c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body pt-2">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<h2 class="card-title">69,700</h2>
												<span><small class="text-success font-w600 me-1">+1.6%</small>than last week</span>
											</div>
											
											<div id="totalInvoices"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<p class="mb-0">Earnings</p>
										<div class="dropdown ms-auto c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body pt-2">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<h2 class="card-title">40,700</h2>
												<span><small class="text-danger font-w600 me-1">-1.6%</small>than last week</span>
											</div>
											
											<div id="chart"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<p class="mb-0">Users</p>
										<div class="dropdown ms-auto c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body pt-2">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<h2 class="card-title">5.2700</h2>
												<span><small class="text-danger font-w600 me-1">-1.6%</small>than last week</span>
											</div>
											
											<div id="chart-1"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<p class="mb-0">View</p>
										<div class="dropdown ms-auto c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body pt-2">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<h2 class="card-title">6.2589</h2>
												<span><small class="text-success font-w600 me-1">+1.6%</small>than last week</span>
											</div>
											<div id="totalInvoices-1"></div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-5">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Contact</h4>
										<div class="message-box d-flex align-items-center justify-content-between py-0">
											<div class="input-group search-area">
												<div class="input-group-text bg-white  pe-2"><a href="javascript:void(0)"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M16.6751 19.4916C16.2194 19.036 16.2194 18.2973 16.6751 17.8417C17.1307 17.3861 17.8694 17.3861 18.325 17.8417L22.9916 22.5084C23.4473 22.964 23.4473 23.7027 22.9916 24.1583C22.536 24.6139 21.7973 24.6139 21.3417 24.1583L16.6751 19.4916Z" fill="var(--primary)"></path>
													<path d="M12.8333 18.6667C16.055 18.6667 18.6667 16.055 18.6667 12.8334C18.6667 9.61169 16.055 7.00002 12.8333 7.00002C9.61166 7.00002 6.99999 9.61169 6.99999 12.8334C6.99999 16.055 9.61166 18.6667 12.8333 18.6667ZM12.8333 21C8.323 21 4.66666 17.3437 4.66666 12.8334C4.66666 8.32303 8.323 4.66669 12.8333 4.66669C17.3436 4.66669 21 8.32303 21 12.8334C21 17.3437 17.3436 21 12.8333 21Z" fill="var(--primary)"></path>
													</svg>
													</a>
												</div>
												<input type="text" class="form-control ps-0 border-start-0" placeholder="Search here...">
											</div>
											<a class="icon-bx bg-primary c-pointer">
												<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.125C5.1 16.125 1.875 12.9 1.875 9C1.875 5.1 5.1 1.875 9 1.875C12.9 1.875 16.125 5.1 16.125 9C16.125 12.9 12.9 16.125 9 16.125Z" fill="#FCFCFC"></path>
													<path d="M13.3498 8.02505H9.9748V4.65005C9.9748 4.12505 9.52481 3.67505 8.9998 3.67505C8.4748 3.67505 8.02481 4.12505 8.02481 4.65005V8.02505H4.6498C4.1248 8.02505 3.6748 8.47505 3.6748 9.00005C3.6748 9.52505 4.1248 9.97505 4.6498 9.97505H8.02481V13.35C8.02481 13.8751 8.4748 14.3251 8.9998 14.3251C9.52481 14.3251 9.9748 13.8751 9.9748 13.35V9.97505H13.3498C13.8748 9.97505 14.3248 9.52505 14.3248 9.00005C14.3248 8.47505 13.8748 8.02505 13.3498 8.02505Z" fill="#FCFCFC"></path>
												</svg>
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="row g-3">
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx">
													<img src="assets/images/avatar/1.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">john Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx bgl-success">
													<img src="assets/images/avatar/2.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">Rock Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx">
													<img src="assets/images/avatar/3.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">Ten Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx bgl-danger">
													<img src="assets/images/avatar/1.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">john Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx">
													<img src="assets/images/avatar/2.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">Rock Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6">
												<div class="people-bx">
													<img src="assets/images/avatar/3.jpg " class="rounded-circle mb-2" width="50" alt="">
													<h4 class="card-title--small mb-0">Ten Lee</h4>
													<small>Info@gmail.com</small>
												</div>
											</div>
											
											
										</div>
										
									</div>
								</div>

							</div>
							<div class="col-xl-4 col-lg-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<div>
											<h4 class="card-title">Your Balance</h4>
											<h5 class="fs-24">$25,217k</h5>
										</div>
										<div>
											<p><span class="text-success me-2">+2.7%</span>Than Last Week</p>
										</div>
									</div>
									<div class="card-body">
										<div id="chart-2"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6">
								<div class="card">
									<div class="card-header pb-0 border-0">
										<h2 class="card-title"> Recent Customers </h2>
										<div class="dropdown ms-auto c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Accept Patient</a>
												<a class="dropdown-item" href="javascript:void(0);">Reject Order</a>
												<a class="dropdown-item" href="javascript:void(0);">View Details</a>
											</div>
										</div>

									</div>
									<div class="card-body dz-scroll height370">
										<div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic1.jpg" class="rounded-circle me-2" width="40"  alt="">
												<div>
													<h6 class="mb-0">Yatin Xarma</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$1500</h6>
												<small>50 min ago</small>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic3.jpg" class="rounded-circle me-2" width="40" alt="">
												<div>
													<h6 class="mb-0">john Lee</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$2500</h6>
												<small>50 min ago</small>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic3.jpg" class="rounded-circle me-2" width="40" alt="">
												<div>
													<h6 class="mb-0">john Lee</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$2500</h6>
												<small>50 min ago</small>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic2.jpg" class="rounded-circle me-2" width="40" alt="">
												<div>
													<h6 class="mb-0">john Xarma</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$1500</h6>
												<small>50 min ago</small>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic3.jpg" class="rounded-circle me-2" width="40" alt="">
												<div>
													<h6 class="mb-0">john Lee</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$2500</h6>
												<small>50 min ago</small>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between ">
											<div class="d-flex align-items-center">
												<img src="assets/images/profile/small/pic4.jpg" class="rounded-circle  me-2" width="40" alt="">
												<div>
													<h6 class="mb-0">john Lee</h6>
													<small>Id #12345</small>
												</div>
											</div>
											<div>
												<h6 class="mb-0">$2500</h6>
												<small>50 min ago</small>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-header flex-wrap border-0 pb-0">
										<div>
											<h4 class="card-title">
												Sales Revenue
											</h4>
											<h5 class="fs-24 mb-0">$25,217k<span class="badge badge-success  badge-sm ms-2 light">+2.7%</span></h5>
										</div>
										<div class="card-tabs mt-3 mt-sm-0 mb-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item" role="presentation">
													<a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab" aria-selected="true">Monthly</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab" aria-selected="false" tabindex="-1">Weekly</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab" aria-selected="false" tabindex="-1">Today</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body py-2">
										<div id="chartBar-3"></div>
										
									</div>
									<div class="card-footer border-0 p-0">
										<div class="ttl-project">
											<div class="pr-data">
												<h5>12,721</h5>
												<span>Number of Projects</span>
											</div>
											<div class="pr-data">
												<h5 class="text-primary">721</h5>
												<span>Active Projects</span>
											</div>
											<div class="pr-data">
												<h5>$2,50,523</h5>
												<span>Revenue</span>
											</div>
											<div class="pr-data">
												<h5 class="text-success">12,275h</h5>
												<span>Working Hours</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Transaction</h4>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive fs-14">
											<table class="table display mb-4 dataTablesCard transaction-table " id="example10">
												<thead>
													<tr>
														<th>
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="checkAll">
															  <label class="form-check-label" for="checkAll">
															  </label>
															</div>
															ID 
														</th>
														<th>Date</th>
														<th>Client</th>
														<th>Payment</th>
														<th>Stutus</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td style="width:20%" class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
															  <label class="form-check-label" for="flexCheckDefault2">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-success">$376.5</span></td>
														<td><span class="badge badge-success badge-sm">Completed</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
															  <label class="form-check-label" for="flexCheckDefault3">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-danger">$376.5</span></td>
														<td><span class="badge badge-danger badge-sm">Cancel</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
															  <label class="form-check-label" for="flexCheckDefault4">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-success">$376.5</span></td>
														<td><span class="badge badge-success badge-sm">Completed</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
															  <label class="form-check-label" for="flexCheckDefault5">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-warning">$376.5</span></td>
														<td><span class="badge badge-warning badge-sm">Pending</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
															  <label class="form-check-label" for="flexCheckDefault6">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-success">$376.5</span></td>
														<td><span class="badge badge-success badge-sm">Completed</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
															  <label class="form-check-label" for="flexCheckDefault7">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-danger">$376.5</span></td>
														<td><span class="badge badge-danger badge-sm">Cancel</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td style="width:20%"  class="text-nowrap">
															<div class="form-check">
															  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
															  <label class="form-check-label" for="flexCheckDefault8">
															  </label>
															</div>
															1234569
														</td>
														
														<td>18 Feb 2020</td>
														<td>Rolax Leo</td>
														<td><span class="text-warning">$376.5</span></td>
														<td><span class="badge badge-warning badge-sm">Pending</span></td>
														
														<td>
															<div class="dropdown">
																<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																</div>
															</div>
														</td>
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
		
		
		
		
        <!--**********************************
            Content body end
        ***********************************-->
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
			  <div class="modal-content">
				<div class="modal-header">
				  <h1 class="modal-title fs-5" id="exampleModalLabel">Export Date</h1>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				  <div class="row">
					<div class="col-xl-12">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
						  </div>
					</div>
				  </div>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Save changes</button>
				</div>
			  </div>
			</div>
		  </div>
		<!-- Button trigger modal -->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
        <!--**********************************
            Footer end
			
			
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
			


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
    
	
	
</body>
</html>