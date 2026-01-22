<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}
include 'includes/header.php';
$user = $_SESSION['user'];
$myPlaylists = [
  ['title'=>'Noche Melancólica','likes'=>87],
  ['title'=>'Hits de la Semana','likes'=>345]
];
?>
<div class="row">
  <div class="col-md-4 text-center">
    <div class="card p-4 mb-3">
      <div class="avatar mx-auto mb-3"><?= strtoupper(substr($user['name'],0,1)) ?></div>
      <h5><?= htmlspecialchars($user['name']) ?></h5>
      <p class="text-muted small"><?= htmlspecialchars($user['email']) ?></p>
    </div>
  </div>
  <div class="col-md-8">
    <h5>Tus playlists</h5>
    <ul class="list-group">
      <?php foreach($myPlaylists as $pl): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <?= htmlspecialchars($pl['title']) ?>
          <span class="badge bg-primary"><?= $pl['likes'] ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
