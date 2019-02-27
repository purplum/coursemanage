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
                    <li><a class="tab2" onclick="" href="#">全部课程</a></li>
                </ul>

            </div>
            <div class="cztable">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr>
                        <th width="4%">课程号</th>
                        <th style="padding-left: 18px;width: 8%;">
                            课程名称
                        </th>
                        <th style="width: 6%; text-align: center;">
                            课程老师
                        </th>
                        <th style="width: 5%; text-align: center;">
                            开课时间
                        </th>
                        <th style="width: 7%; text-align: center;">
                            已选/最大人数
                        </th>
                        <th style="width: 4%; text-align: center;">
                            学时
                        </th>
                        <th style="width: 5%; text-align: center;">
                            可选年级
                        </th>
                        <th style="width: 10%; text-align: center;">
                            地点
                        </th>
                        <th style="width: 5%; text-align: center;">
                            有效
                        </th>
                        <th style="width: 4%; text-align: center;">
                            操作
                        </th>

                    </tr>
                    <?php if (!empty($_SESSION['allCourses'])) { ?>
                        <?php foreach ($_SESSION['allCourses'] as $row) { ?>
                            <tr>
                                <td class="xxleft">
                                    <?php echo $row['cid'] ?>
                                </td>
                                <td>
                                    <a href="../actions/courseStaticsCore.php?cid=<?php echo $row['cid'] ?> "><?php echo $row['cname'] ?></a>
                                </td>
                                <td>
                                    <?php
                                    $tid = $row['cteacher'];
                                    include("../db/db_properties.php");
                                    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
                                    $db->query('set names utf8');
                                    $rs = $db->query("select tname from teacher where tid = '$tid'");
                                    $arr = $rs->fetchAll();
                                    $tname = $arr[0]['tname'];
                                    echo $tname;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['ctime'] ?>
                                </td>
                                <td>
                                    <?php echo $row['ccurrent'] ?>/<?php echo $row['cmax'] ?>
                                </td>
                                <td>
                                    <?php echo $row['cxueshi'] ?>
                                </td>
                                <td>
                                    <?php
                                        if ($row['callowgrade']=='0')
                                        {
                                            echo '全部';
                                        }
                                        else if ($row['callowgrade']=='1')
                                        {
                                            echo '一年级';
                                        }
                                        else if ($row['callowgrade']=='2')
                                        {
                                            echo '二年级';
                                        }
                                        else if ($row['callowgrade']=='3')
                                        {
                                            echo '三年级';
                                        }
                                        else if ($row['callowgrade']=='4')
                                        {
                                            echo '四年级';
                                        }
                                        else if ($row['callowgrade']=='5')
                                        {
                                            echo '五年级';
                                        }
                                        else if ($row['callowgrade']=='11')
                                        {
                                            echo '二~五年级';
                                        }
                                        else if ($row['callowgrade']=='12')
                                        {
                                            echo '三~五年级';
                                        }
                                        else
                                        {
                                            echo $row['callowgrade'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['clocation'] ?>
                                </td>
                                <td>
                                    <?php if ($row['cvalid']=='0') { echo '是'; } else { echo '否'; }  ?>
                                </td>
                                <td>
                                    <a href="../actions/editCourseCore.php?cid=<?php echo $row['cid'] ?>&page=<?php echo $_SESSION['page'] ?>">修改</a>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">尚未选择课程，请选课！</td>
                        </tr>
                    <?php } ?>


                </table>

                <div class='MainStyle'>
                    <div class=''><a href='../actions/courseListCore.php?page=1'
                                     target='_self'>首页</a></div>
                    <div class=''><a href="../actions/courseListCore.php?page=<?php echo($_SESSION['page'] - 1) ?> "
                                     target='_self'>上一页</a></div>

                    <div class=''><a href="../actions/courseListCore.php?page=<?php echo($_SESSION['page'] + 1) ?> "
                                     target='_self'>下一页</a></div>
                    <div class=''><a href="../actions/courseListCore.php?page=<?php echo $_SESSION['maxPage'] ?> "
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
            location = "courseListCore.php?page=" + page;
        }
    </script>

    <div class="footer">
        <?php include_once("../controller/functions.php");displayFooter() ?>
    </div>
</div>
</body>
</html>
