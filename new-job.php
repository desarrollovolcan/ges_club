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
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Company Name<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="Name" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Position<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="Name" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Job Category<span class="text-danger scale5 ms-2">*</span></label>
										<select  class="nice-select default-select wide form-control">
										  <option selected>Choose...</option>
										  <option>QA Analyst</option>
										   <option>IT Manager</option>
										    <option>Systems Analyst</option>
										</select>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Job Type<span class="text-danger scale5 ms-2">*</span></label>
										<select  class="nice-select default-select wide form-control">
										  <option selected>Choose...</option>
										  <option>Part-Time</option>
										   <option>Full-Time</option>
										    <option>Freelancer</option>
										</select>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">No. of Vancancy<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="Name" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Select Experience<span class="text-danger scale5 ms-2">*</span></label>
										<select  class="nice-select default-select wide form-control">
										  <option selected>1 yr</option>
										  <option>2 Yr</option>
										   <option>3 Yr</option>
										    <option>4 Yr</option>
										</select>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Posted Date<span class="text-danger scale3 ms-2">*</span></label>
										<div class="input-hasicon">
											<input  name="datepicker" class="form-control bt-datepicker">
											<div class="icon"><i class="far fa-calendar"></i></div>
										</div>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Last Date To Apply<span class="text-danger scale3 ms-2">*</span></label>
										<div class="input-hasicon">
											<input  name="datepicker" class="form-control bt-datepicker">
											<div class="icon"><i class="far fa-calendar"></i></div>
										</div>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Close Date<span class="text-danger scale3 ms-2">*</span></label>
										<div class="input-hasicon">
											<input  name="datepicker" class="form-control bt-datepicker">
											<div class="icon"><i class="far fa-calendar"></i></div>
										</div>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
										<label  class="form-label">Select Gender:<span class="text-danger scale5 ms-2">*</span></label>
										<select  class="nice-select default-select wide form-control">
										  <option selected>Choose...</option>
										  <option>Male</option>
										   <option>Female</option>
										</select>
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Salary Form<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="$" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Salary To<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="$" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Enter City:<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="City" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Enter State:<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="State" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Enter Counter:<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="State" aria-label="name">
									</div>
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label">Enter Education Level:<span class="text-danger scale5 ms-2">*</span></label>
										<input type="text" class="form-control" placeholder="Education Level" aria-label="name">
									</div>
									<div class="col-xl-12 mb-4">
										  <label  class="form-label">Description:<span class="text-danger scale5 ms-2">*</span></label>
										  <textarea class="form-control" rows="5" aria-label="With textarea"></textarea>
									</div>
								</div>
								<div>
									<label class="form-label me-3">Status:</label>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
										<label class="form-check-label" for="inlineRadio1">Active</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
										<label class="form-check-label" for="inlineRadio2">In Active</label>
									</div>
								</div>
							</div>
							<div class="card-footer text-end">
								<div>
									<a href="javascript:void(0);" class="btn btn-danger light me-3">Close</a>
									<a href="javascript:void(0);" class="btn btn-primary">Submit</a>
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
	
    
</body>
</html>