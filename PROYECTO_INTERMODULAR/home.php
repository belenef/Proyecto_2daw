<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}
include 'includes/header.php';
$playlists = [
  ['id'=>1,'title'=>'Chill Vibes','author'=>'Ana','likes'=>124,'mood'=>'Calma','cover'=>'https://picsum.photos/seed/p1/400/200'],
  ['id'=>2,'title'=>'Energía Máxima','author'=>'Carlos','likes'=>230,'mood'=>'Felicidad','cover'=>'https://picsum.photos/seed/p2/400/200'],
  ['id'=>3,'title'=>'Noche Melancólica','author'=>'Belén','likes'=>87,'mood'=>'Tristeza','cover'=>'https://picsum.photos/seed/p3/400/200']
];
?>
<h3 class="mb-3">Explorar playlists</h3>
<div class="row">
  <div class="col-lg-8">
    <?php foreach($playlists as $p): ?>
      <div class="card mb-3 playlist-card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?= $p['cover'] ?>" class="img-fluid rounded-start" alt="cover">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($p['title']) ?></h5>
              <p class="text-muted small">Por <?= htmlspecialchars($p['author']) ?> · Estado: <?= htmlspecialchars($p['mood']) ?></p>
              <button class="btn btn-sm btn-outline-primary like-btn">❤ <span class="likes"><?= $p['likes'] ?></span></button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="col-lg-4">
    <div class="card p-3">
      <h6>Buscar</h6>
      <div class="input-group mb-3">
        <input id="searchInput" class="form-control" placeholder="Buscar playlists">
        <button id="searchBtn" class="btn btn-primary">Buscar</button>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
