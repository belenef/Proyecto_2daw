<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['action'] === 'login') {
    if (strpos($_POST['email'], '@') !== false && $_POST['password'] === '123456') {
      $_SESSION['user'] = ['id' => 1, 'name' => 'Belén', 'email' => $_POST['email']];
      header('Location: home.php');
      exit;
    } else {
      $error = 'Credenciales incorrectas (usa contraseña 123456 para probar)';
    }
  } elseif ($_POST['action'] === 'register') {
    $_SESSION['user'] = ['id' => 2, 'name' => $_POST['name'], 'email' => $_POST['email']];
    header('Location: home.php');
    exit;
  }
}

include 'includes/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="text-center mb-3">
          <img src="assets/img/logo.png" alt="Vibely" style="height:80px;">
          <h4 class="mt-2">Vibely</h4>
          <p class="text-muted">Siente. Comparte. Vibra.</p>
        </div>
        <?php if(!empty($error)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <ul class="nav nav-tabs mb-3" id="authTabs" role="tablist">
          <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login">Iniciar sesión</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#register">Crear cuenta</button></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="login">
            <form method="post">
              <input type="hidden" name="action" value="login">
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
          </div>
          <div class="tab-pane fade" id="register">
            <form method="post">
              <input type="hidden" name="action" value="register">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
