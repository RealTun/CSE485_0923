<?php
$dbserver = 'localhost';
$dbuser = 'root';
$dbpw = 'tuan2106';

$conn = new mysqli($dbserver, $dbuser, $dbpw, 'test');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, 'select count(uid) as total from users');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total']; // 15

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$litmit = 10;

$total_page = ceil($total_records / $litmit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $litmit;

// try{
//     $conn = new PDO("mysql:host=localhost;dbname=test", $dbuser, $dbpw);
//     $sql = '';
//     $state = $conn->prepare($sql);
//     $state->execute();

//     //
//     $user = $state->fetchAll();
// }catch(PDOException $e){
//     echo "Error: " . $e->getMessage();
// }
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
                <div class="filter-container bg-white mx-5 my-3 p-3">
                    <p class="d-flex flex-nowrap justify-content-between">
                        <span class="h5" style="color:#ff6a59">Filter</span>
                        <button class="btn btn-primary btn-sm btn-arrow rounded-circle border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body p-0 border-0">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg6 col-xl-3">
                                        <input type="email" name="filter-email" class="form-control p-2" placeholder="Email">
                                    </div>
                                    <div class="col-lg6 col-xl-3">
                                        <input type="number" name="filter-phone" class="form-control p-2" placeholder="Mobile">
                                    </div>
                                    <div class="col-lg6 col-xl-3">
                                        <select name="filter-select" class="form-select p-2">
                                            <?php
                                            $role = ['Select group', 'Admin', 'Manager', 'Customer'];
                                            for ($i = 0; $i < 4; $i++) {
                                                echo "<option>{$role[$i]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg6 col-xl-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-100 btn-filter border-0 p-2"><i class="fa-solid fa-search mx-1"></i>Filter</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary w-100 btn-clear border-0 p-2">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="main-content vh-100 p-3 mx-5 rounded bg-white ">
                    <form action="./user_management.php" method="post">
                        <div class="d-flex">
                            <span class="text-primary text-uppercase p-2 flex-grow-1">Users</span>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger">Delete</button>


                            <a href="./user_add.php" type="button" class="btn btn-success bg-danger p-2 mx-2"><i class="fa-solid fa-user-plus"></i> Add user</a>
                        </div>
                    </form>
                    <table class="table my-3">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"><input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="check()"></th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Groups</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "select * from users LIMIT $start, 10");
                            $users = mysqli_fetch_all($result);
                            // <button class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></button>
                            // <button class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i></button>
                            foreach ($users as $user) {
                                echo '<tr class="text-center">
                                        <th scope="row"><input class="form-check-input" type="checkbox" value="" id="checkCustom"></th>' . "
                                        <td>$user[1]</td>
                                        <td>$user[2]</td>
                                        <td>$user[4]</td> 
                                        <td>$user[5]</td>
                                        <td>$user[6]</td>
                                        <td>$user[7]</td>" . '
                                        <td class=""><a href="./user_details.php?id=' . $user[0] . '""><i class="bi bi-eye-fill text-primary"></i></a></td>
                                        <td>
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$user[0].'">
                                                    Delete
                                                </a>
                                                
                                                <div class="modal fade" id="'.$user[0].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete user</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete user have id: '.$user[0].'
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="./user_management.php?delete='.$user[0].'" class="btn btn-primary">Save changes</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>                                      
                                        </td>
                                    </tr>
                                ';
                            }
                            if (isset($_GET['delete'])) {
                                $uid = $_GET['delete'];
                                require_once './Model/user.php';
                                $user = new User(null, null, null, null, null, null, null);
                                $user->deleteUser($uid);
                            }

                            // data-bs-toggle="modal" data-bs-target="#exampleModal                                                                            
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example" class="float-end my-3">
                        <ul class="pagination">
                            <?php
                            if ($current_page > 1 && $total_page > 1) {
                                echo '<li class="page-item">
                                        <a class="page-link" href="./user_management.php?page=' . ($current_page - 1) . '" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
                            }

                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    echo '<li class="page-item"><a class="page-link">' . $i . '</a>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="./user_management.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }

                            if ($current_page < $total_page && $total_page > 1) {
                                echo '<li class="page-item">
                                        <a class="page-link" href="./user_management.php?page=' . ($current_page + 1) . '" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>

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
            } else {
                for (let i = 0; i < cbList.length; i++) {
                    cbList[i].checked = false;
                }
            }
        }
    </script>
</body>

</html>