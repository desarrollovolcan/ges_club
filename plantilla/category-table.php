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
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Category Table</a></li>
					</ol>
				</div>
				<div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Category List</h4>
								<a href="add-categary.php" class="btn btn-primary btn-sm">Add Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="projectlist" class="display">
                                        <thead>
											<tr>
                                                <th style="width:50px;">
													<div class="form-check custom-checkbox checkbox-primary  me-3">
														<input type="checkbox" class="form-check-input" id="checkAll" required="">
														<label class="form-check-label" for="checkAll"></label>
													</div>
												</th>
                                                <th>Category</th>
                                                <th>Products</th>
                                                <th>Category Type</th>
												<th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
														<label class="form-check-label" for="customCheckBox2"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox33" required="">
														<label class="form-check-label" for="customCheckBox33"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox44" required="">
														<label class="form-check-label" for="customCheckBox44"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>100</td>
                                                
                                                <td><span class="badge badge-sm badge-success light">Manual</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox45" required="">
														<label class="form-check-label" for="customCheckBox45"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox46" required="">
														<label class="form-check-label" for="customCheckBox46"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>100</td>
                                                
                                                <td><span class="badge badge-sm badge-success light">Manual</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox47" required="">
														<label class="form-check-label" for="customCheckBox47"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d13.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Fan</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox48" required="">
														<label class="form-check-label" for="customCheckBox48"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox49" required="">
														<label class="form-check-label" for="customCheckBox49"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>100</td>
                                                
                                                <td><span class="badge badge-sm badge-success light">Manual</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox50" required="">
														<label class="form-check-label" for="customCheckBox50"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d13.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Fan</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox51" required="">
														<label class="form-check-label" for="customCheckBox51"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox52" required="">
														<label class="form-check-label" for="customCheckBox52"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>100</td>
                                                
                                                <td><span class="badge badge-sm badge-success light">Manual</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox53" required="">
														<label class="form-check-label" for="customCheckBox53"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d13.jpg" class="rounded-lg me-2" width="40" alt=""> 
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Fan</h6>
															<small>Our computers and tablets include all the big brands.</small>
														</div>
														
													</div>
												</td>
                                               <td>10</td>
                                                
                                                <td><span class="badge badge-sm badge-primary light">Automated</span></td>
                                                
                                                <td class="text-end">
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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