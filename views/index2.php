
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('首页') ?>

    <link rel="shortcut icon" href="../favicon.ico">

    <link href="../themes/Style/StudentStyle.css" rel="stylesheet" type="text/css"/>
    <link href="../themes/Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css"/>
    <link href="../themes/Style/ks.css" rel="stylesheet" type="text/css"/>

    <script src="../themes/Script/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/jquery.jBox-2.3.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/i18n/jquery.jBox-zh-CN.js" type="text/javascript"></script>
    <script src="../themes/Script/Common.js" type="text/javascript"></script>
    <script src="../themes/Script/Data.js" type="text/javascript"></script>

    <script src="../themes/Script/changeOption.js" type="text/javascript"></script>
    <script src="../themes/Script/rl.js" type="text/javascript"></script>
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

            <h2 class="mbx">
                徐汇区逸夫小学俱乐部报名系统&nbsp;&nbsp;&nbsp;&nbsp;</h2>

<!--            <div class="dhbg" style="align-content: center;">-->
<!--                欢迎使用徐汇区逸夫小学俱乐部报名系统&nbsp;&nbsp;-->
<!--                报名注意事项-->
<!--                                -->
<!--            </div>-->
            <div class="alert alert-success" role="alert"><center><h2><strong>报名注意事项</strong></h2></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>1. 请确认学生姓名，学号，身份证号码正确</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>2. 请确认学生是否已加入俱乐部，已加入俱乐部学生将无法进行课程选择</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>3. 如果选课失败，请及时联系课程老师</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>4. 选课系统仅在课程开放时间内开启，开放时间请留意负责老师通知</strong></h3></center></div>

        </div>
    </div>
    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>

</body>
</html>
