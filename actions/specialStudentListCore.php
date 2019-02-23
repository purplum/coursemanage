<?php
    session_start();

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $pageSize = 10;

    $res = $db->query("SELECT count(*) FROM student WHERE isspecial='1' ");

    $res2 = $res->fetchall(PDO::FETCH_ASSOC);
    $count = 1;
    if (!empty($res2)) {
        $count = $res2[0]['count(*)'];
        echo $count;
    }
    $maxPage = ceil($count / $pageSize);
    //echo "maxpage=" . $maxPage;
    //获取当前页 做容错处理
    $page = isset($_GET['page'])?intval($_GET['page']):1;
    $page = $page >$maxPage?$maxPage:$page;
    $page = $page<1?1:$page;
    $lim = ($page - 1) * $pageSize;

    $rs = $db->query("select * from student WHERE isspecial='1' LIMIT $lim,$pageSize");
    $allStudents = $rs->fetchall(PDO::FETCH_ASSOC);
//    foreach ($allStudents as $row){
//        echo $row['sname'];
//    }
    $_SESSION['maxPage'] = $maxPage;
    $_SESSION['allStudents'] = $allStudents;
    $_SESSION['page'] = $page;
    $_SESSION['count'] = $count;
    $_SESSION['pageSize'] = $pageSize;
    header('location:../views/specialStudentList.php');