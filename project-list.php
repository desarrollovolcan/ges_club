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
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Project</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Project List</a></li>
					</ol>
				</div>
				<div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Project List</h4>
								<a href="add-project.php" class="btn btn-primary btn-sm">Add Project</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="projectlist" class="display">
                                        <thead>
                                            <tr>
												<th>SN.</th>
                                                <th>Project Name</th>
                                                <th>Project Lead</th>
                                                <th>Assignee By</th>
                                                <th>Start Date</th>
                                                <th>Ending Date</th>
												<th>Progress</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
												<td>1</td>
												<td>
													<div>
														<h6>Create Frontend Glower</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                                
                                                <td>Yatin xarma</td>
                                                <td>26 June 2023</td>
												<td>07 June 2032</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>2</td>
												<td>
													<div>
														<h6>Create Frontend WordPress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>James Soap</td>
                                                
												<td>Yatin xarma</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2032</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>3</td>
												<td>
													<div>
														<h6>HTML To React Convert</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Jack Adja</td>
                                               
												<td>Harry Sir</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2024</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>4</td>
												<td>
													<div>
														<h6>HTML To wordpress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                                
												<td>john sir</td>
                                                <td>06 March 2024</td>
												<td>08 March 2024</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>5</td>
												<td>
													<div>
														<h6>Create Frontend Glower</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                               
                                                <td>Yatin xarma</td>
                                                <td>26 June 2023</td>
												<td>07 June 2032</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>1</td>
												<td>
													<div>
														<h6>Create Frontend Glower</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                                
                                                <td>Yatin xarma</td>
                                                <td>26 June 2023</td>
												<td>07 June 2032</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>2</td>
												<td>
													<div>
														<h6>Create Frontend WordPress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>James Soap</td>
                                                
												<td>Yatin xarma</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2032</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>6</td>
												<td>
													<div>
														<h6>Create Frontend WordPress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>James Soap</td>
                                               
												<td>Yatin xarma</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2032</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>7</td>
												<td>
													<div>
														<h6>HTML To React Convert</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Jack Adja</td>
                                                
												<td>Harry Sir</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2024</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>8</td>
												<td>
													<div>
														<h6>HTML To wordpress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                               
												<td>john sir</td>
                                                <td>06 March 2024</td>
												<td>08 March 2024</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>1</td>
												<td>
													<div>
														<h6>Create Frontend Glower</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>Mana William</td>
                                                
                                                <td>Yatin xarma</td>
                                                <td>26 June 2023</td>
												<td>07 June 2032</td>
                                                <td><span class="badge badge-warning light">Pending</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
											<tr>
												<td>2</td>
												<td>
													<div>
														<h6>Create Frontend WordPress</h6>
														<span>INV-100023456</span>
													</div>
												</td>
                                                <td>James Soap</td>
                                                
												<td>Yatin xarma</td>
                                                <td>06 Feb 2024</td>
												<td>07 Feb 2032</td>
                                                <td><span class="badge badge-success light">Success</span></td>
                                                <td>
													<div class="d-flex">
														<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
														<a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
                                        </tbody>
                                    </table>
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
	
    
</body>
</html>