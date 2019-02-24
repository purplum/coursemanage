<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
    session_start();
    $cid = $_GET['cid'];
//    echo "cid=".$cid;
    $sid = $_GET['sid'];
//    echo "sid=".$sid;
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $rs_1 = $db->query("select * from cc WHERE sid='$sid' and cid='$cid'");
    $num_rows = $rs_1->rowCount();

$rs_special = $db->query("select * from student WHERE sid='$sid' and isspecial='1' ");
$num_rows_special = $rs_special->rowCount();
$student_special = $rs_special->fetchall(PDO::FETCH_ASSOC);

    if ($num_rows > 0) {
        echo "<script>";
        echo "alert(\"(Duplicated course selected) 重复选课! 请重新选择\");";
        echo "location.href=\"../views/chooseCourse.php\"";
        echo "</script>";
    } else if ($num_rows_special > 0) {
        $s_special_a = $student_special[0];
        $s_special_content = $s_special_a['specialreason'];
        echo "<script>";
        echo "alert(\"$s_special_content\");";
        echo "location.href=\"../views/chooseCourse.php\"";
        echo "</script>";
    }

    else {
        $n = $db->query("insert into cc(sid,cid) VALUES($sid,$cid)");
        $db->query("update course set course.ccurrent=course.ccurrent+1 WHERE cid=$cid");

        if((int)$n>0){
            echo "<script>";
            echo "alert(\"(Success)选课成功, 请刷新页面查看选课结果!\");";
            echo "location.href=\"../actions/myCoursesCore.php\"";
            echo "</script>";
        }else{
            echo "选课失败！";
        }
    }


