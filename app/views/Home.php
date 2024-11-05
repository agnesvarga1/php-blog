<?php
$title = "Home";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

//var_dump($allposts);
?>

    <h1 class="text-center">All blog posts</h1>
    
    <div class="container py-4 d-flex flex-column gap-2 align-items-center">
  
    <?php foreach ($allposts as $post): ?>  <div class="card cursor-pointer">
      <a class="text-decoration-none text-dark" href="http://localhost:8888/php-blog/public/postshow?id=<?= $post['id']; ?>" >
      <?php if (!empty($post['image'])): ?>
        <img src="<?= $post['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($post['title']) ?>">
    <?php endif; ?>
  <div class="card-body">
    <h5 class="card-title"><?= $post['title']; ?></h5>
    <p class="badge text-bg-primary fs-5"><?= $post['category_id']; ?></p>
    <p class="card-text"><?= $post['content']; ?></p>
    <p class="card-text"><?= $post['updated_at']; ?></p>
    
  </div>
  </a>
</div>
<?php endforeach?>

</div>

<?php include __DIR__ . '/partials/footer.php'; ?>