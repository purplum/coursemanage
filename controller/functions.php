<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-02-20
 * Time: 08:35
 */

include_once("globals.php");


function displayLoginImage()
{
    echo '<div class="col-md-3 ">
            <img src="themes/images/Always.jpg" alt="" style="width: 500px;height: 400px;margin-top: 100px;margin-left: 60px;"/>
        </div>';
}


function displayHeader()
{
    echo '<span style="font-family: 微软雅黑;font-size: 22px;font-weight:bold;">' . WEBTITLE . '</span>';
}

function displayHeaderLogo()
{
    echo '<div id="logo">
                <a href="">
                    <img src="../themes/images/yf/yfschool.jpg" alt="" width="160" height="70" />
                </a>
            </div>';
}

function displayHeaderNavi()
{
    echo '<div class="blog_nav" style="margin-top: 40px;">
                <ul>
                    <li><a href="../views/index2.php">首页</a></li>
                    <li><a href="../views/userinfo.php">个人中心</a></li>
                    <li><a href="../actions/myCoursesCore.php">课程</a></li>
                    <li><a href="../actions/chooseCourseCore.php">选课</a></li>
                </ul>
            </div>';
}

function displayLeftBox()
{

    echo '<div class="leftbox">
            <div class="l_nav2">
                <div class="ta1">
                    <strong>个人中心</strong>
                    <div class="leftbgbt">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../views/userinfo.php">我的信息</a></div>
                </div>
                <div class="ta1">
                    <strong>课程</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/myCoursesCore.php">我的课程</a></div>
                </div>
                <div class="ta1">
                    <strong>选课</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/chooseCourseCore.php">在线选课</a></div>
                    <div>
                        <a href="../actions/DelmyCoursesCore_Bef.php">在线退课</a></div>
                </div>

                <div class="ta1">
                    <strong>成绩</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="#">成绩查询</a></div>
                </div>
            </div>
        </div>';
}


function displayFooter()
{
    echo '<p><small>&copy; All Rights Reserved. <a href="' . HOMEURL . '" target="_blank" title="YF course">' . HOMENAME . '</a></small></p>';
}

function displayTitle($title)
{
    echo '<title>' . $title . ' ' . WEBTITLE . '</title>';
}

?>