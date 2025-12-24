CREATE DATABASE IF NOT EXISTS ges_club
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE ges_club;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  status ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  role VARCHAR(50) NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL
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

INSERT INTO users (username, password_hash, status, role, created_at)
VALUES
  ('Admin_super', '$2y$12$wov.KHBfzVbLOdOGOaku6.n/e04M.d4255eFbjZTo1ZPekSQyGT2a', 'approved', 'super_root', '2025-12-24 04:40:00')
ON DUPLICATE KEY UPDATE
  password_hash = VALUES(password_hash),
  status = VALUES(status),
  role = VALUES(role),
  created_at = VALUES(created_at);

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
