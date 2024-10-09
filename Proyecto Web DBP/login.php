<?php
include 'conexion_login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo']; // cliente o empleado

    // Consulta SQL para buscar el usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND tipo_usuario = '$tipo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password']))
        {
            // Inicio de sesión exitoso
            header("location: index2.php");
        } 
        else 
        {
            echo "Contraseña incorrecta.";
        }
    } 
    else {
        echo "Usuario no encontrado.";
    }
}

$conn->close();

