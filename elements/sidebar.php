<?php
	require_once __DIR__ . '/../config/permissions.php';

	$canUsuarios = gesclub_can_any(['admin-users', 'permisos-modulos', 'permisos-roles']);
	$canClub = gesclub_can_any(['registrar-club', 'documentos-club', 'club-disciplinas', 'club-categorias', 'club-equipos', 'club-temporadas', 'configuracion-club', 'bitacora']);
	$canPersonas = gesclub_can_any(['registrar-deportistas', 'registrar-entrenadores', 'registrar-colaboradores', 'apoderados', 'importacion-masiva', 'reportes']);
	$canEntrenamientos = gesclub_can_any(['entrenamientos-planificacion', 'entrenamientos-sesiones', 'entrenamientos-asistencia']);
	$canCompetencias = gesclub_can_any(['competencias', 'competencias-inscripciones', 'competencias-resultados']);
	$canCalendario = gesclub_can_any(['calendario-eventos', 'reservas']);
	$canCobros = gesclub_can_any(['finanzas-cuotas', 'finanzas-cobros', 'finanzas-pagos', 'finanzas-becas', 'finanzas-presupuesto']);
	$canContabilidad = gesclub_can_any(['contabilidad-gastos', 'contabilidad-rendiciones']);
	$canComunicaciones = gesclub_can_any(['comunicaciones-anuncios', 'comunicaciones-notificaciones', 'comunicaciones-mensajes']);
	$canDocumentos = gesclub_can_any(['documentos-internos', 'actas-reuniones', 'solicitudes']);
	$canInventario = gesclub_can_any(['inventario', 'inventario-movimientos']);
	$canReportes = gesclub_can_any(['reportes', 'reportes-deportivos', 'reportes-asistencia', 'reportes-financieros']);
	$canUbicacion = gesclub_can_any(['ubicacion-pais', 'ubicacion-region', 'ubicacion-comuna']);
	$canControlActividades = gesclub_is_authenticated();
