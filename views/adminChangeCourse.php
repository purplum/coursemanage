<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle(ADMINPAGENAME) ?>
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

            <h2 class="mbx">课程 &gt; 编辑课程 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">课程信息</a></li>
                </ul>

            </div>
            <div class="cztable">
                <form action="../actions/adminChangeCourseCore.php" method="post">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right" width="80">课程名称：</td>
                            <td><?php $course_info=$_SESSION['course_info'][0]; echo $course_info['cname']?></td>
                            <td align="right" width="90">课程老师：</td>
                            <td><?php $course_info=$_SESSION['course_info'][0]; echo $course_info['cteacher']?></td>
                        </tr>

                        <tr>
                            <td align="right">开课时间：</td>
                            <td><?php $course_info=$_SESSION['course_info'][0]; echo $course_info['ctime']?></td>
                            <td align="right">最大人数：</td>
                            <td><input type="text" value="<?php $course_info=$_SESSION['course_info'][0]; echo $course_info['cmax']?>" style="height: 25px;" name="cmax"</td>

                        </tr>
                        <tr>
                            <td align="right">可选年级：</td>
<!--                            <td>--><?php //$course_info=$_SESSION['course_info'][0]; echo $course_info['callowgrade']?><!--</td>-->
                            <td>
                                <select class="form-control" name="callowgrade" >
                                    <option value ="0" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='0') { echo "selected=true"; }   ?>>全部</option>
                                    <option value ="1" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='1') { echo "selected=true"; }   ?>>一年级</option>
                                    <option value ="2" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='2') { echo "selected=true"; }   ?>>二年级</option>
                                    <option value ="3" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='3') { echo "selected=true"; }   ?>>三年级</option>
                                    <option value ="4" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='4') { echo "selected=true"; }   ?>>四年级</option>
                                    <option value ="5" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['callowgrade']=='5') { echo "selected=true"; }   ?>>五年级</option>
                                </select>
                            </td>
                            <td align="right">地点：</td>
                            <td><input type="text" value="<?php $course_info=$_SESSION['course_info'][0]; echo $course_info['clocation']?>" style="height: 25px;" name="clocation"</td>

                        </tr>
                        <tr>
                            <td align="right">是否有效:</td>

                            <td>
                                <select class="form-control" name="cvalid" >
                                    <option value ="0" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['cvalid']=='0') { echo "selected=true"; }   ?>>有效</option>
                                    <option value ="1" <?php $course_info=$_SESSION['course_info'][0]; if ($course_info['cvalid']=='1') { echo "selected=true"; }   ?>>无效</option>
                                </select>
                            </td>
                            <td align="right">其他：</td>
                            <td></td>

                        </tr>
                        <tr align="center">
                            <td colspan="5" height="40">
                                <div align="center">

                                    <input type="submit" id="button2" value="保存"  class="input2" style="font-size: 17px;" />
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
