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

            <h2 class="mbx">学生 &gt; 特殊学生列表 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="#">特殊学生</a></li>
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
                        <th style="width: 12%; text-align: center;">
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
                        <th style="width: 8%; text-align: center;">
                            地址
                        </th>
                        <th style="width: 4%; text-align: center;">
                            特定
                        </th>
                        <th style="width: 8%; text-align: center;">
                            特定原因
                        </th>
                        <th style="width: 4%; text-align: center;">
                            操作
                        </th>

                    </tr>
                    <?php if (!empty($_SESSION['allStudents'])) { ?>
                        <?php foreach ($_SESSION['allStudents'] as $row) { ?>
                            <tr>
                                <td class="xxleft">
                                    <?php echo $row['sid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['sname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['studentid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['spersonid'] ?>
                                </td>
                                <td>
                                    <?php if (empty($row['sgrade'])) { echo ''; } else { echo $row['sgrade']; }  ?>
                                </td>
                                <td>
                                    <?php if (empty($row['sclass'])) { echo ''; } else { echo $row['sclass']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['sgender']) || $row['sgender']=='male') { echo '男'; } else { echo '女'; }  ?>
                                </td>
                                <td>
                                    <?php if (empty($row['semail'])) { echo ''; } else { echo $row['semail']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['stel'])) { echo ''; } else { echo $row['stel']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['saddress'])) { echo ''; } else { echo $row['saddress']; } ?>
                                </td>
                                <td>
                                    <?php if (empty($row['isspecial']) || $row['isspecial']=='0') { echo '否'; } else { echo '是'; }  ?>
                                </td>
                                <td>
                                    <?php if (empty($row['specialreason'])) { echo ''; } else { echo $row['specialreason']; } ?>
                                </td>
                                <td>
                                    <a href="../actions/editStudentCore.php?spersonid=<?php echo $row['spersonid'] ?>&page=<?php echo $_SESSION['page'] ?>">修改</a>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">没有学生数据</td>
                        </tr>
                    <?php } ?>


                </table>
                <div class='MainStyle'>
                    <div class=''><a href='../actions/specialStudentListCore.php?page=1'
                                     target='_self'>首页</a></div>
                    <div class=''><a href="../actions/specialStudentListCore.php?page=<?php echo($_SESSION['page'] - 1) ?> "
                                     target='_self'>上一页</a></div>

                    <?php for ($i = 1; $i <= $_SESSION['maxPage']; $i++) { ?>
                        <div class=''><a href='../actions/specialStudentListCore.php?page=1' target='_self'><?php echo $i; ?></a></div>
                    <?php } ?>

                    <div class=''><a href="../actions/specialStudentListCore.php?page=<?php echo($_SESSION['page'] + 1) ?> "
                                     target='_self'>下一页</a></div>
                    <div class=''><a href="../actions/specialStudentListCore.php?page=<?php echo $_SESSION['maxPage'] ?> "
                                     target='_self'>尾页</a></div>
                    <div class=''>总共<b><?php echo $_SESSION['count'] ?></b>条数据</div>
                    <div class=''>每页<b><?php echo $_SESSION['pageSize'] ?></b>条数据</div>
                    <div class=''><b><?php echo $_SESSION['page'] ?></b>/<?php echo $_SESSION['maxPage'] ?></div>
                    <div class='SearchStyle'>
                        <input type='text' id='john_Page_Search'/>
                    </div>
                    <div class=''>
                        <input type='button' value='Go' onclick="gonewpage()"/>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <script>
        function gonewpage() {
            var page = document.getElementById("john_Page_Search").value;
            location = "../actions/specialStudentListCore.php?page=" + page;
        }
    </script>

    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
