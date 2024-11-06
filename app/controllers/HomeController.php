<?php
require_once '../app/models/Post.php';
require_once '../app/models/Category.php';
class HomeController{
    public function index(){
        $postModel = new Post();
        $allposts= $postModel->getAllPosts();
        foreach($allposts as &$post){
         if (isset($categories[$post['category_id']])) {
             $categoryName = $categories[$post['category_id']]['name'];
     
             // Replace `category_id` with `name` in the post array
             $post = array_replace($post, ['category_id' => $categoryName]);
           }
         }
         unset($post);
         require '../app/views/home.php';
    }}