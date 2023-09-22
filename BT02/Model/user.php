<?php
class User
{
    function __construct(private $username, private $email, private $password, private $role, private $gender, private $phone, private $date)
    {
    }

    public function addUser($username)
    {
        $conn = new mysqli('localhost', 'root', 'tuan2106', 'test');

        $result = mysqli_query($conn, "select count(*) from users where username = '$username'");
        $row = $result->fetch_row();

        if ($row[0] > 0) {
            die('User existed');
        } else {
            $query = "INSERT INTO users (username, email, pw, gender, urole, numberphone, dateofbirth) VALUES ('$this->username',           '$this->email', '$this->password', '$this->gender', '$this->role', '$this->phone', '$this->date')";
            $result = mysqli_query($conn, $query);

            if ($result && $conn->affected_rows > 0) {
                echo "Insert successul";
            } else {
                echo "Insert failed: " . $conn->error;
            }
        }
    }

    public function editUser($uid)
    {
        $conn = new mysqli('localhost', 'root', 'tuan2106', 'test');

        $query = "update users set username = '$this->username', email = '$this->email', pw = '$this->password', gender = '$this->gender', urole = '$this->role', numberphone = '$this->phone', 'dateofbirth = '$this->phone' where uid = $uid";
        $result = mysqli_query($conn, $query);

        if ($result && $conn->affected_rows > 0) {
            echo "Update successul";
        } else {
            echo "Update failed: " . $conn->error;
        }
    }

    public function deleteUser($uid)
    {  
        $conn = new mysqli('localhost', 'root', 'tuan2106', 'test');

        mysqli_query($conn, "delete from users where uid = $uid");

        if ($conn->affected_rows > 0) {
            echo 'Delete successful';
        } 
        else {
            die('Delete failed: ' . $conn->error);
        }
    }
}
