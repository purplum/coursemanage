<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
    session_start();
    $page = $_GET['page'];
    $cid = $_GET['cid'];

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

$cou = $db->query("select * from course WHERE cid='$cid' ");
$courseinfo = $cou->fetchall(PDO::FETCH_ASSOC);

$_SESSION['course_info'] = $courseinfo;
$_SESSION['page'] = $page;
header('location:../views/adminChangeCourse.php');





