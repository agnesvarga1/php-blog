<?php
require_once '../app/models/Post.php';

class PostController{
    public function index(){
        session_start();

        if(isset( $_SESSION['user_id'])){
            require '../app/views/dashboard.php'; // Redirect to user dashboard
        }else{
            
            require '../app/views/home.php';
        }
       
       
    }
}