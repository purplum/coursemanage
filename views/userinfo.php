
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include_once("../controller/functions.php");displayTitle('') ?>

    <link rel="shortcut icon" href="../favicon.ico">


    <link href="../themes/Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
    <link href="../themes/Style/ks.css" rel="stylesheet" type="text/css" />
    <link href="../themes/Style/StudentStyle.css" rel="stylesheet"  />

    <script src="../themes/Script/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/jquery.jBox-2.3.min.js" type="text/javascript"></script>
    <script src="../themes/Script/jBox/i18n/jquery.jBox-zh-CN.js" type="text/javascript"></script>
    <script src="../themes/Script/Common.js" type="text/javascript"></script>
    <script src="../themes/Script/Data.js" type="text/javascript"></script>

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

            <h2 class="mbx">个人中心 &gt; 我的信息 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">个人资料</a> </li>
                </ul>

            </div>
            <div class="cztable">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" width="80">姓名：</td>
                        <td><?php echo $_SESSION['username']?></td>
                        <td align="right" width="90">学号：</td>
                        <td><?php echo $_SESSION['studentid']?>&nbsp;</td>

<!--                        <td rowspan="4"><div align="center"><img id="pic_face"  height="160" width="120" src="images/--><?php //echo $_SESSION['stx'] ?><!--" style="padding:2px 2px 5px; border:1px #ddd solid;"></div>&nbsp;</td>-->
                    </tr>

<!--                    <tr>-->
<!--                        <td colspan="4" align="left">联系方式（如联系方式有变动请及时修改，以便能及时联系到你。谢谢！）</td>-->
<!---->
<!--                    </tr>-->
                    <tr>
                        <td align="right">身份证号码：</td>
                        <td><?php echo $_SESSION['personid']?></td>
                        <td align="right">手机号码：</td>
                        <td><?php echo $_SESSION['stel']?></td>

                    </tr>
                    <tr>
                        <td align="right">入学年份:</td>
                        <td><?php echo $_SESSION['sgrade']?></td>
                        <td align="right">班级:</td>
                        <td><?php echo $_SESSION['sclass']?></td>


                    </tr>
                    <tr>
                        <td align="right">性别:</td>
                        <td><?php echo $_SESSION['sgender']?></td>
                        <td align="right">其他:</td>
                        <td><?php echo $_SESSION['pageSize']?></td>
                    </tr>
                    <tr>
                        <td align="right">电子邮箱：</td>
                        <td><?php echo $_SESSION['email']?>&nbsp;</td>
                        <td align="right">联系地址：</td>
                        <td colspan="4"><?php echo $_SESSION['saddress']?></td>
                    </tr>
                    <tr align="center">
                        <td colspan="5" height="40">
                            <div align="center">

                                <input type="button" id="button2" value="联系方式有修改" onclick="submitMail()" class="input2" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    
    <script>
        function submitMail() {
            location = "changeInfo.php";
        }
    </script>
    
    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
