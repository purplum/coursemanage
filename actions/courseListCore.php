<?php
    session_start();

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

//    $sid = $_SESSION['sid'];
//    $rs = $db->query("select cid from cc ");
//    $cids = $rs->fetchAll();
//    $cidss = array();
//    if(!empty($cids)){
//        foreach ($cids as $row){
//            $cidItem = $row['cid'];
//            $cidss[] = $cidItem;
//        }
//    }
    $allCourses = array();
    $cou = $db->query("select * from course ");
    $allCourses = $cou->fetchAll();
//    if(!empty($cour)){
//        $allCourses[] = $cour[0];
//    }
    /*foreach ($myCourses as $row2) {
        print_r($row2);
        echo "<br/>";
        echo "<br/>";
    }*/

    $_SESSION['$allCourses'] = $allCourses;
    header('location:../views/courselist.php');