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

    $n = $db->query("update admininfo set isopen='0' WHERE aid='10001'");
    if((int)$n>0){
        echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>";
        echo "<script charset='utf-8' type='text/javascript' >";
        echo "alert(\"选课系统开启成功！\");";
        echo "location.href=\"../views/teacherMain.php\"";
        echo "</script>";
    }else{
        echo "选课系统开启失败！";
    }
?>
