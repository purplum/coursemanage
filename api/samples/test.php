<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 15:52
 */
$url = "http://localhost/coursemanage/api/student/readone.php?sid=11";

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);

echo "sid:" . $result->sid ;
echo "  --  sname:" . $result->sname ;