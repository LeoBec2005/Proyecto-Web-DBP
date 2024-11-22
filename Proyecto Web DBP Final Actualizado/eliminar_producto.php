<?php
include 'conexion2.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que el id_producto esté presente en la solicitud
    if (isset($_POST['id_producto'])) {
        $id_producto = $_POST['id_producto'];

        // Eliminar el producto de la base de datos
        $query = "DELETE FROM producto WHERE id_producto = $id_producto";
        if (mysqli_query($conexion, $query)) {
            // Redirigir de vuelta al panel del vendedor con un mensaje de éxito
            header("Location: vendedores.php?success=deleted"); // Cambiar vendores.php a vendedores.php
            exit(); // Asegúrate de usar exit después de la redirección
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conexion);
        }
    }
}
?>
