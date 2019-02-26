<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>登录验证</title>
    <script src="../themes/layer/layer.js"></script>
    <script src="../js/jquery-1.11.3.min.js"></script>

</head>
<body>
<?php
    session_start();
    $name = file_get_contents("php://input");
    echo $name;
    parse_str($name, $data);
    var_export($data);
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');
    /*$rs = $db->query('select * from student');
    print_r($rs->fetchall(PDO::FETCH_ASSOC));*/
    $personid = $data['username'];
    $shenfen = $data['shenfen'];

//    $yzm = $data['yzm'];
//    echo "xxx" . $_SESSION["helloweba_num"];
//    echo "yzm=" . $yzm;
//    if ($_SESSION["helloweba_num"] != $yzm) {
//        echo "<script>";
//        echo "alert(\"验证码输入有误，请重新登录\");";
//        echo "location.href=\"login.php\"";
//        echo "</script>";
//    }
    if ($shenfen == "student") {
//        $rs = $db->query("select * from student WHERE spersonid='$personid' and spassword='$password'");
        $rs = $db->query("select * from student WHERE spersonid='$personid' AND isreg='0' ");
        $num_rows = $rs->rowCount();
        if ($num_rows > 0) {
            echo "登录成功";
            session_start();
            $rs2 = $db->query("select sid,sname,studentid,spersonid,sgrade,sclass,semail,stel,saddress,sgender,isreg from student WHERE spersonid = '$personid'");
            $jieguo = $rs2->fetch();
            $sid = $jieguo['sid'];
            $xingming = $jieguo['sname'];
            $studentid = $jieguo['studentid'];
            $sgrade = $jieguo['sgrade'];
            $sclass = $jieguo['sclass'];
            $email = $jieguo['semail'];
            $stel = $jieguo['stel'];
            $saddress = $jieguo['saddress'];
            $sgender = $jieguo['sgender'];
            $_SESSION['sid'] = $sid;
            $_SESSION['studentid'] = $studentid;
            $_SESSION['personid'] = $personid;
            $_SESSION['username'] = $xingming;
            $_SESSION['sgrade'] = $sgrade;
            $_SESSION['sclass'] = $sclass;
            $_SESSION['email'] = $email;
            $_SESSION['stel'] = $stel;
            $_SESSION['saddress'] = $saddress;
            $_SESSION['sgender'] = $sgender;
            $_SESSION['isreg'] = $isreg;
            header('location:../views/index2.php');
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>";
            echo "<script charset='utf-8' type='text/javascript' >";
            echo "alert(\"用户名未注册或身份证输入错误，请完成注册重新登录\");";
            echo "location.href=\"../login.php\"";
            echo "</script>";
        }
    }else {
        echo "教师";
        $password = $data['password'];
        $rs = $db->query("select * from teacher WHERE tid='$personid' and tpassword='$password'");
        $num_rows = $rs->rowCount();
        if ($num_rows > 0) {
            echo "登录成功";
            $rs2 = $db->query("select tname from teacher WHERE tid = '$personid'");
            $jieguo = $rs2->fetch();
            $xingming = $jieguo['tname'];

            $_SESSION['tid'] = $personid;
            echo "tid=".$personid;
            $_SESSION['tname'] = $xingming;

            header('location:../views/teacherMain.php');
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>";
            echo "<script charset='utf-8' type='text/javascript' >";
            echo "alert(\"错误的用户名或者密码，请重新登录\");";
            echo "location.href=\"../login.php\"";
            echo "</script>";
        }
    }
?>
</body>
</html>
