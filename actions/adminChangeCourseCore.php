<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2017/6/6
     * Time: 8:35
     */
    session_start();
    $name = file_get_contents("php://input");
    echo $name;
    parse_str($name, $data);
    var_export($data);
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $cvalid = $data['cvalid'];
    $callowgrade = $data['callowgrade'];
    $cmax = $data['cmax'];
    $clocation = $data['clocation'];

    $course_info=$_SESSION['course_info'][0];
    $c_id=$course_info['cid'];
    $spage=$_SESSION['page'];
    echo $cvalid;

    $n = $db->query("update course set cvalid='$cvalid',callowgrade='$callowgrade',cmax='$cmax',clocation='$clocation' WHERE cid='$c_id'");
    if((int)$n>0){
        echo "<script>";
        echo "alert(\"修改信息成功！\");";
        echo "location.href=\"../actions/courseListCore.php?page=$spage\"";
        echo "</script>";
    }else{
        echo "修改失败！";
    }
?>
