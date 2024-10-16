<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_webcompra";

// Crear la conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}
?>
