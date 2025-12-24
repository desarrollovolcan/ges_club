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
				
				<div class="row kanban-bx px-3">
					<div class="col-xl-3 col-md-6 px-0">
						<div class="kanbanPreview-bx">
							<div class="draggable-zone dropzoneContainer">
								<div class="sub-card align-items-center d-flex justify-content-between mb-4">
									<div>
										<h4 class="mb-0">To-Do</h4>
									</div>
									<div class="plus-bx">
										<a href="javascript:void(0);"><i class="fas fa-plus"></i></a>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Navigation to Selection Is Broken.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm">cusdev</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user mb-4">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">2<i class="flaticon-inbox-1  fs-18 ms-2"></i></span>
											</div>
										</div>
										<hr style="margin-left: -30px; margin-right: -30px;">
										<div class="d-flex align-items-center">
											<img src="assets/images/avatar/1.jpg" class="kanban-avtar me-2" alt="">
											<h6 class="card-title--small mb-0">Yatin Xarma</h6>
										</div>
										<div class="mt-1">
											<p class="text-dark">Lorem ipsum dolor.this</p>
										</div>
										<div class="d-flex justify-content-between mb-2">
											<small>
												1 hour ago
											</small>
											<div class="dropdown c-pointer">
												<div class="btn-link" data-bs-toggle="dropdown">
													<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="3.5" cy="11.5" r="2.5" transform="rotate(-90 3.5 11.5)" fill="#717579"></circle>
														<circle cx="11.5" cy="11.5" r="2.5" transform="rotate(-90 11.5 11.5)" fill="#717579"></circle>
														<circle cx="19.5" cy="11.5" r="2.5" transform="rotate(-90 19.5 11.5)" fill="#717579"></circle>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Delete</a>
													<a class="dropdown-item" href="javascript:void(0)">Edit</a>
												</div>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<img src="assets/images/avatar/1.jpg" class="kanban-avtar me-2" alt="">
											<h6 class="card-title--small mb-0">Yatin Xarma</h6>
										</div>
										<div class="mt-1">
											<p class="text-dark">What You Think <span class="vadge badge-primary light badge-sm rounded mx-1"> © Asabina</span>About</p>
										</div>
										<div class="d-flex justify-content-between mb-2">
											<small>
												1 hour ago
											</small>
											<div class="dropdown c-pointer">
												<div class="btn-link" data-bs-toggle="dropdown">
													<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="3.5" cy="11.5" r="2.5" transform="rotate(-90 3.5 11.5)" fill="#717579"></circle>
														<circle cx="11.5" cy="11.5" r="2.5" transform="rotate(-90 11.5 11.5)" fill="#717579"></circle>
														<circle cx="19.5" cy="11.5" r="2.5" transform="rotate(-90 19.5 11.5)" fill="#717579"></circle>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Delete</a>
													<a class="dropdown-item" href="javascript:void(0)">Edit</a>
												</div>
											</div>
										</div>
										<div class="kanban-serach">
											<div class="input-group search-area">
												<input type="text" class="form-control" placeholder="Search here...">
												<span class="input-group-text"><a href="javascript:void(0)">
													<i class="flaticon-send fs-18 text-primary"></i>
														
												</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-md-6 px-0">
						<div class="kanbanPreview-bx">
							<div class="draggable-zone dropzoneContainer">
								<div class="sub-card align-items-center d-flex justify-content-between mb-4">
									<div>
										<h4 class="mb-0">Done(<span class="totalCount">3</span>)</h4>
									</div>
									<div class="plus-bx">
										<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></a>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-md-6 px-0">
						<div class="kanbanPreview-bx">
							<div class="draggable-zone dropzoneContainer">
								<div class="sub-card align-items-center d-flex justify-content-between mb-4">
									<div>
										<h4 class="mb-0">On Progress(<span class="totalCount">2</span>)</h4>
									</div>
									<div class="plus-bx">
										<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></a>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 px-0">
						<div class="kanbanPreview-bx">
							<div class="draggable-zone dropzoneContainer">
								<div class="sub-card align-items-center d-flex justify-content-between mb-4">
									<div>
										<h4 class="mb-0">Done(<span class="totalCount">3</span>)</h4>
									</div>
									<div class="plus-bx">
										<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></a>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card draggable-handle draggable">
									<div class="card-body">
										<h5 class="mb-0"><a href="javascript:void(0);" class="text-black">Create wireframe for landing.</a></h5>
										<div class="mt-3 mb-4">
											<span class="badge badge-primary light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="var(--primary)"></circle>
											</svg>cusdev</span>
											<span class="badge badge-warning light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#ff954c"></circle>
											</svg>Reaserch</span>
											<span class="badge badge-danger light badge-sm"><svg class="me-1" width="8" height="8" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="5" cy="5" r="5" fill="#fc2e53"></circle>
											</svg>Work</span>
										</div>
										<div class="row justify-content-between align-items-center kanban-user">
											<ul class="users col-6">
												<li><img src="assets/images/contacts/pic11.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic22.jpg" alt=""></li>
												<li><img src="assets/images/contacts/pic33.jpg" alt=""></li>
											</ul>
											<div class="col-6 d-flex justify-content-end">
												<span class="fs-14  align-items-center d-flex justify-content-end">4<i class="flaticon-inbox-1 fs-18 ms-2"></i></span>
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
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">People Title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xl-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label required">People Name</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="kubayar">
							  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			</div>
		</div>


		
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