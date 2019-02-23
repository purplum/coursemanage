
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include_once("../controller/functions.php");displayTitle('导入') ?>
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

            <h2 class="mbx">学生 &gt; 导入学生 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">
                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">导入学生</a> </li>
                </ul>
            </div>
            <div class="cztable">
                <form action="../actions/addTeacherCore.php" method="post">
                    <table width="80%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left" width="60%">表格数据起始行：</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td align="left" width="60%">表格数据列数：</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td align="left" width="60%">表格数据起始页：</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td align="left" width="60%">数据页数：</td>
                            <td>5</td>
                        </tr>
                        <tr>

                        <td align="center" width="160px;" colspan="2">
                            <input type="submit" name="add" value="修改" align="center"/>
                        </td>
                        </tr>
                    </table>
                </form>
            </div>
            <form action="../actions/importStudentCore.php" enctype="multipart/form-data" method="post">
                <input type="file" name="excel_file" class="input">
                <button class="btn btn-primary" type="submit">上传</button>
            </form>

            <div class="morebt">
                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">导入特殊学生</a> </li>
                </ul>
            </div>
            <div class="cztable">
                <form action="../actions/addTeacherCore.php" method="post">
                    <table width="80%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left" width="60%">表格数据起始行：</td>
                            <td>2</td>
                        </tr>
                    </table>
                </form>
            </div>
            <form action="../actions/importSpecialStudentCore.php" enctype="multipart/form-data" method="post">
                <input type="file" name="excel_special_file" class="input">
                <button class="btn btn-primary" type="submit">上传</button>
            </form>


        </div>
    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>

</body>
</html>
