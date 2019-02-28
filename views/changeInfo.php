<?php
    session_start();

if(!isset($_SESSION['studentid'])) {
    echo "[Session timeout!]";
    echo "<script>";
    echo "alert(\"[Session timeout!] \");";
    echo "location.href=\"../login.php\"";
    echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include_once("../controller/functions.php");displayTitle(USERPAGENAME) ?>
    <link rel="shortcut icon" href="../favicon.ico">

    <link href="../themes/Style/StudentStyle.css" rel="stylesheet" type="text/css" />
    <link href="../themes/Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
    <link href="../themes/Style/ks.css" rel="stylesheet" type="text/css" />

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

            <h2 class="mbx">个人中心 &gt; 修改信息 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">个人资料</a> </li>
                </ul>

            </div>
            <div class="cztable">
                <form action="../actions/changeInfoCore.php" method="post">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right" width="80">姓名：</td>
                            <td><?php echo $_SESSION['username']?></td>
                            <td align="right" width="90">学号：</td>
                            <td><input type="text" value="<?php echo $_SESSION['studentid']?>" style="height: 25px;" name="studentid"></td>

                        </tr>

                        <tr>
                            <td align="right">身份证号码：</td>
                            <td><?php echo $_SESSION['personid']?></td>
                            <td align="right">手机号码：</td>
                            <td><input type="text" value="<?php echo $_SESSION['stel']?>" style="height: 25px;" name="stel"></td>

                        </tr>
                        <tr>
                            <td align="right">入学年份:</td>

                            <td>
                                <select class="form-control" name="sgrade" id="sgrade">
                                    <option></option>
                                    <option value ="2019" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2019') { echo "selected=true"; }   ?>>2019</option>
                                    <option value ="2018" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2018') { echo "selected=true"; }   ?>>2018</option>
                                    <option value ="2017" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2017') { echo "selected=true"; }   ?>>2017</option>
                                    <option value ="2016" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2016') { echo "selected=true"; }   ?>>2016</option>
                                    <option value ="2015" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2015') { echo "selected=true"; }   ?>>2015</option>
                                    <option value ="2014" <?php $course_info=$_SESSION['sgrade']; if ($course_info=='2014') { echo "selected=true"; }   ?>>2014</option>
                                </select>
                            </td>
                            <td align="right">班级:</td>
                            <td><input type="text" value="<?php echo $_SESSION['sclass']?>" style="height: 25px;" name="sclass"></td>

                        </tr>

                        <tr>
                            <td align="right">性别:</td>
                            <td>
                                <select class="form-control" name="sgender" id="sgender">
                                    <option></option>
                                    <option value ="male" <?php $sutdentGender=$_SESSION['sgender']; if ($sutdentGender=='male') { echo "selected=true"; }   ?>>男</option>
                                    <option value ="female" <?php $sutdentGender=$_SESSION['sgender']; if ($sutdentGender=='female') { echo "selected=true"; }   ?>>女</option>
                                </select>
                            </td>
                            <td align="right">其他:</td>
                            <td><?php echo $_SESSION['pageSize']?></td>
                        </tr>

                        <tr>

                            <td align="right">电子邮箱：</td>
                            <td><input type="text" value="<?php echo $_SESSION['email']?>" style="height: 25px;" name="email"></td>
                            <td align="right">联系地址：</td>
                            <td><input type="text" value="<?php echo $_SESSION['saddress']?>" style="height: 25px;" name="saddress"></td>

                        </tr>
                        <tr align="center">
                            <td colspan="5" height="40">
                                <div align="center">

                                    <input type="submit" id="button2" value="确认修改" class="input2" style="font-size: 17px;" />
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
            location = ""
        }
    </script>
    
    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
