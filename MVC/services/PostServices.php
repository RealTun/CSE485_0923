<?php
require_once APP_ROOT.'/models/Post.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class PostServices{
    public function getAllPost(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from baiviet";
            $state = $conn->query($sql);
            $posts = [];
            while($row = $state->fetch()){
                $post = new Post($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
                $posts[] = $post;
            }
            return $posts;
        }
        return $posts = [];
    }

    public function getPost($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from baiviet where ma_bviet = '$id'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $post = new Post($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            return $post;
        }
    }

    public function addPost($post){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql_check = "select * from baiviet where ten_bhat = '{$post->getNameSong()}'";
            $state = $conn->query($sql_check);
            if($state->fetchColumn() == '0'){
                $sql = "insert into baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, hinhanh) values(
                    '{$post->getTitle()}', '{$post->getNameSong()}', '{$post->getCategoryID()}', '{$post->getSummary()}', '{$post->getContent()}', '{$post->getAuthorID()}', '{$post->getPostImage()}')";
                $state = $conn->query($sql);
                if($state->rowCount() > 0){
                    header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&success=insert_post_successful');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=add&error=the_post_has_existed');
            }
        }
    }

    public function editPost($post){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "update baiviet set tieude = '{$post->getTitle()}', ten_bhat = '{$post->getNameSong()}', ma_tloai = '{$post->getCategoryID()}', tomtat = '{$post->getSummary()}', noidung = '{$post->getContent()}', ma_tgia = '{$post->getAuthorID()}', hinhanh = '{$post->getPostImage()}' where ma_bviet = '{$post->getPostID()}'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                    
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&success=edit_post_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&error=edit_post_failed');
            }
        }
    }

    public function deletePost($id){
        $dbConnection = new DBConnection();
        $conn =  $dbConnection->getConnection();
        if($conn != null){
            $sql = "delete from baiviet where ma_bviet = '$id'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&success=delete_post_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&error=delete_post_failed');
            }
        }
    }
}
?>