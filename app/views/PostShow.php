<?php
$title = "Post";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar
//var_dump($post);
?>


<div class="container">
    
<h1 class="text-center"><?= $post['title'];?></h1>
<p><?= $post['content'];?></p>
</h1>