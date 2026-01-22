<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
  exit;
}

include 'includes/header.php';
?>
<div class="hero-section text-center py-5 bg-light">
  <div class="container">
    <img src="assets/img/logo.png" alt="Vibely" class="mb-3" style="height:120px;">
    <h1 class="display-4 fw-bold text-purple">Bienvenido a Vibely</h1>
    <p class="lead mb-4">La red social para amantes de la música. Crea playlists, comparte tus vibes y conecta con otros melómanos.</p>
    <div class="d-flex justify-content-center gap-3">
      <button class="btn btn-primary btn-lg" onclick="window.location.href='login.php'">Iniciar Sesión</button>
      <button class="btn btn-outline-primary btn-lg" onclick="window.location.href='register.php'">Registrarse</button>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
