<?php
    require_once('../config/config.php');
    require_once APP_ROOT.'/libs/DBConnection.php';

    $controller = isset($_GET['controller'])? $_GET['controller'] : null;
    $action = isset($_GET['action']) ? $_GET['action'] : null;

    switch($controller){
        case 'author':
            require_once APP_ROOT.'/controllers/AuthorController.php';
            $authorController = new AuthorController();
            switch($action){
                case 'list': $authorController->index(); break;
                case 'add': $authorController->add(); break;
                case 'edit': $authorController->edit(); break;
                case 'delete': $authorController->delete(); break;
            }
            break;
        case 'category':
            require_once APP_ROOT.'/controllers/CategoryController.php';
            $categoryController = new CategoryController();
            switch($action){
                case 'list': $categoryController->index(); break;
                case 'add': $categoryController->add(); break;
                case 'edit': $categoryController->edit(); break;
                case 'delete': $categoryController->delete(); break;
            }
            break;
        case 'post':
            require_once APP_ROOT.'/controllers/PostController.php';
            $postController = new PostController();
            switch($action){
                case 'list': $postController->index(); break;
                case 'add': $postController->add(); break;
                case 'edit': $postController->edit(); break;
                case 'delete': $postController->delete(); break;
            }
            break;
        case 'user':
            require_once APP_ROOT.'/controllers/UserController.php';
            $userController = new UserController();
            switch($action){
                case 'login': $userController->login(); break;
                case 'signup': $userController->signup(); break;
                case 'verify': $userController->verification(); break;
            }
            break;
    }
    // $controller = ucfirst($controller); //Chuyển kí tự đầu sang in hoa: home > Home
    // $controller = $controller."Controller"; //Home > HomeController

    // $path = "controllers/".$controller.".php"; //HomeController > controllers/HomeController.php
    // if(!file_exists($path)){
    //     die("Request not found. Check your path");
    // }

    // include "$path";
    // $myController = new $controller();
    // if(method_exists($myController, $action)){
    //     $myController->$action();
    // }
    // else{
    //     echo $action . 'does not exist in class: ' . $controller;
    // }
?>