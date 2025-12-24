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
						<div class="card">
							<div class="card-body pb-3">
								<div class="row align-items-center">
									<div class="col-xl-3 col-lg-3">
										<p class="mb-2">ID Payment</p>
										<h6 class="mb-0  font-w600">#00123521</h6>
									</div>
									<div class="col-xl-9 col-lg-9 d-flex flex-wrap justify-content-between align-items-center mt-xl-0 mt-3">
										<div class="d-flex me-3 ms-2 align-items-start payment mb-sm-0 mb-3 ">
											<i class="fas fa-phone-alt me-3 fs-16 text-primary"></i>
											<div>
												<p class="mb-2">Telephone</p>
												<h6 class="mb-0 font-w600">+12 345 5662 66</h6>
											</div>
										</div>
										<div class="d-flex me-3  ms-2 align-items-start payment">
											<i class="fas fa-envelope fs-16 text-secondary me-3"></i>
											<div>
												<p class="mb-2">Email</p>
												<h6 class="mb-0 font-w600">samuelbro@mail.com</h6>
											</div>
										</div>
										<div class="d-flex mt-xl-0 mt-3">
											<a class="btn btn-primary light btn-sm me-3" href="javascript:void(0);"><i class="las la-print me-3 scale5"></i>Print</a>
											<a href="javascript:void(0);" class="btn btn-primary btn-sm "><i class="las la-download scale5 me-3"></i>Download Report</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body py-3 transaction-details d-flex flex-wrap justify-content-between align-items-center">
								<div class="user-bx-2 me-3">
									<img src="assets/images/profile/pic2.jpg" class="" alt="">
									<div>
										<h5 class="mb-1">Richard Michael</h5>
										<small>@richardmichael</small>
									</div>
								</div>
								<div class="me-3">
									<p class="mb-2">Payment Method</p>
									<h5 class="mb-0">MasterCard 404</h5>
								</div>
								<div class="me-3">
									<p class="mb-2">Invoice Date</p>
									<h5 class="mb-0">April 29, 2020</h5>
								</div>
								<div class="me-3">
									<p class="mb-2">Due Date</p>
									<h5 class="mb-0">June 5, 2020</h5>
								</div>
								<div class="me-3">
									<p class="mb-2">Date Paid</p>
									<h5 class="mb-0">June 4, 2024</h5>
								</div>
								<div class="amount-bx border mt-xl-0 mt-3">
									<i class="fas fa-dollar-sign"></i>
									<div>
										<p class="mb-0">Amount</p>
										<h5 class="mb-0">$ 986.23</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-6 col-lg-6">
								<div class="card overflow-hidden">
									<div class="card-header border-0">
										<h4 class="card-title mb-0">Active Transaction</h4>
									</div>
									<div class="card-body pe-xl-0">
										<div class="row">
											<div class="col-xl-8 col-xxl-7 active-map-main">
												<div id="world-map" class="active-map"></div>  
											</div>
											<div class="col-xl-4 col-xxl-5 active-country dz-scroll">
												<div class="">
													<div class="country-list">
														<img src="assets/images/country/india.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">India</p>
																<p class="mb-0">50%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:60%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/canada.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">Canada</p>
																<p class="mb-0">30%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:30%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/russia.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">Russia</p>
																<p class="mb-0">20%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:20%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/uk.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">United Kingdom</p>
																<p class="mb-0">40%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:40%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/aus.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">Australia</p>
																<p class="mb-0">60%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:70%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/usa.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">United States</p>
																<p class="mb-0">20%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:80%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/pak.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">Pakistan</p>
																<p class="mb-0">20%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:20%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/germany.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">Germany</p>
																<p class="mb-0">80%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:80%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/uae.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">UAE</p>
																<p class="mb-0">30%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:30%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													<div class="country-list">
														<img src="assets/images/country/china.png" alt="">
														<div class="progress-box mt-0">
															<div class="d-flex justify-content-between">
																<p class="mb-0 c-name">China</p>
																<p class="mb-0">40%</p>
															</div>
															<div class="progress">
																<div class="progress-bar bg-primary" style="width:40%; height:6px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6">
								<div class="card">
									<div class="card-body  transaction-details pb-0">
										<div class="row">
											<div class="col-xl-5 col-xxl-6">
												<div>
													<h4 class="card-title">Specifics</h4>
													<span>Lorem ipsum dolor sit amet, consectetur</span>
													<p class="fs-15 font-w600 mt-2 text-dark d-block">Our recent transactions show a variety of purchases and deposits.</p>
													<div class="amount-bx border mb-2">
														<i class="fas fa-dollar-sign bg-danger"></i>
														<div>
															<p class="mb-0">Loss</p>
															<h5 class="mb-0">$ 986.23</h5>
														</div>
													</div>
													<div class="amount-bx border">
														<i class="fas fa-dollar-sign bg-success"></i>
														<div>
															<p class="mb-0">Profit</p>
															<h5 class="mb-0">$ 986.23</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-7 col-xxl-6">
												<div id="revenueMap" class="revenueMap1"></div>
											</div>
										</div>
									</div>
									<div class="card-footer border-0 pt-0">
										<ul class="specifics-list flex-wrap">
											<li>
												<span class="bg-blue"></span>
												<div>
													<h4 class="card-title--medium mb-0">63,876</h4>
													<small>Property Sold</small>
												</div>
											</li>
											<li>
												<span class="bg-orange"></span>
												<div>
													<h4 class="card-title--medium mb-0">872,235</h4>
													<small>Income</small>
												</div>
											</li>
											<li>
												<span class="bg-primary"></span>
												<div>
													<h4 class="card-title--medium mb-0">872,235</h4>
													<small>Expense</small>
												</div>
											</li>
											<li>
												<span class="bg-danger"></span>
												<div>
													<h4 class="card-title--medium mb-0">21,224</h4>
													<small>Property Ranted</small>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-9 col-xxl-8">
								<div class="card">
									<div class="card-header border-0 flex-wrap">
										<h4 class="card-title">Chart Activity</h4>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex me-sm-3">
												<label class="form-check-label" for="flexSwitchCheckChecked1">Spendings</label>
												<div class="form-check form-switch toggle-switch">
													<input class="form-check-input custome" type="checkbox" id="flexSwitchCheckChecked1" checked>
												 
												</div>
											</div>	
											<div class="d-flex me-sm-3">
												<label class="form-check-label" for="flexSwitchCheckChecked22">Income</label>	
												<div class="form-check form-switch toggle-switch">
												  <input class="form-check-input custome" type="checkbox" id="flexSwitchCheckChecked22" checked>
												  
												</div>
											</div>	
											<div class="d-flex">
												<label class="form-check-label" for="flexSwitchCheckChecked33">Others</label>	
												<div class="form-check form-switch toggle-switch">
												  <input class="form-check-input custome" type="checkbox" id="flexSwitchCheckChecked33" checked>
												  
												</div>
											</div>	
										</div>
										<select class="default-select dashboard-select mt-md-0 mt-2">
										  <option data-display="newest">Newest</option>
										  <option value="2">Oldest</option>
										</select>
									</div>
									<div class="card-body">
										<div id="reservationChart" class="reservationChart"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card">
									<div class="card-header border-0">
										<div>
											<h4 class="card-title">Card Statistic</h4>
											<span>Lorem ipsum dolor sit amet.</span>
										</div>	
									</div>
									<div class="card-body text-center">
										<div id="emailchart" class="mb-3"></div>
										<div class="row">
											<div class="col-6 mb-2">
												<span class="fs-12">
													<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect width="19" height="19" rx="9.5" fill="#2251F8"/>
													</svg>
													Main Card	
												</span>
											</div>
											<div class="col-6 mb-2">
												<span class="fs-12">
													<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect width="19" height="19" rx="9.5" fill="#F87C22"/>
													</svg>
													Orange Card
												</span>
											</div>
											<div class="col-6">
												<span class="fs-12">
													<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect width="19" height="19" rx="9.5" fill="#AB31E4"/>
													</svg>
													Purple Card
												</span>
											</div>
											<div class="col-6">
												<span class="fs-12">
													<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect width="19" height="19" rx="9.5" fill="#50D37D"/>
													</svg>
													Green Card	
												</span>
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