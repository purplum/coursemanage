
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

            <h2 class="mbx">课程 &gt; 新增课程 &nbsp;&nbsp;&nbsp;</h2>
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab2" onclick="" href="">课程信息</a> </li>
                </ul>

            </div>
            <div class="cztable">
                <form action="../actions/addCourseCore.php" method="post">
                    <table width="80%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right" width="80">课程名称：</td>
                            <td align="left" width="160px;"><input type="text" name="cname"/></td>
                        </tr>
                        <tr>
                            <td align="right" width="80">课程老师：</td>
                            <td align="left" width="160px;">
                            <select class="form-control" name="cteacher" id="cteacher">
                                <option></option>
                            <?php
                                include("../db/db_properties.php");
                                $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
                                $db->query('set names utf8');
                                $rs = $db->query("select * from teacher ");
                                $teachers = $rs->fetchAll();
                                foreach ($teachers as $teacher){
                                    echo '<option value=' . $teacher['tid'] . '>' . $teacher['tname'] . '</option>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="80">开课时间：</td>
                            <td align="left" width="160px;">
                            <select class="form-control" name="ctime" id="ctime">
                                <option>2020</option>
                                <option selected="true" >2019</option>
                                <option>2018</option>
                                <option>2017</option>
                                <option>2016</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="80">最大人数：</td>
                            <td align="left" width="160px;"><input type="text" name="cmax"/></td>
                        </tr>
                        <tr>
                            <td align="right" width="80">学时：</td>
                            <td align="left" width="160px;"><input type="text" name="cxueshi"/></td>
                        </tr>
                        <tr>
                            <td align="right" width="80">可选年级：</td>
                            <td align="left" width="160px;">
                            <select class="form-control" name="callowgrade" id="callowgrade">
                                <option value='0'>全部</option>
                                <option value='1'>一年级</option>
                                <option value='2'>二年级</option>
                                <option value='3'>三年级</option>
                                <option value='4'>四年级</option>
                                <option value='5'>五年级</option>
                                <option value='11'>二~五年级</option>
                                <option value='12'>三~五年级</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="80">上课地点：</td>
                            <td align="left" width="160px;"><input type="text" name="clocation"/></td>
                        </tr>
                        <tr>
                            <td align="right" width="80">课程有效 (课程是否可发布)：</td>
                            <td align="left" width="160px;">
                            <select class="form-control" name="cvalid" id="cvalid">
                                <option value='0'>是</option>
                                <option value='1'>否</option>
                            </select>
                            </td>
                        </tr>
                        <tr>

                            <td align="center" width="160px;" colspan="2">
                                <input type="submit" name="add" value="添加" align="center"/>
                                <input type="reset" name="add" value="重置" align="center" style="margin-left:30px;"/>
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
