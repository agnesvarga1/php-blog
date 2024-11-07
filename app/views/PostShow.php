<?php
$title = "Post";
include '../app/views/partials/head.php';  // Include il partial della head
include '../app/views/partials/navbar.php';  // Include il partial della navbar

?>


<div class="container">
<div class="d-flex flex-column align-items-center">
<?php if(isset($post['image'])):?>
<figure class="figure d-flex justify-content-center">
    <img class="figure-img img-fluid" src="<?= $post['image']?>" alt="post-image" >
</figure>

<?php endif?>
<h1 class="text-center"><?= $post['title'];?></h1>
<p><?= $post['content'];?></p>
</div>