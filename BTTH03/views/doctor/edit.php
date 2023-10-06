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
                                <a class="nav-link" href="<?=DOMAIN."/views/home/index.php"; ?>">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?=DOMAIN."/views/index.php?controller=doctor&action=list"; ?>">Bác sĩ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=DOMAIN."/views/index.php?controller=patient&action=list"; ?>">Bệnh nhân</a>
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
                <h3 class="text-center">SỬA THÔNG TIN BÁC SĨ</h3>
                <div class="mt-4">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Mã bác sĩ</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?=$doctor->getId(); ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Tên bác sĩ</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="<?=$doctor->getNameDoctor() ?>">
                    </div>
                    <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Chuyên khoa</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="special" value="<?=$doctor->getSpecial() ?>">
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
        var btn = document.querySelector('.btn-close');
        btn.addEventListener('click', function(){
            var notification =document.querySelector('.notification');
            Object.assign(notification.style, {display: 'none'});
        });
    </script>
</body>

</html>