<?php
session_start();
include 'conexion.php'; // Conexión a la base de datos

// Verificar si se recibió el término de búsqueda
if (isset($_POST['busqueda'])) {
    $busqueda = $conexion->real_escape_string($_POST['busqueda']);  // Escapa el término de búsqueda

    // Consulta para buscar productos que coincidan con el término de búsqueda
    $query = "SELECT * FROM producto WHERE nombre_producto LIKE '%$busqueda%'";
    $result = $conn->query($query);

    // Crear un array para almacenar los productos encontrados
    $productos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Agregar cada producto al array
            $productos[] = $row;
        }
    }

    // Devolver los resultados en formato JSON
    echo json_encode($productos);
} else {
    echo json_encode([]);
}
?>
