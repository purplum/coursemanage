<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 11:35
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../db/database.php';
include_once '../../object/student.php';

// instantiate database and student object
$database = new Database();
$db = $database->getConnection();

// initialize object
$student = new Student($db);

// read students will be here
// query $student
$stmt = $student->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $students_arr=array();
    $students_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $student_item=array(
            "sid" => $sid,
            "sname" => $sname,
            "studentid" => $studentid,
            "spersonid" => $spersonid,
            "spassword" => $spassword,
            "sgrade" => $sgrade,
            "sclass" => $sclass,
            "sgender" => $sgender,
            "semail" => $semail,
            "stel" => $stel,
            "saddress" => $saddress,
            "isspecial" => $isspecial,
            "specialreason" => $specialreason,
            "isreg" => $isreg
        );

        array_push($students_arr["records"], $student_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show students data in json format
    echo json_encode($students_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

// no students found will be here