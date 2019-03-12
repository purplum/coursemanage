<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 15:14
 */
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../db/database.php';
include_once '../../object/course.php';

// instantiate database and category object
$database = new Database();
$db = $database->getConnection();

// initialize object
$course = new Course($db);

// query course
$stmt = $course->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // courses array
    $course_arr=array();
    $course_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $course_item=array(
            "cid" => $cid,
            "cname" => $cname,
            "cteacher" => $cteacher,
            "cteacher" => $cteacher,
            "ctime" => html_entity_decode($ctime),
            "cmax" => $cmax,
            "cxueshi" => $cxueshi,
            "ccurrent" => $ccurrent,
            "clocation" => $clocation,
            "callowgrade" => $callowgrade,
            "cvalid" => $cvalid
        );

        array_push($course_arr["records"], $course_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show courses data in json format
    echo json_encode($course_arr);
}

else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no courses found
    echo json_encode(
        array("message" => "No courses found.")
    );
}