// Previsualización de la imagen seleccionada
function previewImage(event) {
    const input = event.target;

    // Verifica que se haya seleccionado un archivo
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
            preview.style.border = '2px solid #8b5e3c';
            preview.style.borderRadius = '5px';
            preview.style.padding = '10px';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        alert("Por favor, selecciona un archivo de imagen.");
    }
}

// Validación del formulario antes de enviarlo
document.getElementById('productForm').addEventListener('submit', function(e) {
    let isValid = true;

    const nombre = document.getElementById('nombre').value;
    const categoria = document.getElementById('categoria').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value;
    const imagen = document.getElementById('imagen').files.length;

    // Validación del nombre
    if (!nombre || nombre.length < 3) {
        isValid = false;
        document.getElementById('errorNombre').innerText = "Nombre muy corto";
    } else {
        document.getElementById('errorNombre').innerText = ""; // Limpiar error
    }

    // Validación de categoría
    if (!categoria) {
        isValid = false;
        document.getElementById('errorCategoria').innerText = "Debe ingresar una categoría";
    } else {
        document.getElementById('errorCategoria').innerText = ""; // Limpiar error
    }

    // Validación de precio
    if (precio <= 0) {
        isValid = false;
        document.getElementById('errorPrecio').innerText = "El precio debe ser mayor que 0";
    } else {
        document.getElementById('errorPrecio').innerText = ""; // Limpiar error
    }

    // Validación de stock
    if (stock <= 0) {
        isValid = false;
        document.getElementById('errorStock').innerText = "El stock debe ser mayor que 0";
    } else {
        document.getElementById('errorStock').innerText = ""; // Limpiar error
    }

    // Validación de imagen
    if (imagen === 0) {
        isValid = false;
        document.getElementById('errorImagen').innerText = "Debe seleccionar una imagen";
    } else {
        document.getElementById('errorImagen').innerText = ""; // Limpiar error
    }

    // Prevenir el envío si hay errores
    if (!isValid) {
        e.preventDefault();
    }
});

// Función para mostrar un mensaje de éxito en el registro del producto
function showSuccessMessage() {
    const successMessage = document.createElement('div');
    successMessage.classList.add('success-message');
    successMessage.innerHTML = `
        <h2>Producto registrado con éxito</h2>
        <p>¡Gracias por registrar un nuevo producto!</p>
    `;
    document.body.appendChild(successMessage);
}

// Ejecución de la función de mostrar mensaje de éxito
if (window.location.search.includes('success')) {
    showSuccessMessage();
}

// Función para filtrar productos en la lista
function filterProducts() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const productos = document.getElementsByClassName('producto');

    Array.from(productos).forEach(producto => {
        const text = producto.textContent.toLowerCase();
        if (text.includes(filter)) {
            producto.style.display = 'block'; // Mostrar producto
        } else {
            producto.style.display = 'none'; // Ocultar producto
        }
    });
}

// Agregar evento de escucha para el filtro
document.getElementById('searchInput').addEventListener('input', filterProducts);

// Función para cargar los productos desde la base de datos
async function loadProducts() {
    try {
        const response = await fetch('api/products'); // Simulación de la API
        const productos = await response.json();
        const productosLista = document.querySelector('.productos-lista');

        productos.forEach(producto => {
            const productoElemento = document.createElement('div');a
            productoElemento.classList.add('producto');
            productoElemento.innerHTML = `
                <h3>${producto.nombre}</h3>
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <p>Precio: $${producto.precio}</p>
                <p>Stock: ${producto.stock}</p>
            `;
            productosLista.appendChild(productoElemento);
        });
    } catch (error) {
        console.error("Error al cargar los productos:", error);
    }
}

// Cargar productos al iniciar
document.addEventListener('DOMContentLoaded', loadProducts);

// Mejora de experiencia con scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
