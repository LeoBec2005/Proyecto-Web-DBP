// Array para almacenar los productos añadidos al carrito
let cart = [];
let total = 0;

function addToCart(productId, productName, productPrice){
    const existeProducto= cart.find(item=> item.id=== productId);
    if(existeProducto){
        existeProducto.quantity++;
    }else{
        cart.push({id:productId, name: productName, price: productPrice, quantity:1});
    }
    updateCart();
}

//Función para actualizar el carrito

function updateCart(){
    const cartItemsContainer=document.getElementById('cart-items');
    const cartTotalElement=document.getElementById('cart-total');

    cartItemsContainer.innerHTML='';
    let total=0;
    cart.forEach(product=>{
        const li=document.createElement('li');
        li.innerText=`${product.name} - $${product.price} (x${product.quantity})`;
        cartItemsContainer.appendChild(li);
        total+= product.price * product.quantity;
    });
    cartTotalElement.innerText=total.toFixed(2);
}

document.querySelectorAll('.add-cart').forEach(button => {
    button.addEventListener('click', function() {
      const productElement = event.target.closest('.card-product');
      const productId = productElement.querySelector('.add-cart').getAttribute('data-product-id');
      const productName = productElement.querySelector('h3').innerText;
      const productPrice = parseFloat(productElement.querySelector('.price').innerText.replace('$', ''));
  
      // Agregar al carrito
      addToCart(productId, productName, productPrice);
    });
  });

