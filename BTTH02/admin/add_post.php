<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", 'root', 'tuan2106');

        //
        $sql_author = 'select * from tacgia';
        $state = $conn->prepare($sql_author);
        $state->execute();
        $authors = $state->fetchAll();

        //
        $sql_category = 'select * from theloai';
        $state = $conn->prepare($sql_category);
        $state->execute();
        $categorys = $state->fetchAll();


        //
        if(isset($_POST['submit'])){
            $nameFile = $_FILES['file']['name'];            
            $title = $_POST['title'];
            $song = $_POST['nameSong'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $nameAuthor = $_POST['nameAuthor'];
            $nameCategory = $_POST['nameCategory'];
            
            // get id author
            $state = $conn->prepare("select ma_tgia from tacgia where ten_tgia = '$nameAuthor'");
            $state->execute();
            $id_author = $state->fetchColumn();

            // get id category
            $state = $conn->prepare("select ma_tloai from theloai where ten_tloai = '$nameCategory'");
            $state->execute();
            $id_category = $state->fetchColumn();

            // insert
            $sql_insert = "insert into baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, hinhanh) values ('{$title}', '{$song}', '{$id_category}', '{$summary}', '{$content}', '{$id_author}', '{$nameFile}')";
            $state = $conn->prepare($sql_insert);
            if($state->execute()){
                header("location: ./add_post.php?success=ok");
            }        
            else{
                header("location: ./add_post.php?error=ok");
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
                                <a class="nav-link" href="#">Bài viết</a>
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
                            Add new post success!
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
                            Cannot add new post to database!
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
                    <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                    <input type="text" class="form-control" name="title" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên bài hát</span>
                    <input type="text" class="form-control" name="nameSong" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Tác giả</label>
                    <select class="form-select" name="nameAuthor" id="inputGroupSelect01">
                        <?php
                            foreach($authors as $author){
                                echo "<option>{$author[1]}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                    <select class="form-select" name="nameCategory" id="inputGroupSelect01">
                        <?php
                            foreach($categorys as $category){
                                echo "<option>{$category[1]}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="summary" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Tóm tắt</label>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Nội dung</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh bài hát</label>
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
            image.src = "..\\images\\post\\" + filename;
        })

        var btn = document.querySelector('.btn-close');
        btn.addEventListener('click', function(){
            var notification =document.querySelector('.notification');
            Object.assign(notification.style, {display: 'none'});
        });
    </script>
</body>

</html>