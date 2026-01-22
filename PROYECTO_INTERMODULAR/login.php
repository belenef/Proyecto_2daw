<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (strpos($_POST['email'], '@') !== false && $_POST['password'] === '123456') {
    $_SESSION['user'] = ['id' => 1, 'name' => 'Belén', 'email' => $_POST['email']];
    header('Location: home.php');
    exit;
  } else {
    $error = 'Credenciales incorrectas (usa contraseña 123456 para probar)';
  }
}

include 'includes/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="text-center mb-3">
          <img src="assets/img/logo.png" alt="Vibely" style="height:80px;">
          <h4 class="mt-2">Iniciar Sesión</h4>
          <p class="text-muted">Siente. Comparte. Vibra.</p>
        </div>
        <?php if(!empty($error)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <button class="btn btn-primary w-100" type="submit">Entrar</button>
        </form>
        <div class="text-center mt-3">
          <a href="register.php">¿No tienes cuenta? Regístrate</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>