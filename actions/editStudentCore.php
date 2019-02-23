<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
    session_start();
    $page = $_GET['page'];
    $spersonid = $_GET['spersonid'];

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

$student = array();
$cou = $db->query("select * from student WHERE spersonid='$spersonid' ");
$studentinfo = $cou->fetchall(PDO::FETCH_ASSOC);

$_SESSION['studentinfo'] = $studentinfo;
$_SESSION['page'] = $page;
header('location:../views/adminChangeStudent.php');





