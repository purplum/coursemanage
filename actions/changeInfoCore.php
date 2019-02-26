<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2017/6/6
     * Time: 8:35
     */
    session_start();

    $name = file_get_contents("php://input");
    parse_str($name, $data);
    var_export($data);
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

//    $rs = $db->query('select * from student');
//    print_r($rs->fetchall(PDO::FETCH_ASSOC));

    $stel = $data['stel'];
    $sgrade = $data['sgrade'];
    $sclass = $data['sclass'];
    $semail = $data['email'];
    $saddress = $data['saddress'];
    $studentid = $_SESSION['studentid'];
    $n = $db->query("update student set stel='$stel',sgrade='$sgrade',sclass='$sclass',semail='$semail',saddress='$saddress' WHERE studentid='$studentid'");
    if((int)$n>0){
        $_SESSION['email'] = $semail;
        $_SESSION['stel'] = $stel;
        $_SESSION['sgrade'] = $sgrade;
        $_SESSION['sclass'] = $sclass;
        $_SESSION['studentid'] = $studentid;
        $_SESSION['saddress'] = $saddress;
        echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>";
        echo "<script charset='utf-8' type='text/javascript' >";
        echo "alert(\"修改信息成功！\");";
        echo "location.href=\"../views/userinfo.php\"";
        echo "</script>";
    }else{
        echo "修改失败！";
    }
?>
