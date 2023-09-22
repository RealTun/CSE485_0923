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
                <?php
                    
                ?>
                
            </div>
        </div>
    </div>
    <script src="/test-php/Bootstrap/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script>
        function check() {
            const cb = document.querySelector('#checkAll').checked;
            let cbList = document.querySelectorAll('#checkCustom');
            if (cb) {               
                for (let i = 0; i < cbList.length; i++) {
                    cbList[i].checked = true;
                }
            }
            else{
                for (let i = 0; i < cbList.length; i++) {
                    cbList[i].checked = false;
                }
            }
        }
    </script>
</body>

</html>