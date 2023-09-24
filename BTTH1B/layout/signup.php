<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../PHPMailer-master/PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/PHPMailer-master/src/SMTP.php';
    if(isset($_POST['register'])){
        $name = $_POST['username'];
        $pw = $_POST['password1'];
        $email = $_POST['email'];

        $mail = new PHPMailer(true);

        try{
            $mail->SMTPDebug = 0;

            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPAuth = true;

            $mail->Username = 'maumai07@gmail.com';

            $mail->Password = 'rhuajoxnlbiuanyn';

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port = 587;

            $mail->setFrom('maumai07@gmail.com', 'realtun-tech');

            $mail->addAddress($email, $name);

            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'OTP verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px">' . $verification_code . '</b></p>';
            $mail->send();

            $encrypted_password = password_hash($pw, PASSWORD_DEFAULT);


            //
            $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');
            $sql_check = "select * from users where username= '$name' or email = '$email'";
            $state = $conn->prepare($sql_check);
            $state->execute();

            if($state->rowCount() > 0){
                header('location: ./signup.php?error=System has this user!');
            }
            else{
                $sql_insert = "insert into users (email, username, pw, verification_code, email_verified_at) values ('$email', '$name', '$encrypted_password' , '$verification_code', NULL)";
                $state = $conn->prepare($sql_insert);
                $state->execute();

                header("location: verification.php?verify=$email");
            }

            
        }catch(Exception $e){
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
                
            ?>
            <div class="row">
                <div class="col align-self-center"></div>
                <div class="col align-self-center">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sign In</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" class="form-control" name="password1" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Sign up" name="register" class="btn btn-warning px-4">
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