<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from theloai where ma_tloai = $id";
            $state = $conn->prepare($sql);
            if($state->execute()){
                header("location: ./category.php?delete=ok");
            }
            else{
                header("location: ./categoty.php?errorDelete=ok");
            }
        }
    }catch(PDOException $e){
        echo "Error: {$e->getMessage()}";
    }
?>