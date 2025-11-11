<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$logged = isset($_SESSION['user']);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vibely</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="assets/img/logo.png" alt="Vibely" class="me-2" style="height:48px;">
      <span class="fw-bold text-purple">Vibely</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <?php if($logged): ?>
          <li class="nav-item me-2"><a class="nav-link" href="home.php">Feed</a></li>
          <li class="nav-item me-2"><a class="nav-link" href="create_playlist.php">Crear playlist</a></li>
          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-bs-toggle="dropdown">
              <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Usuario') ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="profile.php">Mi perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="index.php">Acceder / Crear cuenta</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main class="container my-4">
