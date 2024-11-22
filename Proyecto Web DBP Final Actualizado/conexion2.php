<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_webcompra";

//Conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar en caso de error
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}
?>
