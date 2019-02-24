<?php
    session_start();

    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

$pageSize = 10;

$res = $db->query('SELECT count(*) FROM course');

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
    $cou = $db->query("select * from course LIMIT $lim,$pageSize");
    $allCourses = $cou->fetchAll();

    $_SESSION['allCourses'] = $allCourses;

$_SESSION['maxPage'] = $maxPage;
$_SESSION['page'] = $page;
$_SESSION['count'] = $count;
$_SESSION['pageSize'] = $pageSize;

    header('location:../views/courselist.php');