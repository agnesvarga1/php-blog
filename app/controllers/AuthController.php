<?php

class AuthController{
public function showLoginForm(){
   
    require '../app/views/login.php';  // Mostra il form di login
}


public function authenticate(){
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once './app/models/User.php';
    $userModel = new User();
    $userModel->findUserByUserName($username);
    if ($user && password_verify($password, $user['password'])) {
        // Inizializza la sessione solo se non è stata già avviata in index.php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Imposta le variabili di sessione per mantenere l'utente loggato
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Reindirizza alla home page o dashboard
        header('Location: /php-blog/public/dashboard');
        exit();
    } else {
        // Se la login fallisce, mostra un errore
        echo "Username o password non validi.";
    }
}
    
}


