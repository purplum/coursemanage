<?php
    session_start();

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

$cid = $_GET['cid'];

    $allCourses = array();
    $cou = $db->query("select student.sid,student.sname,student.studentid,student.spersonid,student.sgrade,student.sclass,student.sgender,student.semail,student.stel,student.saddress,student.isspecial,student.specialreason from student,cc WHERE student.sid=cc.sid AND cc.cid='$cid' ");
    $allStaticsStudents = $cou->fetchAll();

    $_SESSION['allStaticsStudents'] = $allStaticsStudents;

//$_SESSION['maxPage'] = $maxPage;
//$_SESSION['page'] = $page;
//$_SESSION['count'] = $count;
//$_SESSION['pageSize'] = $pageSize;

    header('location:../views/courseStatics.php');