<?php
require_once '../app/models/Post.php';
require_once '../app/models/Category.php';
class PostController{
    public function index(){
        $categoryModel = new Category();

         $postModel = new Post();
         $categories = $categoryModel->getCategoryNames();
        if(isset( $_SESSION['user_id'])){
        
          $userposts =  $postModel->findPostByUserId($_SESSION['user_id']);
          foreach($userposts as &$post){
          if (isset($categories[$post['category_id']])) {
        $post = array_replace($post, ['category_id' => $categories[$post['category_id']]]);
            }
          }
          unset($post); // Unset reference after loop used to remove the reference to avoid accidental modification later. Always unset the reference after using it in a loop
            require '../app/views/dashboard.php'; // Redirect to user dashboard
        }else{
            
           $allposts= $postModel->getAllPosts();
           foreach($allposts as &$post){
            if (isset($categories[$post['category_id']])) {
          $post = array_replace($post, ['category_id' => $categories[$post['category_id']]]);
              }
            }
            unset($post);
            require '../app/views/home.php';
        } 
    }

    public function create(){
        require '../app/views/PostCreate.php';
    }
}