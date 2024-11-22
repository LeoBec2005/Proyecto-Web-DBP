<?php

include 'conexion2.php'; // Conexión a la base de datos

session_start(); 


if(isset($_SESSION['id'])){
    $id_vendedor = $_SESSION['id']; // Cambia esto al ID del vendedor que desees mostrar

    // Obtener el nombre del vendedor
    $query_vendedor = "SELECT nombre FROM usuarios WHERE id = $id_vendedor AND tipo_usuario='empleado'";
    $result_vendedor = mysqli_query($conexion, $query_vendedor);

    if ($result_vendedor && mysqli_num_rows($result_vendedor) > 0) {
        $vendedor = mysqli_fetch_assoc($result_vendedor);
        $nombre_vendedor = $vendedor['nombre'];
    } else {
        $nombre_vendedor = 'Vendedor Desconocido';// Valor por defecto si no se encuentra vendedor
    }
} else{
    echo "Error: No hay un vendedor autenticado";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Vendedor</title>
    <link rel="stylesheet" href="styles2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Para iconos -->
</head>
<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="container-logo">
                    <i class="fas fa-store"></i>
                    <h1 style="color: #ffffff; background-color: #8b5e3c; padding: 10px;">Interfaz de vendedor</h1>
                    <p style="color: #000;">Bienvenido, <strong><?php echo isset($nombre_vendedor) && !empty($nombre_vendedor) ? $nombre_vendedor : 'Vendedor Desconocido'; ?></strong></p> <!-- Mostrar el nombre del vendedor -->
                    <a href="logout.php" class="btn-logout">Cerrar Sesión</a> <!-- Botón para cerrar sesión -->
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <!-- Formulario para registrar un nuevo producto -->
            <section class="vendedor-form">
                <h2>Registrar un nuevo producto</h2>
                <form action="procesar_producto.php" method="POST" enctype="multipart/form-data" id="productForm">
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ej. Zapatos deportivos" required>
                        <small class="error" id="errorNombre"></small>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" id="categoria" name="categoria" placeholder="Ej. Ropa, Tecnología" required>
                        <small class="error" id="errorCategoria"></small>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio (USD):</label>
                        <input type="number" id="precio" name="precio" placeholder="Ej. 50.00" min="0" step="0.01" required>
                        <small class="error" id="errorPrecio"></small>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock disponible:</label>
                        <input type="number" id="stock" name="stock" placeholder="Ej. 20" min="1" required>
                        <small class="error" id="errorStock"></small>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción del producto:</label>
                        <textarea id="descripcion" name="descripcion" placeholder="Agrega detalles sobre el producto" rows="4" required></textarea>
                        <small class="error" id="errorDescripcion"></small>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del Producto:</label>
                        <input type="file" id="imagen" name="imagen" accept="image/*" required onchange="previewImage(event)">
                        <small class="error" id="errorImagen"></small>
                    </div>
                    <div class="form-group">
                        <img id="preview" src="" alt="Previsualización de Imagen" style="display: none; max-width: 100%; height: auto;"/>
                    </div>
                    <button type="submit" class="btn">Registrar Producto</button>
                </form>
            </section>

            <!-- Lista de productos del vendedor -->
            <section class="vendedor-productos">
                <h2>Tus Productos</h2>
                <div class="productos-lista">
                    <?php
                    // Consulta a la tabla 'producto'
                    $query = "SELECT * FROM producto WHERE id_vendedor = $id_vendedor"; // Usar ID del vendedor estático
                    $result = mysqli_query($conexion, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="producto">';
                            echo '<h3>' . $row['nombre_producto'] . '</h3>';
                            echo '<p>Categoría: ' . $row['categoria'] . '</p>';
                            echo '<p><strong>Precio: $' . $row['precio'] . '</strong></p>';
                            echo '<p>Stock: ' . $row['stock'] . '</p>';
                            echo '<p>Descripción: ' . $row['descripcion'] . '</p>'; // Mostrar descripción
                            if ($row['imagen']) {
                                echo '<img src="img/' . $row['imagen'] . '" alt="' . $row['nombre_producto'] . '" style="max-width: 100%; height: auto;"/>';
                            }
                            echo '<button class="btn-edit">Editar</button>';
                            echo '<form action="eliminar_producto.php" method="POST" style="display: inline;">'; // Formulario para eliminar
                            echo '<input type="hidden" name="id_producto" value="' . $row['id_producto'] . '">';
                            echo '<button type="submit" class="btn-delete">Eliminar</button>';
                            echo '</form>';
                            echo '</div>';
                        }                        
                    } else {
                        echo "<p>No tienes productos registrados.</p>";
                    }
                    ?>
                </div>
            </section>
        </div>
    </main>

    <script src="script2.js"></script>
</body>
</html>
