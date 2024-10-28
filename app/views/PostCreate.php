<?php
$title = "Create Post";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

?>

<div class="container">
   <h1 class="text-center mt-2">Compose A New Post</h1> 
   <form action="">
   <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="My post's Title">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Content</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
   </form>
</div>