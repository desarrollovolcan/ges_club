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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Apex chart</a></li>
					</ol>
                </div>
                <!-- row -->
				<div class="row">
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Line Column Area</h4>
							</div>
							<div class="card-body">
								<div id="overiewChart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Area Chart</h4>
							</div>
							<div class="card-body">
								<div id="marketChart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"> Column Charts</h4>
							</div>
							<div class="card-body">
								<div id="chartBar"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"> Line Charts</h4>
							</div>
							<div class="card-body">
								<div id="lineBar"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Column with Negative Values</h4>
							</div>
							<div class="card-body">
								<div id="chartTimeline"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Candlestick Charts</h4>
							</div>
							<div class="card-body">
								<div id="marketChart2"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Pie Charts</h4>
							</div>
							<div class="card-body">
								<div id="pieChart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">redial Charts</h4>
							</div>
							<div class="card-body">
								<div id="redial1"></div>
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