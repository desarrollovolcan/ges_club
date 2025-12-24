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
			<div class="container-fluid">

				<div class="row page-titles">
					<ol class="breadcrumb">
						
						<li class="breadcrumb-item"><a href="javascript:void(0)">Projects</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Project </a></li>
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
												<label class="form-label required">Project Name</label>
												<input type="text" class="form-control" placeholder="kubayar">
											</div>
										</form>
										<label class="form-label">Description</label>
										<div id="ckeditor"></div>
									</div>
								</div>
								<div class="card h-auto">
									<div class="card-header py-3">
										<h4 class="card-title--medium mb-0">Add Project Filed</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-4">
												<div class="mb-3">
													<label class="form-label required">Project Name</label>
													<select class="default-select w-100" aria-label="Default select example">
														<option selected>kubayar</option>
														<option value="1">Pixio</option>
														<option value="2">W3crm</option>
														<option value="3">Jiade</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-4">
												<div class="mb-3">
													<label for="exampleFormControlInput2" class="form-label required">Url</label>
													<input type="text" class="form-control" id="exampleFormControlInput2" placeholder="kubayar.dexignzone.com">
												  </div>
											</div>
											<div class="col-xl-4">
												<div class="mb-3">
													<label for="exampleFormControlInput3" class="form-label required">Owner</label>
													<input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Yatin xarma">
												  </div>
											</div>

										</div>
									</div>
								</div>
								
								<div class="card h-auto">
									<div class="card-header py-3">
										<h4 class="card-title--medium mb-0">Add Project Search</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-4">
												<div class="mb-3">
													<label  class="form-label required">Project Name</label>
													<select class="default-select w-100" aria-label="Default select example">
														<option selected>kubayar</option>
														<option value="1">Pixio</option>
														<option value="2">W3crm</option>
														<option value="3">Jiade</option>
													  </select>
												  </div>
											</div>
											<div class="col-xl-4">
												<div class="mb-3">
													<label for="exampleFormControlInput4" class="form-label required">Project Description</label>
													<input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Simple AWS Project">
												  </div>
											</div>
											<div class="col-xl-4">
												<div class="mb-3">
													<label for="exampleFormControlInput5" class="form-label required">Project State</label>
													<input type="text" class="form-control" id="exampleFormControlInput5" placeholder="Created">
												  </div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="right-sidebar-sticky">
									<div class="card h-auto">
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Project Category</h4>
										</div>
										<div class="card-body">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
												Bulding
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-1">
												<label class="form-check-label" for="flexCheckDefault-1">
												Commerical
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-3">
												<label class="form-check-label" for="flexCheckDefault-3">
													Ecommerce
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-4">
												<label class="form-check-label" for="flexCheckDefault-4">
													Crypto
												</label>
											</div>
										</div>
									</div>
									<div class="card h-auto">
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Tag	</h4>
										</div>
										<div class="card-body">
											<select id="multi-value-select" multiple="multiple">
												<option selected="selected">orange</option>
												<option>white</option>
												<option selected="selected">purple</option>
											</select>
										</div>
									</div>
									<div class="card h-auto">
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Status	</h4>
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
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Project Name</h4>
										</div>
										<div class="card-body">
											<label class="form-label">Select a store template</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>kubayar</option>
												<option value="1">Pixio</option>
												<option value="2">Glower</option>
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