<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('') ?>
    <link rel="shortcut icon" href="../favicon.ico">

    <link href="../themes/Style/StudentStyle.css" rel="stylesheet" type="text/css"/>
    <link href="../themes/Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css"/>
    <link href="../themes/Style/ks.css" rel="stylesheet" type="text/css"/>
    <script src="../themes/Script/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/jquery.jBox-2.3.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/i18n/jquery.jBox-zh-CN.js" type="text/javascript"></script>
    <script src="../themes/Script/Common.js" type="text/javascript"></script>
    <script src="../themes/Script/Data.js" type="text/javascript"></script>
    <script type="text/javascript">

    </script>

    <script type="text/javascript">

    </script>
</head>
<body class="style-3">

<div class="banner">
    <div class="bgh">
        <div class="page">
            <?php include_once("../controller/functions.php");displayHeaderLogo() ?>
            <div class="topxx">

                <?php session_start(); $sid = $_SESSION['studentid'];echo $sid ?>  学生：<?php $sid = $_SESSION['username'];echo $sid ?>，欢迎您！
                <a href="logout.php">安全退出</a>
            </div>
            <?php include_once("../controller/functions.php");displayHeaderNavi() ?>
        </div>
    </div>
</div>

<div class="page">
    <div class="box mtop">
        <?php include_once("../controller/functions.php");displayLeftBox() ?>
        <div class="rightbox">

            <h2 class="mbx">课程 &gt; 我的课程 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">我的课程</a></li>
                </ul>

            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th width="6%">课程号</th>
                        <th style="padding-left: 20px;width: 10%;">
                            课程名称
                        </th>
                        <th style="width: 6%; text-align: center;">
                            老师
                        </th>
                        <th style="width: 5%; text-align: center;">
                            开课时间
                        </th>
                        <th style="width: 9%; text-align: center;">
                            已选/最大人数
                        </th>
                        <th style="width: 5%; text-align: center;">
                            学时
                        </th>
                        <th style="width: 10%; text-align: center;">
                            地点
                        </th>

                    </tr>
                    <?php if (!empty($_SESSION['$myCourses'])) { ?>
                        <?php foreach ($_SESSION['$myCourses'] as $row) { ?>
                            <tr>
                                <td class="xxleft">
                                    <?php echo $row['cid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['cname'] ?>
                                </td>
                                <td>
                                    <?php
                                    $tid = $row['cteacher'];
                                    include("../db/db_properties.php");
                                    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
                                    $db->query('set names utf8');
                                    $rs = $db->query("select tname from teacher where tid = '$tid'");
                                    $arr = $rs->fetchAll();
                                    $tname = $arr[0]['tname'];
                                    echo $tname;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['ctime'] ?>
                                </td>
                                <td>
                                    <?php echo $row['ccurrent'] ?>/<?php echo $row['cmax'] ?>
                                </td>
                                <td>
                                    <?php echo $row['cxueshi'] ?>
                                </td>
                                <td>
                                    <?php echo $row['clocation'] ?>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">尚未选择课程，请选课！</td>
                        </tr>
                    <?php } ?>


                </table>


            </div>

        </div>
    </div>

    <script>
        function gonewpage() {
            var page = document.getElementById("john_Page_Search").value;
            location = "chooseCourseCore.php?page=" + page;
        }
    </script>

    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
