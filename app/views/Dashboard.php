<?php
$title = "Dashboard";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

?>
<div class="container">
    
<h1 class="text-center">Your own blog posts,<?= $_SESSION['username']?></h1>

<div class=""><a href="http://localhost:8888/php-blog/public/postcreate" class="btn btn-primary fs-5 m-2">New Post</a></div>

<div class="container py-4 d-flex gap-2 ">
    <?php if (!empty($userposts)): ?>
        <table class="table table-hover">
  <thead>
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Post Content</th>
      <th scope="col">Category</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($userposts as $post): ?>
    <tr>
      <th scope="row"><a href="http://localhost:8888/php-blog/public/postshow?id=<?= $post['id']; ?>" class= "fw-semibold text-primary fs-2 text-decoration-none"><?=$post['id']; ?></a></th>
      <td><?=$post['title']; ?></td>
      <td class=" text-truncate" style="max-width: 180px;"><?=$post['content']; ?></td>
      <td class="text-primary fw-semibold" ><?=$post['category_id']; ?></td>
      <td><?=$post['updated_at']; ?></td>
      <td><a href="" class= "fw-semibold text-primary fs-2 text-decoration-none">Edit</a> 
      <a href="http://localhost:8888/php-blog/public/deletepost?id=<?= $post['id']; ?>"  class= "fw-semibold text-danger fs-2 text-decoration-none">  Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
       
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>


</div>
<?php include __DIR__ . '/partials/footer.php'; ?>