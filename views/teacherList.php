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

            <h2 class="mbx">教师 &gt; 全部教师列表 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">全部教师</a></li>
                </ul>

            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th width="4%">教师编号</th>
                        <th style="padding-left: 18px;width: 8%;">
                            教师姓名
                        </th>
                        <th style="width: 4%; text-align: center;">
                            操作
                        </th>

                    </tr>
                    <?php if (!empty($_SESSION['allTeachers'])) { ?>
                        <?php foreach ($_SESSION['allTeachers'] as $row) { ?>
                            <tr>
                                <td class="xxleft">
                                    <?php echo $row['tid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['tname'] ?>
                                </td>
                                <td>
                                    <a href="../actions/delTeacherCore.php?tid=<?php echo $row['tid'] ?>&page=<?php echo $_SESSION['page'] ?>">删除</a>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">没有教师数据</td>
                        </tr>
                    <?php } ?>


                </table>

                <div class='MainStyle'>
                    <div class=''><a href='../actions/teacherListCore.php?page=1'
                                     target='_self'>首页</a></div>
                    <div class=''><a href="../actions/teacherListCore.php?page=<?php echo($_SESSION['page'] - 1) ?> "
                                     target='_self'>上一页</a></div>

                    <div class=''><a href="../actions/teacherListCore.php?page=<?php echo($_SESSION['page'] + 1) ?> "
                                     target='_self'>下一页</a></div>
                    <div class=''><a href="../actions/teacherListCore.php?page=<?php echo $_SESSION['maxPage'] ?> "
                                     target='_self'>尾页</a></div>
                    <div class=''>总共<b><?php echo $_SESSION['count'] ?></b>条数据</div>
                    <div class=''>每页<b><?php echo $_SESSION['pageSize'] ?></b>条数据</div>
                    <div class=''><b><?php echo $_SESSION['page'] ?></b>/<?php echo $_SESSION['maxPage'] ?></div>
                    <div class='SearchStyle'>
                        <input type='text' id='john_Page_Search'/>
                    </div>
                    <div class=''>
                        <input type='button' value='Go' onclick="gonewpage()" />
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        function gonewpage() {
            var page = document.getElementById("john_Page_Search").value;
            location = "teacherListCore.php?page=" + page;
        }
    </script>

    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
