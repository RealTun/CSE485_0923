<?php
require_once APP_ROOT.'/models/Author.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class AuthorServices{
    public function getAllAuthor(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = 'select * from tacgia';
            $state = $conn->query($sql);
            
            $authors = [];
            while($row = $state->fetch()){
                $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
                $authors[] = $author;
            }
            return $authors;
        }
        return $authors = [];
    }

    public function getAuthor($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from tacgia where ma_tgia = '$id'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            return $author;
        }
    }

    public function getAuthorByName($name){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from tacgia where ten_tgia = '$name'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            return $author;
        }
    }

    public function isExist($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select count(*) from tacgia where ma_tgia = '$id'";
            $state = $conn->query($sql);
            if($state->fetchColumn() != '0'){
                return true;
            }
            return false;
        }
    }

    public function addAuthor($author){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql_check = "select count(*) from tacgia where ten_tgia = '{$author->getAuthorName()}'";
            $state = $conn->query($sql_check);
            //check author exist
            if($state->fetchColumn() == '0'){
                $sql = "insert into tacgia (ten_tgia, hinh_tgia) values ('{$author->getAuthorName()}', '{$author->getAuthorImage()}')";
                $state = $conn->query($sql);
                if($state->rowCount() > 0){
                    
                    header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&success=insert_author_successful');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=add&error=the_author_has_existed');
            }         
        }
    }

    public function editAuthor($author){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "update tacgia set ten_tgia = '{$author->getAuthorName()}', hinh_tgia = '{$author->getAuthorImage()}' where ma_tgia = '{$author->getAuthorID()}'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                    
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&success=edit_author_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&error=edit_author_failed');
            }
        }
    }

    public function deleteAuthor($id){
        $dbConnection = new DBConnection();
        $conn =  $dbConnection->getConnection();
        if($conn != null){
            $sql = "delete from tacgia where ma_tgia = '$id'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&success=delete_author_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&error=delete_author_failed');
            }
        }
    }
}
?>