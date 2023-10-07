<?php
    require_once('../config/config.php');
    // $controller = isset($_GET['controller'])?$_GET['controller']:'home';
    // $action     = isset($_GET['action'])?$_GET['action']:'index';

    // //echo $controller.'--'.$action;
    // $controller = ucfirst($controller); //Chuyển kí tự đầu sang in hoa: home > Home

    // $controller = $controller."Controller"; //Home > HomeController
    // $path = "controllers/".$controller.".php"; //HomeController > controllers/HomeController.php
    // echo $path;
    // if(!file_exists($path)){
    //     die("Request not found. Check your path");
    // }
    // include $path;
    // $myController = new $controller();
    // if (method_exists($myController, $action)) {
    //     $myController->$action();
    // } else {
    //     echo "$action does not exist in $controller class";
    // }

    $controller = isset($_GET['controller'])? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    switch($controller){
        case 'doctor':
            require_once APP_ROOT.'/controllers/DoctorController.php';
            $doctorController = new DoctorController();
            switch($action){
                case 'list': $doctorController->index(); break;
                case 'add': $doctorController->add(); break;
                case 'edit': $doctorController->edit(); break;
                case 'delete': $doctorController->delete(); break;
            }
            break;
        case 'patient':
            require_once APP_ROOT.'/controllers/PatientController.php';
            $patientController = new PatientController();
            switch($action){
                case 'list': $patientController->index(); break;
                case 'add': $patientController->add(); break;
                case 'edit': $patientController->edit(); break;
                case 'delete': $patientController->delete(); break;
            }
            break;
        default:
            require_once APP_ROOT.'/controllers/HomeController.php';
            $homeController = new HomeController();
            $homeController->index();
    }
