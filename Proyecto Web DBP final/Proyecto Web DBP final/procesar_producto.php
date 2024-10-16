<?php
include 'conexion2.php'; // Conexión a la base de datos
session_start();

$vendedor_id = 1; // Cambia esto al ID del vendedor

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se está editando un producto existente
    if (isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
        $id_producto = intval($_POST['id_producto']); // ID del producto a editar

        // Recibir los datos del formulario
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $precio = floatval($_POST['precio']);
        $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
        $stock = intval($_POST['stock']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        // Manejo del archivo de imagen
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = 'img/';
        $ruta_imagen = $carpeta_destino . basename($imagen);

        // Verificar que el archivo se haya movido correctamente
        if (!is_dir($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true); // Crear la carpeta si no existe
        }

        // Si se ha subido una nueva imagen, moverla
        if (!empty($imagen)) {
            if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
                // Actualizar el producto en la base de datos con la nueva imagen
                $query = "UPDATE producto SET nombre_producto='$nombre', categoria='$categoria', precio='$precio', stock='$stock', descripcion='$descripcion', imagen='$imagen' WHERE id_producto='$id_producto'";
            } else {
                echo "Error al cargar la imagen.";
                exit();
            }
        } else {
            // Si no se subió una nueva imagen, actualizar solo los otros campos
            $query = "UPDATE producto SET nombre_producto='$nombre', categoria='$categoria', precio='$precio', stock='$stock', descripcion='$descripcion' WHERE id_producto='$id_producto'";
        }

        if (mysqli_query($conexion, $query)) {
            echo "<div class='success-message'>";
            echo "<h2 style='text-align: center; color: #4CAF50;'>Producto actualizado con éxito</h2>";
            echo "<div class='producto-registrado' style='border: 2px solid #8b5e3c; text-align: center; margin: 20px auto; background-color: #f9f9f9; padding: 20px; border-radius: 10px; max-width: 600px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>";
            echo "<h3 style='color: #8b5e3c;'>$nombre</h3>";
            if (!empty($imagen)) {
                echo "<img src='$ruta_imagen' alt='$nombre' class='imagen-producto' style='max-width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;' />";
            }
            echo "<p style='font-size: 18px;'><strong>Categoría: </strong>$categoria</p>";
            echo "<p style='font-size: 18px;'><strong>Precio: </strong>$$precio</p>";
            echo "<p style='font-size: 18px;'><strong>Stock: </strong>$stock</p>";
            echo "<p style='font-size: 18px;'><strong>Descripción: </strong>$descripcion</p>";
            echo "<a href='vendedores.php' class='btn' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #8b5e3c; color: #fff; text-decoration: none; border-radius: 5px;'>Registrar otro producto</a>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Error al actualizar el producto: " . mysqli_error($conexion);
        }
    } else {
        // Si no se está editando, agregar un nuevo producto
        // Recibir los datos del formulario
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $precio = floatval($_POST['precio']);
        $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
        $stock = intval($_POST['stock']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        // Manejo del archivo de imagen
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = 'img/';
        $ruta_imagen = $carpeta_destino . basename($imagen);

        // Verificar que el archivo se haya movido correctamente
        if (!is_dir($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true); // Crear la carpeta si no existe
        }

        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            // Insertar el producto en la base de datos con la imagen
            $query = "INSERT INTO producto (nombre_producto, categoria, precio, stock, descripcion, id_vendedor, imagen) 
                      VALUES ('$nombre', '$categoria', '$precio', '$stock', '$descripcion', '$vendedor_id', '$imagen')";

            if (mysqli_query($conexion, $query)) {
                echo "<div class='success-message'>";
                echo "<h2 style='text-align: center; color: #4CAF50;'>Producto registrado con éxito</h2>";
                echo "<div class='producto-registrado' style='border: 2px solid #8b5e3c; text-align: center; margin: 20px auto; background-color: #f9f9f9; padding: 20px; border-radius: 10px; max-width: 600px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>";
                echo "<h3 style='color: #8b5e3c;'>$nombre</h3>";
                echo "<img src='$ruta_imagen' alt='$nombre' class='imagen-producto' style='max-width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;' />";
                echo "<p style='font-size: 18px;'><strong>Categoría: </strong>$categoria</p>";
                echo "<p style='font-size: 18px;'><strong>Precio: </strong>$$precio</p>";
                echo "<p style='font-size: 18px;'><strong>Stock: </strong>$stock</p>";
                echo "<p style='font-size: 18px;'><strong>Descripción: </strong>$descripcion</p>";
                echo "<a href='vendedores.php' class='btn' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #8b5e3c; color: #fff; text-decoration: none; border-radius: 5px;'>Registrar otro producto</a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "Error al registrar el producto: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al cargar la imagen.";
        }
    }
}

mysqli_close($conexion);
?>
