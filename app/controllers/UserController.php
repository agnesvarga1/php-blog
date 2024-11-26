<?php

require_once '../app/models/User.php';
class UserController{
    public function index(){
        require '../app/views/UserSettings.php';
    }

    public function updateUsernameOrPwd($data){
        $usermodel = new User();
        if($data['curr_username'] && $data['new_username']){
            $curr_name = $data['curr_username'];
            $new_name = $data['new_username'];
           $success = $usermodel->updateUserName($new_name,$curr_name);
           if($success){
              header('Location: /php-blog/public/dashboard');
        } else {
            // Handle save error (e.g., display error message)
            echo "Error during update.";
        }
        }else if( $data['curr_pwd'] &&  $data['new_pwd'] ){
            $curr_pwd = $data['curr_pwd'];
            $new_pwd = $data['new_pwd'];
            $username =$_SESSION['username'];
          // var_dump($username);
            $user=$usermodel->findUserByUserName($username);
            if($user && password_verify($curr_pwd,$user['password'])){
                $hashed_pwd = password_hash($new_pwd,PASSWORD_DEFAULT);
                $success = $usermodel->updatePwd($hashed_pwd,$username);
                if($success){
                    header('Location: /php-blog/public/dashboard');
                }else{
                    echo 'Error during update';
                }
            }else{
                echo 'user not found or password is not correct';
            }
        }else{
            echo "unexpected error occurred.";
        }
   

    }
}