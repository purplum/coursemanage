<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 11:30
 */

class Student{

    // database connection and table name
    private $conn;
    private $table_name = "student";

    // object properties
    public $sid;
    public $sname;
    public $studentid;
    public $spersonid;
    public $spassword;
    public $sgrade;
    public $sclass;
    public $sgender;
    public $semail;
    public $stel;
    public $saddress;
    public $isspecial;
    public $specialreason;
    public $isreg;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read students
    function read(){

        // select all query
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY
                sid ASC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create students
    function create(){

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                sname=:sname, studentid=:studentid, spersonid=:spersonid, spassword=:spassword, sgrade=:sgrade, sclass=:sclass, sgender=:sgender, semail=:semail, stel=:stel, saddress=:saddress, isspecial=:isspecial, specialreason=:specialreason, isreg=:isreg";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->sname=htmlspecialchars(strip_tags($this->sname));
        $this->studentid=htmlspecialchars(strip_tags($this->studentid));
        $this->spersonid=htmlspecialchars(strip_tags($this->spersonid));
        $this->spassword=htmlspecialchars(strip_tags($this->spassword));
        $this->sgrade=htmlspecialchars(strip_tags($this->sgrade));
        $this->sclass=htmlspecialchars(strip_tags($this->sclass));
        $this->sgender=htmlspecialchars(strip_tags($this->sgender));
        $this->semail=htmlspecialchars(strip_tags($this->semail));
        $this->stel=htmlspecialchars(strip_tags($this->stel));
        $this->saddress=htmlspecialchars(strip_tags($this->saddress));
        $this->isspecial=htmlspecialchars(strip_tags($this->isspecial));
        $this->specialreason=htmlspecialchars(strip_tags($this->specialreason));
        $this->isreg=htmlspecialchars(strip_tags($this->isreg));

        // bind values
        $stmt->bindParam(":sname", $this->sname);
        $stmt->bindParam(":studentid", $this->studentid);
        $stmt->bindParam(":spersonid", $this->spersonid);
        $stmt->bindParam(":spassword", $this->spassword);
        $stmt->bindParam(":sgrade", $this->sgrade);
        $stmt->bindParam(":sclass", $this->sclass);
        $stmt->bindParam(":sgender", $this->sgender);
        $stmt->bindParam(":semail", $this->semail);
        $stmt->bindParam(":stel", $this->stel);
        $stmt->bindParam(":saddress", $this->saddress);
        $stmt->bindParam(":isspecial", $this->isspecial);
        $stmt->bindParam(":specialreason", $this->specialreason);
        $stmt->bindParam(":isreg", $this->isreg);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    // used when filling up the update student form
    function readOne(){

        // query to read single record
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                sid = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of student to be updated
        $stmt->bindParam(1, $this->sid);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->sid = $row['sid'];
        $this->sname = $row['sname'];
        $this->studentid = $row['studentid'];
        $this->spersonid = $row['spersonid'];
        $this->spassword = $row['spassword'];
        $this->sgrade = $row['sgrade'];
        $this->sclass = $row['sclass'];
        $this->sgender = $row['sgender'];
        $this->semail = $row['semail'];
        $this->stel = $row['stel'];
        $this->saddress = $row['saddress'];
        $this->isspecial = $row['isspecial'];
        $this->specialreason = $row['specialreason'];
        $this->isreg = $row['isreg'];
    }

    // update the student
    function update(){

        // update query
        $query = "UPDATE 
                " . $this->table_name . "
            SET
                sname=:sname, studentid=:studentid, spersonid=:spersonid, spassword=:spassword, sgrade=:sgrade, sclass=:sclass, sgender=:sgender, semail=:semail, stel=:stel, saddress=:saddress, isspecial=:isspecial, specialreason=:specialreason, isreg=:isreg
            WHERE
                sid = :sid";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->sname=htmlspecialchars(strip_tags($this->sname));
        $this->studentid=htmlspecialchars(strip_tags($this->studentid));
        $this->spersonid=htmlspecialchars(strip_tags($this->spersonid));
        $this->spassword=htmlspecialchars(strip_tags($this->spassword));
        $this->sgrade=htmlspecialchars(strip_tags($this->sgrade));
        $this->sclass=htmlspecialchars(strip_tags($this->sclass));
        $this->sgender=htmlspecialchars(strip_tags($this->sgender));
        $this->semail=htmlspecialchars(strip_tags($this->semail));
        $this->stel=htmlspecialchars(strip_tags($this->stel));
        $this->saddress=htmlspecialchars(strip_tags($this->saddress));
        $this->isspecial=htmlspecialchars(strip_tags($this->isspecial));
        $this->specialreason=htmlspecialchars(strip_tags($this->specialreason));
        $this->isreg=htmlspecialchars(strip_tags($this->isreg));

        // bind new values
        $stmt->bindParam(":sname", $this->sname);
        $stmt->bindParam(":studentid", $this->studentid);
        $stmt->bindParam(":spersonid", $this->spersonid);
        $stmt->bindParam(":spassword", $this->spassword);
        $stmt->bindParam(":sgrade", $this->sgrade);
        $stmt->bindParam(":sclass", $this->sclass);
        $stmt->bindParam(":sgender", $this->sgender);
        $stmt->bindParam(":semail", $this->semail);
        $stmt->bindParam(":stel", $this->stel);
        $stmt->bindParam(":saddress", $this->saddress);
        $stmt->bindParam(":isspecial", $this->isspecial);
        $stmt->bindParam(":specialreason", $this->specialreason);
        $stmt->bindParam(":isreg", $this->isreg);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // delete the student
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE sid = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->sid=htmlspecialchars(strip_tags($this->sid));

        // bind id of record to delete
        $stmt->bindParam(1, $this->sid);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    // search students
    function search($keywords){

        // select all query
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                sname LIKE ? OR studentid LIKE ? OR spersonid LIKE ? OR specialreason LIKE ?
            ORDER BY
                sid ASC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->bindParam(4, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){

        // select query
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY sid ASC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}