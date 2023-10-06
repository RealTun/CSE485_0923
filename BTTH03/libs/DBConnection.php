<?php
class DBConnection{
    private $host;
    private $user;
    private $pass;
    private $name;
    private $conn;
    public function __construct(){
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->name = DB_NAME;

        try
        {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", "{$this->user}", "{$this->pass}");
        }
        catch(PDOException $e){
            $this->conn = null;
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}
?>