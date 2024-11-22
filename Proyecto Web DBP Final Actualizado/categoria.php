<?php
session_start();
include 'conexion.php'; // Conexión a la base de datos

// Capturamos la categoría seleccionada
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Consulta para obtener los productos de la categoría seleccionada
$sql = "SELECT * FROM producto WHERE categoria = '$categoria'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SuperMarket - <?php echo ucfirst($categoria); ?></title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header>
        <!-- Aquí puedes mantener la misma estructura de navegación, como en tu página de inicio -->
        <div class="container-hero">
				<div class="container hero">
					<div class="container-logo">
						<i class="fa-solid fa-cart-shopping"></i>
						<h1 class="logo"><a href="/">SuperMarket</a></h1>
					</div>

					<div class="container-user">
						<i class="fa-solid fa-user" onclick="openUserInfo()"></i>
						<i class="fa-solid fa-basket-shopping" onclick="openCartModal()"></i>
						<div class="content-shopping-cart">
							<span class="text">Carrito de compras</span>
						</div>
					</div>
				</div>
			</div>
    </header>
    <!-- Modal para confirmar pedido -->
	<div id="cartModal">
    	<div class="modal-content">
        	<span class="close" onclick="closeCartModal()">&times;</span>
        	<h2>Pedido</h2>
        	<ul id="cart-items-modal"></ul> <!-- se mostraran los productos en el modal -->
        	<p>Total: $<span id="cart-total-modal">0</span></p>
        	<button class="confirm-order" onclick="confirmOrder()">Confirmar Pedido</button>
    	</div>
	</div>

	<div id="userModal">
    	<div class="modal-content">
        	<span class="close" onclick="closeUserInfo()">&times;</span>
			<h3> Deseas cerrar sesión?</h3>
			<button class="confirm-order" onclick="logout()"> Cerrar Sesión</button>
    	</div>
	</div>

    <main class="main-content">
        <section class="container top-products">
            <h1 class="heading-1"><?php echo ucfirst($categoria); ?></h1>

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
                    echo "No hay productos disponibles en esta categoría.";
                }
                ?>
            </div>
        </section>
    </main>

    <footer class="footer">
		<div class="container container-footer">
			<div class="menu-footer">
				<div class="contact-info" id="infromacion-contacto">
					<p class="title-footer">Información de Contacto</p>
				</div>
			    <div class="contact" >	
					<ul>
						<li>
							Dirección: Av. Libertad N° 405. Sevilla, España
						</li>
						<li>Teléfono: 123-456-7890</li>
						<li>Fax: 5521340</li>
						<li>Email: supermarket@support.com</li>
					</ul>
				</div>
			</div>
        </div>
    </footer>

    <script
			src="https://kit.fontawesome.com/691058f7c0.js"
			crossorigin="anonymous"
		></script>
	</body>
	<script src="script.js"></script>
</body>
</html>
