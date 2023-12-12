-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS inicioSesion;

-- Seleccionar la base de datos
USE inicioSesion;

-- Crear la tabla us_admin
CREATE TABLE IF NOT EXISTS us_admin (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    correoUsuario VARCHAR(255) NOT NULL,
    passwordHash VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    perfil TINYINT NOT NULL
);

-- Insertar admin
INSERT INTO us_admin (correoUsuario, passwordHash, nombre, perfil) VALUES
('root@gmail.com', SHA2('root', 256), 'root', 0);