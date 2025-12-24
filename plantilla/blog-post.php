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
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
								<li class="breadcrumb-item  active"><a href="javascript:void(0)">Blog Post</a></li>
							</ol>
						</div>
						<div class="row">
							<div class="col-xl-8">
								<div class="card dz-blog-bx">
									<div class="card-body">
										<div class="dz-media">
											<img src="assets/images/blog/1.jpg" class="rounded" alt="">
										</div>
										<div class="dz-content">
											<span class="badge badge-outline-primary">Business</span>
											<a href=""><h3 class="mt-2 mb-1">Unlocking Business Efficiency With Sass Solutions</h3></a>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore laudantium libero incidunt.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="card h-auto">
									<div class="card-header pb-0 border-0">
										<h4 class="card-title mb-0">
											Other Features Post
										</h4>
										<div class="dropdown c-pointer ">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
													<circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
													<circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0)">Delete</a>
												<a class="dropdown-item" href="javascript:void(0)">Edit</a>
											</div>
										</div>
									</div>
		
									<div class="card-body py-3">
										<div class="profile-news">
											<div class="media pt-0 pb-3 border-bottom">
												<img src="assets/images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h6 class="m-b-5"><a href="post-details.php" class="text-dark">The Role of SaaS Administration in Ensuring Data Security</a></h6>
													<p class="mb-0">I shared this on my fb wall.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3 border-bottom">
												<img src="assets/images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h6 class="m-b-5"><a href="post-details.php" class="text-dark">Optimizing User Management in SaaS Platforms: Best Practices and Strategies</a></h6>
													<p class="mb-0">I shared this on my fb wall.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3 border-bottom">
												<img src="assets/images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h6 class="m-b-5"><a href="post-details.php" class="text-dark">The Role of SaaS Administration in Ensuring Data Security</a></h6>
													<p class="mb-0">I shared this on my fb wall.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img src="assets/images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h6 class="m-b-5"><a href="post-details.php" class="text-dark">Optimizing User Management in SaaS Platforms: Best Practices and Strategies</a></h6>
													<p class="mb-0">I shared this on my fb wall.</p>
												</div>
											</div>
		
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-4 col-sm-6">
								<div class="card">
									<div class="card-body dz-blog-grid">
										<div class="dz-blog-media">
											<img src="assets/images/blog/2.jpg" class="w-100 rounded" alt="">

										</div>
										<div class="dz-content mt-3">
											<span class="badge badge-outline-primary">Business</span>
											<a href=""><h4 class="mt-2">The Role of SaaS Administration in Ensuring Data Security</h4></a>
											<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
											<div class="mt-2">
												<img src="assets/images/contacts/pic2.jpg" class="avatar rounded-circle me-1 " alt="">
												<span class="me-2">Yatin xarma</span>
												<span>3 Min Read</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-sm-6">
								<div class="card">
									<div class="card-body dz-blog-grid">
										<div class="dz-blog-media">
											<img src="assets/images/blog/2.jpg" class="w-100 rounded" alt="">

										</div>
										<div class="dz-content mt-3">
											<span class="badge badge-outline-primary">Software</span>
											<a href=""><h4 class="mt-2">The Role of SaaS Administration in Ensuring Data Security</h4></a>
											<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
											<div class="mt-2">
												<img src="assets/images/contacts/pic2.jpg" class="avatar rounded-circle me-1 " alt="">
												<span class="me-2">Almash Khan</span>
												<span>3 Min Read</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-sm-6">
								<div class="card">
									<div class="card-body dz-blog-grid">
										<div class="dz-blog-media">
											<img src="assets/images/blog/3.jpg" class="w-100 rounded" alt="">

										</div>
										<div class="dz-content mt-3">
											<span class="badge badge-outline-primary">Business</span>
											<a href=""><h4 class="mt-2">The Role of SaaS Administration in Ensuring Data Security</h4></a>
											<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
											<div class="mt-2">
												<img src="assets/images/contacts/pic2.jpg" class="avatar rounded-circle me-1 " alt="">
												<span class="me-2">Yatin xarma</span>
												<span>3 Min Read</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-sm-6">
								<div class="card">
									<div class="card-body dz-blog-grid">
										<div class="dz-blog-media">
											<img src="assets/images/blog/3.jpg" class="w-100 rounded" alt="">

										</div>
										<div class="dz-content mt-3">
											<span class="badge badge-outline-primary">Business</span>
											<a href=""><h4 class="mt-2">The Role of SaaS Administration in Ensuring Data Security</h4></a>
											<p class="mb-0">This post explores the critical role of SaaS administrators in maintaining data security within cloud-based applications</p>
											<div class="mt-2">
												<img src="assets/images/contacts/pic2.jpg" class="avatar rounded-circle me-1 " alt="">
												<span class="me-2">Yatin xarma</span>
												<span>3 Min Read</span>
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