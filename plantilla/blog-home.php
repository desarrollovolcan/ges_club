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
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
						<li class="breadcrumb-item  active"><a href="javascript:void(0)">Blog Home</a></li>
					</ol>
                </div>
				<div class="row">
					<div class="col-xl-12">
						<div class="swiper mySwiper">
							<div class="swiper-wrapper">
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/5.jpg');">
										<div class="">
											<span class="badge badge-primary badge-sm">LifeStyle</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">lifestyle</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/6.jpg');">
										<div class="">
											<span class="badge badge-secondary badge-sm">Fashion</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">Fashion</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/7.jpg');">
										<div class="">
											<span class="badge badge-warning badge-sm">Game</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">Game</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/6.jpg');">
										<div class="">
											<span class="badge badge-success  badge-sm">Politic</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">Politic</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/7.jpg');">
										<div class="">
											<span class="badge badge-primary badge-sm">LifeStyle</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">lifestyle</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/5.jpg');">
										<div class="">
											<span class="badge badge-primary badge-sm">LifeStyle</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">lifestyle</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="swiper-slide">
								<div class="card blog-bx">
									<div class="card-body" style="background-image: url('assets/images/blog/5.jpg');">
										<div class="">
											<span class="badge badge-primary badge-sm">LifeStyle</span>
											<h2 class="card-title mt-3 text-white">The Importance of Financial Literacy?</h2>
											<p class="text-white">Lorem Ipsum is simply dummy text of has the printing and has been typesetting industry.</p>
											<div class="dz-meta">
												<ul>
													
													<li><a href="javascript:void(0);" class="me-2 text-white">lifestyle</a></li>
													<li><a href="javascript:void(0);" class="text-white">Wooden</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							  </div>
							 
							</div>
							
						  </div>
					</div>
				</div>
					
						<div class="row">
							<div class="col-xl-8">
								<div class="row">
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/8.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/9.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/9.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/8.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/9.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6">
										<div class="card">
											<img src="assets/images/blog/8.jpg" class="card-img-top dz-content-blog-home" alt="">
											<div class="card-body p-4">
												<div class="dz-content">
													<div class="dz-blog-badge">
														<span class="badge badge-primary badge-sm">Business</span>
													</div>
													<div class="dz-meta mb-2">
														<ul>
															
															<li><a href="javascript:void(0);" class="me-2">lifestyle</a></li>
															<li><a href="javascript:void(0);" class="">Wooden</a></li>
														</ul>
													</div>
													<a><h4>The Role of SaaS Administration in Ensuring Data Security</h4></a>
													<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
													
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-4">
								<div class="row">
									<div class="col-xl-12 col-md-6">
										<div class="card">
											<div class="card-header p-3">
												<h4 class="card-title--medium mb-0">Popular Posts</h4>
											</div>
											<div class="card-body p-3">
												<div class="profile-blog-news">
													<div class="media pt-0 pb-3 border-bottom">
														<img src="assets/images/profile/5.jpg" alt="image" class="me-3 ">
														<div class="media-body">
															<h6 class="mb-0"><a href="post-details.php" class="text-dark card-title--small">The Role of SaaS Administration.</a></h6>
															<small class="mb-0">I shared this on my fb wall.</small>
														</div>
													</div>
													<div class="media pt-3 pb-3 border-bottom">
														<img src="assets/images/profile/7.jpg" alt="image" class="me-3 ">
														<div class="media-body">
															<h6 class="mb-0"><a href="post-details.php" class="text-dark card-title--small">The Role of SaaS Administration.</a></h6>
															<small class="mb-0">I shared this on my fb wall.</small>
														</div>
													</div>
													<div class="media pt-3 pb-3 border-bottom">
														<img src="assets/images/profile/5.jpg" alt="image" class="me-3 ">
														<div class="media-body">
															<h6 class="mb-0"><a href="post-details.php" class="text-dark card-title--small">The Role of Invoice Administration.</a></h6>
															<small class="mb-0">I shared this on my fb wall.</small>
														</div>
													</div>
													<div class="media pt-0 pb-3 border-bottom">
														<img src="assets/images/profile/5.jpg" alt="image" class="me-3 ">
														<div class="media-body">
															<h6 class="mb-0"><a href="post-details.php" class="text-dark card-title--small">The Role of SaaS Administration.</a></h6>
															<small class="mb-0">I shared this on my fb wall.</small>
														</div>
													</div>
													<div class="media pt-3 pb-3 border-bottom">
														<img src="assets/images/profile/7.jpg" alt="image" class="me-3 ">
														<div class="media-body">
															<h6 class="mb-0"><a href="post-details.php" class="text-dark card-title--small">The Role of SaaS Administration.</a></h6>
															<small class="mb-0">I shared this on my fb wall.</small>
														</div>
													</div>
													
													
				
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-md-6">
										<div class="card">
											<div class="card-header p-3">
												<h4 class="card-title--medium mb-0">Newsletter</h4>
											</div>
											<div class="card-body  p-3">
												<div class="mb-3">
												  <input type="email" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Email Address">
												  <button class="btn btn-primary btn-block mb-2">Sign Up</button>
												  <p>By signing up, you agree to our <span class="text-secondary">Privacy Policy</span><p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-md-6">
										<div class="card">
											<div class="card-header p-3">
												<h4 class="card-title--medium mb-0">Explore Topics</h4>
											</div>
											<div class="card-body  widget_categories  p-3 pt-1">
												<ul>
													<li class="cat-item"><a href="blog-category.php">Celebration</a> (10)</li>
													<li class="cat-item"><a href="blog-category.php">Culture</a> (5)</li>
													<li class="cat-item"><a href="blog-category.php">Fashion</a> (17)</li>
													<li class="cat-item"><a href="blog-category.php">Gift Sets</a> (13)</li>
													<li class="cat-item"><a href="blog-category.php">New Arrivals</a> (06)</li> 
													<li class="cat-item"><a href="blog-category.php">Best Sellers</a> (17)</li> 
													<li class="cat-item"><a href="blog-category.php">Accessories</a> (13)</li> 
													<li class="cat-item"><a href="blog-category.php">Limited Editions</a> (06)</li> 
													<li class="cat-item"><a href="blog-category.php">Beauty Rewards</a> (22)</li> 
												</ul>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-md-6">
										<div class="card">
											<div class="card-header p-3">
												<h4 class="card-title--medium mb-0">Tag Clouds</h4>
											</div>
											<div class="card-body  p-3">
												<div class="tagcloud"> 
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">#Audio </a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">#Content</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Serum</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Primer</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Makeup</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Contour</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Blush</a>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Highlighter</a>
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
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
    
	<script>
		var swiper = new Swiper(".mySwiper", {
		  slidesPerView: 3,
		  spaceBetween: 30,
		   autoplay: {
			delay: 5000,
			},
		  breakpoints: {
			360: {
			slidesPerView: 1,
			spaceBetween: 30
			},
			768: {
			slidesPerView: 2,
			spaceBetween: 30
			},
			// when window width is >= 480px
			991: {
			slidesPerView: 2,
			spaceBetween: 30
			},
			// when window width is >= 640px
			1024: {
			slidesPerView: 2,
			spaceBetween: 30
			},
			1199: {
			slidesPerView: 3,
			spaceBetween: 30
			}
		},
		  pagination: {
			el: ".swiper-pagination",
			clickable: true,
		  },
		});
	  </script>
</body>
</html>