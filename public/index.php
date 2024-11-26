
<?php 

//sesssion starts
session_start();

// get URI

$request = $_SERVER['REQUEST_URI'];

$request = str_replace('/php-blog/public', '', $request);

// Remove query string (?id=1, ecc.)
$request = strtok($request, '?');

// routing
switch ($request) {
    case '/':
        require_once '../app/controllers/PostController.php';
        $controller = new PostController();
        $controller->index();  // Questo mostrerà la home con i post
        break;
    

    case '/home':
         require_once '../app/controllers/HomeController.php';
         $controller = new HomeController();
         $controller->index();
         break;
     case '/login' :
        require_once '../app/controllers/AuthController.php';
        $controller = new AuthController();
        if($_SERVER['REQUEST_METHOD']== 'POST' ){
         
            $controller->authenticate();
        }else{
            $controller->showLoginForm(); 
        }
       
        break;
        case '/logout' :
            require_once '../app/controllers/AuthController.php';
            $controller = new AuthController();
            $controller->logout();
            break;
        case '/dashboard' :
            require_once '../app/controllers/PostController.php';
            $controller = new PostController();
            $controller->index(); 
            break;
        
            case '/postcreate' :
                require_once '../app/controllers/PostController.php';
                $controller = new PostController();
                if($_SERVER['REQUEST_METHOD']== 'POST' ){
                   
            
                    $controller->store();
                }
                $controller->create(); 
                break;
                case '/postupdate' :
                    require_once '../app/controllers/PostController.php';
                    $postId = $_GET['id'] ?? null;
                    $controller = new PostController();
                    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
                    
                    $controller->update($_POST,$_FILES);
                    }
                    $controller->edit($postId); 
                    break;
                
                case '/postshow' :
                    require_once '../app/controllers/PostController.php';
                    $controller = new PostController();
                    $postId = $_GET['id'] ?? null;
                    $controller->show($postId); 
                    break;
                case '/deletepost':
                    require_once '../app/controllers/PostController.php';
                    $controller = new PostController();
                    $postId = $_GET['id'] ?? null;
                    $controller->delete($postId); 
                    break;
                case '/usersettings' :
                    require_once '../app/controllers/UserController.php';
                    $controller = new UserController();
                    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
                     $controller->updateUsernameOrPwd($_POST);
                    }else{
                        $controller->index();
                    }
                   
                    break;
    default:
        http_response_code(404);
        echo "404 - Pagina non trovata";
        break;
}

?>