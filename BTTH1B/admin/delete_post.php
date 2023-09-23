<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from baiviet where ma_tloai = $id";
            $state = $conn->prepare($sql);
            if($state->execute()){
                header("location: ./post.php?delete=ok");
            }
            else{
                header("location: ./post.php?errorDelete=ok");
            }
        }
    }catch(PDOException $e){
        echo "Error: {$e->getMessage()}";
    }
?>