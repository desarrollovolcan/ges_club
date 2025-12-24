<?php
	$pageTitle = 'Categorías deportivas';
	$pageDescription = 'Organiza las categorías por edad, género y nivel competitivo.';
	$pageHighlights = [
		['title' => 'Rangos etarios', 'description' => 'Configuración de límites de edad y validación automática.'],
		['title' => 'Segmentación', 'description' => 'Definición por género y modalidad deportiva.'],
		['title' => 'Políticas de ascenso', 'description' => 'Criterios y fechas para cambios de categoría.'],
	];
	include __DIR__ . '/plantilla/club-section.php';
?>
