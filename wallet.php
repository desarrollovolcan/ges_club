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
					<div class="col-xl-3 col-xxl-4">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-body action">
										
										<div class="">
											<img src="assets/images/pattern/circle.png" alt="">
											<h4 class=" fs-26 text-white mt-3">$ 98,452.44</h4>
											<span class="text-white">Wallet Balance</span>
											<span class="d-block text-white mt-1">+0,8% than last week</span>
										</div>
									</div>
									<div class="card-body">
										<div class="d-flex justify-content-between">
											<div class="text-center">
												<svg class="mb-1" width="50" height="50" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="60" height="60" rx="8" fill="#09BD3C"/>
													<path d="M39.1667 18.1667H22.8334C21.5957 18.1667 20.4088 18.6584 19.5336 19.5335C18.6584 20.4087 18.1667 21.5957 18.1667 22.8334V31C18.1667 31.3094 18.2897 31.6062 18.5085 31.825C18.7272 32.0438 19.024 32.1667 19.3334 32.1667H25.1667V42.6667C25.1662 42.8898 25.2297 43.1085 25.3496 43.2966C25.4695 43.4848 25.6409 43.6346 25.8434 43.7284C26.0464 43.8218 26.272 43.855 26.4933 43.824C26.7145 43.7929 26.9223 43.699 27.0917 43.5534L30.4167 40.7067L33.7417 43.5534C33.9531 43.7341 34.222 43.8334 34.5001 43.8334C34.7782 43.8334 35.0471 43.7341 35.2584 43.5534L38.5834 40.7067L41.9084 43.5534C42.1197 43.7341 42.3887 43.8334 42.6667 43.8334C42.8355 43.8322 43.0023 43.7964 43.1567 43.7284C43.3593 43.6346 43.5306 43.4848 43.6506 43.2966C43.7705 43.1085 43.834 42.8898 43.8334 42.6667V22.8334C43.8334 21.5957 43.3418 20.4087 42.4666 19.5335C41.5914 18.6584 40.4044 18.1667 39.1667 18.1667ZM20.5001 29.8334V22.8334C20.5001 22.2145 20.7459 21.621 21.1835 21.1834C21.6211 20.7459 22.2146 20.5 22.8334 20.5C23.4523 20.5 24.0457 20.7459 24.4833 21.1834C24.9209 21.621 25.1667 22.2145 25.1667 22.8334V29.8334H20.5001ZM41.5001 40.135L39.3417 38.28C39.1304 38.0993 38.8615 37.9999 38.5834 37.9999C38.3053 37.9999 38.0364 38.0993 37.8251 38.28L34.5001 41.1267L31.1751 38.28C30.9638 38.0993 30.6948 37.9999 30.4167 37.9999C30.1387 37.9999 29.8697 38.0993 29.6584 38.28L27.5001 40.135V22.8334C27.4986 22.0137 27.2813 21.209 26.8701 20.5H39.1667C39.7856 20.5 40.3791 20.7459 40.8167 21.1834C41.2542 21.621 41.5001 22.2145 41.5001 22.8334V40.135ZM39.1667 24C39.1667 24.3094 39.0438 24.6062 38.825 24.825C38.6062 25.0438 38.3095 25.1667 38.0001 25.1667H31.0001C30.6907 25.1667 30.3939 25.0438 30.1751 24.825C29.9563 24.6062 29.8334 24.3094 29.8334 24C29.8334 23.6906 29.9563 23.3939 30.1751 23.1751C30.3939 22.9563 30.6907 22.8334 31.0001 22.8334H38.0001C38.3095 22.8334 38.6062 22.9563 38.825 23.1751C39.0438 23.3939 39.1667 23.6906 39.1667 24ZM39.1667 28.6667C39.1667 28.9761 39.0438 29.2729 38.825 29.4916C38.6062 29.7104 38.3095 29.8334 38.0001 29.8334H31.0001C30.6907 29.8334 30.3939 29.7104 30.1751 29.4916C29.9563 29.2729 29.8334 28.9761 29.8334 28.6667C29.8334 28.3573 29.9563 28.0605 30.1751 27.8417C30.3939 27.6229 30.6907 27.5 31.0001 27.5H38.0001C38.3095 27.5 38.6062 27.6229 38.825 27.8417C39.0438 28.0605 39.1667 28.3573 39.1667 28.6667ZM39.1667 33.3334C39.1667 33.6428 39.0438 33.9395 38.825 34.1583C38.6062 34.3771 38.3095 34.5 38.0001 34.5H31.0001C30.6907 34.5 30.3939 34.3771 30.1751 34.1583C29.9563 33.9395 29.8334 33.6428 29.8334 33.3334C29.8334 33.0239 29.9563 32.7272 30.1751 32.5084C30.3939 32.2896 30.6907 32.1667 31.0001 32.1667H38.0001C38.3095 32.1667 38.6062 32.2896 38.825 32.5084C39.0438 32.7272 39.1667 33.0239 39.1667 33.3334Z" fill="white"/>
												</svg>
												<h4 class="card-title--small mb-0">Send Invoices</h4>
											</div>
											<div class="text-center">
												<svg class="mb-1" width="50" height="50" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="60" height="60" rx="8" fill="#FD5353"/>
													<g opacity="0.98" clip-path="">
													<path d="M26.7781 19.0125C27.1062 19.6906 26.8164 20.5109 26.1383 20.8391C24.2516 21.7469 22.6547 23.1578 21.5172 24.9242C20.3523 26.7344 19.7344 28.8344 19.7344 31C19.7344 37.2125 24.7875 42.2656 31 42.2656C37.2125 42.2656 42.2656 37.2125 42.2656 31C42.2656 28.8344 41.6477 26.7344 40.4883 24.9187C39.3563 23.1523 37.7539 21.7414 35.8672 20.8336C35.1891 20.5055 34.8992 19.6906 35.2273 19.007C35.5555 18.3289 36.3703 18.0391 37.0539 18.3672C39.4 19.4937 41.3852 21.2437 42.7906 23.4422C44.2344 25.6953 45 28.3094 45 31C45 34.7406 43.5453 38.257 40.8984 40.8984C38.257 43.5453 34.7406 45 31 45C27.2594 45 23.743 43.5453 21.1016 40.8984C18.4547 38.2516 17 34.7406 17 31C17 28.3094 17.7656 25.6953 19.2148 23.4422C20.6258 21.2492 22.6109 19.4937 24.9516 18.3672C25.6352 18.0445 26.45 18.3289 26.7781 19.0125Z" fill="white"/>
													<path d="M25.679 30.2726C25.411 30.0047 25.2797 29.6547 25.2797 29.3047C25.2797 28.9547 25.411 28.6047 25.679 28.3367L29.1188 24.8969C29.6219 24.3937 30.2891 24.1203 30.9946 24.1203C31.7 24.1203 32.3727 24.3992 32.8704 24.8969L36.3102 28.3367C36.8461 28.8726 36.8461 29.7367 36.3102 30.2726C35.7743 30.8086 34.9102 30.8086 34.3743 30.2726L32.3563 28.2547L32.3563 36.0258C32.3563 36.7804 31.7438 37.3929 30.9891 37.3929C30.2344 37.3929 29.6219 36.7804 29.6219 36.0258L29.6219 28.2492L27.604 30.2672C27.079 30.8031 26.2149 30.8031 25.679 30.2726Z" fill="white"/>
													</g>
													<defs>
													<clipPath>
													<rect width="28" height="28" fill="white" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 45 45)"/>
													</clipPath>
													</defs>
												</svg>
												<h4 class="card-title--small mb-0">Transfer Invoices</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<div>
											<h4 class="card-title">Invoices Sent</h4>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur</p>
										</div>
									</div>
									<div class="card-body pt-0">
										<div id="redial"></div>
										<span class="text-center d-block fs-18 font-w600">On Progress <small class="text-success">70%</small></span>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div>
											<h4 class="card-title">Invoices Sent</h4>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur</p>
										</div>
									</div>
									<div class="card-body p-0 loadmore-content dz-scroll height370  recent-activity-wrapper" id="RecentActivityContent">
										<div class="invoice-list">
											<img src="assets/images/avatar/1.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">FSoziety</a></h6>
												<small>4h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$45</span>
										</div>
										<div class="invoice-list">
											<img src="assets/images/avatar/2.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">Jhon</a></h6>
												<small>5h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$55</span>
										</div>
										<div class="invoice-list">
											<img src="assets/images/avatar/3.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">Yatin</a></h6>
												<small>1h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$56</span>
										</div>
										<div class="invoice-list">
											<img src="assets/images/avatar/5.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">Nitesh</a></h6>
												<small>2h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$57</span>
										</div>
										<div class="invoice-list">
											<img src="assets/images/avatar/1.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">FSoziety</a></h6>
												<small>4h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$45</span>
										</div>
										<div class="invoice-list">
											<img src="assets/images/avatar/1.jpg" alt="" class="me-3">
											<div class="me-auto">
												<h6 class="card-title--medium mb-0"><a href="javascript:void(0);" class="text-black">FSoziety</a></h6>
												<small>4h ago</small>
											</div>
											<span class="fs-16 text-primary font-w600">$45</span>
										</div>
										
									</div>
									<div class="card-footer border-0">
										<a href="javascript:void(0);" class="btn btn-primary d-block   dz-load-more" id="RecentActivity" rel="ajax/recentactivity.php">View More</a>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-xl-3 col-xxl-6 col-6">
												<div>
													<div class="d-flex align-items-center mb-3 flex-wrap">
														<div class="d-inline-block position-relative donut-chart-sale">
															<span class="donut1" data-peity='{ "fill": ["rgb(172, 57, 212)", "rgba(238, 238, 238, 1)"],   "innerRadius": 30, "radius": 10}'>5/8</span>
														</div>
														<div class="ms-3">
															<h4 class="card-title--medium mb-0">Installment</h4>
															<span class="fs-14 font-w600">$3,784</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-xxl-6 col-6">
												<div>
													<div class="d-flex align-items-center mb-3  flex-wrap">
														<div class="d-inline-block position-relative donut-chart-sale">
															<span class="donut1" data-peity='{ "fill": ["rgb(64, 212, 168)", "rgba(238, 238, 238, 1)"],   "innerRadius": 30, "radius": 10}'>4/5</span>
														</div>
														<div class="ms-3">
															<h4 class="card-title--medium mb-0">Investment</h4>
															<span class="fs-14 font-w600">$3,784</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-xxl-6 col-6">
												<div>
													<div class="d-flex align-items-center mb-3 flex-wrap">
														<div class="d-inline-block position-relative donut-chart-sale">
															<span class="donut1" data-peity='{ "fill": ["rgb(70, 30, 231)", "rgba(238, 238, 238, 1)"],   "innerRadius": 30, "radius": 10}'>4/8</span>
														</div>
														<div class="ms-3">
															<h4 class="card-title--medium mb-0">Property</h4>
															<span class="fs-14 font-w600">$3,784</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-xxl-6 col-6">
												<div class="mb-3 text-end">
													<a href="javascript:void(0);" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal">+ New Spends</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header flex-wrap border-0 pb-0 align-items-end">
										<div class="me-3 mb-sm-0 mb-3">
											<h5 class="card-title">Main Balance</h5>
											<span class="fs-30 font-w600">$673,412.66</span>
										</div>
										<div class="me-3 mb-3">
											<h6 class="card-title--small mb-1">VALID THRU</h6>
											<span>08/21</span>
										</div>
										<div class="me-3 mb-3">
											<h6 class="card-title--small mb-1">CARD HOLDER</h6>
											<span>Eren Yeager</span>
										</div>
										<span class="fs-18 font-w600 me-3 mb-3">**** **** **** 1234</span>
										<div class="dropdown mb-auto">
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
									</div>
									<div class="card-body">
										<div class="progress default-progress">
											<div class="progress-bar bg-gradient5 progress-animated" style="width: 50%; height:10px;" role="progressbar">
												<span class="sr-only">50% Complete</span>
											</div>
										</div>
										<div class="row mt-4 pt-3">
											<div class="col-xl-4 col-xxl-7 col-md-6">
												<h4 class="card-title">Weekly Summary</h4>
												<div class="row align-items-center">
													<div class="col-sm-6">
														<canvas id="pieChart" ></canvas>
													</div>
													<div class="col-sm-6">
														<ul class="card-list mt-3">
															<li class="mb-2"><span class="bg-success circle"></span><span class="me-4">
															<svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="-0.00012207" width="16" height="16" rx="8" fill="#39DD53"/>
															</svg>
															Income</span><span class="text-black fs-14 font-w700">50%</span></li>
															<li class="mb-2"><span class="bg-danger circle"></span><span class="me-4">
															<svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="-0.00012207" y="3.05176e-05" width="16" height="16" rx="8" fill="#FFB252"/>
															</svg>
															Expense</span><span class="text-black fs-14 font-w700">30%</span></li>
															<li class="mb-2"><span class="bg-light circle"></span><span class="me-4">
															<svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="-0.00012207" width="16" height="16" rx="8" fill="#D7D7D7"/>
															</svg>
															Unknown</span><span class="text-black fs-14 font-w700">20%</span></li>
														</ul>
													</div>
													
												</div>
											</div>
											<div class="col-xl-8 col-xxl-5 col-md-6 align-self-center">
												<div id="lineChart" class="bar-chart"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0 transactions-tab">
										<div class="me-3">
											<h4 class="card-title">Payment History</h4>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur</p>
										</div>
										<div class="card-tabs mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab">Monthly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">Today</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane fade active show" id="monthly" role="tabpanel">
											<div id="accordion-one" class="accordion style-1">
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne1">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/1.jpg" alt="">
																<span class="bg-warning">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip3)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip3">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="card-title--medium mb-0"><a href="javascript:void(0)">XYZ Store ID</a></h6>
																
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-sm" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne1" class="collapse accordion_body" data-bs-parent="#accordion-one">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#A4A4A4"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#A4A4A4"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#A4A4A4"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#default_collapseOne2">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/2.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip31)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip31">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="card-title--small mb-0"><a href="javascript:void(0)">Olivia Brownlee</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-success btn-sm" href="javascript:void(0);">Completed</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne2" class="collapse accordion_body show" data-bs-parent="#accordion-one">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne3">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/3.jpg" alt="">
																<span class="bg-dark">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip32)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip32">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="card-title--small mb-0"><a href="javascript:void(0)">Angela Moss</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-dark btn-sm" href="javascript:void(0);">Canceled</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne3" class="collapse accordion_body" data-bs-parent="#accordion-one">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne4">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/4.jpg" alt="">
																<span class="bg-warning">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip33)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip33">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="card-title--small mb-0"><a href="javascript:void(0)">XYZ Store ID</a></h6>
																
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-sm" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne4" class="collapse accordion_body" data-bs-parent="#accordion-one">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne5">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/5.jpg" alt="">
																<span class="bg-warning">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip34)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip34">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="card-title--small mb-0"><a href="javascript:void(0)">Peter Parkur</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-sm" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne5" class="collapse accordion_body" data-bs-parent="#accordion-one">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="Weekly" role="tabpanel">
											<div id="accordion-one1" class="accordion style-1">
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne11">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/1.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip35)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip35">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-18 font-w700 mb-0"><a href="javascript:void(0)">XYZ Store ID</a></h6>
																
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-rounded" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne11" class="collapse accordion_body" data-bs-parent="#accordion-one1">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#default_collapseOne21">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/2.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip36)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip36">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-18 font-w700 mb-0"><a href="javascript:void(0)">Olivia Brownlee</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-success btn-rounded" href="javascript:void(0);">Completed</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne21" class="collapse accordion_body show" data-bs-parent="#accordion-one1">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne31">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/3.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip37)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip37">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-18 font-w700 mb-0"><a href="javascript:void(0)">Angela Moss</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-dark btn-rounded" href="javascript:void(0);">Canceled</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne31" class="collapse accordion_body" data-bs-parent="#accordion-one1">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne41">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/4.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip38)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip38">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-18 font-w700 mb-0"><a href="javascript:void(0)">XYZ Store ID</a></h6>
																
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-rounded" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne41" class="collapse accordion_body" data-bs-parent="#accordion-one1">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="Today" role="tabpanel">
											<div id="accordion-one2" class="accordion style-1">
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne12">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/1.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip39)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip39">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-18 font-w700 mb-0"><a href="javascript:void(0)">XYZ Store ID</a></h6>
																
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-warning btn-rounded" href="javascript:void(0);">Pending</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne12" class="collapse accordion_body" data-bs-parent="#accordion-one2">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#default_collapseOne22">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/2.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip310)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip310">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-16 font-w700 mb-0"><a href="javascript:void(0)">Olivia Brownlee</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-success btn-rounded" href="javascript:void(0);">Completed</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne22" class="collapse accordion_body show" data-bs-parent="#accordion-one2">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14  mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#fff"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#fff"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#fff"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne32">
														<div class="d-flex align-items-center">
															<div class="profile-image">
																<img src="assets/images/avatar/3.jpg" alt="">
																<span class="bg-success">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<g clip-path="url(#clip311)">
																		<path d="M10.4125 14.85C10.225 14.4625 10.3906 13.9937 10.7781 13.8062C11.8563 13.2875 12.7688 12.4812 13.4188 11.4719C14.0844 10.4375 14.4375 9.23749 14.4375 7.99999C14.4375 4.44999 11.55 1.56249 8 1.56249C4.45 1.56249 1.5625 4.44999 1.5625 7.99999C1.5625 9.23749 1.91562 10.4375 2.57812 11.475C3.225 12.4844 4.14062 13.2906 5.21875 13.8094C5.60625 13.9969 5.77187 14.4625 5.58437 14.8531C5.39687 15.2406 4.93125 15.4062 4.54062 15.2187C3.2 14.575 2.06562 13.575 1.2625 12.3187C0.4375 11.0312 -4.16897e-07 9.53749 -3.49691e-07 7.99999C-2.56258e-07 5.86249 0.83125 3.85312 2.34375 2.34374C3.85313 0.831242 5.8625 -7.37314e-06 8 -7.2797e-06C10.1375 -7.18627e-06 12.1469 0.831243 13.6563 2.34374C15.1688 3.85624 16 5.86249 16 7.99999C16 9.53749 15.5625 11.0312 14.7344 12.3187C13.9281 13.5719 12.7938 14.575 11.4563 15.2187C11.0656 15.4031 10.6 15.2406 10.4125 14.85Z" fill="white"/>
																		<path d="M11.0407 8.41563C11.1938 8.56876 11.2688 8.76876 11.2688 8.96876C11.2688 9.16876 11.1938 9.36876 11.0407 9.52188L9.07503 11.4875C8.78753 11.775 8.40628 11.9313 8.00315 11.9313C7.60003 11.9313 7.21565 11.7719 6.93127 11.4875L4.96565 9.52188C4.6594 9.21563 4.6594 8.72188 4.96565 8.41563C5.2719 8.10938 5.76565 8.10938 6.0719 8.41563L7.22502 9.56876L7.22502 5.12814C7.22502 4.69689 7.57503 4.34689 8.00628 4.34689C8.43753 4.34689 8.78753 4.69689 8.78753 5.12814L8.78753 9.57188L9.94065 8.41876C10.2407 8.11251 10.7344 8.11251 11.0407 8.41563Z" fill="white"/>
																		</g>
																		<defs>
																		<clipPath id="clip311">
																		<rect width="16" height="16" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 -7.62939e-06)"/>
																		</clipPath>
																		</defs>
																	</svg>
																</span>
															</div>
															<div class="user-info">
																<h6 class="fs-16 font-w700 mb-0"><a href="javascript:void(0)">Angela Moss</a></h6>
															</div>
														</div>
														<span>June 5, 2020, 08:22 AM</span>
														<span>+$5,553</span>
														<span>MasterCard 404</span>
														<a class="btn btn-dark btn-rounded" href="javascript:void(0);">Canceled</a>
														<span class="accordion-header-indicator"></span>
													</div>
													<div id="default_collapseOne32" class="collapse accordion_body" data-bs-parent="#accordion-one2">
														<div class="payment-details accordion-body-text">
															<div class="me-3 mb-3">
																<p class="fs-14 mb-2">ID Payment</p>
																<span class="font-w500">#00123521</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14 mb-2">Payment Method</p>
																<span class="font-w500">MasterCard 404</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14 mb-2">Invoice Date</p>
																<span class="font-w500">April 29, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14 mb-2">Due Date</p>
																<span class="font-w500">June 5, 2020</span>
															</div>
															<div class="me-3 mb-3">
																<p class="fs-14 mb-2">Date Paid</p>
																<span class="font-w500">June 4, 2020</span>
															</div>
															<div class="info mb-3">
																<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#393939"/>
																	<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#393939"/>
																	<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#393939"/>
																</svg>
																<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, <br>consectetur </p>
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
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		<!-- Button trigger modal -->
			
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Spends title</h1>
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
					<button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
				</div>
			</div>
		
		
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