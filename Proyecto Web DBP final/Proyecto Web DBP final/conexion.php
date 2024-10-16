<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_webcompra";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_producto, nombre_producto, imagen, precio FROM producto";
$result = $conn->query($sql);

?>

<div class="container-products">
    <?php
    if ($result->num_rows > 0) {
        // Generar tarjetas de productos
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card-product">
                <div class="container-img">
                    <img src="img/<?php echo $row["imagen"]; ?>" alt="<?php echo $row["nombre_producto"]; ?>" />
                </div>
                <div class="content-card-product">
                    <h3><?php echo $row["nombre_producto"]; ?></h3>
                    <p class="price">$<?php echo $row["precio"]; ?></p>
                    <button class="add-cart" data-product-id="<?php echo $row["id_producto"]; ?>">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </button>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No hay productos disponibles";
    }
    ?>
</div>

<?php
$conn->close();
?>
