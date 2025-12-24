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
						<div class="alert alert-dismissible ai-header-alert fade show mb-4">
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
							<a href="setting.php" class="nav-link active">Settings</a>
						  </li> 
						  <li class="nav-item" role="presentation">
							<a href="import.php" class="nav-link border-s-2">Export/Import Settings</a>
						  </li>
						</ul>
						<div class="card h-auto">
							<div class="card-body border-0 pb-0">
								<h4 class="heading mb-0">OpenAI Settings</h4>
								<p>Adjust the plugin to your needs by editing the settings here.</p>
								<div class="row">
									<div class="col-xl-6 col-sm-6">
										<div class="mb-3">
										  <label for="exampleFormControlInput1" class="form-label">OpenAI Key</label>
										  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="this-is-a-secret-key">
										  <div id="emailHelp" class="form-text">For instructions on how to get an OpenAI key, please visit<a href="javascript:void(0);" class="text-primary"> https://getaikit.com/docs/getting-started</a>
										</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="mb-3">
										  <label for="exampleFormControlInput2" class="form-label">Rapid API Key</label>
										  <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="this-is-rapid-api-key">
										  <div id="emailHelp-1" class="form-text">Enter your RapidAPI key for Subtitles for YouTube here. This API is used to read YouTube video subtitles to allow you to fetch. <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_2604">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<label class="form-label">Post category</label>
										<div class="mb-3">
											<select class="form-control custom-image-select border w-100 image-select">
												<option data-thumbnail="assets/images/svg/england.svg">England</option>
												<option data-thumbnail="assets/images/svg/india.svg">India</option>
												<option data-thumbnail="assets/images/svg/united-arab-emirates.svg">UAE</option>
											</select>
											<div id="emailHelp-2" class="form-text">The language of the text you want to generate. <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_2605">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<label class="form-label">OpenAI Preferred Model</label>
										<div class="mb-3">
											<select class=" default-select wide w-100 bg-white rounded" aria-label="Default select example">
											  <option selected>gpt-3.5-turbo</option>
											  <option value="1">gpt-4.5-turbo</option>
											</select>
											<div id="emailHelp-3" class="form-text">The language of the text you want to generate.  <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_2606">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="mb-3">
										  <label for="exampleFormControlInput10" class="form-label">Prompt Stop Sequence</label>
										  <input type="text" class="form-control" id="exampleFormControlInput10">
										  <div id="emailHelp-4" class="form-text">The language of the text you want to generate.  <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26010">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="mb-3">
										  <label for="exampleFormControlInput11" class="form-label">Completion Stop Sequence</label>
										  <input type="text" class="form-control" id="exampleFormControlInput11">
										  <div id="emailHelp-5" class="form-text">The language of the text you want to generate.  <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26011">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
										</div>
									</div>
									<div class="col-xl-6 align-self-center">
										<h6>Multiplier</h6>
										<p class="text-end mb-2">2.7x</p>
										<div id="slider" class="mb-5 ai-slider"></div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="meta-content ms-0">
												<label class="form-label">Available Color</label>
												<div class="d-flex align-items-center color-filter">
													<div class="form-check">
														<input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel11" value="#24262B" aria-label="..." checked="">
														<span style="background-color: rgb(36, 38, 43);"></span>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel12" value="#8CB2D1" aria-label="...">
														<span style="background-color: rgb(140, 178, 209);"></span>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel13" value="#0D775E" aria-label="...">
														<span style="background-color: rgb(13, 119, 94);"></span>
													</div>
												</div>
										</div>
											
										<div id="emailHelp-6" class="form-text mb-2">AIKit's builtin prompts are already. <a href="javascript:void(0);" class="text-primary" >Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26020">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
									</div>
									<div class="col-xl-3 col-sm-6">
									 <label for="exampleFormControlInput1" class="form-label">Default view</label>
										<div class="ai-check">
											<div class="form-check mb-0">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
											  <label class="form-check-label mb-0" for="flexCheckDefault">
											    Elementor supported?
											  </label>
											  
											</div>
										</div>
										<div id="emailHelp-7" class="form-text mb-2">The language of the text you want to generate.  <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26021">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
									</div>
									<div class="col-xl-3 col-sm-6">
									 <label for="exampleFormControlInput1" class="form-label">Default view</label>
										<div class="ai-check bg-grey">
											<div class="form-check mb-0">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-1">
											  <label class="form-check-label text-white mb-0" for="flexCheckDefault-1">
											   Small (256x256)
											  </label>
											  
											</div>
										</div>
										<div id="emailHelp-8" class="form-text mb-2">When this is enabled, you will be able to use AIKit right. <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26024">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
											</div>
									</div>
									<div class="col-xl-3 col-sm-6 align-self-end">
										<div class="ai-check bg-grey">
											<div class="form-check mb-0">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-2">
											  <label class="form-check-label text-white mb-0" for="flexCheckDefault-2">
											  Medium (512x512)
											  </label>
											  
											</div>
										</div>
										<div id="emailHelp-9" class="form-text mb-2">When this is enabled, you will be able to use AIKit right. <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26025">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6 align-self-end">
										<div class="ai-check">
											<div class="form-check mb-0">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-3">
											  <label class="form-check-label mb-0" for="flexCheckDefault-3">
											  Large (1024x1204)
											  </label>
											  
											</div>
										</div>
										<div id="emailHelp-10" class="form-text mb-2">When this is enabled, you will be able to use AIKit right. <a href="javascript:void(0);" class="text-primary">Read More<svg class="ms-1" data-bs-toggle="tooltip" data-bs-title="Enter your RapidAPI key for Subtitles for YouTube here." width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_2604)">
											<path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 9.33333V7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7 4.66699H7.00583" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
											<clipPath id="clip0_65_26026">
											<rect width="14" height="14" fill="white"/>
											</clipPath>
											</defs>
											</svg>
											</a>
										</div>

									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="mb-3">
										    <label for="exampleInputEmail1" class="form-label">Image counts for each size</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
									  </div>
									</div>
									<div class="col-xl-6">
										<div class="mb-3">
										    <label for="exampleInputEmail1" class="form-label">Image generation styles</label>
										   <input name="tagify" class="form-control h-auto" value='Watercolor,Vector Art,Portrait,Pencil Drawing,Digital Painting,Abstract,Oil Painting,Cartoon,Black And White'>
										   <div id="emailHelp-11" class="form-text mb-2">System message help set the behaviour of the model. You can use it to ask the model to mimic a certain style or take a certain perspective for all text generations. For example, if you set this to "Shakespeare' style", the mode will follow the style of Shakespeare in all text generations when possible. System message should work ONLY with GPT-4 and to a lesser extent with gpt-3.5-turbo models.</div>

										   
									  </div>
									</div>
									<div class="col-xl-6">
										  <label for="floatingTextarea">OpenAI System Message</label>
										<div class="form-floating">
										  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
										  <div id="emailHelp-12" class="form-text mb-2">System message help set the behaviour of the model. You can use it to ask the model to mimic a certain style or take a certain perspective for all text generations. For example, if you set this to "Shakespeare' style", the mode will follow the style of Shakespeare in all text generations when possible. System message should work ONLY with GPT-4 and to a lesser extent with gpt-3.5-turbo models.

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
	
	$( ".cross-svg" ).on( "click", function() {
		$('.back-theme-ai input').prop('checked', false);
	
	});
		var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [20],
	behaviour: 'snap',
        connect: [true, false],
	
    range: {
        'min': 0,
        'max': 100
    }
});
	
  // Initialize tooltips (if not automatically done by Bootstrap 5)
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
  
 const radioButtons = document.getElementsByClassName(".cross-svg");
    for (const radioButton of radioButtons) {
        radioButton.addEventListener("click", function() {
            if (radioButton.checked) {
                radioButton.checked = false;
            }
        });
    }
	</script>
	
	
</body>
</html>