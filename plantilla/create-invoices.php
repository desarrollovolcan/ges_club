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
                <div class="row">
                    <div class="col-xl-9">

                        <div class="card">
                           
                            <div class="card-body">
								
								<div class="row mb-4 ">
									<div class="col-xl-8 col-sm-7">
										<div class="mb-4">
											<img src="assets/images/logo-full.png" class="dark-login" alt="">
											<img src="assets/images/logo-full-white.png" class="light-login" alt="">
										</div>
										<h4 class="card-title">Attach File</h4>
										<div class="dropzone dropzone-multi dz-dropzone-box d-flex mb-3" id="kt_dropzone_5">
											<div class="dropzone-panel mb-lg-0 mb-2">
												<a  href="javascript:void(0);" class="dropzone-select btn btn-primary light font-weight-bold btn-lg">
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
												<div class="dropzone-item" style="display:none">
													<div class="file-icon">
														<i class="fas fa-file-alt me-3"></i>
													</div>
													<div class="dropzone-file">
														<div class="dropzone-filename" title="some_image_file_name.jpg">
															<p data-dz-name="" class="fs-18 font-w600 mb-0">some_image_file_name.jpg</p>
															
															<span data-dz-size="" class="fs-16 font-w600 text-primary">340kb</span>
														</div>
														<div class="dropzone-error" data-dz-errormessage=""></div>
													</div>
													<div class="dropzone-progress">
														<div class="progress">
															<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
														</div>
													</div>
													<div class="dropzone-toolbar">
														<span class="dropzone-delete" data-dz-remove="">
															<i class="fas fa-times"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-sm-5">
										<div class="mb-3">
											<input type="number" class="form-control solid" id="exampleFormControlInput1" placeholder="Legal Registration No">
										</div>
										<div class="mb-3">
											<input type="email" class="form-control solid" id="exampleFormControlInput2" placeholder="Email Address">
										</div>
										<div class="mb-3">
											<input type="text" class="form-control solid" id="exampleFormControlInput3" placeholder="website">
										</div>
										<div class="mb-3">
											<input type="number" class="form-control solid" id="exampleFormControlInput4" placeholder="Contact">
										</div>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-xl-4 col-sm-4">
										<div class="form-group invoice">
											<label class="form-label required">INVOICE NO</label>
											 <input type="text" class="form-control" placeholder="#INV-123124124">
										</div>
									</div>
									<div class="col-xl-4 col-sm-4">
										<div class="form-group invoice">
											<label class="form-label required">AMOUNT (USD)</label>
											 <input type="text" class="form-control" placeholder="5,000 ">
										</div>
									</div>
									<div class="col-xl-4 col-sm-4">
										<div class="form-group invoice">
											<label class="form-label required">DUE DATE</label>
											<div class="input-hasicon mb-sm-0 mb-3">
												<input  name="datepicker" class="form-control bt-datepicker">
												<div class="icon"><i class="far fa-calendar"></i></div>
											</div>
										</div>
									</div>
								</div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th class="right">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">Origin License</td>
                                                <td class="left">Extended License</td>
                                                <td class="right">$999,00</td>
                                                <td class="center">1</td>
                                                <td class="right">$999,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">2</td>
                                                <td class="left">Custom Services</td>
                                                <td class="left">Instalation and Customization (cost per hour)</td>
                                                <td class="right">$150,00</td>
                                                <td class="center">20</td>
                                                <td class="right">$3.000,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">3</td>
                                                <td class="left">Hosting</td>
                                                <td class="left">1 year subcription</td>
                                                <td class="right">$499,00</td>
                                                <td class="center">1</td>
                                                <td class="right">$499,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">4</td>
                                                <td class="left">Platinum Support</td>
                                                <td class="left">1 year subcription 24/7</td>
                                                <td class="right">$3.999,00</td>
                                                <td class="center">1</td>
                                                <td class="right">$3.999,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Subtotal</strong></td>
                                                    <td class="right">$8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Discount (20%)</strong></td>
                                                    <td class="right">$1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">VAT (10%)</strong></td>
                                                    <td class="right">$679,76</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Total</strong></td>
                                                    <td class="right"><strong class="text-dark">$7.477,36</strong><br>
                                                        <strong class="text-dark">0.15050000 BTC</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-3">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card h-auto">
									<div class="card-body">
										<a href="javascript:void(0);" class="btn btn-primary btn-block mb-3"><svg fill="none" class="me-2" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg"><path d="m22.1012 10.5616-19.34831-9.43824c-.1664-.08117-.34912-.12336-.53427-.12336-.67302 0-1.21862.5456-1.21862 1.21862v.03517c0 .16352.02005.32643.05971.48507l1.85597 7.42384c.05069.2028.22214.3526.42986.3757l8.15756.9064c.2829.0314.4969.2705.4969.5552s-.214.5238-.4969.5552l-8.15756.9064c-.20772.0231-.37917.1729-.42986.3757l-1.85597 7.4238c-.03966.1587-.05971.3216-.05971.4851v.0352c0 .673.5456 1.2186 1.21862 1.2186.18515 0 .36787-.0422.53427-.1234l19.34831-9.4382c.5499-.2682.8988-.8265.8988-1.4384s-.3489-1.1702-.8988-1.4384z" fill="#fff"></path></svg>Send Invoice</a>
										<a href="javascript:void(0);" class="btn btn-dark btn-block mb-3"><svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M10 17.7083C10.345 17.7083 10.625 17.9883 10.625 18.3333C10.625 18.6783 10.345 18.9583 10 18.9583H3.33335C2.72585 18.9583 2.14252 18.7167 1.71252 18.2875C1.28335 17.8575 1.04169 17.2742 1.04169 16.6667V3.33334C1.04169 2.72584 1.28335 2.14251 1.71252 1.71251C2.14252 1.28334 2.72585 1.04167 3.33335 1.04167H10.4884C10.875 1.04167 11.2459 1.19501 11.5192 1.46917L15.1975 5.1475C15.4717 5.42084 15.625 5.79167 15.625 6.17834V9.16667C15.625 9.51167 15.345 9.79167 15 9.79167C14.655 9.79167 14.375 9.51167 14.375 9.16667V6.17834C14.375 6.12334 14.3534 6.07 14.3142 6.03084L10.6359 2.3525C10.5967 2.31334 10.5434 2.29167 10.4884 2.29167H3.33335C3.05669 2.29167 2.79252 2.40167 2.59669 2.59667C2.40169 2.79251 2.29169 3.05667 2.29169 3.33334V16.6667C2.29169 16.9433 2.40169 17.2075 2.59669 17.4033C2.79252 17.5983 3.05669 17.7083 3.33335 17.7083H10Z" fill="#AEB4B8"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M10.2084 2.08334C10.2084 1.73834 10.4884 1.45834 10.8334 1.45834C11.1784 1.45834 11.4584 1.73834 11.4584 2.08334V5.00001C11.4584 5.11501 11.5517 5.20834 11.6667 5.20834H14.5834C14.9284 5.20834 15.2084 5.48834 15.2084 5.83334C15.2084 6.17834 14.9284 6.45834 14.5834 6.45834H11.6667C10.8609 6.45834 10.2084 5.80584 10.2084 5.00001V2.08334Z" fill="#AEB4B8"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M5 9.375C4.655 9.375 4.375 9.095 4.375 8.75C4.375 8.405 4.655 8.125 5 8.125H11.6667C12.0117 8.125 12.2917 8.405 12.2917 8.75C12.2917 9.095 12.0117 9.375 11.6667 9.375H5Z" fill="#AEB4B8"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M5 12.2917C4.655 12.2917 4.375 12.0117 4.375 11.6667C4.375 11.3217 4.655 11.0417 5 11.0417H8.75C9.095 11.0417 9.375 11.3217 9.375 11.6667C9.375 12.0117 9.095 12.2917 8.75 12.2917H5Z" fill="#AEB4B8"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M5 15.2083C4.655 15.2083 4.375 14.9283 4.375 14.5833C4.375 14.2383 4.655 13.9583 5 13.9583H8.75C9.095 13.9583 9.375 14.2383 9.375 14.5833C9.375 14.9283 9.095 15.2083 8.75 15.2083H5Z" fill="#AEB4B8"/>
										<path d="M14.8842 15.9375C15.5746 15.9375 16.1342 15.3779 16.1342 14.6875C16.1342 13.9971 15.5746 13.4375 14.8842 13.4375C14.1939 13.4375 13.6342 13.9971 13.6342 14.6875C13.6342 15.3779 14.1939 15.9375 14.8842 15.9375Z" fill="#AEB4B8"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16.1633 10.87C16.1633 10.87 16.4592 11.5825 16.4583 11.5825C16.5708 11.6392 16.68 11.7025 16.7858 11.7708L17.5508 11.6708C17.7575 11.6442 17.965 11.7225 18.1025 11.88C18.4658 12.2967 18.745 12.7808 18.925 13.3042C18.9925 13.5017 18.9567 13.7208 18.8292 13.8867C18.8292 13.8867 18.3608 14.4992 18.3608 14.4983C18.3675 14.6242 18.3675 14.7508 18.3608 14.8758L18.8292 15.4883C18.9567 15.6542 18.9925 15.8733 18.925 16.0708C18.745 16.5942 18.4658 17.0783 18.1025 17.495C17.965 17.6525 17.7575 17.7308 17.5508 17.7042C17.5508 17.7042 16.7858 17.6042 16.7867 17.6033C16.6808 17.6725 16.5708 17.7358 16.4592 17.7925L16.1633 18.505C16.0833 18.6983 15.9117 18.8383 15.7067 18.8783C15.1633 18.985 14.605 18.985 14.0617 18.8783C13.8567 18.8383 13.685 18.6983 13.605 18.505C13.605 18.505 13.3092 17.7925 13.31 17.7925C13.1975 17.7358 13.0875 17.6725 12.9825 17.6042L12.2175 17.7042C12.01 17.7308 11.8033 17.6525 11.6658 17.495C11.3017 17.0783 11.0225 16.5942 10.8433 16.0708C10.7758 15.8733 10.8117 15.6542 10.9383 15.4883C10.9383 15.4883 11.4075 14.8758 11.4075 14.8767C11.4008 14.7508 11.4008 14.6242 11.4075 14.4992L10.9383 13.8867C10.8117 13.7208 10.7758 13.5017 10.8433 13.3042C11.0225 12.7808 11.3017 12.2967 11.6658 11.88C11.8033 11.7225 12.01 11.6442 12.2175 11.6708C12.2175 11.6708 12.9825 11.7708 12.9817 11.7717C13.0875 11.7025 13.1967 11.6392 13.3092 11.5825L13.605 10.87C13.685 10.6767 13.8567 10.5367 14.0617 10.4967C14.605 10.39 15.1633 10.39 15.7067 10.4967C15.9117 10.5367 16.0833 10.6767 16.1633 10.87ZM15.145 11.6783C14.9717 11.6633 14.7967 11.6625 14.6233 11.6783L14.37 12.2875C14.3067 12.44 14.185 12.5617 14.0317 12.625C13.85 12.7 13.68 12.7983 13.5242 12.9183C13.3933 13.0192 13.2267 13.0633 13.0625 13.0425L12.4083 12.9567C12.3083 13.1 12.2208 13.2508 12.1475 13.4092L12.5483 13.9325C12.6492 14.0642 12.6933 14.2308 12.6717 14.395C12.6458 14.5892 12.6458 14.7858 12.6717 14.98C12.6933 15.1442 12.6492 15.3108 12.5483 15.4425C12.5483 15.4425 12.1475 15.9658 12.1475 15.9667C12.2208 16.1242 12.3083 16.2758 12.4083 16.4183L13.0625 16.3325C13.2267 16.3117 13.3933 16.3558 13.5242 16.4567C13.68 16.5767 13.85 16.675 14.0317 16.75C14.185 16.8133 14.3067 16.935 14.37 17.0875L14.6233 17.6967C14.7967 17.7125 14.9717 17.7125 15.145 17.6967L15.3983 17.0875C15.4617 16.935 15.5833 16.8133 15.7367 16.75C15.9175 16.675 16.0883 16.5767 16.2442 16.4567C16.375 16.3558 16.5417 16.3117 16.7058 16.3325L17.36 16.4183C17.46 16.275 17.5475 16.1242 17.6208 15.9658L17.22 15.4425C17.1192 15.3108 17.075 15.1442 17.0967 14.98C17.1217 14.7858 17.1217 14.5892 17.0967 14.395C17.075 14.2308 17.1192 14.0642 17.22 13.9325C17.22 13.9325 17.6208 13.4092 17.6208 13.4083C17.5467 13.2508 17.46 13.0992 17.36 12.9567L16.7058 13.0425C16.5417 13.0633 16.375 13.0192 16.2442 12.9183C16.0883 12.7983 15.9175 12.7 15.7367 12.625C15.5833 12.5617 15.4617 12.44 15.3983 12.2875L15.145 11.6783Z" fill="#AEB4B8"/>
										</svg>
										Download</a>
										<a href="javascript:void(0);" class="btn btn-outline-light btn-block">
											
											<svg xmlns="http://www.w3.org/2000/svg" class="me-2" id="Object" viewBox="0 0 32 32" width="18" height="18"><path d="M30.71,7.29l-6-6A1,1,0,0,0,24,1H4A3,3,0,0,0,1,4V28a3,3,0,0,0,3,3H28a3,3,0,0,0,3-3V8A1,1,0,0,0,30.71,7.29ZM20,3V9H12V3ZM8,29V22a1,1,0,0,1,1-1H23a1,1,0,0,1,1,1v7Zm21-1a1,1,0,0,1-1,1H26V22a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v7H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3h6V9a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V3h1.59L29,8.41Z"/></svg>
											
											Save Invoice</a>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-sm-6">
								<div class="card h-auto">
									<div class="card-header border-0 pb-0">
										<h2 class="card-title--medium">Accepet Payment</h2>
									</div>
									<div class="card-body pt-3">
										<div class="d-flex align-items-center justify-content-between dashed-bottom pb-2">
											<h6 class="mb-0 card-title--small">Cryptocurrency</h6>
											<img src="assets/images/svg/btc.svg" style="width: 10%;" alt="">
										</div>
										<div class="d-flex align-items-center justify-content-between dashed-bottom py-1">
											<h6 class="mb-0 card-title--small">Paypal</h6>
											<img src="assets/images/paypal.png" style="width: 12%;" alt="">
										</div>
										<div class="d-flex align-items-center justify-content-between pt-2">
											<h6 class="mb-0 card-title--small">Bank</h6>
											<i class="fa-solid fa-building-columns fs-18"></i>
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
				url: "https://dexignzone.com/dsadas", // Set the url for your upload script location
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