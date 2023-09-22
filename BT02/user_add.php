<?php
    $conn = new mysqli('localhost', 'root', 'tuan2106', 'test');

    if($conn->connect_error){
        die('Connection failed ' . $conn->connect_error);
    }

    $user = null? $_POST['username'] : null;
    if(isset($_POST['btn-save'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $numberphone = $_POST['phone'];
        $date = $_POST['date'];

        require_once './Model/user.php';
        $user = new User($username, $email, $password, $role, $gender, $numberphone, $date);
        $user->addUser($username);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Homepage</title>
    <link rel="stylesheet" href="/test-php/Bootstrap/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/test-php/icon_use/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        img {
            height: 200px;
            object-fit: cover;
        }

        @font-face {
            font-family: 'google';
            src: url('/test-php/font/GoogleSans-Regular.ttf');
        }

        input[type=checkbox]:checked,
        .btn-arrow,
        .btn-filter,
        .btn-clear {
            background-color: #ff6a59 !important;
        }

        .avatar-upload{
            display: flex;
            justify-content: center;
            align-items: center;    
        }

        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        #imagePreview {
            width: 100%;
            height: 100%;
            background-image: url('./images/default.jpg');
            background-size: cover;
            background-position: 50% 50%;
            border-radius: 50%;

        }

        .avatar-edit {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            z-index: 1;
            left: 345px;
            top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-light ">
        <div class="row">
            <?php
            include './layout/sidebar.php'
            ?>
            <div class="col-md-10 main">
                <?php
                include './layout/header.php'
                ?>

                <div class="user-form mx-5 rounded">
                    <div class="card card-header bg-white border-0">
                        <h5 style="color:#ff6a59" class="card-title">New User Form</h5>
                    </div>
                    <div class="card card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" name="avatar" id="id_avatar" style="display:none">
                                            <label for="id_avatar"><i style="color: #ff6a59;" class="fa-solid fa-pencil"></i></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="md-3 col-md-6">
                                        <label for="firstname" class="form-label text-black-50">First Name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastname" class="form-label text-black-50">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control">
                                    </div>
                                    <div class="md-3 col-md-12">
                                        <label for="username" class="form-label text-black-50">UserName</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" name="username" id="username" class="form-control">
                                        <div class="text-danger w-100 d-block mt-2"></div>
                                    </div>
                                    <div class="md-3 col-md-12">
                                        <label for="email" class="form-label text-black-50">Email</label>
                                        <span class="text-danger">*</span>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <div class="text-danger w-100 d-block mt-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 m-auto">
                                    <div class="form-check-inline">
                                        <input type="checkbox" name="active" id="active" class="form-check-input">
                                        <label class="form-check-label text-black-50" for="active">is active</label>
                                        <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label text-black-50">Phone Number</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                    <div class="text-danger w-100 d-block mt-2"></div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="role" class="form-label text-black-50">Datalist example</label>
                                        <input class="form-control" list="datalistOptions" id="role" name ="role" placeholder="Select the role">
                                        <datalist id="datalistOptions">
                                            <?php
                                            $role = ['Admin', 'Manager', 'Customer'];
                                            for ($i = 0; $i < 3; $i++) {
                                                echo "<option>{$role[$i]}</option>";
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="genger" class="form-label form-label-select text-black-50">Gender</label>
                                        <span class="text-danger">*</span>
                                        <select name="gender" id="gender" class="form-select">
                                            <?php
                                            $role = ['Choose gender', 'Male', 'Female', 'Others'];
                                            for ($i = 0; $i < 4; $i++) {
                                                echo "<option>{$role[$i]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="date" class="form-label text-black-50">Date of Birth</label>
                                        <span class="text-danger">*</spanc>
                                            <input type="date" name="date" id="date" class="form-control">
                                            <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="fb" class="form-label text-black-50">Facebook Url</label>
                                        <input type="text" name="fb" id="fb" class="form-control">
                                        <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="tw" class="form-label text-black-50">Twitter url</label>
                                        <input type="text" name="tw" id="tw" class="form-control">
                                        <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="ld" class="form-label text-black-50">Linkedin Url</label>
                                        <input type="text" name="ld" id="ld" class="form-control">
                                        <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="about" class="form-label text-black-50">About</label>
                                        <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                                        <div class="text-danger w-100 mt-1"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="password" class="form-label text-black-50">Password</label>
                                        <span class="text-danger w-100 mt-1"></span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="btn-eye">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-eye"><i class="eye fa-solid fa-eye fa-xs"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="password" class="form-label text-black-50">Confirm Password</label>
                                        <span class="text-danger w-100 mt-1"></span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cfpassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="btn-eye">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-eye"><i class="eye fa-solid fa-eye fa-xs"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-2 mt-3 mb-4">
                                        <span class="text-danger w-100 mt-1"></span>
                                        <button type="submit" class="btn btn-success " name="btn-save">Save</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="/test-php/Bootstrap/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script>
        let btn = document.querySelectorAll('#btn-eye');
        let eyeList =document.querySelectorAll('.eye');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function() {
                if (eyeList[i].classList.contains('fa-eye')) {
                    eyeList[i].classList.remove('fa-eye');
                    eyeList[i].classList.add('fa-eye-slash');
                } else {
                    eyeList[i].classList.remove('fa-eye-slash');
                    eyeList[i].classList.add('fa-eye');
                }
            });
        }
    </script>
</body>

</html>