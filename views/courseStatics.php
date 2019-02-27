<?php
session_start();

if(!isset($_SESSION['tid'])) {
    echo "[Session timeout!]";
    echo "<script>";
    echo "alert(\"[Session timeout!] \");";
    echo "location.href=\"../admin.php\"";
    echo "</script>";
}

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

            <h2 class="mbx">课程 &gt; 全部课程列表 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">课程选课信息</a></li>
                </ul>

            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th width="4%">编号</th>
                        <th style="padding-left: 18px;width: 6%;">
                            姓名
                        </th>
                        <th style="width: 6%; text-align: center;">
                            学籍号
                        </th>
                        <th style="width: 14%; text-align: center;">
                            身份证号码
                        </th>
                        <th style="width: 5%; text-align: center;">
                            入学年
                        </th>
                        <th style="width: 4%; text-align: center;">
                            班级
                        </th>
                        <th style="width: 4%; text-align: center;">
                            性别
                        </th>
                        <th style="width: 5%; text-align: center;">
                            邮箱
                        </th>
                        <th style="width: 5%; text-align: center;">
                            电话
                        </th>
                        <th style="width: 5%; text-align: center;">
                            地址
                        </th>
                        <th style="width: 4%; text-align: center;">
                            特定
                        </th>
                        <th style="width: 8%; text-align: center;">
                            特定原因
                        </th>

                    </tr>
                    <?php if (!empty($_SESSION['allStaticsStudents'])) { ?>
                        <?php foreach ($_SESSION['allStaticsStudents'] as $row) { ?>
                            <tr>
                                <td class="xxleft">
                                    <?php echo $row['student.sid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['student.sname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['student.studentid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['student.spersonid'] ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.sgrade'])) { echo ''; } else { echo $row['student.sgrade']; }  ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.sclass'])) { echo ''; } else { echo $row['student.sclass']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.sgender']) || $row['student.sgender']=='male') { echo '男'; } else { echo '女'; }  ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.semail'])) { echo ''; } else { echo $row['student.semail']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.stel'])) { echo ''; } else { echo $row['student.stel']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['student.saddress'])) { echo ''; } else { echo $row['student.saddress']; } ?>
                                </td>
                                <td id="td_isspecial" >
                                    <?php if (empty($row['student.isspecial']) || $row['student.isspecial']=='0') { echo '否'; } else { echo '是'; }  ?>
                                </td>
                                <td id="td_specialreason">
                                    <?php if (empty($row['student.specialreason'])) { echo ''; } else { echo $row['student.specialreason']; } ?>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">没有学生数据</td>
                        </tr>
                    <?php } ?>


                </table>

<!--                <div class='MainStyle'>-->
<!--                    <div class=''><a href='../actions/courseListCore.php?page=1'-->
<!--                                     target='_self'>首页</a></div>-->
<!--                    <div class=''><a href="../actions/courseListCore.php?page=--><?php //echo($_SESSION['page'] - 1) ?><!-- "-->
<!--                                     target='_self'>上一页</a></div>-->
<!---->
<!--                    <div class=''><a href="../actions/courseListCore.php?page=--><?php //echo($_SESSION['page'] + 1) ?><!-- "-->
<!--                                     target='_self'>下一页</a></div>-->
<!--                    <div class=''><a href="../actions/courseListCore.php?page=--><?php //echo $_SESSION['maxPage'] ?><!-- "-->
<!--                                     target='_self'>尾页</a></div>-->
<!--                    <div class=''>总共<b>--><?php //echo $_SESSION['count'] ?><!--</b>条数据</div>-->
<!--                    <div class=''>每页<b>--><?php //echo $_SESSION['pageSize'] ?><!--</b>条数据</div>-->
<!--                    <div class=''><b>--><?php //echo $_SESSION['page'] ?><!--</b>/--><?php //echo $_SESSION['maxPage'] ?><!--</div>-->
<!--                    <div class='SearchStyle'>-->
<!--                        <input type='text' id='john_Page_Search'/>-->
<!--                    </div>-->
<!--                    <div class=''>-->
<!--                        <input type='button' value='Go' onclick="gonewpage()" />-->
<!--                    </div>-->
<!--                </div>-->

            </div>

        </div>
    </div>

    <script>
        function gonewpage() {
            var page = document.getElementById("john_Page_Search").value;
            location = "courseListCore.php?page=" + page;
        }
    </script>

    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
