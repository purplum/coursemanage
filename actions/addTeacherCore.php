<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/7
 * Time: 8:39
 */
    session_start();
    $name = file_get_contents("php://input");
    echo $name;
    parse_str($name, $data);
    var_export($data);
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');
    /*$rs = $db->query('select * from student');
    print_r($rs->fetchall(PDO::FETCH_ASSOC));*/

    $tname = empty($data['tname'])?"":$data['tname'];

    $n = $db->query("insert into teacher(tname) VALUES('$tname')");
    if ($n > 0) {
        echo "<script>";
        echo "alert(\"新增成功！\");";
        echo "location.href=\"../actions/teacherListCore.php\"";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"新增失败！\");";
        echo "location.href=\"#\"";
        echo "</script>";
    }
?>