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
                    <li><a href="../actions/courseListCore.php">课程列表</a></li>
                    <li><a href="../actions/studentListCore.php">学生列表</a></li>
                    <li><a href="../actions/teacherListCore.php">教师列表</a></li>
                </ul>
            </div>';
}

function displayTeacherHomePage()
{

    echo '<div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab_close" onclick="" href="../actions/adminStartCore.php">打开学生选课系统</a></li>
                </ul>

            </div>
            
            <div class="morebt">


                <ul id="ulStudMsgHeadTab">
                    <li><a class="tab_close" onclick="" href="../actions/adminCloseCore.php">关闭学生选课系统</a></li>
                </ul>

            </div>
            
            ';
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
                    <div><a href="../views/addCourse.php">新增课程</a></div>
                    <div><a href="#">批量导出</a></div>
                    <div><a href="../actions/staticsCore.php">统计数据</a></div>
                </div>

                <div class="ta1">
                    <strong>学生管理</strong>
                    <div class="leftbgbt2"></div>
                </div>
                <div class="cdlist">
                    <div><a href="../actions/specialStudentListCore.php">选课规则</a></div>
                    <div><a href="../views/importStudents.php">批量导入</a></div>
                    <div><a href="#">批量导出</a></div>
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
                        <a href="#">成绩录入</a></div>
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
                    <div><a href="#">主题设置</a></div>
                    <div><a href="#">首页设置</a></div>
                    <div><a href="#">消息设置</a></div>
                </div>
            </div>
        </div>';
}


?>