<?php
require_once '../app/models/Post.php';
require_once '../app/models/Category.php';
class PostController{
    public function index(){
         $postModel = new Post();

        if(isset( $_SESSION['user_id'])){
           
          $userposts =  $postModel->findPostByUserId($_SESSION['user_id']);
          
            require '../app/views/dashboard.php'; // Redirect to user dashboard
        }else{
            
           $allposts= $postModel->getAllPosts();
            require '../app/views/home.php';
        }
       

        
       
    }
}