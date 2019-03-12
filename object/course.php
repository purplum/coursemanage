<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 14:42
 */
class Course{

    // database connection and table name
    private $conn;
    private $table_name = "course";

    // object properties
    public $cid;
    public $cname;
    public $cteacher;
    public $ctime;
    public $cmax;
    public $cxueshi;
    public $ccurrent;
    public $clocation;
    public $callowgrade;
    public $cvalid;

    public function __construct($db){
        $this->conn = $db;
    }

    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                ORDER BY
                    cid";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used by select drop-down list
    public function read(){

        //select all data
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY
                cid";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }
}