<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 14:14
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../db/database.php';
include_once '../../object/student.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare student object
$student = new Student($db);

// get id of student to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of student to be edited
$student->sid = $data->sid;

// set student property values
$student->sname = $data->sname;
$student->studentid = $data->studentid;
$student->spersonid = $data->spersonid;
$student->spassword = $data->spassword;
$student->sgrade = $data->sgrade;
$student->sclass = $data->sclass;
$student->sgender = $data->sgender;
$student->semail = $data->semail;
$student->stel = $data->stel;
$student->saddress = $data->saddress;
$student->isspecial = $data->isspecial;
$student->specialreason = $data->specialreason;
$student->isreg = $data->isreg;

// update the student
if($student->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "student was updated."));
}

// if unable to update the student, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update student."));
}