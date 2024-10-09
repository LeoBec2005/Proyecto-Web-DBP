<?php
include 'conexion.php'; // Incluyendo la conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>SuperMarket</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="container-logo">
						<i class="fa-solid fa-shop"></i>
						<h1 class="logo"><a href="/">SuperMarket</a></h1>
					</div>

					<div class="container-user">
						<i class="fa-solid fa-user"></i>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
							<span class="text">Carrito de compras</span>
							<ul id="cart-items"></ul>
							<p>Total: $<span id="cart-total">0</span></p>
						</div>
					</div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Comida</a></li>
						<li><a href="#">Tecnología</a></li>
						<li><a href="#productos-especiales">Ofertas</a></li>
						<li><a href="#infromacion-contacto">Contáctanos</a></li>
					</ul>

					<form class="search-form">
						<input type="search" placeholder="Buscar..." />
						<button class="btn-search">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</nav>
			</div>
		</header>

		<section class="banner">
			<div class="content-banner">
				<p>Variedad</p>
				<h2>Encuentra todo <br />lo que necesitas!</h2>
				<a href="#mejores-productos">Comprar ahora</a>
			</div>
		</section>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-truck"></i>
					<div class="feature-content">
						<span>Envío gratuito a nivel mundial</span>
						<p>En pedidos superiores a $150</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Contrareembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-credit-card"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>LLámenos al 130-442-7195</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">Mejores Categorías</h1>
				<div class="container-categories">
					<div class="card-category category-comida">
						<p>Comida</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-ropa">
						<p>Ropa</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-tv">
						<p>TV's y laptops</p>
						<span>Ver más</span>
					</div>
				</div>
			</section>

			<section class="container top-products" id="mejores-productos">
				<h1 class="heading-1">Mejores Productos</h1>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/black-coffee.jpg" alt="Black coffee" />
						</div>
						<div class="content-card-product">
							<h3>Café Intenso Negro</h3>
							<p class="price">$10.60</p>
							<button class="add-cart" data-product-id="1001">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/macbook.jpeg" alt="MAC" />
						</div>
						<div class="content-card-product">
							<h3>Apple Macbook Pro 13</h3>
							<p class="price">$600.90</p>
							<button class="add-cart" data-product-id="5423">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/samba.jpeg" alt="Adidas Samba" />
						</div>
						<div class="content-card-product">
							<h3>Adidas Samba</h3>
							<p class="price">$69.90</p>
							<button class="add-cart" data-product-id="2142">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/audifonos.jpg" alt="Audifonos Sony" />
						</div>
						<div class="content-card-product">
							<h3>Sony Ult Wear Negro</h3>
							<p class="price">$180.90</p>
							<button class="add-cart" data-product-id="11242">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
				</div>
			</section>

			<section class="gallery">
				<img
					src="img/nice-market1.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="img/nice-market2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="img/nice-market3.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="img/nice-market4.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="img/nice-market5.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<section class="container specials" id="productos-especiales">
				<h1 class="heading-1">Ofertas especiales</h1>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/yogurt-griego.jpg" alt="Yogurt griego" />
						</div>
						<div class="content-card-product">
							<h3>Yogut griego</h3>
							<p class="price">$4.60</p>
							<button class="add-cart" data-product-id="9482">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
					<!-- Producto 2-->
					<div class="card-product">
						<div class="container-img">
							<img src="img/Jamon-Iberico.png" alt="Jamon Iberico" />
						</div>
						<div class="content-card-product">
							<h3>Jamón Ibérico</h3>
							<p class="price">$69.90</p>
							<button class="add-cart" data-product-id="9753">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>
					<!--  -->
					<!-- Producto 3 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/tv-samsung.jpg" alt="TV Samsung" />
						</div>
						<div class="content-card-product">
							<h3>TV Samsung 4k</h3>
							<p class="price">$400.60</p>
							<button class="add-cart" data-product-id="1643">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>

					<!--  -->
					<!-- Producto 4 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/estante-macetas.jpg" alt="Estante" />
						</div>
						<div class="content-card-product">
							<h3>Estante para macetas</h3>
							<p class="price">$70.00</p>
							<button class="add-cart" data-product-id="1121">
								<i class="fa-solid fa-basket-shopping"></i>
							</button>
						</div>
					</div>

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

				<div class="copyright">
					<p>
						Todos los derechos reservados &copy; 2024
					</p>

					<img src="img/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>
	<script src="script.js"></script>
</html>
