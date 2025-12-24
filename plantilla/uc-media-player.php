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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Plugins</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Media Player</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
					<div class="col-xl-6 col-lg-12">
						<div class="card">
							<div class="card-header flex-wrap">
								<h5 class="card-title">Auto Video Palyer</h5>
								<div class="dz-toolbar nav nav-pills" id="pills-tab01" role="tablist">
									<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab01" href="#pills-Preview01" aria-controls="pills-Preview01" role="tab" aria-selected="false">Preview</a>
									<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab01" href="#pills-HTML01" aria-controls="pills-HTML01" role="tab" aria-selected="true">HTML</a>
									
									
								</div>
							</div>
							<div class="card-body">
								<!-- DZ Element Container -->
								<div class="dz-element tab-content" id="pills-tabContent01">
									<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview01" aria-labelledby="PreviewTab01">
										<video autoplay="" loop="" muted="" id="video-background2" class="w-100">
											<source src="assets/images/video/preview.mp4" type="video/mp4">
										</video>
									</div>
									<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML01" aria-labelledby="HtmlTab01">
	<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;video autoplay="" loop="" muted="" id="video-background2" class="w-100"&gt;
		&lt;source src="assets/images/video/preview.mp4" type="video/mp4"&gt;
	&lt;/video&gt;
</code></pre>
									</div>
									
									
									
								</div>
								<!-- DZ Element Container End -->
							</div>
							<div class="card-footer text-muted">
								2 days ago
							</div>
						</div>
					</div>
					<!-- second -->
					<div class="col-xl-6 col-lg-12">
						<div class="card">
							<div class="card-header flex-wrap">
								<h5 class="card-title">Custom container</h5>
								<div class="dz-toolbar nav nav-pills" id="pills-tab02" role="tablist">
									<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab02" href="#pills-Preview02" aria-controls="pills-Preview02" role="tab" aria-selected="false">Preview</a>
									<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab02" href="#pills-HTML02" aria-controls="pills-HTML02" role="tab" aria-selected="true">HTML</a>
									<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab02" href="#pills-Javascript02" aria-controls="pills-Javascript02" role="tab" aria-selected="false">Javascript</a>
									<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab02" href="#pills-Css02" aria-controls="pills-Css02" role="tab" aria-selected="false">Scss</a>
								</div>
							</div>
							<div class="card-body">
								<!-- DZ Element Container -->
								<div class="dz-element tab-content" id="pills-tabContentOne">
									
										<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview02">
											<div class="video-img">
												<div class="view-demo">
													<img src="assets/images/12.jpg" alt="">
													<div class="play-button text-center">
														
														<a href="https://www.youtube.com/watch?v=e6MhFghdQps" class="popup-youtube">
															<i class="fa fa-play"></i>
														</a>
													</div>	
												</div>	
											</div>
										</div>
								
									<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML02" aria-labelledby="HtmlTab02">
	<pre class="prettyprint lang-html linenums"><code class="language-html">
		&lt;div class="video-img"&gt;
		&lt;div class="view-demo"&gt;
			&lt;img src="assets/images/12.jpg" alt=""&gt;
			&lt;div class="play-button text-center"&gt;
				
				&lt;a href="https://www.youtube.com/watch?v=e6MhFghdQps" class="popup-youtube"&gt;
					&lt;i class="fa fa-play"&gt;&lt;/i&gt;
				&lt;/a&gt;
			&lt;/div&gt;	
		&lt;/div&gt;	
	&lt;/div&gt;
	</code>
	</pre>
									</div>
									<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript02" aria-labelledby="JavascriptTab02">
	<pre class="prettyprint lang-js linenums"><code class="language-html">

		&lt;script&gt;
		var handleMagnificPopup = function(){
			if(jQuery('.mfp-gallery').length > 0){
				/* magnificPopup function */
				jQuery('.mfp-gallery').magnificPopup({
					delegate: '.mfp-link',
					type: 'image',
					tLoading: 'Loading image #%curr%...',
					mainClass: 'mfp-img-mobile',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
						preload: [0,1] // Will preload 0 - before current, and 1 after the current image
					},
					image: {
						tError: '<a>The image #%curr%</a> could not be loaded.',
						titleSrc: function(item) {
							return item.el.attr('title') + '<small></small>';
						}
					}
				});
				/* magnificPopup function end */
			}
			
			if(jQuery('.mfp-video').length > 0){
				/* magnificPopup for Play video function */		
				jQuery('.mfp-video').magnificPopup({
					type: 'iframe',
					iframe: {
						markup: '<span class="mfp-iframe-scaler">'+
								'<span class="mfp-close"></span>'+
								'<iframe class="mfp-iframe"  allowfullscreen></iframe>'+
								'<span class="mfp-title">Some caption</span>'+
								'</span>'
					},
					callbacks: {
						markupParse: function(template, values, item) {
							values.title = item.el.attr('title');
						}
					}
				});	
			}
	&lt;/script&gt;
		
	</code>
	
	</pre>
									</div>
									<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css02" >
