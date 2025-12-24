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
  (7, 'Invitado', 'activo')
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
