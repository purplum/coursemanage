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

    $s_isspecial = $data['isspecial'];
    $s_special_reason = $data['special_reason'];
    $studentinfo=$_SESSION['studentinfo'][0];
    $s_personid=$studentinfo['spersonid'];
    $spage=$_SESSION['page'];
    echo $s_personid;
    echo " current page: " . $spage;

    $n = $db->query("update student set isspecial='$s_isspecial',specialreason='$s_special_reason' WHERE spersonid='$s_personid'");
    if((int)$n>0){
        echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>";
        echo "<script charset='utf-8' type='text/javascript' >";
        echo "alert(\"修改信息成功！\");";
        echo "location.href=\"../actions/studentListCore.php?page=$spage\"";
        echo "</script>";
    }else{
        echo "修改失败！";
    }
?>
