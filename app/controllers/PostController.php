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
    private function handleImageUpload($file) {
   
        if ($file['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "../uploads";
            $imageName = uniqid() . "_" . basename($file['image']['name']);
            $targetFile = $targetDir . $imageName;

            if (move_uploaded_file($file['image']['tmp_name'], $targetFile)) {
               // var_dump($targetFile);
                return $targetFile;
            }
        }
        return null;  // Return null if the upload failed or no file was provided
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
        $image = $_FILES ?? null;
        
        $imgPath = $this->handleImageUpload($image);

        if (!$title || !$category_id || !$content) {
            // Handle validation error (e.g., redirect back with error message)
            header('Location: /php-blog/public/postcreate');
            exit;
        }
          $post = new Post();
          $post->createPost($title,$category_id,$content,$imgPath);
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
    
    public function update($data,$file){
      
        if (!isset($data['id']) || !filter_var($data['id'], FILTER_VALIDATE_INT)) {
            echo "Invalid post ID";
            return;
        }

        $postId = $data['id'];
        $title = $data['title'];
        $content = $data['content'];
        
        $category = $data['category'];
        
        $postModel = new Post();
        $existingPost = $postModel->findPostById($postId);
       

   
        if ($file['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->handleImageUpload($file);
      
        } else {
            $imagePath = $existingPost['image'];  // Keep the old image if no new one is uploaded
        }
 
       $success = $postModel->updatePost($postId, $title, $category, $content,$imagePath);
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
        $post = $postModel->findPostById($postId);
         if($post){
            $imagePath = $post['image'];
            $postModel->deletePost($postId);
    
            // Delete the image file
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
     // Redirect to the dashboard or posts list after successful delete
     header('Location: /php-blog/public/dashboard');
     exit;
         }
   
    }
}