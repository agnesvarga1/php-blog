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
              // Find the category that matches the post's `category_id`
        $categoryName = $categories[$post['category_id']]['name'];
        
        // Replace `category_id` with `name` in the post array
        $post = array_replace($post, ['category_id' => $categoryName]);
            }
          }
          unset($post); // Unset reference after loop used to remove the reference to avoid accidental modification later. Always unset the reference after using it in a loop
            require '../app/views/dashboard.php'; // Redirect to user dashboard
        }else{
            
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
        } 
    }

    public function create(){
        $categoryModel = new Category();
        $categories = $categoryModel->getCategoryNames();
        require '../app/views/PostCreate.php';
    }

    public function store(){
        //$postModel = new Post();
        $title = $_POST['title'] ?? null;
        $category_id = intval($_POST['category'] ) ?? null;
        $content = $_POST['content'] ?? null;
       // var_dump($title , $category_id, $content);
        if (!$title || !$category_id || !$content) {
            // Handle validation error (e.g., redirect back with error message)
            header('Location: /php-blog/public/postcreate');
            exit;
        }
          $post = new Post();
       $post->createPost($title,$category_id,$content);
        if ($post->save()) {
            // Redirect to the dashboard or posts list after successful save
            header('Location: /php-blog/public/dashboard');
        } else {
            // Handle save error (e.g., display error message)
            echo "Error: Could not save the post.";
        }
        
    }
}