<?php
    session_start();

    if(!isset($_SESSION['isLogin'])){
        session_destroy();
        header("location: ../layout/login.php");
    }
    else{
        $permission = $_SESSION['permission'];
        if($permission != '1'){
            echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='../layout/index.php'> Click để về lại trang chủ</a>";
            //header('HTTP/1.1 404 Not Found');
			exit();
        }
    }
?>