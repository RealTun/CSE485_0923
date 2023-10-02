<?php
    try{
        $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');
        $sql= "select * from theloai";
        $state = $conn->prepare($sql);
        $state->execute();
        $categorys = $state->fetchAll();

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
        <?php                
                if(isset($_GET['success'])){
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-success text-center h5">
                            Edit category successful!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
                if(isset($_GET['delete'])){
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-success text-center h5">
                            Delete category successful!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
                if(isset($_GET['error'])){                   
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-danger text-center h5">
                            Cannot edit the category to database!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
                if(isset($_GET['errorDelete'])){                   
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-danger text-center h5">
                            Cannot delete the category to database!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
            ?>
        <div>
            <a href="./add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xoá</th>
                    </tr>
                </thead>
                <?php
                foreach ($categorys as $category) {
                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?=$category[0] ?></th>
                            <td><?=$category[1] ?></td>
                            <td><a href="./edit_category.php?id=<?=$category[0] ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#category<?= $category[0] ?>"><i class="bi bi-trash-fill"></i>
                                </button>
                                <div class="modal fade" id="category<?= $category[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete the author has id: <?=$category[0] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="./delete_category.php?id=<?=$category[0]?>" class="btn btn-danger">OK</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var btn = document.querySelector('.btn-close');
        btn.addEventListener('click', function(){
            var notification =document.querySelector('.notification');
            Object.assign(notification.style, {display: 'none'});
        });
    </script>
</body>

</html>