
<?php 

// Inizializza la sessione (se necessario per login o altro)
//session_start();

// Ottieni l'URI richiesto

$request = $_SERVER['REQUEST_URI'];

$request = str_replace('/php-blog/public', '', $request);

// Rimuovi eventuali query string (?id=1, ecc.)
$request = strtok($request, '?');
//var_dump($request);
// Gestisci il routing
switch ($request) {
    case '/':
        require_once '../app/controllers/PostController.php';
        $controller = new PostController();
        $controller->index();  // Questo mostrerà la home con i post
        break;
    
     case '/login' :
        require_once '../app/controllers/AuthController.php';
        $controller = new AuthController();
        if($_SERVER['REQUEST_METHOD']== 'POST' ){
         
            $controller->authenticate();
        }else{
            $controller->showLoginForm();  // Questo mostrerà la home con i post
        }
       
        break;
        
        case '/dashboard' :
            require_once '../app/controllers/PostController.php';
            $controller = new PostController();
            $controller->index();  // Questo mostrerà la home con i post
            break;
    default:
        http_response_code(404);
        echo "404 - Pagina non trovata";
        break;
}

?>