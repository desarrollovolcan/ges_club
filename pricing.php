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
			<div class="container">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Pricing</a></li>
						<li class="breadcrumb-item  active"><a href="javascript:void(0)">Pricing</a></li>
					</ol>
                </div>
				<div class="row">
					<div class="col-xl-12">
						<div class="text-center">
							<h2>Select Your <strong class="text-primary">Plan</strong></h2>
							<p>All Plan Come With a 14days Free trial peride.</p>
						</div>
						<div class="d-flex justify-content-center mb-4">
							<ul class="nav nav-pills" id="pills-tab2" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" data-series="year" id="pills-year-tab2"
										data-bs-toggle="pill" data-bs-target="#pills-year" type="button" role="tab"
										aria-selected="true">Yearly</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" data-series="month" id="pills-month-tab2"
										data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab"
										aria-selected="false" tabindex="-1">Monthly</button>
								</li>
							</ul>
						</div>
						<div class="row">
							<div class="tab-content" id="pills-tabContent1">
								<div class="tab-pane fade show active" id="pills-year" role="tabpanel">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-sm-6">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-info light border-0">Standard</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$12</h4><span>/Per Year</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li class="disable">Program reviews 1x a month</li>
															<li class="disable">Program reviews 1x a month</li>
															<li class="disable">CPM Overage: Unlimited</li>
															<li class="disable">Assisted onboarding support</li>
															<li class="disable">CPM Overage: Unlimited</li>
														</ul>
														
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Choose plans<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-sm-6">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-success light border-0">Premium</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$25</h4><span>/Per Year</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li>
																
																Multiple images &amp; videos
															</li>
															<li>
																
																Basic customer support
															</li>
															<li>
																
																Featured ads
															</li>
															<li class="disable">Program reviews 1x a month</li>
															<li class="disable">CPM Overage: Unlimited</li>
															
														</ul>
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Choose plans<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-warning light border-0">Business</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$200</h4><span>/Per Year</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li>
																
																Multiple images &amp; videos
															</li>
															<li>
																
																Basic customer support
															</li>
															<li>
																
																Featured ads
															</li>
															<li>
																
																Special ads badge
															</li>
															<li>
																
																Call to Action in Every Ads
															</li>
														</ul>
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Get Started Free<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="tab-pane fade" id="pills-month" role="tabpanel"	>
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-sm-6">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-info light border-0">Standard</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$08</h4><span>/Per Month</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li class="disable">Program reviews 1x a month</li>
															<li class="disable">CPM Overage: Unlimited</li>
															<li class="disable">Assisted onboarding support</li>
															<li class="disable">CPM Overage: Unlimited</li>
														</ul>
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Choose plans<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-sm-6">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-success light border-0">Premium</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$20</h4><span>/Per Month</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li>
																
																Multiple images &amp; videos
															</li>
															<li>
																
																Basic customer support
															</li>
															<li>
																
																Featured ads
															</li>
														</ul>
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Choose plans<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4">
											<div class="card upgrad-plan">
												<div class="card-body">
													<div class="text-center">
														<span class="badge badge-warning light border-0">Business</span>
														<div class="d-flex align-items-baseline m-prise">
															<h4>$50</h4><span>/Per Month</span>
														</div>
														<ul class="prise-list">
															<li>
																
																User Dashboard
															</li>
															<li>
																
																Post 3 Ads per week
															</li>
															<li>
																
																Multiple images &amp; videos
															</li>
															<li>
																
																Basic customer support
															</li>
															<li>
																
																Featured ads
															</li>
															<li>
																
																Special ads badge
															</li>
															<li>
																
																Call to Action in Every Ads
															</li>
														</ul>
													</div>
												</div>
												<div class="card-footer text-center border-0">
													<a href="javascript:void(0)"
														class="btn btn-primary light btn-block">Choose plans<i
															class="fa-solid fa-arrow-right ms-2"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<!-- pricing-swiper -->
						<div>
							<div class="pricing-title">
								<h2>We’re just keep growing with 6.3k trusted companies</h2>
							</div>
							<div class="companies-inner">
								<div class="swiper swiper-company ">
									<div class="swiper-wrapper">
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.1s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo1.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.2s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo2.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.3s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo3.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.4s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo4.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.5s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo5.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.6s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo6.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.7s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo1.png" alt=""> 
												</div>
											</a>
										</div>
										<div class="swiper-slide wow fadeInUp" data-wow-delay="0.8s">
											<a href="javascript:void(0);" class="companies-wrapper">
												<div class="companies-media">
													<img src="assets/images/companies/logo2.png" alt=""> 
												</div>
											</a>
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
	<?php include 'elements/page-js.php'; ?>
	
	
	<script>
		//  company Swiper ==
	
			var swiper = new Swiper( '.swiper-company', {
				slidesPerView: 6,
				spaceBetween: 30,
				speed:1000,
				loop: true,
				autoplay: {
   					 delay: 5000,
  }				,
				pagination: {
					el: ".swiper-pagination-trading",
				},
				breakpoints: {
					1200: {
						slidesPerView: 6,
					},
					991: {
						slidesPerView: 3,
					},
					767: {
						slidesPerView: 2,
					},
					575: {
						slidesPerView: 1.5,
					},
					340: {
						slidesPerView: 1,
						centeredSlides: true,
					},
				}
			});

	</script>
</body>

</html>