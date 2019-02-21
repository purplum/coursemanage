<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('') ?>
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
            <div id="logo">
                <a href="">
                    <img src="../themes/images/yf/yfschool.jpg" alt="" width="160" height="70" />
                </a>
            </div>
            <div class="topxx">

                <?php $sid = $_SESSION['studentid'];echo $sid ?>学员：<?php $sid = $_SESSION['username'];echo $sid ?>，欢迎您！
                <a href="logout.php">安全退出</a>
            </div>
            <div class="blog_nav" style="margin-top: 40px;">
                <ul>
                    <li><a href="index2.php">首页</a></li>
                    <li><a href="userinfo.php">个人中心</a></li>
                    <li><a href="../actions/myCoursesCore.php">课程</a></li>
                    <li><a href="../actions/chooseCourseCore.php">选课</a></li>
                    <li><a href="../actions/score.php">成绩</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="page">
    <div class="box mtop">
        <div class="leftbox">
            <div class="l_nav2">
                <div class="ta1">
                    <strong>个人中心</strong>
                    <div class="leftbgbt">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="userinfo.php">我的信息</a></div>
                    <div>
                        <a href="changeInfo.php">修改信息</a></div>

                </div>
                <div class="ta1">
                    <strong>课程</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/myCoursesCore.php">我的课程</a></div>
                </div>
                <div class="ta1">
                    <strong>选课</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/chooseCourseCore.php">在线选课</a></div>
                    <div>
                        <a href="../actions/DelmyCoursesCore_Bef.php">在线退课</a></div>
                </div>

                <div class="ta1">
                    <strong>成绩</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/score.php">成绩查询</a></div>
                </div>
                <div class="ta1">
                    <a href="#"
                       target="_blank"><strong>教学系统</strong></a>
                    <div class="leftbgbt2">
                    </div>
                </div>
            </div>
        </div>
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
