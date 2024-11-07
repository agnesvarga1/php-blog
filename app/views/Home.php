<?php
$title = "Home";
include '../app/views/partials/head.php';  
include '../app/views/partials/navbar.php';  


?>

    <h1 class="text-center">All blog posts</h1>
    
    <div class="container py-4 d-flex justify-content-center flex-wrap gap-2 ">
  
    <?php foreach ($allposts as $post): ?>  <div class="card cursor-pointer w-50" >
      
      <?php if (!empty($post['image'])): ?>
        <img class="img-fluid " src="<?= $post['image'] ?>" class="card-img-top" alt="<?= $post['title']?>">
    <?php endif; ?>
  <div class="card-body">
    <h5 class="card-title fs-4"><?= $post['title']; ?></h5>
    <p class="badge text-bg-primary fs-6"><?= $post['category_id']; ?></p>
    <p class="card-text text-truncate"  style="max-width: 6000px;"><?= $post['content']; ?></p>
    <a class="text-decoration-none mb-2 fs-5 btn btn-outline-primary" href="http://localhost:8888/php-blog/public/postshow?id=<?= $post['id']; ?>" >Read more</a>
    <p class="card-text"><?= $post['updated_at']; ?></p>
    
  </div>
  
</div>
<?php endforeach?>

</div>

<?php include __DIR__ . '/partials/footer.php'; ?>