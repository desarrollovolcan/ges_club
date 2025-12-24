<?php

require_once __DIR__ . '/db.php';

function gesclub_validate_rut(string $numero, string $dv): bool
{
	$clean = preg_replace('/[^0-9]/', '', $numero);
	if ($clean === '') {
		return false;
	}
	$dv = strtoupper(trim($dv));
	$sum = 0;
	$factor = 2;
	for ($i = strlen($clean) - 1; $i >= 0; $i--) {
		$sum += ((int)$clean[$i]) * $factor;
		$factor = $factor === 7 ? 2 : $factor + 1;
	}
	$rest = 11 - ($sum % 11);
	$expected = $rest === 11 ? '0' : ($rest === 10 ? 'K' : (string)$rest);
	return $expected === $dv;
}

function gesclub_load_user_roles(): array
{
	try {
		$db = gesclub_db();
		$roles = $db->query('SELECT id, nombre, estado FROM user_roles ORDER BY id')->fetchAll();
		return $roles ?: [];
	} catch (Throwable $e) {
		return [];
	}
}

function gesclub_load_user_profiles(): array
{
	try {
		$db = gesclub_db();
		$stmt = $db->query(
			'SELECT u.id, u.username, u.email, u.account_status, u.role, u.created_at,
				p.run_numero, p.run_dv, p.nombres, p.apellido_paterno, p.apellido_materno, p.foto,
				p.telefono_movil, p.comuna, p.region
			FROM users u
			LEFT JOIN user_profiles p ON p.user_id = u.id
			ORDER BY u.id'
		);
		return $stmt->fetchAll() ?: [];
	} catch (Throwable $e) {
		return [];
	}
}

function gesclub_load_user_profile(int $userId): ?array
{
	try {
		$db = gesclub_db();
		$stmt = $db->prepare(
			'SELECT u.id, u.username, u.email, u.account_status, u.role, u.created_at,
				p.run_numero, p.run_dv, p.nombres, p.apellido_paterno, p.apellido_materno, p.foto,
				p.fecha_nacimiento, p.sexo, p.nacionalidad, p.telefono_movil, p.telefono_fijo,
				p.direccion_calle, p.direccion_numero, p.comuna, p.region, p.numero_socio,
				p.tipo_socio, p.disciplinas, p.categoria_rama, p.fecha_incorporacion,
				p.consentimiento_fecha, p.consentimiento_medio, p.usuario_creador, p.created_at,
				p.created_ip, p.estado_civil, p.prevision_salud, p.contacto_emergencia_nombre,
				p.contacto_emergencia_telefono, p.contacto_emergencia_parentesco,
				p.menor_run, p.apoderado_run, p.relacion_apoderado, p.autorizacion_apoderado
			FROM users u
			LEFT JOIN user_profiles p ON p.user_id = u.id
			WHERE u.id = :id
			LIMIT 1'
		);
		$stmt->execute([':id' => $userId]);
		$profile = $stmt->fetch();
		if (!$profile) {
			return null;
		}

		try {
			$roleStmt = $db->prepare('SELECT role_id FROM user_role_assignments WHERE user_id = :id');
			$roleStmt->execute([':id' => $userId]);
			$profile['roles'] = array_map('intval', $roleStmt->fetchAll(PDO::FETCH_COLUMN) ?: []);
		} catch (Throwable $e) {
			$profile['roles'] = [];
		}

		return $profile;
	} catch (Throwable $e) {
		return null;
	}
}

function gesclub_user_has_role(int $userId, string $roleName): bool
{
	$db = gesclub_db();
	$stmt = $db->prepare(
		'SELECT 1 FROM user_role_assignments ura
		JOIN user_roles ur ON ur.id = ura.role_id
		WHERE ura.user_id = :user_id AND ur.nombre = :nombre AND ur.estado = "activo"
		LIMIT 1'
	);
	$stmt->execute([':user_id' => $userId, ':nombre' => $roleName]);
	return (bool)$stmt->fetchColumn();
}

