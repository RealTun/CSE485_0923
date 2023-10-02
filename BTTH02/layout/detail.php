<?php
    if(isset($_GET['id'])){
        $id_post = $_GET['id'];
        try{
            $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');
            $sql = "select * from baiviet where ma_bviet = '$id_post'";
            $state = $conn->prepare($sql);
            $state->execute();
            $post = $state->fetch(PDO::FETCH_ASSOC);

            // get name category
            $sql_category = "select ten_tloai from theloai where ma_tloai = '{$post['ma_tloai']}'";
            $state = $conn->prepare($sql_category);
            $state->execute();
            $nameCategory = $state->fetchColumn();

            // get name author
            $sql_author = "select ten_tgia from tacgia where ma_tgia = '{$post['ma_tgia']}'";
            $state = $conn->prepare($sql_author);
            $state->execute();
            $nameAuthor = $state->fetchColumn();
            
        }catch(PDOException $e){
            echo "Error: {$e->getMessage()}";
        }
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
                        <img src="../images/combined-logo.png" alt="Music is life" height="70px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Đăng nhập</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="card mb-3">
                <div class="row g-0 my-5">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <img src="../images/post/<?=$post['hinhanh'] ?>" class="img-fluid rounded-start" alt="..." height="200px">
                    </div>
                    <div class="col-md-6 px-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?=$post['ten_bhat'] ?></h5>
                            <p class="card-text"><strong>Bài hát: </strong><?=$post['ten_bhat'] ?></p>
                            <p class="card-text"><strong>Thể loại: </strong><?=$nameCategory ?></p>
                            <p class="card-text"><strong>Tóm tắt: </strong><?=$post['tomtat'] ?></p>
                            <p class="card-text"><strong>Nội dung: </strong><?=$post['noidung'] ?></p>
                            <p class="card-text"><strong>Tác giả: </strong><?=$nameAuthor ?></p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>