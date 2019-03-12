<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 13:36
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../../db/database.php';

// instantiate product object
include_once '../../object/student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->sname) &&
    !empty($data->studentid) &&
    !empty($data->spersonid)
){

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

    // create the $student
    if($student->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "student [" . $data->sname . "] was created."));
    }

    // if unable to create the student, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create student."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create student. Data is incomplete."));
}