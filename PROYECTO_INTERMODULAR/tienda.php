<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}
include 'includes/header.php';
?>
<h3 class="mb-3">Tienda Online</h3>
<div class="row">
  <div class="col-lg-8">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="https://picsum.photos/seed/cd1/250/150" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Producto 1</h5>
            <p class="card-text">Descripción del producto 1.</p>
            <button class="btn btn-primary add-to-cart" data-product="Producto 1">Añadir al carrito</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="https://picsum.photos/seed/cd2/250/150" class="card-img-top" alt="Producto 2">
          <div class="card-body">
            <h5 class="card-title">Producto 2</h5>
            <p class="card-text">Descripción del producto 2.</p>
            <button class="btn btn-primary add-to-cart" data-product="Producto 2">Añadir al carrito</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="https://picsum.photos/seed/cd3/250/150" class="card-img-top" alt="Producto 3">
          <div class="card-body">
            <h5 class="card-title">Producto 3</h5>
            <p class="card-text">Descripción del producto 3.</p>
            <button class="btn btn-primary add-to-cart" data-product="Producto 3">Añadir al carrito</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="https://picsum.photos/seed/cd4/250/150" class="card-img-top" alt="Producto 4">
          <div class="card-body">
            <h5 class="card-title">Producto 4</h5>
            <p class="card-text">Descripción del producto 4.</p>
            <button class="btn btn-primary add-to-cart" data-product="Producto 4">Añadir al carrito</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="https://picsum.photos/seed/cd5/250/150" class="card-img-top" alt="Producto 5">
          <div class="card-body">
            <h5 class="card-title">Producto 5</h5>
            <p class="card-text">Descripción del producto 5.</p>
            <button class="btn btn-primary add-to-cart" data-product="Producto 5">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card p-3">
      <h6>Carrito de Compras</h6>
      <ul id="cart-list" class="list-group list-group-flush">
        <li class="list-group-item">Tu carrito está vacío.</li>
      </ul>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const cartList = document.getElementById('cart-list');
  const addToCartButtons = document.querySelectorAll('.add-to-cart');
  let cart = [];

  addToCartButtons.forEach(button => {
    button.addEventListener('click', function() {
      const product = this.getAttribute('data-product');
      addToCart(product);
    });
  });

  function addToCart(product) {
    const existing = cart.find(item => item.product === product);
    if (existing) {
      existing.quantity++;
    } else {
      cart.push({ product: product, quantity: 1 });
    }
    renderCart();
  }

  function renderCart() {
    cartList.innerHTML = '';
    if (cart.length === 0) {
      const li = document.createElement('li');
      li.className = 'list-group-item';
      li.textContent = 'Tu carrito está vacío.';
      cartList.appendChild(li);
      return;
    }
    cart.forEach((item, index) => {
      const li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';
      li.innerHTML = `
        <span>${item.product} (x${item.quantity})</span>
        <div>
          <button class="btn btn-sm btn-outline-secondary decrease" data-index="${index}">-</button>
          <button class="btn btn-sm btn-outline-secondary increase" data-index="${index}">+</button>
          <button class="btn btn-sm btn-outline-danger remove" data-index="${index}"><i class="bi bi-trash"></i></button>
        </div>
      `;
      cartList.appendChild(li);
    });

    // Add event listeners to new buttons
    document.querySelectorAll('.decrease').forEach(btn => {
      btn.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        if (cart[index].quantity > 1) {
          cart[index].quantity--;
        } else {
          cart.splice(index, 1);
        }
        renderCart();
      });
    });
    document.querySelectorAll('.increase').forEach(btn => {
      btn.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        cart[index].quantity++;
        renderCart();
      });
    });
    document.querySelectorAll('.remove').forEach(btn => {
      btn.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        cart.splice(index, 1);
        renderCart();
      });
    });
  }
});
</script>
<?php include 'includes/footer.php'; ?>