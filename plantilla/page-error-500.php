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
	<div class="fix-wrapper" id="app-banner" style="background-image:url('assets/images/bg1.jpg'); background-repeat:no-repeat;    background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="inner-content col-xl-12 text-center">
					<h1 class="error-head">500</h1>
					<h3 class="error-para">Internal Server Error</h3>
					<p>You 😭 do not have permission to view this resource.</p>
					<a href="index.php" class="btn btn-secondary btn-hover-1"><span>Back to Home</span></a>
				</div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>


</body>
</html>