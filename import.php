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
						<div class="alert alert-dismissible ai-header-alert fade show mb-5">
							This is a demo of AIKit plugin made for you to test the experience of using the plugin.

							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
														
							</button>
						</div>
						
						<ul class="nav nav-tabs style-1 mb-4" id="pills-tab" role="tablist">
						   <li class="nav-item" role="presentation">
							<a href="auto-write.php" class="nav-link border-s-1">Auto Writer</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="scheduled.php" class="nav-link">Scheduler</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="repurpose.php" class="nav-link">Repurpose</a>
						  </li>
						  <li class="nav-item" role="presentation">
						<a href="rss.php" class="nav-link">RSS</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="chatbot.php" class="nav-link">Chatbot</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="fine-tune-models.php" class="nav-link">Fine-tune Models</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="prompt.php" class="nav-link">AI Menu Prompts</a>
						  </li>
						  <li class="nav-item" role="presentation">
							<a href="setting.php" class="nav-link">Settings</a>
						  </li> 
						  <li class="nav-item" role="presentation">
							<a href="import.php" class="nav-link active border-s-2" >Export/Import Settings</a>
						  </li>
						</ul>
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Export Settings</h4>
										<p>Download the current settings and prompts as a json file.</p>
										<ul class="setting-list">
											<li class="mb-2"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M15.75 11.25V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V11.25" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M5.25 7.5L9 11.25L12.75 7.5" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M9 11.25V2.25" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg><a href="javascript:void(0);" class="text-primary ms-2">Export All Settings + Prompts</a>
											</li>
											<li><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M15.75 11.25V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V11.25" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M5.25 7.5L9 11.25L12.75 7.5" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M9 11.25V2.25" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg><a href="javascript:void(0);" class="text-primary ms-2"> Export Prompts only</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Import Settings</h4>
										<p>Upload a settings json file to import settings and/or prompts.</p>
										<div class="dz-default mb-3">	
											<form action="#" class="dropzone upload-img text-center">
												<div class="dropzone dropzone-multi dz-dropzone-box d-flex justify-content-center" id="kt_dropzone_5">
													<div class="dropzone-panel mb-lg-0 mb-2">
														<a href="javascript:void(0);" class="dropzone-select btn btn-primary light font-weight-bold btn-lg dz-clickable mb-0 me-0">
															<div class="d-flex upload-btn">
																<i class="fas fa-cloud-upload-alt me-3"></i>
																<div>
																	<span class="d-block text-primary text-start">Upload Files</span>
																	<small class="text-primary fs-12">PDF, DOC, PPT, JPG, PNG</small>
																</div>
															</div>
														</a>
													</div>
													<div class="dropzone-items">
														
													</div>
												<div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>
												
												
												
											</form>
												<small><strong class="text-black">Important :</strong> It's highly recommended to backup your current settings before importing new settings, so you can revert back if needed.</small>
										</div>
											<button type="button" class="btn btn-primary btn-sm">Import Settings</button>
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
		
		function DZ_dropzone() {

			Dropzone.autoDiscover = false;
			 // set the dropzone container id
			 var id = '#kt_dropzone_5';

			 // set the preview element template
			 var previewNode = $(id + " .dropzone-item");
			 previewNode.id = "";
			 var previewTemplate = previewNode.parent('.dropzone-items').html();
			 previewNode.remove();

			var myDropzone5 = new Dropzone(id, { // Make the whole body a dropzone
				autoProcessQueue: false,
				url: "https://keenthemes.com/dsadas", // Set the url for your upload script location
				parallelUploads: 20,
				maxFilesize: 1, // Max filesize in MB
				previewTemplate: previewTemplate,
				previewsContainer: id + " .dropzone-items", // Define the container to display the previews
				clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
			});

			 myDropzone5.on("addedfile", function(file) {
				 // Hookup the start button
				 $(document).find( id + ' .dropzone-item').css('display', '');
			 });

			 // Update the total progress bar
			 myDropzone5.on("totaluploadprogress", function(progress) {
				 $( id + " .progress-bar").css('width', progress + "%");
			 });

			 myDropzone5.on("sending", function(file) {
				 // Show the total progress bar when upload starts
				 $( id + " .progress-bar").css('opacity', "1");
			 });

			 // Hide the total progress bar when nothing's uploading anymore
			 myDropzone5.on("complete", function(progress) {
				 var thisProgressBar = id + " .dz-complete";
				 setTimeout(function(){
					 $( thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress").css('opacity', '0');
				 }, 300)
			 });
		}
		DZ_dropzone();
	
	</script>
	
	
</body>
</html>