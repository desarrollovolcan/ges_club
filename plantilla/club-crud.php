<?php
	require_once __DIR__ . '/../config/dz.php';
	require_once __DIR__ . '/../config/permissions.php';
	require_once __DIR__ . '/../config/users.php';

	gesclub_require_roles(['Admin General', 'Admin Club']);

	$db = gesclub_db();

	$title = $crudConfig['title'] ?? 'Gestión';
	$description = $crudConfig['description'] ?? 'Administra el módulo del club.';
	$table = $crudConfig['table'] ?? '';
	$primaryKey = $crudConfig['primaryKey'] ?? 'id';
	$fields = $crudConfig['fields'] ?? [];
	$listFields = $crudConfig['list'] ?? [];
	$listQuery = $crudConfig['listQuery'] ?? null;
	$clubAware = $crudConfig['clubAware'] ?? false;

	$message = $_GET['msg'] ?? '';
	$messageType = $_GET['msg_type'] ?? 'success';

	$clubes = $db->query('SELECT id, nombre_oficial FROM clubes ORDER BY nombre_oficial')->fetchAll() ?: [];
	$hasClubField = false;
	foreach ($fields as $field) {
		if (($field['name'] ?? '') === 'club_id') {
			$hasClubField = true;
			break;
		}
	}
	if ($clubAware) {
		$hasClubField = true;
	}
	$selectedClubId = (int)($_GET['club_id'] ?? 0);

	$editId = (int)($_GET['edit'] ?? 0);
	$editRow = null;
	if ($editId > 0 && $table !== '') {
		$stmt = $db->prepare("SELECT * FROM {$table} WHERE {$primaryKey} = :id");
		$stmt->execute([':id' => $editId]);
		$editRow = $stmt->fetch();
		if ($editRow && $hasClubField && $selectedClubId === 0 && isset($editRow['club_id'])) {
			$selectedClubId = (int)$editRow['club_id'];
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'] ?? '';
		$returnClubId = (int)($_POST['return_club_id'] ?? 0);

		if ($action === 'save' && $table !== '') {
			$id = (int)($_POST[$primaryKey] ?? 0);
			$isUpdate = $id > 0;
			$data = [];
			$placeholders = [];
			$updates = [];

			foreach ($fields as $field) {
				$name = $field['name'];
				$isRequired = $field['required'] ?? false;
				$auto = $field['auto'] ?? null;

				if ($auto === 'insert' && !$isUpdate) {
					$value = is_callable($field['value'] ?? null) ? $field['value']() : ($field['value'] ?? null);
					$data[$name] = $value;
					$placeholders[":" . $name] = $value;
					continue;
				}
				if ($auto === 'insert' && $isUpdate) {
					continue;
				}

				$value = $_POST[$name] ?? null;
				if (is_string($value)) {
					$value = trim($value);
				}
				if ($isRequired && ($value === '' || $value === null)) {
					$message = 'Completa los campos obligatorios.';
					$messageType = 'error';
					break;
				}
				$data[$name] = $value === '' ? null : $value;
				$placeholders[":" . $name] = $data[$name];
			}

			if ($messageType !== 'error') {
				if ($isUpdate) {
					foreach (array_keys($data) as $column) {
						$updates[] = "{$column} = :{$column}";
					}
					$placeholders[':id'] = $id;
					$sql = "UPDATE {$table} SET " . implode(', ', $updates) . " WHERE {$primaryKey} = :id";
					$stmt = $db->prepare($sql);
					$stmt->execute($placeholders);
					$message = 'Registro actualizado.';
				} else {
					$columns = implode(', ', array_keys($data));
					$values = implode(', ', array_map(fn($key) => ':' . $key, array_keys($data)));
					$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
					$stmt = $db->prepare($sql);
					$stmt->execute($placeholders);
					$message = 'Registro creado.';
				}
			}
		} elseif ($action === 'delete' && $table !== '') {
			$id = (int)($_POST[$primaryKey] ?? 0);
			if ($id > 0) {
				$stmt = $db->prepare("DELETE FROM {$table} WHERE {$primaryKey} = :id");
				$stmt->execute([':id' => $id]);
				$message = 'Registro eliminado.';
			}
		}

		$redirectUrl = $_SERVER['PHP_SELF'] . '?msg=' . urlencode($message) . '&msg_type=' . urlencode($messageType);
		if ($hasClubField) {
			$clubId = $returnClubId > 0 ? $returnClubId : $selectedClubId;
			if ($clubId > 0) {
				$redirectUrl .= '&club_id=' . $clubId;
			}
		}
		header('Location: ' . $redirectUrl);
		exit;
	}

	$listRows = [];
	if (is_callable($listQuery)) {
		$listRows = $listQuery($db, $selectedClubId);
	} elseif ($table !== '') {
		$whereClause = '';
		$params = [];
		if ($hasClubField && $selectedClubId > 0) {
			$whereClause = 'WHERE club_id = :club_id';
			$params[':club_id'] = $selectedClubId;
		}
		$sql = "SELECT * FROM {$table} " . $whereClause . " ORDER BY {$primaryKey} DESC";
		$stmt = $db->prepare($sql);
		$stmt->execute($params);
		$listRows = $stmt->fetchAll() ?: [];
	}

	function gesclub_field_value($field, $editRow, $selectedClubId) {
		$name = $field['name'];
		if ($editRow && isset($editRow[$name])) {
			return $editRow[$name];
		}
		if ($name === 'club_id' && $selectedClubId > 0) {
			return $selectedClubId;
		}
		return $field['default'] ?? '';
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | <?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include __DIR__ . '/../elements/meta.php';?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include __DIR__ . '/../elements/page-css.php'; ?>
</head>

<body>
	<?php include __DIR__ . '/../elements/preloader.php'; ?>
	<div id="main-wrapper">
		<?php include __DIR__ . '/../elements/nav-header.php'; ?>
		<?php include __DIR__ . '/../elements/chatbox.php'; ?>
		<?php include __DIR__ . '/../elements/header.php'; ?>
		<?php include __DIR__ . '/../elements/sidebar.php'; ?>

		<div class="content-body">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
					<div>
						<h3 class="mb-1 font-w600 main-text"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3>
						<p class="mb-0 text-muted"><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></p>
					</div>
				</div>

				<?php if (!empty($message)) { ?>
					<div class="alert alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" role="alert">
						<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
					</div>
				<?php } ?>

				<?php if ($hasClubField) { ?>
					<div class="card mb-4">
						<div class="card-body">
							<form method="get">
								<label class="form-label">Selecciona el club</label>
								<select class="form-control" name="club_id" onchange="this.form.submit()">
									<option value="">Selecciona</option>
									<?php foreach ($clubes as $club) { ?>
										<option value="<?php echo (int)$club['id']; ?>" <?php echo $selectedClubId === (int)$club['id'] ? 'selected' : ''; ?>>
											<?php echo htmlspecialchars($club['nombre_oficial'], ENT_QUOTES, 'UTF-8'); ?>
										</option>
									<?php } ?>
								</select>
							</form>
						</div>
					</div>
				<?php } ?>

				<div class="row">
					<div class="col-xl-4">
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-3">Formulario</h5>
								<form method="post">
									<input type="hidden" name="action" value="save">
									<input type="hidden" name="<?php echo $primaryKey; ?>" value="<?php echo (int)($editRow[$primaryKey] ?? 0); ?>">
									<input type="hidden" name="return_club_id" value="<?php echo $selectedClubId; ?>">

									<?php foreach ($fields as $field) { ?>
										<?php
											if (($field['auto'] ?? null) === 'insert') {
												continue;
											}
											$type = $field['type'] ?? 'text';
											$name = $field['name'];
											$label = $field['label'] ?? $name;
											$isRequired = $field['required'] ?? false;
											$value = gesclub_field_value($field, $editRow, $selectedClubId);
											$options = $field['options'] ?? [];
											if (isset($field['optionsQuery']) && is_callable($field['optionsQuery'])) {
												$options = $field['optionsQuery']($db, $selectedClubId);
											}
										?>
										<div class="mb-3">
											<label class="form-label"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></label>
											<?php if ($type === 'textarea') { ?>
												<textarea class="form-control" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $isRequired ? 'required' : ''; ?>><?php echo htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); ?></textarea>
											<?php } elseif ($type === 'select') { ?>
												<select class="form-control" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $isRequired ? 'required' : ''; ?>>
													<option value="">Selecciona</option>
													<?php foreach ($options as $option) { ?>
														<option value="<?php echo htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo (string)$value === (string)$option['value'] ? 'selected' : ''; ?>>
															<?php echo htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8'); ?>
														</option>
													<?php } ?>
												</select>
											<?php } else { ?>
												<input type="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>" class="form-control" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" value="<?php echo htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $isRequired ? 'required' : ''; ?>>
											<?php } ?>
										</div>
									<?php } ?>

									<button type="submit" class="btn btn-primary">Guardar</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-3">Registros</h5>
								<?php if ($hasClubField && $selectedClubId === 0) { ?>
									<div class="text-muted">Selecciona un club para visualizar los registros.</div>
								<?php } else { ?>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<?php foreach ($listFields as $listField) { ?>
														<th><?php echo htmlspecialchars($listField['label'], ENT_QUOTES, 'UTF-8'); ?></th>
													<?php } ?>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($listRows as $row) { ?>
													<tr>
														<?php foreach ($listFields as $listField) { ?>
															<?php $name = $listField['name']; ?>
															<td><?php echo htmlspecialchars((string)($row[$name] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
														<?php } ?>
														<td>
															<div class="d-flex gap-2">
																<a class="btn btn-warning btn-sm" href="<?php echo $_SERVER['PHP_SELF']; ?>?edit=<?php echo (int)$row[$primaryKey]; ?><?php echo $selectedClubId > 0 ? '&club_id=' . $selectedClubId : ''; ?>">Editar</a>
																<form method="post">
																	<input type="hidden" name="action" value="delete">
																	<input type="hidden" name="<?php echo $primaryKey; ?>" value="<?php echo (int)$row[$primaryKey]; ?>">
																	<input type="hidden" name="return_club_id" value="<?php echo $selectedClubId; ?>">
																	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
																</form>
															</div>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include __DIR__ . '/../elements/footer.php'; ?>
	</div>
	<?php include __DIR__ . '/../elements/page-js.php'; ?>
</body>
</html>
