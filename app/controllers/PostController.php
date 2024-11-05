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
    
        $title = $_POST['title'] ?? null;
        $category_id = intval($_POST['category'] ) ?? null;
        $content = $_POST['content'] ?? null;
      
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
    public function show($postId){
        $postModel = new Post();
        $post = $postModel->findPostById($postId);

        if ($post) {
            // Pass the post data to the view
            require '../app/views/PostShow.php';
        } else {
            echo "Post not found";
        }
    }

    public function edit($postId){
        $categoryModel = new Category();
        $categories = $categoryModel->getCategoryNames();
        $postModel = new Post();
        $post = $postModel->findPostById($postId);
        require '../app/views/PostUpdate.php';
    }
    
    public function update($data){
        if (!isset($data['id']) || !filter_var($data['id'], FILTER_VALIDATE_INT)) {
            echo "Invalid post ID";
            return;
        }

        $postId = $data['id'];
        $title = $data['title'];
        $content = $data['content'];
        $category = $data['category'];
          $postModel = new Post();
          $success = $postModel->updatePost($postId, $title, $category, $content);
        if ($success) {
            // Redirect to the dashboard or posts list after successful save
            header('Location: /php-blog/public/dashboard');
        } else {
            // Handle save error (e.g., display error message)
            echo "Error during update.";
        }
    }

    public function delete($postId){
        $postModel = new Post();
        $post = $postModel->deletePost($postId);
        // Redirect to the dashboard or posts list after successful delete
        header('Location: /php-blog/public/dashboard');
    }
}