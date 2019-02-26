<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle(ADMINPAGENAME) ?>
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
<body>


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
        <?php include_once("../controller/functions.php");displayTeacherLeftbox() ?>

        <div class="rightbox">

            <h2 class="mbx">成绩 &gt; 成绩录入 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">个人资料</a></li>
                </ul>

            </div>
            <div class="cztable">
                <form action="../actions/luruScoreMySQL.php" method="post">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <?php if (!empty($_SESSION['chengji'])) { ?>
                            <?php foreach ($_SESSION['chengji'] as $row) { ?>
                                <tr>
                                    <td align="right" width="80">课程名：</td>
                                    <td width="180"><?php echo $row['cname'] ?></td>
                                    <td align="right" width="90">学生名：</td>
                                    <td><?php echo $row['sname'] ?>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" width="80" colspan="2">成绩录入：</td>
                                    <td align="left" width="200" colspan="2"><input type="text" name="score"/></td>
                                </tr>

                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="9">您的课程暂时没有学生报名！</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td align="center" colspan="4"><input value="录入" type="submit" style="font-size: 20px;"/>
                            </td>

                        </tr>

                    </table>
                </form>
            </div>

        </div>
        <div class="footer">
            <?php include_once("../controller/functions.php");displayFooter() ?>
        </div>
    </div>

</body>
</html>
