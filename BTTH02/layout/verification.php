<?php
    if(isset($_GET['verify'])){
        $email = $_GET['verify'];
        try
        {
            $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');
            $sql = "select * from users where email = '$email'";
            $state = $conn->prepare($sql);
            $state->execute();

            if($state->rowCount() > 0){
                $user = $state->fetch(PDO::FETCH_ASSOC);       
            }

            if(isset($_POST['btnVerify'])){
                $verification_code = $user['verification_code'];
                if($_POST['otp'] == $verification_code){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $now = date("Y-m-d H:i:s");
                    $sql = "update users set email_verified_at = '$now' where email = '$email'";
                    $state = $conn->prepare($sql);
                    $state->execute();
                    header('location: login.php?success=ok');
                }  
                else{
                    header('location: verification.php?otp=OTP is not vaild');
                }
            }
        }
        catch(PDOException $e){
            echo "Error: {$e->getMessage()}";
        }     
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
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
                        <img src="../images/combined-logo.png" alt="Music is life" height="80px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
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
        <main class="container vh-100 mt-5">
            <?php
                if(isset($_GET['error'])){                   
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-danger text-center h5">
                            '. $_GET['error'] .'
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
                if(isset($_GET['otp'])){
                    echo '<div class="row bg-warning p-2 mb-3 notification">
                        <div class="col"></div>
                        <div class="col text-danger text-center h5">
                            OTP is not vaild!
                        </div>
                        <div class="col">
                            <button type="button" class="btn-close" data-bs-dissmiss="notification" aria-label="Close"></button>
                        </div>
                    </div>';
                }
            ?>
            <div class="row">
                <div class="col align-self-center"></div>
                <div class="col align-self-center">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>Verify your account</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">OTP</span>
                                    <input type="text" class="form-control" name="otp" aria-describedby="basic-addon1" required maxlength="6">
                                </div>                               
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Verify" name="btnVerify" class="btn btn-warning px-4">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center p-3">
                                    <p>If you have an account?<a href="./login.php" class="text-warning">Login</a></p>
                                    <a href="#" class="text-warning">Forgot your password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col align-self-center"></div>
            </div>
        </main>
    </div>
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