<?php
session_start(); // Iniciar la sesión

// Eliminar todas las variables de sesión
$_SESSION = array(); 

// Si se desea destruir la sesión completamente, también se puede hacer
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy(); 

// Redirigir a la página principal de login
header("Location: index.php");
exit();
?>