?>
<div class="deznav">
			<div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<?php if ($canControlActividades) { ?>
					<li>
						<a href="control-actividades.php" aria-expanded="false">
							<i class="fa fa-clipboard-list"></i>
							<span class="nav-text">Control de actividades</span>
						</a>
					</li>
					<?php } ?>
					<?php if ($canUsuarios) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-user-cog"></i>
							<span class="nav-text">Usuarios y roles</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('admin-users')) { ?>
								<li><a class="dz-active" href="admin-users.php"><i class="ti-id-badge me-2"></i>Administración Usuarios</a></li>
							<?php } ?>
							<?php if (gesclub_can('permisos-modulos')) { ?>
								<li><a class="dz-active" href="permisos-modulos.php"><i class="ti-lock me-2"></i>Permisos por módulo</a></li>
							<?php } ?>
							<?php if (gesclub_can('permisos-roles')) { ?>
								<li><a class="dz-active" href="permisos-roles.php"><i class="ti-key me-2"></i>Permisos por rol</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

					<?php if ($canClub) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-home"></i>
							<span class="nav-text">Club</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('registrar-club')) { ?>
								<li><a class="dz-active" href="registrar-club.php"><i class="ti-home me-2"></i>Registrar club</a></li>
							<?php } ?>
							<?php if (gesclub_can('documentos-club')) { ?>
								<li><a class="dz-active" href="documentos-club.php"><i class="ti-folder me-2"></i>Documentos del club</a></li>
							<?php } ?>
							<?php if (gesclub_can('club-disciplinas')) { ?>
								<li><a class="dz-active" href="club-disciplinas.php"><i class="ti-medall me-2"></i>Disciplinas</a></li>
							<?php } ?>
							<?php if (gesclub_can('club-categorias')) { ?>
								<li><a class="dz-active" href="club-categorias.php"><i class="ti-layout-list-thumb me-2"></i>Categorías deportivas</a></li>
							<?php } ?>
							<?php if (gesclub_can('club-equipos')) { ?>
								<li><a class="dz-active" href="club-equipos.php"><i class="ti-flag-alt me-2"></i>Equipos y plantillas</a></li>
							<?php } ?>
							<?php if (gesclub_can('club-temporadas')) { ?>
								<li><a class="dz-active" href="club-temporadas.php"><i class="ti-calendar me-2"></i>Temporadas</a></li>
							<?php } ?>
							<?php if (gesclub_can('configuracion-club')) { ?>
								<li><a class="dz-active" href="configuracion-club.php"><i class="ti-settings me-2"></i>Configuración</a></li>
							<?php } ?>
							<?php if (gesclub_can('bitacora')) { ?>
								<li><a class="dz-active" href="bitacora.php"><i class="ti-receipt me-2"></i>Bitácora / Auditoría</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

					<?php if ($canPersonas) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-users"></i>
							<span class="nav-text">Personas</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('registrar-deportistas')) { ?>
								<li><a class="dz-active" href="registrar-deportistas.php"><i class="ti-user me-2"></i>Registrar deportistas</a></li>
							<?php } ?>
							<?php if (gesclub_can('registrar-entrenadores')) { ?>
								<li><a class="dz-active" href="registrar-entrenadores.php"><i class="ti-crown me-2"></i>Registrar entrenadores</a></li>
							<?php } ?>
							<?php if (gesclub_can('registrar-colaboradores')) { ?>
								<li><a class="dz-active" href="registrar-colaboradores.php"><i class="ti-briefcase me-2"></i>Registrar colaboradores</a></li>
							<?php } ?>
							<?php if (gesclub_can('apoderados')) { ?>
								<li><a class="dz-active" href="apoderados.php"><i class="ti-heart me-2"></i>Apoderados y familias</a></li>
							<?php } ?>
							<?php if (gesclub_can('importacion-masiva')) { ?>
								<li><a class="dz-active" href="importacion-masiva.php"><i class="ti-upload me-2"></i>Importación masiva</a></li>
							<?php } ?>
							<?php if (gesclub_can('reportes')) { ?>
								<li><a class="dz-active" href="reportes.php"><i class="ti-export me-2"></i>Exportación y reportes</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

					<?php if ($canEntrenamientos) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-dumbbell"></i>
							<span class="nav-text">Entrenamientos</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('entrenamientos-planificacion')) { ?>
								<li><a class="dz-active" href="entrenamientos-planificacion.php"><i class="ti-calendar me-2"></i>Planificación</a></li>
							<?php } ?>
							<?php if (gesclub_can('entrenamientos-sesiones')) { ?>
								<li><a class="dz-active" href="entrenamientos-sesiones.php"><i class="ti-agenda me-2"></i>Sesiones</a></li>
							<?php } ?>
							<?php if (gesclub_can('entrenamientos-asistencia')) { ?>
								<li><a class="dz-active" href="entrenamientos-asistencia.php"><i class="ti-check me-2"></i>Asistencia</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php if ($canCompetencias) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-trophy"></i>
							<span class="nav-text">Competencias</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('competencias')) { ?>
								<li><a class="dz-active" href="competencias.php"><i class="ti-calendar me-2"></i>Calendario</a></li>
							<?php } ?>
							<?php if (gesclub_can('competencias-inscripciones')) { ?>
								<li><a class="dz-active" href="competencias-inscripciones.php"><i class="ti-clipboard me-2"></i>Inscripciones</a></li>
							<?php } ?>
							<?php if (gesclub_can('competencias-resultados')) { ?>
								<li><a class="dz-active" href="competencias-resultados.php"><i class="ti-stats-up me-2"></i>Resultados</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php if ($canCalendario) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-calendar"></i>
							<span class="nav-text">Calendario y reservas</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('calendario-eventos')) { ?>
								<li><a class="dz-active" href="calendario-eventos.php"><i class="ti-calendar me-2"></i>Calendario</a></li>
							<?php } ?>
							<?php if (gesclub_can('reservas')) { ?>
								<li><a class="dz-active" href="reservas.php"><i class="ti-bookmark-alt me-2"></i>Reservas</a></li>
							<?php } ?>
						</ul>
					</li>

					<?php } ?>
					<?php if ($canCobros) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-money-bill-wave"></i>
							<span class="nav-text">Cobros y pagos</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('finanzas-cuotas')) { ?>
								<li><a class="dz-active" href="finanzas-cuotas.php"><i class="ti-credit-card me-2"></i>Planes y cuotas</a></li>
							<?php } ?>
							<?php if (gesclub_can('finanzas-cobros')) { ?>
								<li><a class="dz-active" href="finanzas-cobros.php"><i class="ti-money me-2"></i>Cobros</a></li>
							<?php } ?>
							<?php if (gesclub_can('finanzas-pagos')) { ?>
								<li><a class="dz-active" href="finanzas-pagos.php"><i class="ti-receipt me-2"></i>Pagos</a></li>
							<?php } ?>
							<?php if (gesclub_can('finanzas-becas')) { ?>
								<li><a class="dz-active" href="finanzas-becas.php"><i class="ti-gift me-2"></i>Becas</a></li>
							<?php } ?>
							<?php if (gesclub_can('finanzas-presupuesto')) { ?>
								<li><a class="dz-active" href="finanzas-presupuesto.php"><i class="ti-pie-chart me-2"></i>Presupuesto</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php if ($canContabilidad) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-calculator"></i>
							<span class="nav-text">Contabilidad</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('contabilidad-gastos')) { ?>
								<li><a class="dz-active" href="contabilidad-gastos.php"><i class="ti-wallet me-2"></i>Egresos y gastos</a></li>
							<?php } ?>
							<?php if (gesclub_can('contabilidad-rendiciones')) { ?>
								<li><a class="dz-active" href="contabilidad-rendiciones.php"><i class="ti-clipboard me-2"></i>Rendiciones</a></li>
							<?php } ?>
						</ul>
					</li>

					<?php } ?>
					<?php if ($canComunicaciones) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-comments"></i>
							<span class="nav-text">Comunicaciones</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('comunicaciones-anuncios')) { ?>
								<li><a class="dz-active" href="comunicaciones-anuncios.php"><i class="ti-flag me-2"></i>Anuncios</a></li>
							<?php } ?>
							<?php if (gesclub_can('comunicaciones-notificaciones')) { ?>
								<li><a class="dz-active" href="comunicaciones-notificaciones.php"><i class="ti-bell me-2"></i>Notificaciones</a></li>
							<?php } ?>
							<?php if (gesclub_can('comunicaciones-mensajes')) { ?>
								<li><a class="dz-active" href="comunicaciones-mensajes.php"><i class="ti-comments me-2"></i>Mensajería</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php if ($canDocumentos) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-folder-open"></i>
							<span class="nav-text">Documentos internos</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('documentos-internos')) { ?>
								<li><a class="dz-active" href="documentos-internos.php"><i class="ti-folder me-2"></i>Biblioteca</a></li>
							<?php } ?>
							<?php if (gesclub_can('actas-reuniones')) { ?>
								<li><a class="dz-active" href="actas-reuniones.php"><i class="ti-write me-2"></i>Actas de reuniones</a></li>
							<?php } ?>
							<?php if (gesclub_can('solicitudes')) { ?>
								<li><a class="dz-active" href="solicitudes.php"><i class="ti-file me-2"></i>Solicitudes</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php if ($canInventario) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-archive"></i>
							<span class="nav-text">Inventario</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('inventario')) { ?>
								<li><a class="dz-active" href="inventario.php"><i class="ti-archive me-2"></i>Ítems</a></li>
							<?php } ?>
							<?php if (gesclub_can('inventario-movimientos')) { ?>
								<li><a class="dz-active" href="inventario-movimientos.php"><i class="ti-share me-2"></i>Movimientos</a></li>
							<?php } ?>
						</ul>
					</li>

					<?php } ?>
					<?php if ($canReportes) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-chart-bar"></i>
							<span class="nav-text">Reportes</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('reportes')) { ?>
								<li><a class="dz-active" href="reportes.php"><i class="ti-layout me-2"></i>General</a></li>
							<?php } ?>
							<?php if (gesclub_can('reportes-deportivos')) { ?>
								<li><a class="dz-active" href="reportes-deportivos.php"><i class="ti-bar-chart me-2"></i>Deportivos</a></li>
							<?php } ?>
							<?php if (gesclub_can('reportes-asistencia')) { ?>
								<li><a class="dz-active" href="reportes-asistencia.php"><i class="ti-check-box me-2"></i>Asistencia</a></li>
							<?php } ?>
							<?php if (gesclub_can('reportes-financieros')) { ?>
								<li><a class="dz-active" href="reportes-financieros.php"><i class="ti-pulse me-2"></i>Financieros</a></li>
							<?php } ?>
						</ul>
					</li>

					<?php } ?>
					<?php if ($canUbicacion) { ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="fa fa-map-marker-alt"></i>
							<span class="nav-text">Ubicación</span>
						</a>
						<ul aria-expanded="false" class="left">
							<?php if (gesclub_can('ubicacion-pais')) { ?>
								<li><a class="dz-active" href="ubicacion-pais.php"><i class="ti-map-alt me-2"></i>País</a></li>
							<?php } ?>
							<?php if (gesclub_can('ubicacion-region')) { ?>
								<li><a class="dz-active" href="ubicacion-region.php"><i class="ti-map me-2"></i>Región</a></li>
							<?php } ?>
							<?php if (gesclub_can('ubicacion-comuna')) { ?>
								<li><a class="dz-active" href="ubicacion-comuna.php"><i class="ti-location-pin me-2"></i>Comuna</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
