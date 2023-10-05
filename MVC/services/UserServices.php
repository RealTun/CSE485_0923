<?php
require_once APP_ROOT.'/models/User.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class UserServices{
    public function isExisted($username){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select count(*) from users where username = '$username'";
           // $sql = "select count(*) from users where username = '$username' or email = '$email'";
            $state = $conn->query($sql);
            if($state->fetchColumn() != '0'){
                return true;
            }
        }
        return false;
    }

    public function getAccount($username){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from users where username = '$username'";
            $state = $conn->query($sql);
            $row = $state->fetch();
            $user = new User($row['uid'], $row['email'], $row['username'], $row['pw'], $row['verification_code'], $row['email_verified_at'], $row['role']);
            return $user;
        }
    }

    public function createAccount($user){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "insert into users (email, username, pw, verification_code) values ('{$user->getEmail()}', '{$user->getUsername()}', '{$user->getPw()}', '{$user->getVerification_code()}')";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=user&action=signup&success=signup_account_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=user&action=signup&success=signup_account_failed');
            }
        }
    }

    public function verification($username){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $now = date("Y-m-d H:i:s");
            $sql = "update users set email_verified_at = '$now' where username = '$username'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=user&action=login&success=verification_account_successful');
            }
        }
    }
}
?>