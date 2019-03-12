<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 11:25
 */

class Database{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "chooseclass_tp";
    private $username = "root";
    private $password = "BA8xr0hQ";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}