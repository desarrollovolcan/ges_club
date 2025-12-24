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
    <div id="main-wrapper" class="overflow-visible">

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
			<div class="container-fluid">

				<div class="row page-titles">
					
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Category</a></li>
					</ol>
					
                </div>
		
				<!-- Row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-8">
								<div class="card h-auto">
									<div class="card-body">
										<form>
											<div class="mb-3">
												<label class="form-label required">Category Name</label>
												<input type="text" class="form-control" placeholder="Food">
											</div>
										</form>
										<label class="form-label">Description</label>
										<div id="ckeditor"></div>
									</div>
								</div>
								<div class="card h-auto">
									<div class="card-body">
										<form>
											<div class="mb-3">
												<label class="form-label required">Meta Tag Title</label>
												<input type="text" class="form-control" placeholder="Meta Tag Name">
											</div>
										</form>
										<label class="form-label">Meta Tag Description</label>
										<div id="ckeditor1"></div>
										<div class="mt-3">
												<label class="form-label required">Meta Tag Keywords</label>
												<input type="text" class="form-control" placeholder="Meta Tag Keywords">
											</div>
									</div>
								</div>
								<div class="card h-auto">
									<div class="card-header d-block py-3">
										<h4 class="card-title--medium mb-0">Automation</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-sm-6">
												<div class="check-cate">
													<div class="form-check">
													  <input class="form-check-input" type="radio" value="manual" name="automationSelect" id="ManualInput" checked>
													  <label class="form-check-label" for="ManualInput">
														<span class="text-dark d-block font-w600 fs-15 mb-2">Manual</span>
														<span>Add products to this category one by one by manually selecting this category during product creation or update.</span>
															
															
													  </label>
													</div>	
												</div>
											</div>
											<div class="col-xl-6 col-sm-6 mt-sm-0 mt-3">
												<div class="check-cate">
													<div class="form-check">
													  <input class="form-check-input" type="radio" value="automatic" name="automationSelect" id="AutomaticInput">
													  <label class="form-check-label"  for="AutomaticInput">
														<span class="text-dark d-block font-w600 fs-15 mb-2">Automatic</span>
														<span>Add products to this category one by one by manually selecting this category during product creation or update.</span>
															
															
													  </label>
													</div>	
												</div>
											</div>
											<div class="col-xl-12">
												<div class="check-sub-bx mt-3" style="display:none;">
													<div class="row">
														<div class="col-xl-3">
															<div class="mb-3">
																<label class="form-label required">Product Tag</label>
																<select class=" default-select w-100" aria-label="Default select example">
																	<option selected>Product Title</option>
																	<option value="1">Product Tag</option>
																	<option value="2">Product Price</option>
																	
																  </select>
															  </div>
														</div>
														<div class="col-xl-3">
															<div class="mb-3">
																<label class="form-label required">Product Margin</label>
																<select class=" default-select w-100" aria-label="Default select example">
																	<option selected>is less then</option>
																	<option value="1">is equal to</option>
																	<option value="2">is greater then</option>
																	
																</select>
															</div>
														</div>
														<div class="col-xl-3">
															<div class="mb-3">
																<label for="exampleFormControlInput1" class="form-label required">Quntity</label>
																<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="1">
															</div>
														</div>
														<div class="col-xl-3 align-self-end">
															<div class="mb-3">
																<button class="btn btn-primary btn-sm" id="add-btn"> <i class="fa-solid fa-plus me-3"></i>Add another condition</button>
															</div>
															
														</div>
														
													</div>
												
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="right-sidebar-sticky">
									<div class="card h-auto">
										<div class="card-header  py-3">
											<h4 class="card-title--medium mb-0">Thumbnail</h4>
										</div>
										<div class="card-body">
											<div class="avatar-upload d-flex align-items-center">
												<div class=" position-relative ">
													<div class="avatar-preview">
														<div id="imagePreview"
															style="background-image: url(assets/images/no-img-avatar.png);">
														</div>
													</div>
													<div class="change-btn d-flex align-items-center flex-wrap">
														<input type='file' class="form-control d-none"
															id="imageUpload" accept=".png, .jpg, .jpeg">
														<label for="imageUpload"
															class="btn btn-sm btn-primary light ms-0">Select
															Image</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card h-auto">
										<div class="card-header  py-3">
											<h4 class="card-title--medium mb-0">Status</h4>
										</div>
										<div class="card-body">
											<label class="form-label">Status Type</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>Published</option>
												<option value="1">Scheduled</option>
											</select>
										</div>
									</div>
									<div class="card h-auto">
										<div class="card-header  py-3">
											<h4 class="card-title--medium mb-0">Store Template</h4>
										</div>
										<div class="card-body">
											<label class="form-label">Select a store template</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>Electronics</option>
												<option value="1">Office stationary</option>
												<option value="2">Fashion</option>
											</select>
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
					$('#imagePreview').hide();
					$('#imagePreview').fadeIn(650);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").on('change', function () {

			readURL(this);
		});
		$('.remove-img').on('click', function () {
			var imageUrl = "assets/images/no-img-avatar.png";
			$('.avatar-preview, #imagePreview').removeAttr('style');
			$('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
		});
	</script>
</body>
</html>