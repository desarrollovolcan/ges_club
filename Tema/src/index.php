<!DOCTYPE html>
<html lang="es">

    <head>
        
        <?php $title = "Panel principal";
        include 'partials/title-meta.php' ?>

        <?php include 'partials/head-css.php'; ?>

    </head>

    <?php include 'partials/body.php'; ?>

        <!-- Begin page -->
        <div id="app-layout">
            
            <?php include 'partials/menu.php'; ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Panel principal</h4>
                                <p class="text-muted mb-0">Sistema integral para la administración de clubes deportivos en Chile.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                                            <div>
                                                <h5 class="mb-1">Visión general del club</h5>
                                                <p class="text-muted mb-0">Gestiona socios, finanzas, deporte y cumplimiento normativo desde un solo lugar.</p>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <span class="badge bg-primary-subtle text-primary">Socios activos</span>
                                                <span class="badge bg-success-subtle text-success">Calendario deportivo</span>
                                                <span class="badge bg-warning-subtle text-warning">Tesorería al día</span>
                                                <span class="badge bg-info-subtle text-info">Cumplimiento legal</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-primary-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="users" class="text-primary"></i>
                                            </div>
                                            <h5 class="mb-0">Gestión de Socios y Deportistas</h5>
                                        </div>
                                        <p class="text-muted fs-14">Registro y seguimiento de socios, jugadores y apoderados.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Registro de socios, jugadores y apoderados.</li>
                                            <li>RUT, datos de contacto y ficha médica.</li>
                                            <li>Estados: activo, suspendido, moroso, retirado.</li>
                                            <li>Categorías (infantil, juvenil, adulto, honorario).</li>
                                            <li>Historial de pagos y participación deportiva.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-success-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="activity" class="text-success"></i>
                                            </div>
                                            <h5 class="mb-0">Gestión Deportiva</h5>
                                        </div>
                                        <p class="text-muted fs-14">Control de equipos, entrenamientos y rendimiento deportivo.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Equipos, categorías y ramas deportivas.</li>
                                            <li>Entrenadores y cuerpo técnico.</li>
                                            <li>Planificación de entrenamientos.</li>
                                            <li>Asistencia a entrenamientos y partidos.</li>
                                            <li>Estadísticas deportivas básicas.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-info-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="calendar" class="text-info"></i>
                                            </div>
                                            <h5 class="mb-0">Competiciones y Calendario</h5>
                                        </div>
                                        <p class="text-muted fs-14">Organiza torneos, canchas, horarios y resultados.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Torneos internos y externos.</li>
                                            <li>Programación de partidos.</li>
                                            <li>Canchas y horarios.</li>
                                            <li>Resultados y tablas de posiciones.</li>
                                            <li>Convocatorias automáticas.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-warning-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="credit-card" class="text-warning"></i>
                                            </div>
                                            <h5 class="mb-0">Finanzas y Tesorería</h5>
                                        </div>
                                        <p class="text-muted fs-14">Control de ingresos, egresos y morosidad del club.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Cuotas sociales y mensualidades.</li>
                                            <li>Pagos en línea (WebPay, transferencia, efectivo).</li>
                                            <li>Control de morosidad.</li>
                                            <li>Ingresos y egresos.</li>
                                            <li>Presupuestos por rama o categoría.</li>
                                            <li>Reportes financieros.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-danger-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="file-text" class="text-danger"></i>
                                            </div>
                                            <h5 class="mb-0">Facturación y Cumplimiento SII</h5>
                                        </div>
                                        <p class="text-muted fs-14">Emisión de documentos tributarios y control fiscal.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Emisión de boletas y facturas electrónicas.</li>
                                            <li>Integración con el SII.</li>
                                            <li>Libros de ventas y compras.</li>
                                            <li>Control tributario del club.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-secondary-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="briefcase" class="text-secondary"></i>
                                            </div>
                                            <h5 class="mb-0">Contratos y Recursos Humanos</h5>
                                        </div>
                                        <p class="text-muted fs-14">Gestión de contratos, honorarios y normativa laboral.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Contratos de entrenadores y personal.</li>
                                            <li>Honorarios vs contratos laborales.</li>
                                            <li>Pagos y liquidaciones.</li>
                                            <li>Control de vigencia contractual.</li>
                                            <li>Cumplimiento de normativa laboral chilena.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-primary-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="message-square" class="text-primary"></i>
                                            </div>
                                            <h5 class="mb-0">Comunicaciones y Notificaciones</h5>
                                        </div>
                                        <p class="text-muted fs-14">Mensajería automática y avisos para la comunidad.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Envío de correos y mensajes (WhatsApp/SMS).</li>
                                            <li>Notificaciones de pagos vencidos.</li>
                                            <li>Avisos de entrenamientos y partidos.</li>
                                            <li>Comunicaciones a apoderados.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-success-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="map" class="text-success"></i>
                                            </div>
                                            <h5 class="mb-0">Gestión de Infraestructura</h5>
                                        </div>
                                        <p class="text-muted fs-14">Control de canchas, recintos y uso por categoría.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Canchas y recintos.</li>
                                            <li>Horarios y reservas.</li>
                                            <li>Mantenimiento.</li>
                                            <li>Control de uso por categoría.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-info-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="folder" class="text-info"></i>
                                            </div>
                                            <h5 class="mb-0">Documentos y Cumplimiento Legal</h5>
                                        </div>
                                        <p class="text-muted fs-14">Repositorio documental y cumplimiento normativo.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Estatutos del club.</li>
                                            <li>Certificados médicos.</li>
                                            <li>Autorizaciones de apoderados.</li>
                                            <li>Documentación exigida por asociaciones o federaciones.</li>
                                            <li>Cumplimiento Ley 19.628 (protección de datos personales).</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-warning-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="bar-chart-2" class="text-warning"></i>
                                            </div>
                                            <h5 class="mb-0">Reportes y Estadísticas</h5>
                                        </div>
                                        <p class="text-muted fs-14">Indicadores clave para la gestión del club.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Reportes financieros.</li>
                                            <li>Asistencia y participación.</li>
                                            <li>Morosidad.</li>
                                            <li>Rendimiento deportivo.</li>
                                            <li>Indicadores de gestión del club.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-sm bg-danger-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                                <i data-feather="shield" class="text-danger"></i>
                                            </div>
                                            <h5 class="mb-0">Seguridad y Control de Accesos</h5>
                                        </div>
                                        <p class="text-muted fs-14">Roles, permisos y trazabilidad de acciones.</p>
                                        <ul class="list-unstyled text-muted mb-0">
                                            <li>Roles (administrador, tesorero, entrenador, socio).</li>
                                            <li>Permisos por módulo.</li>
                                            <li>Registro de actividad.</li>
                                            <li>Respaldo de información.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- App js-->
        <script src="assets/js/app.js"></script>

    </body>

</html>
