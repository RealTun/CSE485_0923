<?php
require_once APP_ROOT.'/services/UserServices.php';
class UserController{
    public function login(){      
        $userServices = new UserServices();
        
        if(isset($_POST['sbmLogin'])){
            $username = $_POST['username'];
            $pw = $_POST['password'];
            $isExisted = $userServices->isExisted($username);
            if($isExisted){
                $user = $userServices->getAccount($username);
                $pw_hash = $user->getPw();
                if(password_verify($pw, $pw_hash)){
                    session_start();
                    $_SESSION['isLogin'] = $user->getUsername();
                    $_SESSION['permission'] = $user->getRole();
                    header('location: ./user/permission.php');
                }
                else{
                    header("location: ". DOMAIN.'/views/index.php?controller=user&action=login&error=password_is_wrong');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=user&action=login&error=user_is_not_exist');
            }
        }
        include APP_ROOT.'/views/user/login.php';
    }

    public function signup(){
        
        include APP_ROOT.'/views/user/signup.php';
    }
}
?>