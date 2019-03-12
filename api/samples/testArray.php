<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 15:52
 */
$url = "http://localhost/coursemanage/api/student/read.php";

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);

$students = $result->records;

foreach ($students as $student) {
    echo $student->sname . "\n";
}

//echo "sid:" . $result->records[0]->sname ;
//echo "";
//echo "  --  Response Code:" . $result->response_code ;