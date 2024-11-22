<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $tipo = 'cliente'; // Puedes cambiar a 'empleado' si es necesario

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password, tipo_usuario) VALUES ('$nombre', '$email', '$password', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

