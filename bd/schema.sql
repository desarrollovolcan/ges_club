CREATE DATABASE IF NOT EXISTS ges_club
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE ges_club;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  email VARCHAR(150) NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  account_status ENUM('activo','inactivo','bloqueado') NOT NULL DEFAULT 'activo',
  role VARCHAR(50) NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL,
  created_ip VARCHAR(45) NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_roles (
  id INT NOT NULL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS permisos_modulo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  descripcion VARCHAR(255) NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS role_permissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  role_id INT NOT NULL,
  permiso_id INT NOT NULL,
  can_view TINYINT(1) NOT NULL DEFAULT 1,
  can_create TINYINT(1) NOT NULL DEFAULT 0,
  can_edit TINYINT(1) NOT NULL DEFAULT 0,
  can_delete TINYINT(1) NOT NULL DEFAULT 0,
  can_export TINYINT(1) NOT NULL DEFAULT 0,
  UNIQUE KEY uk_role_permissions (role_id, permiso_id),
  CONSTRAINT fk_role_permissions_role FOREIGN KEY (role_id) REFERENCES user_roles(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_role_permissions_permiso FOREIGN KEY (permiso_id) REFERENCES permisos_modulo(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_role_assignments (
  user_id INT NOT NULL,
  role_id INT NOT NULL,
  PRIMARY KEY (user_id, role_id),
  CONSTRAINT fk_user_role_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_user_role_role FOREIGN KEY (role_id) REFERENCES user_roles(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_profiles (
  user_id INT NOT NULL PRIMARY KEY,
  run_numero VARCHAR(12) NOT NULL,
  run_dv CHAR(1) NOT NULL,
  nombres VARCHAR(150) NOT NULL,
  apellido_paterno VARCHAR(100) NOT NULL,
  apellido_materno VARCHAR(100) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  sexo VARCHAR(30) NOT NULL,
  nacionalidad VARCHAR(80) NOT NULL DEFAULT 'Chilena',
  telefono_movil VARCHAR(30) NOT NULL,
  telefono_fijo VARCHAR(30) NULL,
  direccion_calle VARCHAR(150) NOT NULL,
  direccion_numero VARCHAR(30) NOT NULL,
  comuna VARCHAR(150) NOT NULL,
  region VARCHAR(150) NOT NULL,
  numero_socio VARCHAR(50) NULL,
  tipo_socio ENUM('activo','cadete','honorario','apoderado') NULL,
  disciplinas VARCHAR(255) NULL,
  categoria_rama VARCHAR(150) NULL,
  fecha_incorporacion DATE NULL,
  consentimiento_fecha DATETIME NOT NULL,
  consentimiento_medio VARCHAR(50) NOT NULL,
  usuario_creador VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL,
  created_ip VARCHAR(45) NULL,
  estado_civil VARCHAR(50) NULL,
  prevision_salud VARCHAR(50) NULL,
  contacto_emergencia_nombre VARCHAR(150) NULL,
  contacto_emergencia_telefono VARCHAR(30) NULL,
  contacto_emergencia_parentesco VARCHAR(50) NULL,
  menor_run VARCHAR(12) NULL,
  apoderado_run VARCHAR(12) NULL,
  relacion_apoderado VARCHAR(50) NULL,
  autorizacion_apoderado VARCHAR(255) NULL,
  CONSTRAINT fk_user_profile_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_profile_history (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_user_profile_history_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS paises (
  id INT NOT NULL PRIMARY KEY,
  codigo VARCHAR(10) NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS regiones (
  id INT NOT NULL PRIMARY KEY,
  pais_id INT NOT NULL,
  codigo VARCHAR(10) NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_regiones_pais FOREIGN KEY (pais_id) REFERENCES paises(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comunas (
  id INT NOT NULL PRIMARY KEY,
  region_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_comunas_region FOREIGN KEY (region_id) REFERENCES regiones(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ciudades (
  id INT NOT NULL PRIMARY KEY,
  comuna_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_ciudades_comuna FOREIGN KEY (comuna_id) REFERENCES comunas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS historial_ubicaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(20) NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS clubes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_oficial VARCHAR(200) NOT NULL,
  nombre_fantasia VARCHAR(200) NULL,
  rut_numero VARCHAR(12) NULL,
  rut_dv CHAR(1) NULL,
  tipo_organizacion VARCHAR(120) NOT NULL,
  direccion_region VARCHAR(120) NOT NULL,
  direccion_comuna VARCHAR(120) NOT NULL,
  direccion_calle VARCHAR(150) NOT NULL,
  direccion_numero VARCHAR(30) NOT NULL,
  email VARCHAR(150) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  fecha_fundacion DATE NOT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  representante_run_numero VARCHAR(12) NOT NULL,
  representante_run_dv CHAR(1) NOT NULL,
  representante_nombre VARCHAR(200) NOT NULL,
  representante_email VARCHAR(150) NOT NULL,
  representante_telefono VARCHAR(40) NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_sedes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  nombre VARCHAR(200) NOT NULL,
  direccion_region VARCHAR(120) NOT NULL,
  direccion_comuna VARCHAR(120) NOT NULL,
  direccion_calle VARCHAR(150) NOT NULL,
  direccion_numero VARCHAR(30) NOT NULL,
  tipo VARCHAR(120) NOT NULL,
  horarios VARCHAR(200) NOT NULL,
  capacidad INT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_club_sede_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_documentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(80) NOT NULL,
  nombre_archivo VARCHAR(255) NOT NULL,
  ruta VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_club_documento_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS historial_clubes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_historial_clubes_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_disciplinas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  rama VARCHAR(100) NULL,
  nivel VARCHAR(100) NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_club_disciplinas_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_categorias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  disciplina_id INT NULL,
  nombre VARCHAR(150) NOT NULL,
  edad_min INT NULL,
  edad_max INT NULL,
  genero VARCHAR(30) NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_club_categorias_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_club_categorias_disciplina FOREIGN KEY (disciplina_id) REFERENCES club_disciplinas(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_temporadas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  objetivo TEXT NULL,
  estado ENUM('planificada','activa','cerrada') NOT NULL DEFAULT 'planificada',
  CONSTRAINT fk_club_temporadas_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS club_equipos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  disciplina_id INT NULL,
  categoria_id INT NULL,
  temporada_id INT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_club_equipos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_club_equipos_disciplina FOREIGN KEY (disciplina_id) REFERENCES club_disciplinas(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_club_equipos_categoria FOREIGN KEY (categoria_id) REFERENCES club_categorias(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_club_equipos_temporada FOREIGN KEY (temporada_id) REFERENCES club_temporadas(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS deportistas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  run_numero VARCHAR(12) NOT NULL,
  run_dv CHAR(1) NOT NULL,
  nombres VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  sexo VARCHAR(30) NOT NULL,
  nacionalidad VARCHAR(80) NOT NULL,
  email VARCHAR(150) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  direccion_region VARCHAR(120) NOT NULL,
  direccion_comuna VARCHAR(120) NOT NULL,
  disciplinas VARCHAR(255) NOT NULL,
  categoria_id INT NULL,
  rama VARCHAR(120) NOT NULL,
  equipo_id INT NULL,
  posicion VARCHAR(120) NULL,
  nivel VARCHAR(120) NOT NULL,
  fecha_ingreso DATE NOT NULL,
  estado ENUM('activo','suspendido','retirado') NOT NULL DEFAULT 'activo',
  contacto_emergencia_nombre VARCHAR(150) NOT NULL,
  contacto_emergencia_telefono VARCHAR(40) NOT NULL,
  alergias TEXT NULL,
  prevision VARCHAR(50) NULL,
  apoderado_run VARCHAR(12) NULL,
  apoderado_nombre VARCHAR(150) NULL,
  apoderado_contacto VARCHAR(80) NULL,
  apoderado_parentesco VARCHAR(80) NULL,
  consentimiento_datos TINYINT(1) NOT NULL DEFAULT 0,
  autorizacion_entrenamientos TINYINT(1) NOT NULL DEFAULT 0,
  documentos_adjuntos TEXT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_deportistas_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_deportistas_categoria FOREIGN KEY (categoria_id) REFERENCES club_categorias(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_deportistas_equipo FOREIGN KEY (equipo_id) REFERENCES club_equipos(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS historial_deportistas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  deportista_id INT NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_historial_deportistas_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS entrenadores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  run_numero VARCHAR(12) NOT NULL,
  run_dv CHAR(1) NOT NULL,
  nombres VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  email VARCHAR(150) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  direccion_region VARCHAR(120) NOT NULL,
  direccion_comuna VARCHAR(120) NOT NULL,
  disciplina VARCHAR(120) NOT NULL,
  categorias_asignadas VARCHAR(255) NOT NULL,
  equipos_asignados VARCHAR(255) NULL,
  tipo VARCHAR(50) NOT NULL,
  fecha_inicio DATE NOT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  certificaciones TEXT NULL,
  documentos_adjuntos TEXT NULL,
  permisos_acceso TEXT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_entrenadores_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS historial_entrenadores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  entrenador_id INT NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_historial_entrenadores_entrenador FOREIGN KEY (entrenador_id) REFERENCES entrenadores(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS colaboradores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(120) NOT NULL,
  run_numero VARCHAR(12) NOT NULL,
  run_dv CHAR(1) NOT NULL,
  nombres VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  direccion_region VARCHAR(120) NOT NULL,
  direccion_comuna VARCHAR(120) NOT NULL,
  funcion VARCHAR(150) NOT NULL,
  area VARCHAR(120) NULL,
  fecha_inicio DATE NOT NULL,
  jornada VARCHAR(120) NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  permisos TEXT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_colaboradores_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS apoderados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  run_numero VARCHAR(12) NOT NULL,
  run_dv CHAR(1) NOT NULL,
  nombres VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  direccion VARCHAR(200) NULL,
  relacion VARCHAR(80) NOT NULL,
  consentimiento_datos TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_apoderados_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS entrenamientos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  sede_id INT NULL,
  disciplina_id INT NULL,
  categoria_id INT NULL,
  equipo_id INT NULL,
  entrenador_id INT NULL,
  nombre VARCHAR(150) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  dias_semana VARCHAR(80) NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  cupos INT NULL,
  estado ENUM('planificado','activo','finalizado') NOT NULL DEFAULT 'planificado',
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_entrenamientos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamientos_sede FOREIGN KEY (sede_id) REFERENCES club_sedes(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamientos_disciplina FOREIGN KEY (disciplina_id) REFERENCES club_disciplinas(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamientos_categoria FOREIGN KEY (categoria_id) REFERENCES club_categorias(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamientos_equipo FOREIGN KEY (equipo_id) REFERENCES club_equipos(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamientos_entrenador FOREIGN KEY (entrenador_id) REFERENCES entrenadores(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS entrenamiento_sesiones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  entrenamiento_id INT NOT NULL,
  fecha DATE NOT NULL,
  objetivo TEXT NULL,
  observaciones TEXT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_entrenamiento_sesiones_entrenamiento FOREIGN KEY (entrenamiento_id) REFERENCES entrenamientos(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS entrenamiento_asistencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sesion_id INT NOT NULL,
  deportista_id INT NOT NULL,
  estado ENUM('presente','ausente','justificado') NOT NULL DEFAULT 'presente',
  observaciones VARCHAR(255) NULL,
  CONSTRAINT fk_entrenamiento_asistencias_sesion FOREIGN KEY (sesion_id) REFERENCES entrenamiento_sesiones(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_entrenamiento_asistencias_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS competencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  disciplina_id INT NULL,
  categoria_id INT NULL,
  nombre VARCHAR(150) NOT NULL,
  tipo VARCHAR(80) NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  sede VARCHAR(150) NULL,
  estado ENUM('planificada','en_curso','finalizada') NOT NULL DEFAULT 'planificada',
  CONSTRAINT fk_competencias_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_competencias_disciplina FOREIGN KEY (disciplina_id) REFERENCES club_disciplinas(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT fk_competencias_categoria FOREIGN KEY (categoria_id) REFERENCES club_categorias(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS competencia_inscripciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  competencia_id INT NOT NULL,
  deportista_id INT NOT NULL,
  estado ENUM('pendiente','aprobada','rechazada') NOT NULL DEFAULT 'pendiente',
  costo DECIMAL(10,2) NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_competencia_inscripciones_competencia FOREIGN KEY (competencia_id) REFERENCES competencias(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_competencia_inscripciones_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS competencia_resultados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  competencia_id INT NOT NULL,
  deportista_id INT NOT NULL,
  resultado VARCHAR(150) NULL,
  posicion VARCHAR(50) NULL,
  marca VARCHAR(80) NULL,
  observaciones VARCHAR(255) NULL,
  CONSTRAINT fk_competencia_resultados_competencia FOREIGN KEY (competencia_id) REFERENCES competencias(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_competencia_resultados_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS planes_cuota (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  descripcion TEXT NULL,
  monto DECIMAL(10,2) NOT NULL,
  periodicidad ENUM('mensual','trimestral','semestral','anual') NOT NULL DEFAULT 'mensual',
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_planes_cuota_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS cobros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  deportista_id INT NOT NULL,
  plan_id INT NULL,
  monto DECIMAL(10,2) NOT NULL,
  fecha_emision DATE NOT NULL,
  fecha_vencimiento DATE NOT NULL,
  estado ENUM('pendiente','pagado','vencido') NOT NULL DEFAULT 'pendiente',
  referencia VARCHAR(120) NULL,
  CONSTRAINT fk_cobros_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_cobros_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_cobros_plan FOREIGN KEY (plan_id) REFERENCES planes_cuota(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pagos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cobro_id INT NOT NULL,
  monto DECIMAL(10,2) NOT NULL,
  metodo VARCHAR(80) NOT NULL,
  fecha_pago DATE NOT NULL,
  comprobante VARCHAR(150) NULL,
  CONSTRAINT fk_pagos_cobro FOREIGN KEY (cobro_id) REFERENCES cobros(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS becas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  deportista_id INT NOT NULL,
  porcentaje DECIMAL(5,2) NOT NULL,
  motivo VARCHAR(200) NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  estado ENUM('activa','finalizada') NOT NULL DEFAULT 'activa',
  CONSTRAINT fk_becas_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_becas_deportista FOREIGN KEY (deportista_id) REFERENCES deportistas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS presupuestos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  periodo VARCHAR(50) NOT NULL,
  ingreso_estimado DECIMAL(12,2) NOT NULL,
  gasto_estimado DECIMAL(12,2) NOT NULL,
  observaciones TEXT NULL,
  estado ENUM('borrador','aprobado','cerrado') NOT NULL DEFAULT 'borrador',
  CONSTRAINT fk_presupuestos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comunicados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  titulo VARCHAR(200) NOT NULL,
  contenido TEXT NOT NULL,
  canal VARCHAR(80) NOT NULL,
  fecha_publicacion DATETIME NOT NULL,
  autor VARCHAR(100) NOT NULL,
  CONSTRAINT fk_comunicados_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS notificaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(80) NOT NULL,
  mensaje VARCHAR(255) NOT NULL,
  destino VARCHAR(120) NOT NULL,
  estado ENUM('pendiente','enviada','fallida') NOT NULL DEFAULT 'pendiente',
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_notificaciones_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  emisor VARCHAR(100) NOT NULL,
  receptor VARCHAR(100) NOT NULL,
  asunto VARCHAR(150) NULL,
  contenido TEXT NOT NULL,
  fecha DATETIME NOT NULL,
  estado ENUM('leido','no_leido') NOT NULL DEFAULT 'no_leido',
  CONSTRAINT fk_mensajes_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS calendario_eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  titulo VARCHAR(200) NOT NULL,
  tipo VARCHAR(100) NOT NULL,
  fecha_inicio DATETIME NOT NULL,
  fecha_fin DATETIME NOT NULL,
  sede VARCHAR(150) NULL,
  cupos INT NULL,
  estado ENUM('programado','confirmado','cancelado') NOT NULL DEFAULT 'programado',
  CONSTRAINT fk_calendario_eventos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  sede_id INT NULL,
  espacio VARCHAR(150) NOT NULL,
  fecha DATE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  cupos INT NULL,
  estado ENUM('pendiente','confirmada','cancelada') NOT NULL DEFAULT 'pendiente',
  CONSTRAINT fk_reservas_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_reservas_sede FOREIGN KEY (sede_id) REFERENCES club_sedes(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contabilidad_gastos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  proveedor VARCHAR(150) NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  monto DECIMAL(12,2) NOT NULL,
  fecha DATE NOT NULL,
  centro_costo VARCHAR(120) NULL,
  comprobante VARCHAR(150) NULL,
  estado ENUM('pendiente','pagado') NOT NULL DEFAULT 'pendiente',
  CONSTRAINT fk_contabilidad_gastos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contabilidad_rendiciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  solicitante VARCHAR(150) NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  monto DECIMAL(12,2) NOT NULL,
  fecha DATE NOT NULL,
  estado ENUM('pendiente','aprobada','rechazada') NOT NULL DEFAULT 'pendiente',
  CONSTRAINT fk_contabilidad_rendiciones_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS documentos_internos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(120) NOT NULL,
  titulo VARCHAR(200) NOT NULL,
  archivo VARCHAR(255) NULL,
  fecha DATE NOT NULL,
  CONSTRAINT fk_documentos_internos_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS actas_reuniones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(120) NOT NULL,
  fecha DATE NOT NULL,
  resumen TEXT NULL,
  archivo VARCHAR(255) NULL,
  CONSTRAINT fk_actas_reuniones_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS solicitudes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  tipo VARCHAR(120) NOT NULL,
  solicitante VARCHAR(150) NOT NULL,
  detalle VARCHAR(255) NULL,
  estado ENUM('recibida','en_proceso','cerrada') NOT NULL DEFAULT 'recibida',
  fecha DATE NOT NULL,
  CONSTRAINT fk_solicitudes_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS inventario_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  club_id INT NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  categoria VARCHAR(120) NULL,
  stock INT NOT NULL DEFAULT 0,
  estado ENUM('activo','baja') NOT NULL DEFAULT 'activo',
  CONSTRAINT fk_inventario_items_club FOREIGN KEY (club_id) REFERENCES clubes(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS inventario_movimientos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_id INT NOT NULL,
  tipo ENUM('prestamo','devolucion','ajuste') NOT NULL,
  cantidad INT NOT NULL,
  fecha DATE NOT NULL,
  responsable VARCHAR(150) NOT NULL,
  observaciones VARCHAR(255) NULL,
  CONSTRAINT fk_inventario_movimientos_item FOREIGN KEY (item_id) REFERENCES inventario_items(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS historial_colaboradores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  colaborador_id INT NOT NULL,
  accion VARCHAR(30) NOT NULL,
  detalle VARCHAR(255) NOT NULL,
  usuario VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  CONSTRAINT fk_historial_colaboradores_colaborador FOREIGN KEY (colaborador_id) REFERENCES colaboradores(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS configuracion_catalogos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(50) NOT NULL,
  nombre VARCHAR(150) NOT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB;

INSERT INTO users (username, email, password_hash, account_status, role, created_at)
VALUES
  ('Admin_super', 'admin@gesclub.local', '$2y$12$wov.KHBfzVbLOdOGOaku6.n/e04M.d4255eFbjZTo1ZPekSQyGT2a', 'activo', 'super_root', '2025-12-24 04:40:00')
ON DUPLICATE KEY UPDATE
  email = VALUES(email),
  password_hash = VALUES(password_hash),
  account_status = VALUES(account_status),
  role = VALUES(role),
  created_at = VALUES(created_at);

INSERT INTO user_roles (id, nombre, estado)
VALUES
  (1, 'Super Root', 'activo'),
  (2, 'Administrador', 'activo'),
  (3, 'Socio', 'activo'),
  (4, 'Entrenador', 'activo'),
  (5, 'Apoderado', 'activo'),
  (6, 'Funcionario', 'activo'),
  (7, 'Invitado', 'activo'),
  (8, 'Admin General', 'activo'),
  (9, 'Admin Club', 'activo'),
  (10, 'Coordinador Deportivo', 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO user_role_assignments (user_id, role_id)
SELECT u.id, 1
FROM users u
WHERE u.username = 'Admin_super'
ON DUPLICATE KEY UPDATE role_id = VALUES(role_id);

INSERT INTO paises (id, codigo, nombre, estado)
VALUES
  (1, 'CL', 'Chile', 'activo')
ON DUPLICATE KEY UPDATE
  codigo = VALUES(codigo),
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO regiones (id, pais_id, codigo, nombre, estado)
VALUES
  (1, 1, 'RM', 'Región Metropolitana de Santiago', 'activo'),
  (2, 1, 'V', 'Región de Valparaíso', 'activo'),
  (3, 1, 'VIII', 'Región del Biobío', 'activo')
ON DUPLICATE KEY UPDATE
  pais_id = VALUES(pais_id),
  codigo = VALUES(codigo),
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO comunas (id, region_id, nombre, estado)
VALUES
  (1, 1, 'Santiago', 'activo'),
  (2, 1, 'Providencia', 'activo'),
  (3, 2, 'Valparaíso', 'activo'),
  (4, 3, 'Concepción', 'activo')
ON DUPLICATE KEY UPDATE
  region_id = VALUES(region_id),
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO ciudades (id, comuna_id, nombre, estado)
VALUES
  (1, 1, 'Santiago', 'activo'),
  (2, 3, 'Valparaíso', 'activo'),
  (3, 4, 'Concepción', 'activo')
ON DUPLICATE KEY UPDATE
  comuna_id = VALUES(comuna_id),
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO clubes (id, nombre_oficial, nombre_fantasia, rut_numero, rut_dv, tipo_organizacion, direccion_region, direccion_comuna, direccion_calle, direccion_numero, email, telefono, fecha_fundacion, estado, representante_run_numero, representante_run_dv, representante_nombre, representante_email, representante_telefono, created_at)
VALUES
  (1, 'Club Deportivo Andino', 'Andino', '76123456', '7', 'Corporación', 'Región Metropolitana', 'Santiago', 'Alameda', '123', 'contacto@andino.cl', '+56911111111', '1985-03-15', 'activo', '12345678', '9', 'María López', 'maria@andino.cl', '+56922222222', NOW()),
  (2, 'Club Deportivo Costero', 'Costero', '76234567', '5', 'Fundación', 'Región de Valparaíso', 'Valparaíso', 'Prat', '456', 'contacto@costero.cl', '+56933333333', '1992-08-22', 'activo', '98765432', '1', 'Luis Pérez', 'luis@costero.cl', '+56944444444', NOW()),
  (3, 'Club Deportivo Biobío', 'Biobío', '76345678', '2', 'Corporación', 'Región del Biobío', 'Concepción', 'O\'Higgins', '789', 'contacto@biobio.cl', '+56955555555', '2001-11-05', 'activo', '11223344', '5', 'Carolina Díaz', 'carolina@biobio.cl', '+56966666666', NOW()),
  (4, 'Club Deportivo Austral', 'Austral', '76456789', '3', 'Corporación', 'Región Metropolitana', 'Providencia', 'Providencia', '987', 'contacto@austral.cl', '+56977777777', '1978-06-30', 'activo', '55667788', '4', 'Javier Soto', 'javier@austral.cl', '+56988888888', NOW())
ON DUPLICATE KEY UPDATE
  nombre_oficial = VALUES(nombre_oficial),
  nombre_fantasia = VALUES(nombre_fantasia),
  email = VALUES(email),
  telefono = VALUES(telefono),
  estado = VALUES(estado);

INSERT INTO club_sedes (id, club_id, nombre, direccion_region, direccion_comuna, direccion_calle, direccion_numero, tipo, horarios, capacidad, estado)
VALUES
  (1, 1, 'Sede Central Andino', 'Región Metropolitana', 'Santiago', 'Alameda', '123', 'Estadio', '08:00-22:00', 800, 'activo'),
  (2, 2, 'Sede Costera', 'Región de Valparaíso', 'Valparaíso', 'Prat', '456', 'Cancha', '09:00-21:00', 400, 'activo'),
  (3, 3, 'Sede Biobío', 'Región del Biobío', 'Concepción', 'O\'Higgins', '789', 'Gimnasio', '07:00-20:00', 350, 'activo'),
  (4, 4, 'Sede Austral', 'Región Metropolitana', 'Providencia', 'Providencia', '987', 'Cancha', '08:00-21:00', 500, 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  horarios = VALUES(horarios),
  capacidad = VALUES(capacidad);

INSERT INTO club_disciplinas (id, club_id, nombre, rama, nivel, estado)
VALUES
  (1, 1, 'Fútbol', 'Masculino', 'Formativo', 'activo'),
  (2, 1, 'Básquetbol', 'Mixto', 'Competitivo', 'activo'),
  (3, 2, 'Voleibol', 'Femenino', 'Formativo', 'activo'),
  (4, 3, 'Atletismo', 'Mixto', 'Competitivo', 'activo'),
  (5, 4, 'Hockey', 'Mixto', 'Formativo', 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO club_categorias (id, club_id, disciplina_id, nombre, edad_min, edad_max, genero, estado)
VALUES
  (1, 1, 1, 'Sub 15', 13, 15, 'masculino', 'activo'),
  (2, 1, 2, 'Senior', 18, 35, 'mixto', 'activo'),
  (3, 2, 3, 'Sub 17', 15, 17, 'femenino', 'activo'),
  (4, 3, 4, 'Adulto', 18, 40, 'mixto', 'activo'),
  (5, 4, 5, 'Sub 13', 11, 13, 'mixto', 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO club_temporadas (id, club_id, nombre, fecha_inicio, fecha_fin, objetivo, estado)
VALUES
  (1, 1, 'Temporada 2025', '2025-01-10', '2025-12-20', 'Formación de talentos', 'activa'),
  (2, 2, 'Temporada 2025', '2025-02-01', '2025-11-30', 'Competencias regionales', 'activa'),
  (3, 3, 'Temporada 2025', '2025-01-20', '2025-12-10', 'Rendimiento competitivo', 'activa'),
  (4, 4, 'Temporada 2025', '2025-03-01', '2025-12-15', 'Desarrollo integral', 'activa')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO club_equipos (id, club_id, disciplina_id, categoria_id, temporada_id, nombre, estado)
VALUES
  (1, 1, 1, 1, 1, 'Andino Sub 15', 'activo'),
  (2, 1, 2, 2, 1, 'Andino Senior', 'activo'),
  (3, 2, 3, 3, 2, 'Costero Sub 17', 'activo'),
  (4, 3, 4, 4, 3, 'Biobío Adulto', 'activo'),
  (5, 4, 5, 5, 4, 'Austral Sub 13', 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO deportistas (id, club_id, run_numero, run_dv, nombres, apellidos, fecha_nacimiento, sexo, nacionalidad, email, telefono, direccion_region, direccion_comuna, disciplinas, categoria_id, rama, equipo_id, posicion, nivel, fecha_ingreso, estado, contacto_emergencia_nombre, contacto_emergencia_telefono, alergias, prevision, apoderado_run, apoderado_nombre, apoderado_contacto, apoderado_parentesco, consentimiento_datos, autorizacion_entrenamientos, documentos_adjuntos, created_at)
VALUES
  (1, 1, '18888999', '4', 'Diego', 'Muñoz', '2010-05-12', 'Masculino', 'Chilena', 'diego@andino.cl', '+56990001111', 'Región Metropolitana', 'Santiago', 'Fútbol', 1, 'Masculino', 1, 'Delantero', 'Intermedio', '2024-03-01', 'activo', 'Ana Muñoz', '+56990002222', NULL, 'Fonasa', NULL, NULL, NULL, NULL, 1, 1, NULL, NOW()),
  (2, 1, '17777888', '2', 'Valentina', 'Rojas', '2004-09-21', 'Femenino', 'Chilena', 'vale@andino.cl', '+56990003333', 'Región Metropolitana', 'Santiago', 'Básquetbol', 2, 'Mixto', 2, 'Base', 'Avanzado', '2023-01-15', 'activo', 'Carlos Rojas', '+56990004444', NULL, 'Isapre', NULL, NULL, NULL, NULL, 1, 1, NULL, NOW()),
  (3, 2, '16666777', '1', 'Fernanda', 'Silva', '2008-02-11', 'Femenino', 'Chilena', 'fer@costero.cl', '+56990005555', 'Región de Valparaíso', 'Valparaíso', 'Voleibol', 3, 'Femenino', 3, 'Punta', 'Formativo', '2024-02-10', 'activo', 'Laura Silva', '+56990006666', NULL, 'Fonasa', NULL, NULL, NULL, NULL, 1, 1, NULL, NOW()),
  (4, 3, '15555666', '9', 'Matías', 'Gómez', '2000-12-05', 'Masculino', 'Chilena', 'matias@biobio.cl', '+56990007777', 'Región del Biobío', 'Concepción', 'Atletismo', 4, 'Mixto', 4, 'Velocista', 'Competitivo', '2022-07-20', 'activo', 'Sofía Gómez', '+56990008888', NULL, 'Isapre', NULL, NULL, NULL, NULL, 1, 1, NULL, NOW())
ON DUPLICATE KEY UPDATE
  nombres = VALUES(nombres),
  apellidos = VALUES(apellidos),
  estado = VALUES(estado);

INSERT INTO entrenadores (id, club_id, run_numero, run_dv, nombres, apellidos, fecha_nacimiento, email, telefono, direccion_region, direccion_comuna, disciplina, categorias_asignadas, equipos_asignados, tipo, fecha_inicio, estado, certificaciones, documentos_adjuntos, permisos_acceso, created_at)
VALUES
  (1, 1, '12223344', '3', 'Camila', 'Araya', '1988-07-14', 'camila@andino.cl', '+56991112222', 'Región Metropolitana', 'Santiago', 'Fútbol', 'Sub 15', 'Andino Sub 15', 'Principal', '2021-03-01', 'activo', NULL, NULL, NULL, NOW()),
  (2, 2, '13334455', '6', 'Jorge', 'Navarro', '1985-01-10', 'jorge@costero.cl', '+56992223333', 'Región de Valparaíso', 'Valparaíso', 'Voleibol', 'Sub 17', 'Costero Sub 17', 'Principal', '2020-05-20', 'activo', NULL, NULL, NULL, NOW()),
  (3, 3, '14445566', '8', 'Lucía', 'Castro', '1990-04-18', 'lucia@biobio.cl', '+56993334444', 'Región del Biobío', 'Concepción', 'Atletismo', 'Adulto', 'Biobío Adulto', 'Principal', '2019-08-15', 'activo', NULL, NULL, NULL, NOW())
ON DUPLICATE KEY UPDATE
  nombres = VALUES(nombres),
  apellidos = VALUES(apellidos),
  estado = VALUES(estado);

INSERT INTO entrenamientos (id, club_id, sede_id, disciplina_id, categoria_id, equipo_id, entrenador_id, nombre, fecha_inicio, fecha_fin, dias_semana, hora_inicio, hora_fin, cupos, estado, created_at)
VALUES
  (1, 1, 1, 1, 1, 1, 1, 'Plan Fútbol Sub 15', '2025-03-01', '2025-06-30', 'Lun-Mie-Vie', '18:00:00', '20:00:00', 25, 'activo', NOW()),
  (2, 2, 2, 3, 3, 3, 2, 'Plan Voleibol Sub 17', '2025-03-10', '2025-07-15', 'Mar-Jue', '17:00:00', '19:00:00', 18, 'activo', NOW()),
  (3, 3, 3, 4, 4, 4, 3, 'Plan Atletismo Adulto', '2025-04-01', '2025-08-30', 'Lun-Mie', '19:00:00', '21:00:00', 30, 'activo', NOW())
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO planes_cuota (id, club_id, nombre, descripcion, monto, periodicidad, estado)
VALUES
  (1, 1, 'Mensual Formativo', 'Plan mensual formativo', 18000, 'mensual', 'activo'),
  (2, 2, 'Mensual Competitivo', 'Plan mensual competitivo', 22000, 'mensual', 'activo'),
  (3, 3, 'Trimestral Rendimiento', 'Plan trimestral', 60000, 'trimestral', 'activo')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  monto = VALUES(monto);

INSERT INTO cobros (id, club_id, deportista_id, plan_id, monto, fecha_emision, fecha_vencimiento, estado, referencia)
VALUES
  (1, 1, 1, 1, 18000, '2025-03-01', '2025-03-10', 'pagado', 'Marzo 2025'),
  (2, 1, 2, 1, 18000, '2025-03-01', '2025-03-10', 'pendiente', 'Marzo 2025'),
  (3, 2, 3, 2, 22000, '2025-03-05', '2025-03-15', 'vencido', 'Marzo 2025'),
  (4, 3, 4, 3, 60000, '2025-02-01', '2025-02-10', 'pagado', 'Trimestre 1')
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado),
  monto = VALUES(monto);

INSERT INTO pagos (id, cobro_id, monto, metodo, fecha_pago, comprobante)
VALUES
  (1, 1, 18000, 'Transferencia', '2025-03-05', 'TRX-001'),
  (2, 4, 60000, 'Webpay', '2025-02-05', 'WP-554')
ON DUPLICATE KEY UPDATE
  monto = VALUES(monto),
  metodo = VALUES(metodo);

INSERT INTO competencias (id, club_id, disciplina_id, categoria_id, nombre, tipo, fecha_inicio, fecha_fin, sede, estado)
VALUES
  (1, 1, 1, 1, 'Copa Juvenil RM', 'Torneo', '2025-04-10', '2025-04-12', 'Estadio Nacional', 'planificada'),
  (2, 2, 3, 3, 'Liga Costera', 'Liga', '2025-05-05', '2025-06-15', 'Polideportivo Costero', 'planificada')
ON DUPLICATE KEY UPDATE
  nombre = VALUES(nombre),
  estado = VALUES(estado);

INSERT INTO competencia_inscripciones (id, competencia_id, deportista_id, estado, costo, created_at)
VALUES
  (1, 1, 1, 'aprobada', 8000, NOW()),
  (2, 2, 3, 'pendiente', 6000, NOW())
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado),
  costo = VALUES(costo);

INSERT INTO competencia_resultados (id, competencia_id, deportista_id, resultado, posicion, marca, observaciones)
VALUES
  (1, 1, 1, 'Semifinal', '4', NULL, 'Buen rendimiento')
ON DUPLICATE KEY UPDATE
  resultado = VALUES(resultado),
  posicion = VALUES(posicion);

INSERT INTO becas (id, club_id, deportista_id, porcentaje, motivo, fecha_inicio, fecha_fin, estado)
VALUES
  (1, 1, 2, 30, 'Rendimiento deportivo', '2025-03-01', '2025-12-31', 'activa')
ON DUPLICATE KEY UPDATE
  porcentaje = VALUES(porcentaje),
  estado = VALUES(estado);

INSERT INTO calendario_eventos (id, club_id, titulo, tipo, fecha_inicio, fecha_fin, sede, cupos, estado)
VALUES
  (1, 1, 'Reunión directiva', 'Reunión', '2025-04-01 19:00:00', '2025-04-01 20:00:00', 'Sede Central', 20, 'confirmado'),
  (2, 2, 'Clínica deportiva', 'Evento', '2025-04-15 10:00:00', '2025-04-15 13:00:00', 'Sede Costera', 50, 'programado')
ON DUPLICATE KEY UPDATE
  titulo = VALUES(titulo),
  estado = VALUES(estado);

INSERT INTO reservas (id, club_id, sede_id, espacio, fecha, hora_inicio, hora_fin, cupos, estado)
VALUES
  (1, 1, 1, 'Cancha principal', '2025-04-05', '18:00:00', '20:00:00', 30, 'confirmada'),
  (2, 2, 2, 'Gimnasio', '2025-04-06', '17:00:00', '19:00:00', 25, 'pendiente')
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado);

INSERT INTO contabilidad_gastos (id, club_id, proveedor, descripcion, monto, fecha, centro_costo, comprobante, estado)
VALUES
  (1, 1, 'Deportes Chile', 'Uniformes temporada', 320000, '2025-03-10', 'Indumentaria', 'FAC-001', 'pagado'),
  (2, 2, 'Servicios Costero', 'Mantención cancha', 150000, '2025-03-15', 'Infraestructura', 'FAC-002', 'pendiente')
ON DUPLICATE KEY UPDATE
  monto = VALUES(monto),
  estado = VALUES(estado);

INSERT INTO contabilidad_rendiciones (id, club_id, solicitante, descripcion, monto, fecha, estado)
VALUES
  (1, 1, 'Pedro Martínez', 'Viáticos torneo', 80000, '2025-03-18', 'aprobada'),
  (2, 3, 'Andrea Ríos', 'Compra implementos', 45000, '2025-03-20', 'pendiente')
ON DUPLICATE KEY UPDATE
  monto = VALUES(monto),
  estado = VALUES(estado);

INSERT INTO documentos_internos (id, club_id, tipo, titulo, archivo, fecha)
VALUES
  (1, 1, 'Reglamento', 'Reglamento interno 2025', 'docs/reglamento-2025.pdf', '2025-01-10'),
  (2, 2, 'Protocolo', 'Protocolo sanitario', 'docs/protocolo.pdf', '2025-02-01')
ON DUPLICATE KEY UPDATE
  titulo = VALUES(titulo);

INSERT INTO actas_reuniones (id, club_id, tipo, fecha, resumen, archivo)
VALUES
  (1, 1, 'Directiva', '2025-02-20', 'Definición de presupuesto', 'docs/acta-01.pdf')
ON DUPLICATE KEY UPDATE
  resumen = VALUES(resumen);

INSERT INTO solicitudes (id, club_id, tipo, solicitante, detalle, estado, fecha)
VALUES
  (1, 1, 'Certificado', 'Diego Muñoz', 'Certificado de socio', 'recibida', '2025-03-12'),
  (2, 2, 'Reclamo', 'Fernanda Silva', 'Reclamo por horarios', 'en_proceso', '2025-03-14')
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado);

INSERT INTO inventario_items (id, club_id, nombre, categoria, stock, estado)
VALUES
  (1, 1, 'Balón oficial', 'Implementos', 25, 'activo'),
  (2, 2, 'Camisetas', 'Indumentaria', 40, 'activo')
ON DUPLICATE KEY UPDATE
  stock = VALUES(stock);

INSERT INTO inventario_movimientos (id, item_id, tipo, cantidad, fecha, responsable, observaciones)
VALUES
  (1, 1, 'prestamo', 5, '2025-03-20', 'Camila Araya', 'Entrenamiento sub 15'),
  (2, 2, 'ajuste', 3, '2025-03-22', 'Luis Pérez', 'Reposición')
ON DUPLICATE KEY UPDATE
  cantidad = VALUES(cantidad);

INSERT INTO comunicados (id, club_id, titulo, contenido, canal, fecha_publicacion, autor)
VALUES
  (1, 1, 'Inicio temporada', 'Calendario oficial publicado.', 'Email', '2025-03-01 09:00:00', 'Administración'),
  (2, 2, 'Entrega de uniformes', 'Retiro en secretaría.', 'WhatsApp', '2025-03-05 12:00:00', 'Secretaría')
ON DUPLICATE KEY UPDATE
  contenido = VALUES(contenido);

INSERT INTO notificaciones (id, club_id, tipo, mensaje, destino, estado, fecha)
VALUES
  (1, 1, 'Cobro', 'Tu cuota vence pronto', 'Socios', 'enviada', '2025-03-08 10:00:00')
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado);

INSERT INTO mensajes (id, club_id, emisor, receptor, asunto, contenido, fecha, estado)
VALUES
  (1, 1, 'Secretaría', 'Diego Muñoz', 'Documentos', 'Recuerda firmar la autorización.', '2025-03-09 15:00:00', 'no_leido')
ON DUPLICATE KEY UPDATE
  estado = VALUES(estado);
