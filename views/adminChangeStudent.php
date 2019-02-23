<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('管理') ?>
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

            <h2 class="mbx">学生 &gt; 编辑学生 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">学生信息</a></li>
                </ul>

            </div>
            <div class="cztable">
                <form action="../actions/changeInfoCore.php" method="post">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right" width="80">姓名：</td>
                            <td><?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['sname']?></td>
                            <td align="right" width="90">学号：</td>
                            <td><?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['studentid']?></td>
                        </tr>

                        <tr>
                            <td align="right">身份证号码：</td>
                            <td><?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['spersonid']?></td>
                            <td align="right">手机号码：</td>
                            <td><?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['stel']?></td>

                        </tr>
                        <tr>
                            <td align="right">是否特殊:</td>
                            <td><input type="text" value="<?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['isspecial']?>" style="height: 25px;" name="isspecial"</td>
                            <td align="right">特殊原因:</td>
                            <td><input type="text" value="<?php $studentinfo=$_SESSION['studentinfo'][0]; echo $studentinfo['specialreason']?>" style="height: 25px;" name="special_reason"</td>

                        </tr>
                        <tr align="center">
                            <td colspan="5" height="40">
                                <div align="center">

<!--                                    <input type="submit" id="button2" value="确认修改" onclick="submitMail()" class="input2" style="font-size: 17px;" />-->
                                    <a href="../actions/chooseCourseCheck.php?cid=<?php echo $row['cid'] ?>&sid=<?php echo $_SESSION['sid'] ?>">保存</a>
                                    <a href="../actions/chooseCourseCheck.php?cid=<?php echo $row['cid'] ?>&sid=<?php echo $_SESSION['sid'] ?>">取消</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>

    <script>
        function submitMail() {
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
