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
                                <a class="nav-link" href="./author.php">Tác giả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Bài viết</a>
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
                <h3 class="text-center">SỬA THÔNG TIN BÀI VIẾT</h3>
                <div class="mt-4">
                    <div class="text-center">
                        <div id="preview">
                            <img src="./images/post/<?=$post->getPostImage() ?>" alt="" height="150px" class="rounded-circle">
                        </div>
                    </div>
                    <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                    <input type="text" class="form-control" value="<?=$post->getTitle() ?>" name="title" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên bài hát</span>
                    <input type="text" class="form-control" value="<?=$post->getNameSong() ?>" name="nameSong" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Tác giả</label>
                    <select class="form-select" name="nameAuthor" id="inputGroupSelect01">
                        <option selected><?=$author->getAuthorName() ?></option>
                        <?php
                            foreach($authors as $author){
                                echo "<option>{$author->getAuthorName()}</option>";
                            }                       
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                    <select class="form-select" name="nameCategory" id="inputGroupSelect01">
                        <option selected><?=$category->getCategoryName() ?></option>
                        <?php
                            foreach($categories as $category){
                                echo "<option>{$category->getCategoryName()}</option>";
                            }  
                        ?>
                    </select>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="summary" id="floatingTextarea2" style="height: 100px"><?=$post->getSummary() ?></textarea>
                    <label for="floatingTextarea2">Tóm tắt</label>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="content" id="floatingTextarea2" style="height: 100px"><?=$post->getContent() ?></textarea>
                    <label for="floatingTextarea2">Nội dung</label>
                </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Ảnh bài hát</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    <div class="d-flex gap-2 justify-content-end ">
                        <button type="submit" name="btnEdit" class="btn btn-success">Lưu lại</button>
                        <a href="" class="btn btn-warning">Quay lại</a>
                    </div>
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
            image.src = ".\\images\\post\\" + filename;
        })

        var btn = document.querySelector('.btn-close');
        btn.addEventListener('click', function(){
            var notification =document.querySelector('.notification');
            Object.assign(notification.style, {display: 'none'});
        });
    </script>
</body>

</html>