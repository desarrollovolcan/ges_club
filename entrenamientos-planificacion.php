<?php
	$crudConfig = [
		'title' => 'Planificación de entrenamientos',
		'description' => 'Define el plan semanal y asignaciones de entrenamientos.',
		'table' => 'entrenamientos',
		'fields' => [
			['name' => 'club_id', 'label' => 'Club', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				return array_map(fn($c) => ['value' => $c['id'], 'label' => $c['nombre_oficial']], $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: []);
			}],
			['name' => 'sede_id', 'label' => 'Sede', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_sedes WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'disciplina_id', 'label' => 'Disciplina', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_disciplinas WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'categoria_id', 'label' => 'Categoría', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_categorias WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'equipo_id', 'label' => 'Equipo', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM club_equipos WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'entrenador_id', 'label' => 'Entrenador', 'type' => 'select', 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, CONCAT(nombres, " ", apellidos) AS nombre FROM entrenadores WHERE club_id = :club_id ORDER BY nombres');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'nombre', 'label' => 'Nombre del plan', 'type' => 'text', 'required' => true],
			['name' => 'fecha_inicio', 'label' => 'Fecha inicio', 'type' => 'date', 'required' => true],
			['name' => 'fecha_fin', 'label' => 'Fecha término', 'type' => 'date', 'required' => true],
			['name' => 'dias_semana', 'label' => 'Días semana', 'type' => 'text', 'required' => true],
			['name' => 'hora_inicio', 'label' => 'Hora inicio', 'type' => 'time', 'required' => true],
			['name' => 'hora_fin', 'label' => 'Hora término', 'type' => 'time', 'required' => true],
			['name' => 'cupos', 'label' => 'Cupos', 'type' => 'number'],
			['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'planificado', 'label' => 'Planificado'],
				['value' => 'activo', 'label' => 'Activo'],
				['value' => 'finalizado', 'label' => 'Finalizado'],
			]],
			['name' => 'created_at', 'label' => 'Creado', 'type' => 'date', 'auto' => 'insert', 'value' => function() { return date('Y-m-d'); }],
		],
		'list' => [
			['name' => 'nombre', 'label' => 'Entrenamiento'],
			['name' => 'dias_semana', 'label' => 'Días'],
			['name' => 'hora_inicio', 'label' => 'Inicio'],
			['name' => 'hora_fin', 'label' => 'Término'],
			['name' => 'estado', 'label' => 'Estado'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
