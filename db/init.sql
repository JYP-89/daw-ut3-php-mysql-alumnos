
-- En el enunciado está en SRC (lo sirve DB el servicio)
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS miapp;
USE miapp;

CREATE TABLE IF NOT EXISTS alumnos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL
);

INSERT INTO alumnos (nombre, email) VALUES
('Ana López', 'ana@example.com'),
('Luis García', 'luis@example.com'),
('Marta Ruiz', 'marta@example.com');
