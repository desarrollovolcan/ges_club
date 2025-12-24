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
		 <div class="content-body d-flex align-items-center h-100vh">
			<div class="container">
				<div class="row justify-content-center  align-items-center">
					<div class="col-md-6">
						<div class="authincation-content shadow-none bg-transparent">
							<div class="row no-gutters">
								<div class="col-xl-12">
									<div class="card chat-modal">
										<div class="card-header py-3">
											<div class="d-flex align-items-center">
												<img src="assets/images/users/pic2.jpg" alt="" class="rounded-circle main-img me-2">
												<div>
													<h5 class="card-title--small mb-0">Yatin Xarma</h5>
													<small><svg class="me-2" width="5" height="5" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="5" cy="5" r="5" fill="#09BD3C"></circle>
													</svg>Active Now</small>
												</div>
												
											</div>
											<div class="moadl-chat-icon ms-auto">	
												<i class="flaticon-telephone"></i>
											</div>
										</div>
										<div class="card-body">
											<div class="chat-box-area dz-scroll height370" id="chartBox">
												<div class="chat-line">
													<span class="chat-date">Today, July 24</span>
													</div>
												<div data-chat="person1" class="chat">
													<div class="media mb-4 received-msg  justify-content-start align-items-start">
														<div class="image-bx me-1">
															<img src="assets/images/users/pic5.jpg" alt="" class="rounded-circle main-img">
														</div>
														<div class="message-received">
															<p class="mb-1">
																Hello Yatin 👋
															</p>
															<p class="mb-1">
																Sed ut perspiciatis unde 😊
															</p>
															<span class="fs-12">4.30 AM</span>
														</div>
													</div>
													<div class="media mb-4 justify-content-end align-items-end">
														<div class="message-sent">
															<p class="mb-1">
																My Name Is Almash 🤔
															</p>
															<p class="mb-1">
																Neque porro quisquam est, qui dolorem ipsum quia🎉
															</p>
															<span class="fs-12">9.30 AM</span>
														</div>
														<div class="image-bx ms-1 mb-4">
															<img src="assets/images/profile/pic1.jpg" alt="" class="rounded-circle main-img">
														</div>
													</div>
													
													
												</div>
												<div data-chat="person1" class="chat">
													<div class="media mb-4 received-msg  justify-content-start align-items-start">
														<div class="image-bx me-1">
															<img src="assets/images/users/pic5.jpg" alt="" class="rounded-circle main-img">
														</div>
														<div class="message-received">
															<p class="mb-1">
																Come my home for pizza 🍕
															</p>
															<p class="mb-1">
																Sed ut perspiciatis unde 🌍
															</p>
															<span class="fs-12 text-black">4.30 AM</span>
														</div>
													</div>
													<div class="media mb-4 justify-content-end align-items-start">
														<div class="message-sent">
															<p class="mb-1">
																ok but i have no money 😄
															</p>
															<p class="mb-1">
																Neque porro quisquam est, qui dolorem ipsum quia 🎶
															</p>
															<div class="d-flex align-items-center justify-content-end mt-3">
																<img src="assets/images/chat.jpg" class=" main-img-lg rounded me-3" alt="">
																<img src="assets/images/chat.jpg" class="main-img-lg rounded" alt="">
															</div>
															
															<span class="fs-12 text-black">9.30 AM</span>
														</div>
														<div class="image-bx ms-1 mb-4">
															<img src="assets/images/profile/pic1.jpg" alt="" class="rounded-circle main-img">
														</div>
													</div>
													
													
												</div>
											</div>
										</div>
										<div class="card-footer py-2">
											<div class="input-group align-items-center">
												<button type="button" class="btn p-0 me-3"><i class="las la-paperclip scale5 text-primary"></i></button>
												<button type="button" class="btn p-0 me-3"><i class="las la-image scale5 text-primary"></i></button>
												<input class="form-control border-0" placeholder="Type message...">
												<a href="javascript:void(0);" class="">
													<svg fill="none" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg"><path d="m22.1012 10.5616-19.34831-9.43824c-.1664-.08117-.34912-.12336-.53427-.12336-.67302 0-1.21862.5456-1.21862 1.21862v.03517c0 .16352.02005.32643.05971.48507l1.85597 7.42384c.05069.2028.22214.3526.42986.3757l8.15756.9064c.2829.0314.4969.2705.4969.5552s-.214.5238-.4969.5552l-8.15756.9064c-.20772.0231-.37917.1729-.42986.3757l-1.85597 7.4238c-.03966.1587-.05971.3216-.05971.4851v.0352c0 .673.5456 1.2186 1.21862 1.2186.18515 0 .36787-.0422.53427-.1234l19.34831-9.4382c.5499-.2682.8988-.8265.8988-1.4384s-.3489-1.1702-.8988-1.4384z" fill="var(--primary)"/></svg>
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
		</div>
        <!--**********************************
            Content body end
        ***********************************-->
		<!-- Button trigger modal -->
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
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
    <?php include 'elements/page-js.php'; ?>
	
    
	
</body>
</html>