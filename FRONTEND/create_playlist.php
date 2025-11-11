<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}
include 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $saved = true; // simulación
}
?>
<div class="card">
  <div class="card-body">
    <h4>Crear nueva playlist</h4>
    <?php if(!empty($saved)): ?>
      <div class="alert alert-success">Playlist creada (simulación).</div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Título</label>
        <input name="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Estado de ánimo</label>
        <select name="mood" class="form-select">
          <option>Felicidad</option>
          <option>Calma</option>
          <option>Tristeza</option>
          <option>Energía</option>
        </select>
      </div>
      <button class="btn btn-primary">Guardar playlist</button>
    </form>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
