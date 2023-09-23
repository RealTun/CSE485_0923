<?php
    try{    
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql_detail = "select * from theloai where ma_tloai = $id";
            $state = $conn->prepare($sql_detail);
            $state->execute();        
            $category = $state->fetch(PDO::FETCH_ASSOC);    
            
            if(isset($_POST['submit'])){
                $nameCategory = $_POST['nameCategory'];
    
                $sql_check = "select * from theloai where ten_tloai = '{$nameCategory}'";
                $state = $conn->prepare($sql_check);
                $state->execute();
    
                if($state->fetchColumn() != 0){
                    header("location: ./category.php?error=ok");
                }
                else{
                    $sql_insert = "update theloai set ten_tloai = '$nameCategory' where ma_tloai = $id";
                    $state = $conn->prepare($sql_insert);
                    if($state->execute()){
                        header("location: ./category.php?success=ok");
                    }
                }          
            }   
        }       
    }catch(PDOException $e){
        echo "Error: {$e->getMessage()}";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        Adminitrasion
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../layout/index.php">Trang ngoài</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./category.php">Thể loại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./author.php">Tác giả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./post.php">Bài viết</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <main class="container vh-100 mt-5">
        <div>        
            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="text-center">SỬA THÔNG TIN THỂ LOẠI</h3>
                <div class="mt-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Mã thể loại</span>
                        <input type="text" class="form-control" value="<?=$category['ma_tloai'] ?>" aria-describedby="basic-addon1" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Tên thể loại</span>
                        <input type="text" class="form-control" value="<?=$category['ten_tloai'] ?>" name="nameCategory" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex gap-2 justify-content-end ">
                        <input type="submit" name="submit" class="btn btn-success" value="Lưu lại"></input>
                        <a href="" class="btn btn-warning">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>