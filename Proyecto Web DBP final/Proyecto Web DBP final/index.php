
<?php
        session_start();
        if(isset($_SESSION['usuario'])){
            if($_SESSION['tipo_usuario'] == 'empleado'){
                header("location: vendedores.php");
            } elseif($_SESSION['tipo'] == 'cliente'){
                header("location: index2.php");
            }
        }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login para Clientes y Empleados</title>
    <link rel="stylesheet" href="styles_login.css">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión como Cliente o Empleado</p>
                    <button id="btn__iniciar-cliente">Iniciar Sesión Cliente</button>
                    <button id="btn__iniciar-empleado">Iniciar Sesión Empleado</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrarme para Acceder</p>
                    <button id="btn__registrarse">Registrarme</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <!-- Formulario de Login para Clientes -->
                <form id="formulario_cliente" class="formulario__cliente" action="login.php" method="POST">
                    <h2>Iniciar Sesión Cliente</h2>
                    <input type="hidden" name="tipo" value="cliente">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" id="btn__acceder-cliente">Acceder</button>
                </form>

                <!-- Formulario de Login para Empleados -->
                <form id="formulario_empleado" class="formulario__empleado" action="login.php" method="POST" style="display: none;">
                    <h2>Iniciar Sesión Empleado</h2>
                    <input type="hidden" name="tipo" value="empleado">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" id="btn__acceder-empleado">Acceder</button>
                </form>

                <!-- Formulario de Registro -->
                <form class="formulario__register" action="registro.php" method="POST" style="display: none;">
                    <h2>Registrar</h2>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" id="btn__registrarse">Registrar</button>
                </form>
            </div>
        </div>
    </main>

    <script src="scripts.js"></script>
</body>
</html>
