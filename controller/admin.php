<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-02-20
 * Time: 08:35
 */

include_once("globals.php");


function displayAdminLoginImage()
{
    echo '<div class="col-md-3 ">
            <img src="themes/images/admin.jpeg" alt="" style="width: 500px;height: 400px;margin-top: 100px;margin-left: 60px;"/>
        </div>';
}

function displayTeacherHeaderNavi()
{
    echo '<div class="blog_nav" style="margin-top: 40px;">
                <ul>
                    <li><a href="../views/teacherMain.php">首页</a></li>
                    <li><a href="../actions/courseListCore.php">课程相关</a></li>
                    <li><a href="../actions/studentListCore.php">学生相关</a></li>
                </ul>
            </div>';
}

function displayTeacherHomePage() {

    echo '<div class="dhbg" style="align-content: center;">
                关于 后台管理系统
            </div>';
}

function displayTeacherLeftbox()
{
    echo '<div class="leftbox">
            <div class="l_nav2">
                <div class="ta1">
                    <strong>课程</strong>
                    <div class="leftbgbt">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/courseListCore.php">课程列表</a></div>
                    <div>
                        <a href="../views/addCourse.php">新增课程</a></div>
                    <div>
                        <a href="../actions/myCoursesCore.php">批量导入</a></div>
                    <div>
                        <a href="../actions/myCoursesCore.php">批量导出</a></div>
                </div>

                <div class="ta1">
                    <strong>学生管理</strong>
                    <div class="leftbgbt2"></div>
                </div>
                <div class="cdlist">
                    <div><a href="../actions/score.php">选课规则</a></div>
                    <div><a href="../actions/score.php">批量导入</a></div>
                    <div><a href="../actions/score.php">批量导出</a></div>
                </div>
                
                <div class="ta1">
                    <strong>教师管理</strong>
                    <div class="leftbgbt2"></div>
                </div>
                <div class="cdlist">
                    <div><a href="../views/addTeacher.php">新增教师</a></div>
                </div>

                <div class="ta1">
                    <strong>成绩</strong>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="cdlist">
                    <div>
                        <a href="../actions/score.php">成绩录入</a></div>
                </div>
                <div class="ta1">
                    <a href="#"
                       target="_blank"><strong>教学系统</strong></a>
                    <div class="leftbgbt2">
                    </div>
                </div>
                <div class="ta1">
                    <strong>后台管理</strong>
                    <div class="leftbgbt2"></div>
                </div>
                <div class="cdlist">
                    <div><a href="../actions/score.php">主题设置</a></div>
                    <div><a href="../actions/score.php">首页设置</a></div>
                    <div><a href="../actions/score.php">消息设置</a></div>
                </div>
            </div>
        </div>';
}


?>