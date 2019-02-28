<?php
    session_start();
    /* $name = file_get_contents("php://input");
     echo $name;
     parse_str($name, $data);
     var_export($data);*/

if(!isset($_SESSION['studentid'])) {
    echo "[Session timeout!]";
    echo "<script>";
    echo "alert(\"[Session timeout!] \");";
    echo "location.href=\"../login.php\"";
    echo "</script>";
}

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $pageSize = 10;
    $current_year=date("Y");
    //查询所有记录的行数
    $res = $db->query("SELECT count(*) FROM course WHERE ctime='$current_year' AND cvalid='0' ");

    //print_r($res->fetchall(PDO::FETCH_ASSOC));
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
    $rs = $db->query("select * from course WHERE ctime='$current_year' AND cvalid='0' LIMIT $lim,$pageSize");
    $courses = $rs->fetchall(PDO::FETCH_ASSOC);
    /*foreach ($courses as $row){
        echo $row['cname'];
    }*/
    $_SESSION['maxPage'] = $maxPage;
    $_SESSION['courses'] = $courses;
    $_SESSION['page'] = $page;
    $_SESSION['count'] = $count;
    $_SESSION['pageSize'] = $pageSize;
    header('location:../views/chooseCourse.php');