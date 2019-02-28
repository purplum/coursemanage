
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('首页') ?>

    <link rel="shortcut icon" href="../favicon.ico">

    <link href="../themes/custom/button.css" rel="stylesheet" type="text/css"/>
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
            <div class="alert alert-success" role="alert"><h3><strong>1.请确认学生班级、姓名、学号、身份证（港澳台、外籍）号码是否正确。同一身份选课不超过一门。</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>2.选课人数超过科目限额将无法选课，请选择未满名额的俱乐部。</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>3.如俱乐部指导老师已与学生确认选课名单，系统将默认学生已选课。</strong></h3></center></div>
            <br />
            <div class="alert alert-success" role="alert"><h3><strong>4.未参与俱乐部选课的学生，管理员有权为该生随机分配俱乐部。</strong></h3></center></div>
        <br />
            <div class="alert alert-success" role="alert"><h3><strong>5.系统开放期间学生选课成功亦可退课重选，系统关闭后不可选课或退课重选。</strong></h3></center></div>
<br />
            <div class="alert alert-success" role="alert"><h3><strong>6.特殊原因导致的选课失败，请学生到校后与管理员（杜老师）联系。</strong></h3></center></div>
<br />
            <div class="alert alert-success" role="alert"><h3><strong>7.如遇选课高峰请学生耐心等待或错峰选课。</strong></h3></center></div>
<br />
            <div class="alert alert-success" role="alert"><h3><strong>8.选课成功将以班级为单位公布俱乐部名单，最终名单以实际公布为准。</strong></h3></center></div>

            <br />
            <br />
            <div align="center">
                <a href="../actions/chooseCourseCore.php" class="commonbutton">开始选课 --> </a>
            </div>
        </div>


    </div>
    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>

</body>
</html>