<pre class="prettyprint lang-css linenums"><code class="language-html">
	
	.video-img{
		.view-demo{
			position: relative;	
			overflow: hidden;
			img{
				width: 100%;
				border-radius: $radius;
				object-fit: cover;
				
				
			}
			&:after{
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				height: 100%;
				width:100%;
				background:rgba(84, 124, 175, 0.25);
				z-index: 1;
				border-radius: $radius;
			}
			a{
				height: 4.375rem;
				width: 4.375rem;
				display: block;
				position: relative;
				z-index: 2;
				margin: auto;
				svg{
					path{
						fill{
							fill: #fff;
						}
					}
				}
			}
			.play-button{
				position: absolute;
				top: 50%;
				left: 0;
					transform: translate(0, -3.125rem);
				z-index: 2;
				width: 100%;
				h4{
					font-size: 1.5rem;
					color: white;
					position: relative;
					z-index: 2;
					margin-top: 0.625rem;
				}
				@include respond ('phone'){
					svg{
						width:3.125rem;
					}
					h4{
						font-size: 1rem;
					}
				}
				
			}
		}
		
	
		.popup-youtube{
			display: inline-block;
			height: 70px;
			width: 70px;
			line-height: 72px;
			text-align: center;
			font-size: 18px;
			border-radius: 50%;
			min-width: 70px;
			background-color: $white;
			color: var(--primary);
		
			i{
				color:var(--primary);
			}
		
			&:before{
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				display: block;
				border: 1px solid var(--primary);
				-webkit-border-radius: 50%;
				-khtml-border-radius: 50%;
				-moz-border-radius: 50%;
				-ms-border-radius: 50%;
				-o-border-radius: 50%;
				border-radius: 100%;
				animation: animationSignal1;
				animation-iteration-count: infinite;
				animation-duration: 3s;
				-webkit-animation: animationSignal1;
				-webkit-animation-iteration-count: infinite;
				-webkit-animation-duration: 3s;
				z-index: -1;
				transform: scale(1);
				-moz-transform: scale(1);
				-webkit-transform: scale(1);
				-ms-transform: scale(1);
				-o-transform: scale(1);
				-moz-transition: all 0.5;
				-o-transition: all 0.5;
				-webkit-transition: all 0.5;
				-ms-transition: all 0.5;
				transition: all 0.5;
			}
			&:after{
		
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				display: block;
				border: 1px solid var(--primary);
				-webkit-border-radius: 100%;
				-khtml-border-radius: 100%;
				-moz-border-radius: 100%;
				-ms-border-radius: 100%;
				-o-border-radius: 100%;
				border-radius: 100%;
				animation: animationSignal2;
				animation-iteration-count: infinite;
				animation-duration: 3s;
				-webkit-animation: animationSignal2;
				-webkit-animation-iteration-count: infinite;
				-webkit-animation-duration: 3s;
				z-index: -1;
				transform: scale(1);
				-moz-transform: scale(1);
				-webkit-transform: scale(1);
				-ms-transform: scale(1);
				-o-transform: scale(1);
				-moz-transition: all 0.5;
				-o-transition: all 0.5;
				-webkit-transition: all 0.5;
				-ms-transition: all 0.5;
				transition: all 0.5;
			}
		}
		@keyframes animationSignal1 {
			/*Video Popup*/
				0% {
					opacity: 0.8;
					transform: scale(0.9);
					-moz-transform: scale(0.9);
					-ms-transform: scale(0.9);
					-o-transform: scale(0.9);
					-webkit-transform: scale(0.9);
				}
				100% {
					transform:  scale(1.5);
					-moz-transform:  scale(1.5);
					-ms-transform:  scale(1.5);
					-o-transform:  scale(1.5);
					-webkit-transform:  scale(1.5);
					opacity: 0;
				}
			}
			@-webkit-keyframes animationSignal1 {
			/*Video Popup*/
				0% {
					//opacity: 0.8;
					transform: scale(0.9);
					-moz-transform: scale(0.9);
					-ms-transform: scale(0.9);
					-o-transform: scale(0.9);
					-webkit-transform: scale(0.9);
				}
				100% {
					transform:  scale(1.5);
					-moz-transform:  scale(1.5);
					-ms-transform:  scale(1.5);
					-o-transform:  scale(1.5);
					-webkit-transform:  scale(1.5);
					opacity: 0;
				}
			}
			@keyframes animationSignal2 {
			/*Video Popup*/
				0% {
					//opacity: 0.8;
					transform: scale(0.9);
					-moz-transform: scale(0.9);
					-webkit-transform: scale(0.9);
					-ms-transform: scale(0.9);
					-o-transform: scale(0.9);
				}
				100% {
					transform:  scale(1.9);
					-moz-transform:  scale(1.9);
					-webkit-transform:  scale(1.9);
					-ms-transform:  scale(1.9);
					-o-transform:  scale(1.9);
					opacity: 0;
				}
			}
			@-webkit-keyframes animationSignal2 {
			/*Video Popup*/
				0% {
					//opacity: 0.8;
					transform: scale(0.9);
					-moz-transform: scale(0.9);
					-webkit-transform: scale(0.9);
					-ms-transform: scale(0.9);
					-o-transform: scale(0.9);
				}
				100% {
					transform:  scale(1.9);
					-moz-transform:  scale(1.9);
					-webkit-transform:  scale(1.9);
					-ms-transform:  scale(1.9);
					-o-transform:  scale(1.9);
					opacity: 0;
				}
			}
		
	} 
