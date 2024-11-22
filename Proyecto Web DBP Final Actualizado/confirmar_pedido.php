<?php
session_start(); 

// Habilitar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Respuesta JSON predeterminada
header('Content-Type: application/json');

try {
    // Verificar autenticación del usuario
    if (!isset($_SESSION['id'])) {
        throw new Exception('Usuario no autenticado');
    }

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'db_webcompra');

    if ($conn->connect_error) {
        throw new Exception('Error de conexión: ' . $conn->connect_error);
    }

    // Obtener datos enviados en el body
    $input = file_get_contents('php://input');
    $cart = json_decode($input, true);

    if (empty($cart)) {
        throw new Exception('Carrito vacío o datos inválidos');
    }

    $id_usuario = $_SESSION['id'];
    $stmt = $conn->prepare("INSERT INTO compras (id_usuario, id_producto, cantidad, fecha_compra) VALUES (?, ?, ?, NOW())");

    if (!$stmt) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }

    // Procesar cada producto del carrito
    foreach ($cart as $product) {
        $id_producto = $product['id'];
        $cantidad = $product['quantity'];

        $stmt->bind_param("iii", $id_usuario, $id_producto, $cantidad);

        if (!$stmt->execute()) {
            throw new Exception('Error al insertar producto: ' . $stmt->error);
        }
    }

    $stmt->close();
    $conn->close();

    // Respuesta exitosa
    echo json_encode(['success' => true, 'message' => 'Pedido confirmado']);
} catch (Exception $e) {
    // Manejar errores y devolver JSON
    http_response_code(500); // Código de error del servidor
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
