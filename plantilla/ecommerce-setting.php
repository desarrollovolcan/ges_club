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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Ecommerce</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
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
										  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="setting-icon"><i class="flaticon-shop"></i></span>Stroe Details</button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="setting-icon"><i class="flaticon-shopping-bag"></i></span>Checkout Details </button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="setting-icon"><i class="flaticon-credit-card"></i></span>Payment Details</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="contact-tab-1" data-bs-toggle="tab" data-bs-target="#contact-tab-pane-1" type="button" role="tab" aria-controls="contact-tab-pane-1" aria-selected="false"><span class="setting-icon"><i class="flaticon-rocket"></i></span>Shipping & delivery</button>
										  </li>
										  <li class="nav-item mb-0" role="presentation">
											<button class="nav-link mb-0" id="contact-tab-2" data-bs-toggle="tab" data-bs-target="#contact-tab-pane-2" type="button" role="tab" aria-controls="contact-tab-pane-2" aria-selected="false"><span class="setting-icon"><i class="flaticon-location"></i></span>Locations</button>
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
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Profile</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput1" class="form-label required">Email address</label>
													<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput2" class="form-label required">Phone</label>
													<input type="number" class="form-control" id="exampleFormControlInput2" placeholder="1231456789">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput3" class="form-label required">Customer address</label>
													<input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput4" class="form-label required">Customer Phone</label>
													<input type="number" class="form-control" id="exampleFormControlInput4" placeholder="1231456789">
												  </div>
											</div>
											
										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Billing Information</h2>
											<div class="row">
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput5" class="form-label required">Company Name</label>
														<input type="text" class="form-control" id="exampleFormControlInput5" placeholder="DexignZone">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput6" class="form-label required">Country</label>
														<input type="text" class="form-control" id="exampleFormControlInput6" placeholder="india">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput7" class="form-label required">Address</label>
														<input type="email" class="form-control" id="exampleFormControlInput7" placeholder="Rama Krishna Purum kota">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput8" class="form-label required">Customer Phone</label>
														<input type="number" class="form-control" id="exampleFormControlInput8" placeholder="1231456789">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput9" class="form-label required">City</label>
														<input type="text" class="form-control" id="exampleFormControlInput9" placeholder="Kota">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput10" class="form-label required">State</label>
														<input type="text" class="form-control" id="exampleFormControlInput10" placeholder="Rajasthan">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput11" class="form-label required">PIN Code</label>
														<input type="text" class="form-control" id="exampleFormControlInput11" placeholder="323301">
													  </div>
												</div>
												
											</div>

										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Company currency</h2>
											<div class="row">
												<div class="col-xl-12">
													<div class="mb-3">
														<label for="exampleFormControlInput12" class="form-label required">Company currency</label>
														<input type="number" class="form-control" id="exampleFormControlInput12" placeholder="$25">
													  </div>
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
							<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Company Contact</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
													 Phone Number
													</label>
												  </div>
												  <div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
													<label class="form-check-label" for="flexRadioDefault2">
													  Email Adress
													</label>
												  </div>
											</div>
											
											
										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Client information</h2>
											<div class="row">
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput13" class="form-label required">Full Name</label>
														<input type="text" class="form-control" id="exampleFormControlInput13" placeholder="Yatin xarma">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput14" class="form-label required">Country</label>
														<input type="text" class="form-control" id="exampleFormControlInput14" placeholder="india">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput15" class="form-label required">Address</label>
														<input type="email" class="form-control" id="exampleFormControlInput15" placeholder="Rama Krishna Purum kota">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput16" class="form-label required">Client Phone</label>
														<input type="number" class="form-control" id="exampleFormControlInput16" placeholder="1231456789">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput17" class="form-label required">City</label>
														<input type="text" class="form-control" id="exampleFormControlInput17" placeholder="Kota">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput18" class="form-label required">State</label>
														<input type="text" class="form-control" id="exampleFormControlInput18" placeholder="Rajasthan">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput19" class="form-label required">PIN Code</label>
														<input type="text" class="form-control" id="exampleFormControlInput19" placeholder="323301">
													  </div>
												</div>
												
											</div>

										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Client currency</h2>
											<div class="row">
												<div class="col-xl-12">
													<div class="mb-3">
														<label for="exampleFormControlInput20" class="form-label required">Client currency</label>
														<input type="number" class="form-control" id="exampleFormControlInput20" placeholder="$25">
													  </div>
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
							<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Payment Method</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
													<label class="form-check-label" for="flexRadioDefault3">
													 Online
													</label>
												  </div>
												  <div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
													<label class="form-check-label" for="flexRadioDefault4">
													  Offline
													</label>
												  </div>
											</div>
											
											
										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Payment information</h2>
											<div class="row">
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput21" class="form-label required">Card Holder Name</label>
														<input type="text" class="form-control" id="exampleFormControlInput21" placeholder="Yatin xarma">
													  </div>
												</div>
												<div class="col-xl-6">
													<div class="mb-3">
														<label for="exampleFormControlInput23" class="form-label required">Card Number</label>
														<input type="number" class="form-control" id="exampleFormControlInput23" placeholder="123456789">
													  </div>
												</div>
												
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput24" class="form-label required">Month</label>
														<input type="number" class="form-control" id="exampleFormControlInput24" placeholder="11">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput25" class="form-label required">Year</label>
														<input type="number" class="form-control" id="exampleFormControlInput25" placeholder="2024">
													  </div>
												</div>
												<div class="col-xl-4">
													<div class="mb-3">
														<label for="exampleFormControlInput26" class="form-label required">CVV</label>
														<input type="number" class="form-control" id="exampleFormControlInput26" placeholder="2659">
													  </div>
												</div>
												
											</div>

										</div>
										<div class="billing-bx mt-3">
											<h2 class="card-title mb-4">Billing Address</h2>
											<div class="row">
												<div class="col-xl-12">
													<div class="form-check">
														<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
														<label class="form-check-label" for="flexRadioDefault5">
														 Use My Shipping Adress
														</label>
													  </div>
													  <div class="form-check">
														<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
														<label class="form-check-label" for="flexRadioDefault6">
														  Use My Different Address
														</label>
													  </div>
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
							<div class="tab-pane fade" id="contact-tab-pane-1" role="tabpanel" aria-labelledby="contact-tab-1" tabindex="0">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title">Shipping Details</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput27" class="form-label required">Shipping Option Name</label>
													<input type="text" class="form-control" id="exampleFormControlInput27" placeholder="Standard Shapping">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput28" class="form-label required">Dilivery Time</label>
													<input type="number" class="form-control" id="exampleFormControlInput28" placeholder="12:00">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput29" class="form-label required">Rate</label>
													<input type="number" class="form-control" id="exampleFormControlInput29" placeholder="$0">
												  </div>
											</div>
											<div class="col-xl-6">
												<div class="mb-3">
													<label class="form-label required d-bock">Select how Shapping calculate</label>
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
											<div class="col-xl-6">
												<div class="mb-3">
													<label for="exampleFormControlInput30" class="form-label required">Location</label>
													<input type="text" class="form-control" id="exampleFormControlInput30" placeholder="India">
												  </div>
											</div>
											
											<div class="col-xl-6">
												<div class="mb-3">
													<label  class="form-label required d-bock">Country</label>
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