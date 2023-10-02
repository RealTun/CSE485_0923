<?php
   include '../admin/permission.php';
?>

<?php
    try{
        $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');

        //
        $sql_user = 'select count(*) from users';
        $state = $conn->prepare($sql_user);
        $state->execute();
        $countUser = $state->fetchColumn();

        //
        $sql_category = 'select count(*) from theloai';
        $state = $conn->prepare($sql_category);
        $state->execute();
        $countCategory = $state->fetchColumn();

        //
        $sql_author = 'select count(*) from tacgia';
        $state = $conn->prepare($sql_author);
        $state->execute();
        $countAuthor = $state->fetchColumn();

        //
        $sql_post = 'select count(*) from baiviet';
        $state = $conn->prepare($sql_post);
        $state->execute();
        $countPost = $state->fetchColumn();

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
                                <a class="nav-link active" aria-current="page" href="./index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../layout/index.php">Trang ngoài</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./category.php">Thể loại</a>
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
    <main class="container vh-100 mt-5 justify-content-center">
        <div class="row row-cols-1 row-cols-md-4 g-4 align-items-center ">
            <div class="col">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <h6 class="card-title text-primary text-center">Người dùng</h6>
                        <p class="card-text text-center"><?=$countUser ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <h6 class="card-title text-primary text-center">Thể loại</h6>
                        <p class="card-text text-center"><?=$countCategory ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <h6 class="card-title text-primary text-center">Tác giả</h6>
                        <p class="card-text text-center"><?=$countAuthor ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <h6 class="card-title text-primary text-center">Bài viết</h6>
                        <p class="card-text text-center"><?=$countPost ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>