function gesclub_save_user_profile(array $payload, array $roleIds, string $actor, ?string $ip): array
{
	$db = gesclub_db();
	$userId = (int)($payload['id'] ?? 0);
	$username = trim((string)($payload['username'] ?? ''));
	$email = trim((string)($payload['email'] ?? ''));
	$password = (string)($payload['password'] ?? '');
	$accountStatus = (string)($payload['account_status'] ?? 'activo');

	$runNumero = trim((string)($payload['run_numero'] ?? ''));
	$runDv = trim((string)($payload['run_dv'] ?? ''));
	$nombres = trim((string)($payload['nombres'] ?? ''));
	$apellidoPaterno = trim((string)($payload['apellido_paterno'] ?? ''));
	$apellidoMaterno = trim((string)($payload['apellido_materno'] ?? ''));
	$foto = trim((string)($payload['foto'] ?? ''));
	$fechaNacimientoRaw = trim((string)($payload['fecha_nacimiento'] ?? ''));
	$fechaNacimiento = gesclub_normalize_date($fechaNacimientoRaw);
	$sexo = trim((string)($payload['sexo'] ?? ''));
	$nacionalidad = trim((string)($payload['nacionalidad'] ?? 'Chilena'));
	$telefonoMovil = trim((string)($payload['telefono_movil'] ?? ''));
	$telefonoFijo = trim((string)($payload['telefono_fijo'] ?? ''));
	$direccionCalle = trim((string)($payload['direccion_calle'] ?? ''));
	$direccionNumero = trim((string)($payload['direccion_numero'] ?? ''));
	$comuna = trim((string)($payload['comuna'] ?? ''));
	$region = trim((string)($payload['region'] ?? ''));
	$consentimientoFechaRaw = trim((string)($payload['consentimiento_fecha'] ?? ''));
	$consentimientoFecha = gesclub_normalize_datetime($consentimientoFechaRaw);
	$fechaIncorporacionRaw = trim((string)($payload['fecha_incorporacion'] ?? ''));
	$fechaIncorporacion = gesclub_normalize_date($fechaIncorporacionRaw);
	$consentimientoMedio = trim((string)($payload['consentimiento_medio'] ?? ''));
	$numeroSocio = trim((string)($payload['numero_socio'] ?? ''));
	$tipoSocio = trim((string)($payload['tipo_socio'] ?? ''));
	$disciplinas = trim((string)($payload['disciplinas'] ?? ''));
	$categoriaRama = trim((string)($payload['categoria_rama'] ?? ''));
	$estadoCivil = trim((string)($payload['estado_civil'] ?? ''));
	$previsionSalud = trim((string)($payload['prevision_salud'] ?? ''));
	$contactoEmergenciaNombre = trim((string)($payload['contacto_emergencia_nombre'] ?? ''));
	$contactoEmergenciaTelefono = trim((string)($payload['contacto_emergencia_telefono'] ?? ''));
	$contactoEmergenciaParentesco = trim((string)($payload['contacto_emergencia_parentesco'] ?? ''));
	$menorRun = trim((string)($payload['menor_run'] ?? ''));
	$apoderadoRun = trim((string)($payload['apoderado_run'] ?? ''));
	$relacionApoderado = trim((string)($payload['relacion_apoderado'] ?? ''));
	$autorizacionApoderado = trim((string)($payload['autorizacion_apoderado'] ?? ''));

	$errors = [];
	$allowedStatuses = ['activo', 'inactivo', 'bloqueado'];
	if (!in_array($accountStatus, $allowedStatuses, true)) {
		$accountStatus = 'activo';
	}
	$requiredFields = [
		'username' => $username,
		'email' => $email,
		'run_numero' => $runNumero,
		'run_dv' => $runDv,
		'nombres' => $nombres,
		'apellido_paterno' => $apellidoPaterno,
		'apellido_materno' => $apellidoMaterno,
		'fecha_nacimiento' => $fechaNacimiento ?? '',
		'sexo' => $sexo,
		'telefono_movil' => $telefonoMovil,
		'direccion_calle' => $direccionCalle,
		'direccion_numero' => $direccionNumero,
		'comuna' => $comuna,
		'region' => $region,
		'consentimiento_fecha' => $consentimientoFecha ?? '',
		'consentimiento_medio' => $consentimientoMedio,
	];
	foreach ($requiredFields as $field => $value) {
		if ($value === '') {
			$errors[$field] = 'Este campo es obligatorio.';
		}
	}
	if ($fechaNacimientoRaw !== '' && $fechaNacimiento === null) {
		$errors['fecha_nacimiento'] = 'La fecha de nacimiento no es válida.';
	}
	if ($consentimientoFechaRaw !== '' && $consentimientoFecha === null) {
		$errors['consentimiento_fecha'] = 'La fecha de consentimiento no es válida.';
	}
	if ($fechaIncorporacionRaw !== '' && $fechaIncorporacion === null) {
		$errors['fecha_incorporacion'] = 'La fecha de incorporación no es válida.';
	}
	if ($runNumero !== '' && $runDv !== '' && !gesclub_validate_rut($runNumero, $runDv)) {
		$errors['run_numero'] = 'El RUT no es válido.';
		$errors['run_dv'] = 'El RUT no es válido.';
	}
	if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'El correo no es válido.';
	}
	if ($userId === 0 && $password === '') {
		$errors['password'] = 'La contraseña es obligatoria para crear un usuario.';
	}
	if ($errors !== []) {
		return ['ok' => false, 'message' => 'Revisa los campos resaltados.', 'errors' => $errors];
	}

	$duplicateStmt = $db->prepare('SELECT id FROM users WHERE username = :username AND id <> :id LIMIT 1');
	$duplicateStmt->execute([
		':username' => $username,
		':id' => $userId,
	]);
	if ($duplicateStmt->fetchColumn()) {
		$errors['username'] = 'El usuario ya existe.';
	}
	if ($email !== '') {
		$duplicateEmailStmt = $db->prepare('SELECT id FROM users WHERE email = :email AND id <> :id LIMIT 1');
		$duplicateEmailStmt->execute([
			':email' => $email,
			':id' => $userId,
		]);
		if ($duplicateEmailStmt->fetchColumn()) {
			$errors['email'] = 'El correo ya está registrado.';
		}
	}
	if ($errors !== []) {
		return ['ok' => false, 'message' => 'Revisa los campos resaltados.', 'errors' => $errors];
	}

	try {
		$db->beginTransaction();

		if ($userId === 0) {
			$insertUser = $db->prepare(
				'INSERT INTO users (username, email, password_hash, account_status, role, created_at, created_ip)
				VALUES (:username, :email, :password_hash, :account_status, :role, :created_at, :created_ip)'
			);
			$insertUser->execute([
				':username' => $username,
				':email' => $email !== '' ? $email : null,
				':password_hash' => password_hash($password, PASSWORD_DEFAULT),
				':account_status' => $accountStatus,
				':role' => 'user',
				':created_at' => date('Y-m-d H:i:s'),
				':created_ip' => $ip,
			]);
			$userId = (int)$db->lastInsertId();
		} else {
			$updateUser = $db->prepare(
				'UPDATE users SET username = :username, email = :email, account_status = :account_status WHERE id = :id'
			);
			$updateUser->execute([
				':id' => $userId,
				':username' => $username,
				':email' => $email !== '' ? $email : null,
				':account_status' => $accountStatus,
			]);
			if ($password !== '') {
				$updatePassword = $db->prepare('UPDATE users SET password_hash = :password_hash WHERE id = :id');
				$updatePassword->execute([
					':id' => $userId,
					':password_hash' => password_hash($password, PASSWORD_DEFAULT),
				]);
			}
		}

		$profileUpsert = $db->prepare(
			'INSERT INTO user_profiles (
				user_id, run_numero, run_dv, nombres, apellido_paterno, apellido_materno, foto,
				fecha_nacimiento, sexo, nacionalidad, telefono_movil, telefono_fijo,
				direccion_calle, direccion_numero, comuna, region, numero_socio, tipo_socio,
				disciplinas, categoria_rama, fecha_incorporacion, consentimiento_fecha,
				consentimiento_medio, usuario_creador, created_at, created_ip,
				estado_civil, prevision_salud, contacto_emergencia_nombre, contacto_emergencia_telefono,
				contacto_emergencia_parentesco, menor_run, apoderado_run, relacion_apoderado,
				autorizacion_apoderado
			) VALUES (
				:user_id, :run_numero, :run_dv, :nombres, :apellido_paterno, :apellido_materno, :foto,
				:fecha_nacimiento, :sexo, :nacionalidad, :telefono_movil, :telefono_fijo,
				:direccion_calle, :direccion_numero, :comuna, :region, :numero_socio, :tipo_socio,
				:disciplinas, :categoria_rama, :fecha_incorporacion, :consentimiento_fecha,
				:consentimiento_medio, :usuario_creador, :created_at, :created_ip,
				:estado_civil, :prevision_salud, :contacto_emergencia_nombre, :contacto_emergencia_telefono,
				:contacto_emergencia_parentesco, :menor_run, :apoderado_run, :relacion_apoderado,
				:autorizacion_apoderado
			) ON DUPLICATE KEY UPDATE
				run_numero = VALUES(run_numero),
				run_dv = VALUES(run_dv),
				nombres = VALUES(nombres),
				apellido_paterno = VALUES(apellido_paterno),
				apellido_materno = VALUES(apellido_materno),
				foto = VALUES(foto),
				fecha_nacimiento = VALUES(fecha_nacimiento),
				sexo = VALUES(sexo),
				nacionalidad = VALUES(nacionalidad),
				telefono_movil = VALUES(telefono_movil),
				telefono_fijo = VALUES(telefono_fijo),
				direccion_calle = VALUES(direccion_calle),
				direccion_numero = VALUES(direccion_numero),
				comuna = VALUES(comuna),
				region = VALUES(region),
				numero_socio = VALUES(numero_socio),
				tipo_socio = VALUES(tipo_socio),
				disciplinas = VALUES(disciplinas),
				categoria_rama = VALUES(categoria_rama),
				fecha_incorporacion = VALUES(fecha_incorporacion),
				consentimiento_fecha = VALUES(consentimiento_fecha),
				consentimiento_medio = VALUES(consentimiento_medio),
				estado_civil = VALUES(estado_civil),
				prevision_salud = VALUES(prevision_salud),
				contacto_emergencia_nombre = VALUES(contacto_emergencia_nombre),
				contacto_emergencia_telefono = VALUES(contacto_emergencia_telefono),
				contacto_emergencia_parentesco = VALUES(contacto_emergencia_parentesco),
				menor_run = VALUES(menor_run),
				apoderado_run = VALUES(apoderado_run),
				relacion_apoderado = VALUES(relacion_apoderado),
				autorizacion_apoderado = VALUES(autorizacion_apoderado)'
		);

		$profileUpsert->execute([
			':user_id' => $userId,
			':run_numero' => $runNumero,
			':run_dv' => $runDv,
			':nombres' => $nombres,
			':apellido_paterno' => $apellidoPaterno,
			':apellido_materno' => $apellidoMaterno,
			':foto' => $foto !== '' ? $foto : null,
			':fecha_nacimiento' => $fechaNacimiento,
			':sexo' => $sexo,
			':nacionalidad' => $nacionalidad,
			':telefono_movil' => $telefonoMovil,
			':telefono_fijo' => $telefonoFijo !== '' ? $telefonoFijo : null,
			':direccion_calle' => $direccionCalle,
			':direccion_numero' => $direccionNumero,
			':comuna' => $comuna,
			':region' => $region,
			':numero_socio' => $numeroSocio !== '' ? $numeroSocio : null,
			':tipo_socio' => $tipoSocio !== '' ? $tipoSocio : null,
			':disciplinas' => $disciplinas !== '' ? $disciplinas : null,
			':categoria_rama' => $categoriaRama !== '' ? $categoriaRama : null,
			':fecha_incorporacion' => $fechaIncorporacion !== '' ? $fechaIncorporacion : null,
			':consentimiento_fecha' => $consentimientoFecha,
			':consentimiento_medio' => $consentimientoMedio,
			':usuario_creador' => $payload['usuario_creador'] ?? $actor,
			':created_at' => $payload['created_at'] ?? date('Y-m-d H:i:s'),
			':created_ip' => $payload['created_ip'] ?? $ip,
			':estado_civil' => $estadoCivil !== '' ? $estadoCivil : null,
			':prevision_salud' => $previsionSalud !== '' ? $previsionSalud : null,
			':contacto_emergencia_nombre' => $contactoEmergenciaNombre !== '' ? $contactoEmergenciaNombre : null,
			':contacto_emergencia_telefono' => $contactoEmergenciaTelefono !== '' ? $contactoEmergenciaTelefono : null,
			':contacto_emergencia_parentesco' => $contactoEmergenciaParentesco !== '' ? $contactoEmergenciaParentesco : null,
			':menor_run' => $menorRun !== '' ? $menorRun : null,
			':apoderado_run' => $apoderadoRun !== '' ? $apoderadoRun : null,
			':relacion_apoderado' => $relacionApoderado !== '' ? $relacionApoderado : null,
			':autorizacion_apoderado' => $autorizacionApoderado !== '' ? $autorizacionApoderado : null,
		]);

		$db->prepare('DELETE FROM user_role_assignments WHERE user_id = :user_id')->execute([':user_id' => $userId]);
		if ($roleIds !== []) {
			$insertRole = $db->prepare('INSERT INTO user_role_assignments (user_id, role_id) VALUES (:user_id, :role_id)');
			foreach ($roleIds as $roleId) {
				$insertRole->execute([':user_id' => $userId, ':role_id' => (int)$roleId]);
			}
		}

		try {
			$history = $db->prepare('INSERT INTO user_profile_history (user_id, accion, detalle, usuario, fecha) VALUES (:user_id, :accion, :detalle, :usuario, :fecha)');
			$history->execute([
				':user_id' => $userId,
				':accion' => $payload['history_action'] ?? 'actualizar',
				':detalle' => $payload['history_detail'] ?? 'Actualización de perfil',
				':usuario' => $actor,
				':fecha' => date('Y-m-d H:i:s'),
			]);
		} catch (Throwable $historyError) {
			// Se omite el historial si la tabla no existe o ocurre un error puntual.
		}

		$db->commit();
		return ['ok' => true, 'id' => $userId];
	} catch (Throwable $e) {
		if ($db->inTransaction()) {
			$db->rollBack();
		}
		error_log('gesclub_save_user_profile: ' . $e->getMessage());
		return ['ok' => false, 'message' => 'No se pudo guardar la información.', 'errors' => []];
	}
}

