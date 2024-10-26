<?php

class AuthController{
public function showLoginForm(){
   
    require '../app/views/login.php';  // Mostra il form di login
}


public function authenticate(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once '../app/models/User.php';
    $userModel = new User();
    $user = $userModel->findUserByUserName($username);
 
    if ($user && password_verify($password, $user['password'])) {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

       
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        //  redirect to dashboard
        header('Location: /php-blog/public/dashboard');
        exit();
    } else {
        // Se la login fallisce, mostra un errore
        echo "Username o password non validi.";
    }
}

public function logout() {
    session_start();
    session_unset();  // Unset all session variables
    session_destroy();  // Destroy the session
    header('Location: /php-blog/public');  // Redirect to homepage
    exit();
}
    
}


