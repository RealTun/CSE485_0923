<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from tacgia where ma_tgia = $id";
            $state = $conn->prepare($sql);
            if($state->execute()){
                header("location: ./author.php?success=ok");
            }
            else{
                header("location: .author.php?error=ok");
            }
        }
    }catch(PDOException $e){
        echo "Error: {$e->getMessage()}";
    }
?>