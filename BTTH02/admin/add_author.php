<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        if(isset($_POST['submit'])){
            $nameFile = $_FILES['file']['name'];
            $nameAuthor = $_POST['name'];

            $sql_check = "select * from tacgia where ten_tgia = '{$nameAuthor}'";
            $state = $conn->prepare($sql_check);
            $state->execute();

            if($state->fetchColumn() != 0){
                header("location: ./add_author.php?error=ok");
            }
            else{
                $sql_insert = "insert into tacgia (ten_tgia, hinh_tgia) values ('{$nameAuthor}', '{$nameFile}')";
                $state = $conn->prepare($sql_insert);
                if($state->execute()){
                    header("location: ./add_author.php?success=ok");
                }
            }          
        }     

    }catch(PDOException $e){
        die('Error: ' . $e->getMessage());
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
                                <a class="nav-link" href="./category.php">Thể loại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./author.php">Tác giả</a>
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
            <?php
                if(isset($_GET['success'])){
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-success text-center h5">
                            Insert success!
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
                            This author has existed. Cannot insert to database!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <div id="preview">
                        <img src="../images/author/default.jpg" alt="" height="150px" class="rounded-circle">
                    </div>
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên tác giả</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh tác giả</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="submit" value="Thêm" class="btn btn-success"></input>
                    <a href="" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var image = document.querySelector('img');
        var upload = document.querySelector('#formFile');
        upload.addEventListener('change', function(e) {
            let filename = upload.value.replace("C:\\fakepath\\", "");
            image.src = "..\\images\\author\\" + filename;
        })

        var btn = document.querySelector('.btn-close');
        btn.addEventListener('click', function(){
            var notification =document.querySelector('.notification');
            Object.assign(notification.style, {display: 'none'});
        });
    </script>
</body>

</html>