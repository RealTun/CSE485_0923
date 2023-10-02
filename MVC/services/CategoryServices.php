<?php
require_once APP_ROOT.'/models/Category.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class CategoryServices{
    public function getAllCategory(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from theloai";
            $state = $conn->query($sql);
            $categories = [];
            while($row = $state->fetch()){
                $category = new Category($row['ma_tloai'], $row['ten_tloai']);
                $categories[] = $category;
            }
            return $categories;
        }
        return $categories = [];
    }

    public function getCategory($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from theloai where ma_tloai = '$id'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            return $category;
        }
    }

    public function getCategoryByName($name){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from theloai where ten_tloai = '$name'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            return $category;
        }
    }

    public function addCategory($category){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql_check = "select * from theloai where ten_tloai = '{$category->getCategoryName()}'";
            $state = $conn->query($sql_check);
            if($state->fetchColumn() == '0'){
                $sql = "insert into theloai (ten_tloai) values('{$category->getCategoryName()}')";
                $state = $conn->query($sql);
                if($state->rowCount() > 0){
                    header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&success=insert_category_successful');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=add&error=the_category_has_existed');
            }
        }
    }

    public function editCategory($category){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "update theloai set ten_tloai = '{$category->getCategoryName()}' where ma_tloai = '{$category->getCategoryID()}'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                    
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&success=edit_category_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&error=edit_category_failed');
            }
        }
    }

    public function deleteCategory($id){
        $dbConnection = new DBConnection();
        $conn =  $dbConnection->getConnection();
        if($conn != null){
            $sql = "delete from theloai where ma_tloai = '$id'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&success=delete_category_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&error=delete_category_failed');
            }
        }
    }
}
?>