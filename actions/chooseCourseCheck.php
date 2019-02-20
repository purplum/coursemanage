<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
    session_start();
    $cid = $_GET['cid'];
    echo "cid=".$cid;
    $sid = $_GET['sid'];
    echo "sid=".$sid;
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $rs_1 = $db->query("select * from cc WHERE sid='$sid' and cid='$cid'");
    $num_rows = $rs_1->rowCount();
    if ($num_rows > 0) {
        echo "<script>";
        echo "alert(\"重复选课! 请重新选择\");";
        echo "location.href=\"../views/chooseCourse.php\"";
        echo "</script>";
    } else {
        $n = $db->query("insert into cc(sid,cid) VALUES($sid,$cid)");
        $db->query("update course set course.ccurrent=course.ccurrent+1 WHERE cid=$cid");

        if((int)$n>0){
            echo "<script>";
            echo "alert(\"选课成功, 请刷新页面查看选课结果!\");";
            echo "location.href=\"../views/myCourses.php\"";
            echo "</script>";
        }else{
            echo "选课失败！";
        }
    }