function gesclub_normalize_date(string $value): ?string
{
	if ($value === '') {
		return null;
	}
	$dt = DateTime::createFromFormat('Y-m-d', $value);
	if ($dt === false || $dt->format('Y-m-d') !== $value) {
		return null;
	}
	return $dt->format('Y-m-d');
}

function gesclub_normalize_datetime(string $value): ?string
{
	if ($value === '') {
		return null;
	}
	$clean = str_replace('T', ' ', $value);
	$formats = ['Y-m-d H:i:s', 'Y-m-d H:i'];
	foreach ($formats as $format) {
		$dt = DateTime::createFromFormat($format, $clean);
		if ($dt !== false && $dt->format($format) === $clean) {
			return $dt->format('Y-m-d H:i:s');
		}
	}
	return null;
}

function gesclub_delete_user(int $userId, string $actor): bool
{
	$db = gesclub_db();
	$history = $db->prepare('INSERT INTO user_profile_history (user_id, accion, detalle, usuario, fecha) VALUES (:user_id, :accion, :detalle, :usuario, :fecha)');
	$history->execute([
		':user_id' => $userId,
		':accion' => 'borrar',
		':detalle' => 'Eliminación de usuario',
		':usuario' => $actor,
		':fecha' => date('Y-m-d H:i:s'),
	]);

	$stmt = $db->prepare('DELETE FROM users WHERE id = :id');
	return $stmt->execute([':id' => $userId]);
}

function gesclub_load_user_profile_history(int $userId): array
{
	$db = gesclub_db();
	$stmt = $db->prepare('SELECT accion, detalle, usuario, fecha FROM user_profile_history WHERE user_id = :id ORDER BY id DESC');
	$stmt->execute([':id' => $userId]);
	return $stmt->fetchAll() ?: [];
}