</code>

</pre>
									</div>
								</div>
								<!-- DZ Element Container End -->
							</div>
							<div class="card-footer text-muted">
								2 days ago
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Basic Audio</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab03" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab03" href="#pills-Preview03" aria-controls="pills-Preview03" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab03" href="#pills-HTML03" aria-controls="pills-HTML03" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab03" href="#pills-Javascript03" aria-controls="pills-Javascript03" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab03" href="#pills-Css03" aria-controls="pills-Css03" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent03">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview03" aria-labelledby="PreviewTab03">
									<div class="dz-player" data-src="assets/images/song/song1.mp3">
										<button class="dz-play-btn"><span class="dz-play-btnIco"><i class="fa-solid fa-play"></i></span></button>
										<button class="dz-play-btn"><span class="dz-play-btnIco"><svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path></svg></span></button>
										<div class="dzPlayNum">
											<span class="dzPlayCurDuration">0:00</span>
										</div>
										<div class="dz-player-range">
											<span class="under-dz-player-ranger"></span>
											<input class="dzPlayRange" type="range" min="0" value="0" step="1" max="183"><span class="change-dz-player-range"></span>
										</div>
										<div class="dzPlayNum">
											<span class="dzPlayDuration">3:03</span>
										</div>
										<div class="dz-volume-container">
											<span class="dzPlayerVolIcon"><i class="fa fa-volume-up"></i></span>
											<div class="dz-player-range-volume">
												<span class="under-dz-player-ranger"></span>
												<input class="dzPlayVol" type="range" min="0" max="1" value="1" step="0.1"><span class="change-dz-player-range"></span>
											</div>
										</div>
									</div>
									  
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML03" aria-labelledby="HtmlTab03">
<pre class="prettyprint lang-html linenums"><code class="language-html">

	&lt;div class="dz-player m-b15" data-src="assets/images/song/song1.mp3"&gt;
	&lt;button class="dz-play-btn"&gt;&lt;span class="dz-play-btnIco"&gt;&lt;i class="fa-solid fa-play"&gt;&lt;/i&gt;&lt;/span&gt;&lt;/button&gt;
	&lt;button class="dz-play-btn"&gt;&lt;span class="dz-play-btnIco"&gt;&lt;svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""&gt;&lt;path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"&gt;&lt;/path&gt;&lt;/svg&gt;&lt;/span&gt;&lt;/button&gt;
	&lt;div class="dzPlayNum"&gt;
		&lt;span class="dzPlayCurDuration"&gt;0:00&lt;/span&gt;
	&lt;/div&gt;
	&lt;div class="dz-player-range"&gt;
		&lt;span class="under-dz-player-ranger"&gt;&lt;/span&gt;
		&lt;input class="dzPlayRange" type="range" min="0" value="0" step="1" max="183"&gt;&lt;span class="change-dz-player-range"&gt;&lt;/span&gt;
	&lt;/div&gt;
	&lt;div class="dzPlayNum"&gt;
		&lt;span class="dzPlayDuration"&gt;3:03&lt;/span&gt;
	&lt;/div&gt;
	&lt;div class="dz-volume-container"&gt;
		&lt;span class="dzPlayerVolIcon"&gt;&lt;i class="fa fa-volume-up"&gt;&lt;/i&gt;&lt;/span&gt;
		&lt;div class="dz-player-range-volume"&gt;
			&lt;span class="under-dz-player-ranger"&gt;&lt;/span&gt;
			&lt;input class="dzPlayVol" type="range" min="0" max="1" value="1" step="0.1"&gt;&lt;span class="change-dz-player-range"&gt;&lt;/span&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
