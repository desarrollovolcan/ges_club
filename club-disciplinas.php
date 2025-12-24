<?php
	$pageTitle = 'Disciplinas del club';
	$pageDescription = 'Define las disciplinas deportivas oficiales del club y su estado operativo.';
	$pageHighlights = [
		['title' => 'Catálogo principal', 'description' => 'Lista de disciplinas vigentes, con clasificación por rama y nivel competitivo.'],
		['title' => 'Responsables', 'description' => 'Asignación de coordinadores técnicos y entrenadores líderes por disciplina.'],
		['title' => 'Reglas locales', 'description' => 'Parámetros de inscripción, cupos y requisitos de participación.'],
	];
	include __DIR__ . '/plantilla/club-section.php';
?>
