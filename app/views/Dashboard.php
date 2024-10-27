<?php
$title = "Dashboard";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar




?>


<h1 class="text-center">Your own blog posts,<?= $_SESSION['username']?></h1>
<div class="container py-4 d-flex gap-2">
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
      <th scope="row"><?=$post['id']; ?></th>
      <td><?=$post['title']; ?></td>
      <td class=" text-truncate" style="max-width: 180px;"><?=$post['content']; ?></td>
      <td><?=$post['category_id']; ?></td>
      <td><?=$post['updated_at']; ?></td>
      <td><a href="" class= "fw--semibold text-primary fs-2 text-decoration-none">Edit</a> <a href="#"  class= "fw-semibold text-danger fs-2 text-decoration-none">  Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
       
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>


<?php include __DIR__ . '/partials/footer.php'; ?>