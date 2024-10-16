<?php
include 'conexion2.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo']; // cliente o empleado

    // Consulta SQL para buscar el usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND tipo_usuario = '$tipo'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password']))// Inicio de sesión exitoso
        {
            //Inicia la sesión correctamente
            $_SESSION['id'] = $row['id']; // Guarda el ID del usuario en la sesión
            $_SESSION['usuario'] = $row['email'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

            if($tipo=='cliente'){
                header("location: index2.php");
            }elseif($tipo=='empleado'){
                header("location: vendedores.php");
            }
            exit();
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

