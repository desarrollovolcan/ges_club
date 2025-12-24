<?php 
	 require_once __DIR__ . '/config/dz.php';
	 require_once __DIR__ . '/config/db.php';

	 $db = gesclub_db();
	 $clubs = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];
	 $selectedClubId = (int)($_GET['club_id'] ?? 0);
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Calendar</a></li>
					</ol>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-intro-title">Calendario del club</h4>

                                <form method="get" class="mb-4">
                                    <label class="form-label">Filtrar por club</label>
                                    <select class="form-control default-select" name="club_id" onchange="this.form.submit()">
                                        <option value="0">Todos los clubes</option>
                                        <?php foreach ($clubs as $club) { ?>
                                            <option value="<?php echo (int)$club['id']; ?>" <?php echo $selectedClubId === (int)$club['id'] ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($club['nombre_oficial'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </form>

                                <div class="mb-4">
                                    <p class="mb-2 text-muted">Estados del calendario</p>
                                    <div class="d-flex flex-column gap-2">
                                        <span class="badge bg-primary w-100 text-start">Programado</span>
                                        <span class="badge bg-success w-100 text-start">Confirmado</span>
                                        <span class="badge bg-danger w-100 text-start">Cancelado</span>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary btn-event w-100" id="calendar-add-event" data-bs-toggle="modal" data-bs-target="#calendar-event-modal">
                                    <span class="align-middle"><i class="ti-plus me-1"></i></span> Crear evento
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar" data-events-url="ajax/calendario-eventos.php" data-club-id="<?php echo $selectedClubId; ?>"></div>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN MODAL -->
                    <div class="modal fade" id="calendar-event-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Evento del calendario</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger d-none" id="calendar-event-error"></div>
                                    <form id="calendar-event-form">
                                        <input type="hidden" name="id" id="calendar-event-id">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Club</label>
                                                <select class="form-control default-select" name="club_id" id="calendar-event-club">
                                                    <?php foreach ($clubs as $club) { ?>
                                                        <option value="<?php echo (int)$club['id']; ?>" <?php echo $selectedClubId === (int)$club['id'] ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($club['nombre_oficial'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Título</label>
                                                <input type="text" class="form-control" name="titulo" id="calendar-event-title" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tipo</label>
                                                <input type="text" class="form-control" name="tipo" id="calendar-event-type" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Inicio</label>
                                                <input type="datetime-local" class="form-control" name="fecha_inicio" id="calendar-event-start" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Término</label>
                                                <input type="datetime-local" class="form-control" name="fecha_fin" id="calendar-event-end" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Sede</label>
                                                <input type="text" class="form-control" name="sede" id="calendar-event-location">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Cupos</label>
                                                <input type="number" class="form-control" name="cupos" id="calendar-event-capacity" min="0">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Estado</label>
                                                <select class="form-control default-select" name="estado" id="calendar-event-status">
                                                    <option value="programado">Programado</option>
                                                    <option value="confirmado">Confirmado</option>
                                                    <option value="cancelado">Cancelado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light me-auto d-none" id="calendar-event-delete">Eliminar</button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="calendar-event-save">Guardar</button>
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
