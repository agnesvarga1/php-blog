<?php
$title = "Post";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

?>


<div class="container">
<?php if(isset($post['image'])):?>
<figure>
    <img src="<?= $post['image']?>" alt="post-image" >
</figure>
<h1 class="text-center"><?= $post['title'];?></h1>
<?php endif?>
<p><?= $post['content'];?></p>
