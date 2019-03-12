<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-11
 * Time: 15:39
 */
//next example will insert new conversation
$service_url = 'http://localhost/coursemanage/api/course/read.php';
$curl = curl_init($service_url);
$curl_post_data = array(
    'message' => 'test message',
    'useridentifier' => 'agent@example.com',
    'department' => 'departmentId001',
    'subject' => 'My first conversation',
    'recipient' => 'recipient@example.com',
    'apikey' => 'key001'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
//curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);