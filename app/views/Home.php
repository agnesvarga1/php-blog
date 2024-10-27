<?php
$title = "Home";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

//var_dump($allposts);
?>

    <h1 class="text-center">All blog posts</h1>
    <div class="container py-4 d-flex gap-2">
    <?php foreach ($allposts as $post): ?>  <div class="card">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title"><?= $post['title']; ?></h5>
    <p class="card-text"><?= $post['content']; ?></p>
   
  </div>
</div>
<?php endforeach?>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>