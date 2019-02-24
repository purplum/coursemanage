<?php
    session_start();

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

$rs_auth_1 = $db->query("select * from student WHERE isreg='0' ");
$num_auht_rows = $rs_auth_1->rowCount();

if($num_auht_rows > 0) {

    $_SESSION['reg_count'] = $num_auht_rows;
}

$rs_choosed = $db->query("select * from cc ");
$num_choosed = $rs_choosed->rowCount();

if($num_choosed > 0) {

    $_SESSION['choose_course_count'] = $num_choosed;
}


$course_all_rs = $db->query("select * from course WHERE cvalid='0' ");
$course_all_rs_count = $course_all_rs->rowCount();

if($course_all_rs_count > 0) {

    $_SESSION['course_all_rs_count'] = $course_all_rs_count;
}


$course_choosed_rs = $db->query("SELECT SUM(cmax) AS smax, SUM(ccurrent) AS smin FROM course WHERE cvalid='0' ");

$maxsum=0;
$minsum=0;
$course_choosed_rs_max = $course_choosed_rs->fetchall(PDO::FETCH_ASSOC);
$max_row = $course_choosed_rs_max[0];
$course_max_data = $max_row['smax'];
$course_min_data = $max_row['smin'];
//    $maxsum = $max_row['smax'];
//    $minsum = $max_row['smin'];
//
$_SESSION['course_max_data'] = $course_max_data;
$_SESSION['course_min_data'] = $course_min_data;

    header('location:../views/statics.php');