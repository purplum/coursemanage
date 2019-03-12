<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 14:34
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../db/core.php';
include_once '../../utilities/utilities.php';
include_once '../../db/database.php';
include_once '../../object/student.php';

// utilities
$utilities = new Utilities();

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$student = new Student($db);

// query student
$stmt = $student->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $students_arr=array();
    $students_arr["records"]=array();
    $students_arr["paging"]=array();

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


    // include paging
    $total_rows=$student->count();
    $page_url="{$home_url}student/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $students_arr["paging"]=$paging;

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($students_arr);
}

else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user students does not exist
    echo json_encode(
        array("message" => "No students found.")
    );
}