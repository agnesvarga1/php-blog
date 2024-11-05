<?php
$title = "Edit Post";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar


?>

<div class="container">
   <h1 class="text-center mt-2">Edit Post</h1> 
   <form action="http://localhost:8888/php-blog/public/postupdate" method="POST">
   <div class="mb-3">
   <input type="hidden" name="id" value="<?= $post['id']; ?>">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" name="title" value="<?= $post['title']; ?>">
</div>
<div class="mb-3">
  <label for="category" class="form-label">Category</label>
  <select class="form-select" id="category" name="category" aria-label="Default select example">
  <option selected>Choose a Category</option>
  <?php foreach ($categories as $cat): ?>
    
    <option value="<?= $cat['id']; ?>" <?= $cat['id'] == $post['category_id'] ? 'selected' : ''; ?>>
                        <?= $cat['name']; ?>
                    </option>
  <?php endforeach; ?>
</select>
</div>
<div class="mb-3">
  <label for="content"  class="form-label">Content</label>
  <textarea class="form-control" id="content" name="content" rows="3"><?= $post['content']; ?></textarea>
</div>
<button type="submit" class="btn btn-primary ">Save</button>
   </form>
</div>