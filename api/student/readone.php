<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 13:51
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../db/database.php';
include_once '../../object/student.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare student object
$student = new Student($db);

// set ID property of record to read
$student->sid = isset($_GET['sid']) ? $_GET['sid'] : die();

// read the details of student to be edited
$student->readOne();

if($student->sname!=null){
    // create array
    $student_arr = array(
        "sid" =>  $student->sid,
        "sname" => $student->sname,
        "studentid" => $student->studentid,
        "spersonid" => $student->spersonid,
        "spassword" => $student->spassword,
        "sclass" => $student->sclass,
        "sgender" => $student->sgender,
        "semail" => $student->semail,
        "stel" => $student->stel,
        "saddress" => $student->saddress,
        "isspecial" => $student->isspecial,
        "specialreason" => $student->specialreason,
        "isreg" => $student->isreg,
        "sgrade" => $student->sgrade

    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($student_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user student does not exist
    echo json_encode(array("message" => "student does not exist."));
}