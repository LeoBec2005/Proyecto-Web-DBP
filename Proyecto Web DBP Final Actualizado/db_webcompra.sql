CREATE DATABASE db_webcompra;
USE db_webcompra;

CREATE TABLE producto (
	id_producto INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre_producto VARCHAR(50),
	categoria VARCHAR(50),
	imagen VARCHAR(255),
	precio DECIMAL(10,2),
	stock INTEGER,
	descripcion TEXT DEFAULT NULL,
	id_comprador INTEGER UNSIGNED,
	id_vendedor INTEGER UNSIGNED
);

CREATE TABLE usuarios (
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    tipo_usuario ENUM('cliente', 'empleado')
);

CREATE TABLE compras(
	id_compra INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_usuario INTEGER UNSIGNED,
	id_producto INTEGER UNSIGNED,
	cantidad INTEGER,
	fecha_compra DATETIME DEFAULT CURRENT_TIMESTAMP,
	estadado ENUM('pendiente','completado','cancelado') DEFAULT 'pendiente'
);

ALTER TABLE producto ADD FOREIGN KEY (id_comprador) REFERENCES usuarios (id);
ALTER TABLE producto ADD FOREIGN KEY (id_vendedor) REFERENCES usuarios (id);
ALTER TABLE compras ADD FOREIGN KEY (id_usuario) REFERENCES usuarios (id);
ALTER TABLE compras ADD FOREIGN KEY (id_producto) REFERENCES producto(id_producto);






