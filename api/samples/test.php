<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 15:52
 */

include_once("../../controller/globals.php");

$test_sid=11;

$url = "http://" . RESTSERVER . "/" . APPNAME . "/api/" . STUDENTCATEGORY . "/readone.php?sid=" . $test_sid;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);

echo "sid:" . $result->sid ;
echo "  --  sname:" . $result->sname ;