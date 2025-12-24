<?php
	$crudConfig = [
		'title' => 'Pagos y conciliación',
		'description' => 'Registra pagos y medios utilizados.',
		'table' => 'pagos',
		'clubAware' => true,
		'fields' => [
			['name' => 'cobro_id', 'label' => 'Cobro', 'type' => 'select', 'required' => true, 'optionsQuery' => function($db, $selectedClubId) {
				if ($selectedClubId <= 0) {
					return [];
				}
				$sql = 'SELECT c.id, CONCAT(c.monto, " - ", c.fecha_vencimiento) AS nombre FROM cobros c WHERE c.club_id = :club_id ORDER BY c.fecha_vencimiento DESC';
				$stmt = $db->prepare($sql);
				$stmt->execute([':club_id' => $selectedClubId]);
				return array_map(fn($row) => ['value' => $row['id'], 'label' => $row['nombre']], $stmt->fetchAll() ?: []);
			}],
			['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'required' => true],
			['name' => 'metodo', 'label' => 'Método', 'type' => 'text', 'required' => true],
			['name' => 'fecha_pago', 'label' => 'Fecha pago', 'type' => 'date', 'required' => true],
			['name' => 'comprobante', 'label' => 'Comprobante', 'type' => 'text'],
		],
		'listQuery' => function($db, $selectedClubId) {
			if ($selectedClubId <= 0) {
				return [];
			}
			$sql = 'SELECT p.id, p.monto, p.metodo, p.fecha_pago, CONCAT(d.nombres, " ", d.apellidos) AS deportista FROM pagos p JOIN cobros c ON c.id = p.cobro_id JOIN deportistas d ON d.id = c.deportista_id WHERE c.club_id = :club_id ORDER BY p.fecha_pago DESC';
			$stmt = $db->prepare($sql);
			$stmt->execute([':club_id' => $selectedClubId]);
			return $stmt->fetchAll() ?: [];
		},
		'list' => [
			['name' => 'deportista', 'label' => 'Deportista'],
			['name' => 'monto', 'label' => 'Monto'],
			['name' => 'metodo', 'label' => 'Método'],
			['name' => 'fecha_pago', 'label' => 'Fecha'],
		],
	];
	include __DIR__ . '/plantilla/club-crud.php';
?>
