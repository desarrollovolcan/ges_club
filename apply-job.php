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
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Apply Job</a></li>
					</ol>
                </div>
                <!-- row -->
				<div class="row">
					<div class="col-xl-3">
						<div class="card h-auto">
							<div class="card-body">
								<div class="setting-tabs">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
										  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="setting-icon"><i class="flaticon-approved"></i></span>Basic Information</button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="setting-icon"><i class="flaticon-email"></i></span>Job Description</button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="setting-icon"><i class="flaticon-exam"></i></span>Applicable Questions</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="contact-tab-1" data-bs-toggle="tab" data-bs-target="#contact-tab-pane-1" type="button" role="tab" aria-controls="contact-tab-pane-1" aria-selected="false"><span class="setting-icon"><i class="flaticon-app"></i></span>Hiring Process</button>
										  </li>
										  <li class="nav-item mb-0" role="presentation">
											<button class="nav-link mb-0" id="contact-tab-2" data-bs-toggle="tab" data-bs-target="#contact-tab-pane-2" type="button" role="tab" aria-controls="contact-tab-pane-2" aria-selected="false"><span class="setting-icon"><i class="flaticon-love"></i></span>Confirmation</button>
										  </li>
										
									  </ul>
									 
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
								<div class="card">
									<div class="card-header">
										<h2 class="card-title">Basic information</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput1" class="form-label required">Job Title</label>
													<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex Developer">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput1" class="form-label required d-block">Industry</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>IT Company</option>
														<option value="1">Power Plant</option>
														<option value="2">Oil Industry</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput1" class="form-label required d-block">Work Prefrence</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>On site</option>
														<option value="1">Online</option>
														<option value="2">Work Form Home</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput2" class="form-label required">Location</label>
													<input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Jaipur">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput3" class="form-label required">Qulification</label>
													<input type="email" class="form-control" id="exampleFormControlInput3" placeholder="ITUS">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-block">Employment Type</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>Full Time</option>
														<option value="1">Part Time</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput5" class="form-label required">Driving Licence</label>
													<input type="email" class="form-control" id="exampleFormControlInput5" placeholder="No">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-block">Can You Provide Visa For this Role</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>Yes</option>
														<option value="1">No</option>
													  </select>
												  </div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<h2 class="card-title mb-3">Salary and Facilities</h2>
										<div class="row">
											<div class="col-xl-3 col-sm-6">
												<div class="mb-3">
													<label class="form-label required d-block">Salary start</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>Range</option>
														<option value="1">No</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-block">Salary End</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>20000</option>
														<option value="1">1000</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-block">Salary start</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>Range</option>
														<option value="1">No</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="mb-3">
													<label class="form-label required d-block">Per Month</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>40000</option>
														<option value="1">1000</option>
													  </select>
												  </div>
											</div>
									
										</div>
										<div class="card-title--small text-dark mb-3">Facilities</div>
										<div class="row">
											<div class="col-xl-3 col-sm-6">
												<ul class="job-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
															<label class="form-check-label" for="flexCheckDefault">
															 Basic Pay
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
															<label class="form-check-label" for="flexCheckDefault1">
															  HRA
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
															<label class="form-check-label" for="flexCheckDefault2">
															  PF Contribution
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
															<label class="form-check-label" for="flexCheckDefault3">
															  Fuel and Transportions
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
															<label class="form-check-label" for="flexCheckDefault4">
															 Phone
															</label>
														  </div>
													</li>
												</ul>
											</div>
											<div class="col-xl-3 col-sm-6">
												<ul class="job-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
															<label class="form-check-label" for="flexCheckDefault5">
															 Newspaper and Books
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
															<label class="form-check-label" for="flexCheckDefault6">
															  Room Rent
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
															<label class="form-check-label" for="flexCheckDefault7">
															  Skiils Developments
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
															<label class="form-check-label" for="flexCheckDefault8">
															 Health Care
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
															<label class="form-check-label" for="flexCheckDefault9">
															  Wellness
															</label>
														  </div>
													</li>
												</ul>
											</div>
											<div class="col-xl-3 col-sm-6">
												<ul class="job-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
															<label class="form-check-label" for="flexCheckDefault10">
															 Best Options
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
															<label class="form-check-label" for="flexCheckDefault11">
															 Accident Relief Fund
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
															<label class="form-check-label" for="flexCheckDefault12">
																Best Options
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault13">
															<label class="form-check-label" for="flexCheckDefault13">
															 Room Rent
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault14">
															<label class="form-check-label" for="flexCheckDefault14">
															  Wellness
															</label>
														  </div>
													</li>
												</ul>
											</div>
											<div class="col-xl-3 col-sm-6">
												<ul class="job-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault15">
															<label class="form-check-label" for="flexCheckDefault15">
															   Newspaper and Books
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault16">
															<label class="form-check-label" for="flexCheckDefault16">
															  Room Rent
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault17">
															<label class="form-check-label" for="flexCheckDefault17">
															  Wellness
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
															<label class="form-check-label" for="flexCheckDefault18">
															   Skiils Developments
															</label>
														  </div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
															<label class="form-check-label" for="flexCheckDefault19">
															  Default
															</label>
														  </div>
													</li>
												</ul>
											</div>
										
										
											
										</div>
									</div>
								</div>

							</div>
							<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
								<div class="card">
									<div class="card-header">
										<h2 class="card-title">Job Description</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput21" class="form-label required">Company Name</label>
													<input type="text" class="form-control" id="exampleFormControlInput21" placeholder="DexignZone">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label class="form-label required d-block">Country</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>India</option>
														<option value="1">Japan</option>
														<option value="2">USA</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-block">Position</label>
													<select class=" default-select w-100" aria-label="Default select example">
														<option selected>Frontend Developer</option>
														<option value="1">Backend Developer</option>
														<option value="2">HR</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput24" class="form-label required">Company Size</label>
													<input type="number" class="form-control" id="exampleFormControlInput24" placeholder="10000">
												  </div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
								<div class="card">
									<div class="card-header">
										<h2 class="card-title">Applicable Questions</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="question-list">
													<ul>
														<li><a href="javascript:void(0);">Why Are You Leaving ?</a></li>
														<li><a href="javascript:void(0);">How Do You Feel About The Comapny Management?</a></li>
														<li><a href="javascript:void(0);">Was The Time You Felt Proud Of Your Work?</a></li>
														<li><a href="javascript:void(0);">Do You Feel You Received Proper And Complete Traning?</a></li>
													</ul>
												</div>
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
							<div class="tab-pane fade" id="contact-tab-pane-1" role="tabpanel" aria-labelledby="contact-tab-1" tabindex="0">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Shipping Details</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput25" class="form-label required">Shipping Option Name</label>
													<input type="text" class="form-control" id="exampleFormControlInput25" placeholder="Standard Shapping">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput26" class="form-label required">Dilivery Time</label>
													<input type="number" class="form-control" id="exampleFormControlInput26" placeholder="12:00">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput27" class="form-label required">Rate</label>
													<input type="number" class="form-control" id="exampleFormControlInput27" placeholder="$0">
												  </div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label  class="form-label required d-bock">Select how Shapping calculate</label>
													<select class="default-select w-100" aria-label="Default select example">
														<option selected>Free Shapping</option>
														<option value="1">Paid Shapping</option>
														<option value="2">Third party Shipping</option>
														
													  </select>
												  </div>
											</div>
										</div>
									</div>
									<div class="card-footer text-end">
										<a href="javascript:void(0);" class="btn btn-light btn-sm me-2">Discard</a>
										<a href="javascript:void(0);" class="btn-primary btn btn-sm">Save</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="contact-tab-pane-2" role="tabpanel" aria-labelledby="contact-tab-2" tabindex="0">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Loaction Details</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlInput29" class="form-label required">Location</label>
													<input type="text" class="form-control" id="exampleFormControlInput29" placeholder="India">
												  </div>
											</div>
											
											<div class="col-xl-6 col-sm-6">
												<div class="mb-3">
													<label class="form-label required d-bock">Country</label>
													<select class="default-select w-100" aria-label="Default select example">
														<option selected>India</option>
														<option value="1">USA</option>
														<option value="2">UAE</option>
														<option value="3">Turkey</option>
														
													  </select>
												  </div>
											</div>
										</div>
									</div>
									<div class="card-footer text-end">
										<a href="javascript:void(0);" class="btn btn-light btn-sm me-2">Discard</a>
										<a href="javascript:void(0);" class="btn-primary btn btn-sm">Save</a>
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
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard-1').smartWizard(); 
		});
	</script>

</body>

</html>