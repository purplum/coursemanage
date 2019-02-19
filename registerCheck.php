<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/5
 * Time: 15:25
 */


    $name = file_get_contents("php://input");
    echo $name;
    parse_str($name, $data);
    var_export($data);
    include("db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');
    /*$rs = $db->query('select * from student');
    print_r($rs->fetchall(PDO::FETCH_ASSOC));*/

    $username = $data['name'];
    $studentid = $data['studentid'];
    $personid = $data['personid'];
    $sgrade = $data['sgrade'];
    $sclass = $data['sclass'];
    $stel = $data['stel'];
    $saddress = $data['saddress'];
    $email = $data['email'];
    $password = $data['password'];

    $rs_1 = $db->query("select * from student WHERE spersonid='$personid'");
    $num_rows = $rs_1->rowCount();
    if ($num_rows > 0) {
        echo "<script>";
        echo "alert(\"重复注册！您的身份证号已注册！\");";
        echo "location.href=\"chooseCourse.php\"";
        echo "</script>";
    } else {
        $n = $db->query("insert into student(sname,studentid,spersonid,sgrade,sclass,stel,saddress,semail,spassword) VALUES('$username','$studentid','$personid','$sgrade','$sclass','$stel','$saddress','$email','$password')");
        if ((int)$n > 0) {
            echo "<script>";
            echo "alert(\"注册成功\");";
            echo "location.href=\"login.php\"";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert(\"注册失败！\");";
            echo "location.href=\"sign-up.php\"";
            echo "</script>";
        }
    }


?>