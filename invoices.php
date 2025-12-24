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
				<div class="d-flex mb-3 flex-wrap">
					<div class="align-items-center me-auto sm-mb-0 mb-2">
						<h4 class="card-title">Payment History</h4>
						<span class="fs-14">Lorem ipsum dolor sit amet, consectetur</span>
					</div>
					<a href="javascript:void(0);" class="btn btn-primary btn-sm  mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-calendar me-3 scale2"></i>Filter Date</a>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive fs-14">
							<table class="table card-table display mb-4 dataTablesCard " id="example5">
								<thead>
									<tr>
										<th>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="checkAll">
											  <label class="form-check-label" for="checkAll">
											  </label>
											</div>
										</th>
										<th>ID Invoice</th>
										<th>Date</th>
										<th>Recipient</th>
										<th>Email</th>
										<th>Service Type</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
											  <label class="form-check-label" for="flexCheckDefault2">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/1.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
													<span class="fs-14">Online Shop</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Server Maintenance </span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
											  <label class="form-check-label" for="flexCheckDefault3">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/2.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">Hawkins Jr.</h6>
													<span class="fs-14">@hawkins</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">hawkins@mail.com</span></td>
										<td><span class="text-black">Clean Up </span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
											  <label class="form-check-label" for="flexCheckDefault4">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/3.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">Kevin Samuel</h6>
													<span class="fs-14">@kevin</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">kevin@mail.com</span></td>
										<td><span class="text-black">Upgrade Component </span></td>
										<td><a href="javascript:void(0)" class="badge badge-sm badge-warning">Pending</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
											  <label class="form-check-label" for="flexCheckDefault5">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/4.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">Jons Sitepu</h6>
													<span class="fs-14">@jonsitepu</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">jons@mail.com</span></td>
										<td><span class="text-black">Server Maintenance  </span></td>
										<td><a href="javascript:void(0)" class="badge badge-sm badge-danger">Canceled</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
											  <label class="form-check-label" for="flexCheckDefault6">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/5.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">Brian Harefa</h6>
													<span class="fs-14">@brianharefa</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">brian@mail.com</span></td>
										<td><span class="text-black">Clean Up</span></td>
										<td><a href="javascript:void(0)" class="badge badge-sm badge-warning">Pending</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
											  <label class="form-check-label" for="flexCheckDefault7">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/6.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">David Here</h6>
													<span class="fs-14">@davidhere</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">davidhere@mail.com</span></td>
										<td><span class="text-black">Upgrade Component </span></td>
										<td><a href="javascript:void(0)" class="badge badge-sm badge-danger">Canceled</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
											  <label class="form-check-label" for="flexCheckDefault8">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/7.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">Fanny Stefanus</h6>
													<span class="fs-14">@fannystefan</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">fannystevan@mail.com</span></td>
										<td><span class="text-black">Clean Up</span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
											  <label class="form-check-label" for="flexCheckDefault9">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/8.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
													<span class="fs-14">Online Shop</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Server Maintenance </span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
											  <label class="form-check-label" for="flexCheckDefault10">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/5.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
													<span class="fs-14">Online Shop</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Server Maintenance </span></td>
										<td><a href="javascript:void(0)" class="badge badge-sm badge-warning">Pending</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
											  <label class="form-check-label" for="flexCheckDefault11">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/1.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
													<span class="fs-14">Online Shop</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Server Maintenance </span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
											  <label class="form-check-label" for="flexCheckDefault12">
											  </label>
											</div>
										</td>
										<td><span class="text-black font-w600">#123412451</span></td>
										<td><span class="text-black text-nowrap">#June 1, 2024, 08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/1.jpg" alt="" class="tbl-img me-3" width="45">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
													<span class="fs-14">Online Shop</span>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Server Maintenance </span></td>
										<td><a href="javascript:void(0)" class="badge badge-success badge-sm">Completed</a></td>
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
        <!--**********************************
            Content body end
        ***********************************-->
		<!-- Button trigger modal -->
			
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Filter title</h1>
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