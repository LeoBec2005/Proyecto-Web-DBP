<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_webcompra";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_producto, nombre_producto, imagen, precio FROM producto";
$result = $conn->query($sql);

//$conn->close();
?>
