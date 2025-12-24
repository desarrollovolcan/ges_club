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
