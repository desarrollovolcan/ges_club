<?php
	$crudConfig = [
		'title' => 'Movimientos de inventario',
		'description' => 'Registra préstamos, devoluciones y ajustes de stock.',
		'table' => 'inventario_movimientos',
		'clubAware' => true,
		'fields' => [
			['name' => 'item_id', 'label' => 'Ítem', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$stmt = $db->prepare('SELECT id, nombre FROM inventario_items WHERE club_id = :club_id ORDER BY nombre');
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'tipo', 'label' => 'Tipo', 'type' => 'select', 'required' => true, 'options' => [
				['value' => 'prestamo', 'label' => 'Préstamo'],
				['value' => 'devolucion', 'label' => 'Devolución'],
				['value' => 'ajuste', 'label' => 'Ajuste'],
			]],
			['name' => 'cantidad', 'label' => 'Cantidad', 'type' => 'number', 'required' => true],
			['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
			['name' => 'responsable', 'label' => 'Responsable', 'type' => 'text', 'required' => true],
			['name' => 'observaciones', 'label' => 'Observaciones', 'type' => 'text'],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT m.id, m.tipo, m.cantidad, m.fecha, i.nombre AS item FROM inventario_movimientos m JOIN inventario_items i ON i.id = m.item_id WHERE i.club_id = :club_id ORDER BY m.fecha DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'item', 'label' => 'Ítem'],
			['name' => 'tipo', 'label' => 'Tipo'],
			['name' => 'cantidad', 'label' => 'Cantidad'],
			['name' => 'fecha', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
