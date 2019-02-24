<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('统计') ?>
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

                <?php session_start(); $sid = $_SESSION['tname'];echo $sid ?>老师，欢迎您！
                <a href="adminlogout.php">安全退出</a>
            </div>
            <?php include_once("../controller/admin.php");displayTeacherHeaderNavi() ?>
        </div>
    </div>
</div>

<div class="page">
    <div class="box mtop">
        <?php include_once("../controller/admin.php");displayTeacherLeftbox() ?>
        <div class="rightbox">

            <h2 class="mbx">统计 &gt; 选课数据 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">

                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">学生数据</a></li>
                </ul>
            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th style="width: 12%; text-align: center;">
                            已注册学生数
                        </th>
                        <th style="width: 12%; text-align: center;">
                            已选课学生数
                        </th>

                    </tr>
                    <tr>
                        <td >
                            <?php echo $_SESSION['reg_count'] ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['choose_course_count'] ?>
                        </td>
                    </tr>


                </table>

            </div>

            <div class="morebt">

                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">课程数据</a></li>
                </ul>
            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th style="width: 12%; text-align: center;">
                            已注册课程数
                        </th>
                        <th style="width: 12%; text-align: center;">
                            课程总人数
                        </th>
                        <th style="width: 12%; text-align: center;">
                            课程已选人数
                        </th>
                        <th style="width: 12%; text-align: center;">
                            选课率
                        </th>

                    </tr>
                    <tr>
                        <td >
                            <?php echo $_SESSION['course_all_rs_count'] ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['course_max_data'] ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['course_min_data'] ?>
                        </td>
                        <td>
                            <?php echo round($_SESSION['course_min_data']/$_SESSION['course_max_data']*100,2)."％" ?>
                        </td>
                    </tr>


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
