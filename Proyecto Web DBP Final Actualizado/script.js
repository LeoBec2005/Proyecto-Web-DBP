// Array para almacenar los productos añadidos al carrito
let cart = []; 
let total = 0;

// Función para abrir el modal de usuario
function openUserInfo() {
    document.getElementById('userModal').style.display = 'block';
}

// Función para cerrar el modal de usuario
function closeUserInfo() {
    document.getElementById('userModal').style.display = 'none';
}

// Función para cerrar sesión
function logout() {
    // Redirigir a una página que destruye la sesión
    window.location.href = 'logout2.php';
}



function addToCart(productId, productName, productPrice) {
    const existeProducto = cart.find(item => item.id === productId);
    if (existeProducto) {
        existeProducto.quantity++;
    } else {
        cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
    }
    updateCart();
}

// Función para actualizar el carrito
function updateCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');

    cartItemsContainer.innerHTML = '';
    let total = 0;
    cart.forEach(product => {
        const li = document.createElement('li');
        li.innerText = `${product.name} - $${product.price.toFixed(2)} (x${product.quantity})`;
        cartItemsContainer.appendChild(li);
        total += product.price * product.quantity;
    });
    cartTotalElement.innerText = total.toFixed(2);
}

// Agregar evento a los botones "Agregar al carrito"
document.querySelectorAll('.add-cart').forEach(button => {
    button.addEventListener('click', function(event) {
        const productElement = event.target.closest('.card-product');
        const productId = productElement.querySelector('.add-cart').getAttribute('data-product-id');
        const productName = productElement.querySelector('h3').innerText;
        const productPrice = parseFloat(productElement.querySelector('.price').innerText.replace('$', ''));
  
        // Agregar al carrito
        addToCart(productId, productName, productPrice);
    });
});

// Función para abrir el modal del carrito
function openCartModal() {
    document.getElementById('cartModal').style.display = 'block';
    updateCartDisplayModal();  // Actualiza el contenido del modal
}

// Función para cerrar el modal del carrito
function closeCartModal() {
    document.getElementById('cartModal').style.display = 'none';
}

// Función para confirmar el pedido
function confirmOrder() {
    if (cart.length === 0) {
        alert('No hay productos en el carrito');
        return;
    }

    console.log("Datos enviados al servidor:", cart);

    fetch('confirmar_pedido.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cart)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        if (data.success) {
            alert('Pedido confirmado');
            cart=[];
            updateCartDisplay();
            closeCartModal();
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error en el fetch:', error));
}


// Función para actualizar la vista del carrito en el modal
function updateCartDisplayModal() {
    const cartItemsContainer = document.getElementById('cart-items-modal');
    const cartTotalElement = document.getElementById('cart-total-modal');

    cartItemsContainer.innerHTML = '';
    let total = 0;

    cart.forEach(product => {
        const li = document.createElement('li');
        li.innerText = `${product.name} - $${product.price.toFixed(2)} (x${product.quantity})`;
        cartItemsContainer.appendChild(li);
        total += product.price * product.quantity;
    });

    cartTotalElement.innerText = total.toFixed(2);
}

// Actualizar la vista del carrito en el header cuando se agregan productos
function updateCartDisplay() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');

    cartItemsContainer.innerHTML = '';
    let total = 0;

    cart.forEach(product => {
        const li = document.createElement('li');
        li.innerText = `${product.name} - $${product.price.toFixed(2)} (x${product.quantity})`;
        cartItemsContainer.appendChild(li);
        total += product.price * product.quantity;
    });

    cartTotalElement.innerText = total.toFixed(2);
}
