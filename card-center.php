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
						<div class="card-slider owl-carousel">
							<div class="items">
								<div class="card-bx bg-blue mb-0">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1 fs-18 font-w700">Main Balance</p>
												<h2 class="fs-32 font-w800  text-white mb-5">$673,412.66</h2>
											</div>
											<img src="assets/images/pattern/ellipse-blue.png" class="top-img" alt="">
											<img src="assets/images/pattern/ellipse-blue-sm.png" class="bottom-img" alt="">
											<img src="assets/images/pattern/circle.png" class="mb-4 circle-img" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div>
												<p class="fs-14 mb-1">CARD HOLDER</p>
												<span>Franklin Jr.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card-bx bg-orange mb-0">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1 fs-18 font-w700">Main Balance</p>
												<h2 class="fs-32 font-w800  text-white mb-5">$673,412.66</h2>
											</div>
											<img src="assets/images/pattern/ellipse-orange.png" class="top-img1" alt="">
											<img src="assets/images/pattern/ellipse-orange.png" class="bottom-img1" alt="">
											<img src="assets/images/pattern/circle.png" class="mb-4 circle-img" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div>
												<p class="fs-14 mb-1">CARD HOLDER</p>
												<span>Franklin Jr.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card-bx bg-purpe mb-0">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1 fs-18 font-w700">Main Balance</p>
												<h2 class="fs-32 font-w800  text-white mb-5">$673,412.66</h2>
											</div>
											<img src="assets/images/pattern/ellipse-purple-sm.png" class="top-img2" alt="">
											<img src="assets/images/pattern/ellipse-purple.png" class="bottom-img2" alt="">
											<img src="assets/images/pattern/circle.png" class="mb-4 circle-img" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div>
												<p class="fs-14 mb-1">CARD HOLDER</p>
												<span>Franklin Jr.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card-bx bg-red mb-0">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1 fs-18 font-w700">Main Balance</p>
												<h2 class="fs-32 font-w800  text-white mb-5">$673,412.66</h2>
											</div>
											<img src="assets/images/pattern/ellipse-red.png" class="top-img1" alt="">
											<img src="assets/images/pattern/ellipse-orange-sm.png" class="bottom-img4" alt="">
											<img src="assets/images/pattern/circle.png" class="mb-4 circle-img" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div>
												<p class="fs-14 mb-1">CARD HOLDER</p>
												<span>Franklin Jr.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header flex-wrap border-0 pb-0 align-items-end">
										<div class="mb-3 me-3">
											<h5 class="card-title mb-2">Wallet Balance</h5>
											<span class="text-num text-primary fs-30 font-w600">$673,412.66</span>
										</div>
										<div class="me-3 mb-3">
											<small class="mb-1 d-block">VALID THRU</small>
											<h4 class="mb-0">08/21</h4>
										</div>
										<div class="me-3 mb-3">
											<small class="mb-1">CARD HOLDER</small>
											<h4 class="mb-0">Eren Yeager</h4>
										</div>
										<h4 class="mb-0">**** **** **** 1234</h4>
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
											<div class="progress-bar bg-gradient5  progress-animated" style="width: 50%; height:10px;" role="progressbar">
												<span class="sr-only">50% Complete</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-sm-flex d-block border-0">
										<div class="me-auto mb-sm-0 mb-4">
											<h4 class="card-title">Card List</h4>
											<span class="fs-14">Lorem ipsum dolor sit amet, consectetur</span>
										</div>
										<select class="default-select dashboard-select">
										  <option data-display="Yearly">Yearly</option>
										  <option value="1">Weekly</option>
										  <option value="2">Yearly</option>
										</select>
									</div>
									<div class="card-body p-0 pb-4">
										
										<div class="d-flex border-bottom justify-content-between flex-wrap align-items-center card-type">
											<div class="d-flex py-3 align-items-center ">
												<img src="assets/images/card/card1.png" alt="" class="rounded me-3 card-list-img" width="100">
												<div class="me-3">
													<small class="mb-1 d-block">Card Type</small>
													<h6 class="mb-0 card-title--medium">Primary</h6>
												</div>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Bank</small>
												<h6 class="mb-0 card-title--medium">ABC Bank</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Card Number</small>
												<h6 class="card-title--medium mb-0">**** **** **** 2256</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="d-block mb-1">Namein Card</small>
												<h6 class="card-title--medium">Franklin Jr.</h6>
											</div>
											<a href="javascript:void(0);" class="badge badge-success light badge-sm">See Number</a>
											<div class="dropdown pb-lg-0 pb-2">
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
										<div class="d-flex border-bottom justify-content-between flex-wrap align-items-center card-type">
											<div class="d-flex py-3 align-items-center ">
												<img src="assets/images/card/card4.png" alt="" class="rounded me-3 card-list-img" width="100">
												<div class="me-3">
													<small class="mb-1 d-block">Card Type</small>
													<h6 class="mb-0 card-title--medium">Primary</h6>
												</div>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Bank</small>
												<h6 class="mb-0 card-title--medium">HDFC Bank</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Card Number</small>
												<h6 class="card-title--medium mb-0">**** **** **** 2278</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="d-block mb-1">Namein Card</small>
												<h6 class="card-title--medium">John Lee</h6>
											</div>
											<a href="javascript:void(0);" class="badge badge-primary light badge-sm">See Number</a>
											<div class="dropdown pb-lg-0 pb-2">
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
										<div class="d-flex border-bottom justify-content-between flex-wrap align-items-center card-type">
											<div class="d-flex py-3 align-items-center ">
												<img src="assets/images/card/card2.png" alt="" class="rounded me-3 card-list-img" width="100">
												<div class="me-3">
													<small class="mb-1 d-block">Card Type</small>
													<h6 class="mb-0 card-title--medium">Orange</h6>
												</div>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Bank</small>
												<h6 class="mb-0 card-title--medium">ABC Bank</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Card Number</small>
												<h6 class="card-title--medium mb-0">**** **** **** 2257</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="d-block mb-1">Namein Card</small>
												<h6 class="card-title--medium">Yatin Xarma</h6>
											</div>
											<a href="javascript:void(0);" class="badge badge-warning light badge-sm">See Number</a>
											<div class="dropdown pb-lg-0 pb-2">
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
										<div class="d-flex border-bottom justify-content-between flex-wrap align-items-center card-type">
											<div class="d-flex py-3 align-items-center ">
												<img src="assets/images/card/card1.png" alt="" class="rounded me-3 card-list-img" width="100">
												<div class="me-3">
													<small class="mb-1 d-block">Card Type</small>
													<h6 class="mb-0 card-title--medium">Primary</h6>
												</div>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Bank</small>
												<h6 class="mb-0 card-title--medium">ABC Bank</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="mb-1 d-block">Card Number</small>
												<h6 class="card-title--medium mb-0">**** **** **** 2256</h6>
											</div>
											<div class="me-3 pb-3 mt-3">
												<small class="d-block mb-1">Namein Card</small>
												<h6 class="card-title--medium">Franklin Jr.</h6>
											</div>
											<a href="javascript:void(0);" class="badge badge-success light badge-sm">See Number</a>
											<div class="dropdown pb-lg-0 pb-2">
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
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-4">
						<div class="row">
							<div class="col-xl-12 col-lg-6">
								<div class="card overflow-hidden">
									<div class="card-header d-sm-flex d-block border-0 pb-0">
										<div class="mb-sm-0 mb-2">
											<p class="mb-1">Income</p>
											<span class="mb-0">
												<strong class="fs-20 text-black">$12,874</strong></span>
										</div>
										<span class="fs-12">
										<svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M14.3514 7.5C15.9974 9.37169 19.0572 12.8253 20 14H1V1L8.18919 10.75L14.3514 7.5Z" fill="url(#paint3_linear)"/>
											<path d="M19.5 13.5C18.582 12.4157 15.6027 9.22772 14 7.5L8 10.5L1 1.5" stroke="#FF2E2E" stroke-width="2" stroke-linecap="round"/>
											<defs>
											<linearGradient id="paint0_linear" x1="10.5" y1="2.625" x2="9.64345" y2="13.9935" gradientUnits="userSpaceOnUse">
											<stop offset="1" stop-color="#FF2E2E" stop-opacity="0.03"/>
											</linearGradient>
											</defs>
										</svg>
										4% (30 days)</span>
									</div>
									<div class="card-body p-0">
										<canvas id="widgetChart5" height="110"></canvas>
									</div>
									
								</div>
							</div>
							<div class="col-xl-12 col-lg-6">
								<div class="card">
									<div class="card-header border-0 pb-0 flex-wrap">
										<div>
											<h3 class="card-title">Current Balance</h3>
											<h4 class="fs-18 font-w600 mt-3 mb-2">$ 24,567.33</h4>
											<span><small class="text-success font-w700 me-1">+2.7%</small>  than last week</span>
										</div>
										<div class="current-icon">
											<a href="javascript:void(0);"><i class="fas fa-long-arrow-alt-up"></i></a>
										</div>
									</div>
									<div class="card-body py-3 px-0">
										<div id="chartTimeline3" class="chartTimeline3"></div>
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
					<h1 class="modal-title fs-5" id="exampleModalLabel">New Invoice</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-xl-12">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label required">Invoice Id</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="#123">
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