</code>
</pre>


								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript03" aria-labelledby="JavascriptTab03">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$(document).ready(function(){
		var musicplayer = function(){

			var timeString = (secs) => {
	
			  let ss = Math.floor(secs),
				hh = Math.floor(ss / 3600),
				mm = Math.floor((ss - hh * 3600) / 60);
			  ss = ss - hh * 3600 - mm * 60;
	
	
			  if (hh &gt; 0) {
				mm = mm &gt; 10 ? "0" + mm : mm;
			  }
			  ss = ss &lt; 10 ? "0" + ss : ss;
			  return hh &gt; 0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}`;
			};
	
			function setProgress(elTarget) {
			  let divisionNumber = elTarget.getAttribute("max") / 100;
			  let rangeNewWidth = Math.floor(elTarget.value / divisionNumber);
			  if (rangeNewWidth > 95) {
				elTarget.nextSibling.style.width = "95%";
			  } else {
				elTarget.nextSibling.style.width = rangeNewWidth + "%";
			  }
			}
	
			for (let i of document.querySelectorAll(".dz-player")) {
				
			  i.audio = new Audio(encodeURI(i.dataset.src));
			  (i.aPlay = i.querySelector(".dz-play-btn")),
				(i.aPlayIco = i.querySelector(".dz-play-btnIco")),
				(i.dzPlayCurDuration = i.querySelector(".dzPlayCurDuration")),
				(i.dzPlayDuration = i.querySelector(".dzPlayDuration")),
				(i.dzPlayRange = i.querySelector(".dzPlayRange")),
				(i.dzPlayVol = i.querySelector(".dzPlayVol")),
				(i.dzPlayerVolIcon = i.querySelector(".dzPlayerVolIcon"));
			  i.seeking = false; 
	
	
			  i.aPlay.onclick = () => {
				if (i.audio.paused) {
				  i.audio.play();
				} else {
				  i.audio.pause();
				}
			  };
	
			  i.audio.onplay = () => (i.aPlayIco.innerHTML = '<i class="fa fa-pause"></i>');
			  i.audio.onpause = () => (i.aPlayIco.innerHTML = '<i class="fa fa-play"></i>');
	
			  i.audio.onloadstart = () => {
				i.dzPlayCurDuration.innerHTML = "Loading";
				i.dzPlayDuration.innerHTML = "";
			  };
	
	
			  i.audio.onloadedmetadata = () => {
	
				i.dzPlayCurDuration.innerHTML = timeString(0);
				i.dzPlayDuration.innerHTML = timeString(i.audio.duration);
	
				i.dzPlayRange.max = Math.floor(i.audio.duration);
	
				i.dzPlayRange.oninput = () => (i.seeking = true); 
				i.dzPlayRange.onchange = () => {
				  i.audio.currentTime = i.dzPlayRange.value;
				  if (!i.audio.paused) {
					i.audio.play();
				  }
				  i.seeking = false;
				};
	
				i.audio.ontimeupdate = () => {
				  if (!i.seeking) {
					i.dzPlayRange.value = Math.floor(i.audio.currentTime);
				  }
				  i.dzPlayCurDuration.innerHTML = timeString(i.audio.currentTime);
				  let divisionNumber = i.dzPlayRange.getAttribute("max") / 100;
				  let rangeNewWidth = Math.floor(i.dzPlayRange.value / divisionNumber);
				  if (rangeNewWidth > 95) {
					i.dzPlayRange.nextSibling.style.width = "95%";
				  } else {
					i.dzPlayRange.nextSibling.style.width = rangeNewWidth + "%";
				  }
				};
			  };
			  
			  i.dzPlayerVolIcon.onclick = () => {
				i.audio.volume = i.audio.volume == 0 ? 1 : 0;
				i.dzPlayVol.value = i.audio.volume;
				i.dzPlayerVolIcon.innerHTML =
				  i.dzPlayVol.value == 0
					? '<i class="fa fa-volume-off"></i>'
					: '<i class="fa fa-volume-up"></i>';
				if (i.dzPlayVol.value == 0) {
				  i.dzPlayVol.nextSibling.style.width = "0%";
				} else {
				  i.dzPlayVol.nextSibling.style.width = "95%";
				}
			  };
			  i.dzPlayVol.onchange = () => {
				i.audio.volume = i.dzPlayVol.value;
				i.dzPlayerVolIcon.innerHTML =
				  i.dzPlayVol.value == 0
					? '<i class="fa fa-volume-off"></i>'
					: '<i class="fa fa-volume-up"></i>';
			  };
	
			  i.audio.oncanplaythrough = () => {
				i.aPlay.disabled = false;
				i.dzPlayVol.disabled = false;
				i.dzPlayRange.disabled = false;
			  };
			  i.audio.onwaiting = () => {
				i.aPlay.disabled = true;
				i.dzPlayVol.disabled = true;
				i.dzPlayRange.disabled = true;
			  };
	
			  i.dzPlayRange.addEventListener("input", function () {
				setProgress(this);
			  });
	
			  i.dzPlayVol.addEventListener("input", function () {
				setProgress(this);
			  });
			}	
		}
		
		var musiccontrolbutton = function(){
			$(document).ready(function() {
				var $tracks = $(".track");
				var $controlBtns = $(".play-pause");
				var activeIndex = -1;
	
				function playPause(index) {
					if (activeIndex === index) {
	
						var $track = $tracks[index];
						var $controlBtn = $controlBtns.eq(index);
	
						if ($track.paused) {
							$track.play();
							$controlBtn.removeClass("play").addClass("pause");
						} else {
							$track.pause();
							$controlBtn.removeClass("pause").addClass("play");
						}
					} else {
						if (activeIndex !== -1) {
							var $activeTrack = $tracks[activeIndex];
							var $activeControlBtn = $controlBtns.eq(activeIndex);
							$activeTrack.pause();
							$activeControlBtn.removeClass("pause").addClass("play");
						}
	
						var $track = $tracks[index];
						var $controlBtn = $controlBtns.eq(index);
						$track.play();
						$controlBtn.removeClass("play").addClass("pause");
						activeIndex = index;
					}
				}
	
				$controlBtns.each(function(index) {
					$(this).on("click", function() {
						playPause(index);
					});
				});
	
				$tracks.on("ended", function() {
					var index = $tracks.index(this);
					$controlBtns.eq(index).removeClass("pause").addClass("play");
					activeIndex = -1;
				});
			});	
		}
	&lt;/script&gt;
	</code>
	</pre>
			

						</div>
						<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css03">
							<pre class="prettyprint lang-css linenums"><code class="language-html">
								
.dz-player {
	display: flex;
	align-items: center;
	flex-wrap: wrap;
	width: 100%;
	padding: 19px 25px;
	background: var(--primary);
	gap: 0.3rem;
	border-radius: $radius;
	@include respond('tab-land'){
		padding:15px;
	}
	@include respond('phone'){
		padding: 20px 15px;
		margin-bottom: 10px;
		gap:0;
	}
	.dz-play-btn {
		padding: 0;
		margin: 0;
		background: 0;
		border: 0;
		cursor: pointer;
		line-height:0;
		.dz-play-btnIco{
			color:#fff;
			i{
				color: #fff;
				font-size: 18px;
			}
		}
	}
	.dzPlayNum {
		font-size: 14px;
		color: #cbcbcb;
		margin: 0 10px;
		width:30px;
		@include respond('phone'){
			margin:0 5px;
		}
	}
}
.dz-player input[type="range"]{
	appearance: none;
	border: none;
	outline: none;
	box-shadow: none;
	width: 500px;
	padding: 0;
	margin: 0;
	background: 0;
	height: 10px;
}
.dz-player-range{
	width: 65%;
	@include respond('tab-land'){
		width:55%;
	}
	@include respond('phone'){
		width:35%;
	}
}
.dz-player-range,
.dz-player-range-volume {
	position: relative;
	display: flex;
	align-items: center;
}
.dz-player-range input,
.dz-player-range-volume input {
	position: relative;
	z-index: 1;
}
.dz-player-range .change-dz-player-range,
.dz-player-range-volume .change-dz-player-range {
	position: absolute;
	left: 0;
	top: 0;
	height: 10px;
	width: 0px;
	background: var(--secondary);
}
.dz-player-range-volume .change-dz-player-range {
	height: 10px;
	width: 95%;
}
.under-dz-player-ranger {
	position: absolute;
	left: 0;
	top: 0;
	height: 10px;
	width: 100%;
	background: #fff;
}
.dz-player-range-volume .under-dz-player-ranger {
	height: 10px;
}
.dz-player input[type="range"]::-webkit-slider-thumb{
	appearance: none;
}

.dz-player input[type="range"]::-webkit-slider-runnable-track{
	background: transparent;
	height: 6px;
	border-radius: 10px;
}
.dz-player input[type="range"]::-webkit-slider-thumb{
	width: 16px;
	height: 16px;
	border-radius: 50%;
	border: 0;
	background: #fff;
	position: relative;
	cursor: pointer;
	margin-top: -5px;
}
.dz-player input[type="range"]::-moz-range-thumb{
	width: 16px;
	height: 16px;
	border-radius: 50%;
	border: 0;
	background: #fff;
	position: relative;
	cursor: pointer;
	margin-top: -5px;
}
.dzPlayerVolIcon {
	margin: 0 10px;
	cursor: pointer;
	i{
		color:#fff;
	}
}
input.dzPlayVol {
	width: 65px !important;
	@include respond('phone'){
		width:50px !important;
	}
}

.dzPlayVol::-webkit-slider-runnable-track {
	height: 10px !important;
}

.dzPlayVol::-webkit-slider-thumb {
	margin-top: -3px !important;
}

.dzPlayVol::-moz-range-thumb {
	margin-top: -3px !important;
}

.dz-volume-container {
	display: flex;
	align-items: center;
}
							</code>
							
							</pre>
						</div>
							</div>
							<!-- DZ Element Container End -->
						</div>
						<div class="card-footer text-muted">
							3 days ago
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