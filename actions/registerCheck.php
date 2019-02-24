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
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');
    /*$rs = $db->query('select * from student');
    print_r($rs->fetchall(PDO::FETCH_ASSOC));*/

    $username = $data['name'];
    $studentid = $data['studentid'];
    $personid = $data['personid'];
    $sgrade = $data['sgrade'];
    $sclass = $data['sclass'];
    $gender = $data['gender'];
    $stel = $data['stel'];

//    $saddress = $data['saddress'];
//    $email = $data['email'];
//    $password = $data['password'];

$rs_exist = $db->query("select * from student WHERE spersonid='$personid' ");
$num_exist_rows = $rs_exist->rowCount();
if ($num_exist_rows == 0) {
    echo "<script>";
    echo "alert(\"注册失败, 没有您的身份信息！请确认身份证号码输入正确或与老师联系 \");";
    echo "location.href=\"../views/sign-up.php\"";
    echo "</script>";
} else {

    $rs_1 = $db->query("select * from student WHERE spersonid='$personid' and isreg='0' ");
    $num_rows = $rs_1->rowCount();
    if ($num_rows > 0) {
        echo "<script>";
        echo "alert(\"重复注册！您的身份证号已注册！\");";
        echo "location.href=\"../login.php\"";
        echo "</script>";
    } else {

        $rs_auth_1 = $db->query("select * from student WHERE spersonid='$personid' and isreg='1' ");
        $num_auht_rows = $rs_auth_1->rowCount();

        if($num_auht_rows > 0) {
            $n_new_auth = $db->query("update student set sname='$username',studentid='$studentid',sgrade='$sgrade',sclass='$sclass',stel='$stel',sgender='$gender',isreg='0' WHERE spersonid='$personid'");

            if ((int)$n_new_auth > 0) {
                echo "<script>";
                echo "alert(\"注册成功\");";
                echo "location.href=\"../login.php\"";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert(\"注册失败！\");";
                echo "location.href=\"../views/sign-up.php\"";
                echo "</script>";
            }
        }

//        $n = $db->query("insert into student(sname,studentid,spersonid,sgrade,sclass,stel,sgender) VALUES('$username','$studentid','$personid','$sgrade','$sclass','$stel','$gender')");

    }
}




?>