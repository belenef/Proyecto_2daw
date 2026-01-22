<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['user'] = ['id' => 2, 'name' => $_POST['name'], 'email' => $_POST['email']];
  header('Location: home.php');
  exit;
}

include 'includes/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="text-center mb-3">
          <img src="assets/img/logo.png" alt="Vibely" style="height:80px;">
          <h4 class="mt-2">Crear Cuenta</h4>
          <p class="text-muted">Únete a la comunidad musical.</p>
        </div>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <button class="btn btn-outline-primary w-100" type="submit">Crear cuenta</button>
        </form>
        <div class="text-center mt-3">
          <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>