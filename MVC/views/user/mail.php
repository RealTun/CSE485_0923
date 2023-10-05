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
            

            $encrypted_password = password_hash($pw, PASSWORD_DEFAULT);


            //
            $conn = new PDO('mysql:host=localhost;dbname=btth01_cse485', 'root', 'tuan2106');
            $sql_check = "select * from users where username= '$name' or email = '$email'";
            $state = $conn->prepare($sql_check);
            $state->execute();

            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=user&action=signup&error=user_or_email_has_existed');
            }
            else{
                $mail->send();
                $sql_insert = "insert into users (email, username, pw, verification_code, email_verified_at) values ('$email', '$name', '$encrypted_password' , '$verification_code', NULL)";
                $state = $conn->prepare($sql_insert);
                $state->execute();

                header("location: ./user/verification.php?user=$name&verify=$email");
            }

            
        }catch(Exception $e){
            echo "Error: {$e->getMessage()}";
        }
    }
?>