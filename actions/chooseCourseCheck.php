<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
    session_start();
    $cid = $_GET['cid'];
    $sid = $_GET['sid'];
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $rs_1 = $db->query("select * from cc WHERE sid='$sid' and cid='$cid'");
    $num_rows = $rs_1->rowCount();

if ($num_rows > 0) {
    // 该课程已被当前学生选择
    echo "<script>";
    echo "alert(\"(Duplicated course selected) 重复选课! 请重新选择\");";
    echo "location.href=\"../views/chooseCourse.php\"";
    echo "</script>";
} else {

    //检查是否特殊学生
    $rs_special = $db->query("select * from student WHERE sid='$sid' and isspecial='1' ");
    $num_rows_special = $rs_special->rowCount();
    $student_special = $rs_special->fetchall(PDO::FETCH_ASSOC);

    if ($num_rows_special > 0) {
        // 该学生为特殊学生，不能选择
        $s_special_a = $student_special[0];
        $s_special_content = $s_special_a['specialreason'];
        echo "<script>";
        echo "alert(\"$s_special_content\");";
        echo "location.href=\"../views/chooseCourse.php\"";
        echo "</script>";
    } else {

        $current_year=date("Y");
        $rs_coursecount = $db->query("select cc.cid, course.ctime from cc,course WHERE sid='$sid' and cc.cid=course.cid and course.ctime='$current_year' ");
        $num_course_count = $rs_coursecount->rowCount();

        if($num_course_count==1) {
            echo "<script>";
            echo "alert(\"(Courses full)课程已满，请下个学年再选!\");";
            echo "location.href=\"../views/chooseCourse.php\"";
            echo "</script>";
        } else {

            // 检查学生年级是否符合课程年级设置
            $rs_course = $db->query("select * from course WHERE cid='$cid' and cvalid='0' ");
            $num_rows_course = $rs_course->rowCount();
            $course_grade = $rs_course->fetchall(PDO::FETCH_ASSOC);

            $course_sel = $course_grade[0];
            $course_sel_grade = $course_sel['callowgrade'];  // 当前课程允许年级

            if ($course_sel_grade > 0) {

                $rs_student = $db->query("select * from student WHERE sid='$sid' ");
                $num_rows_student = $rs_student->rowCount();
                $student_current = $rs_student->fetchall(PDO::FETCH_ASSOC);

                $student_current_s = $student_current[0];
                $student_current_grade_s = date("Y") - $student_current_s['sgrade'];

                if ($student_current_grade_s != $course_sel_grade ) {

                    // 该学生不能选择该课程，因课程年级设置

                    echo "<script>";
                    echo "alert(\"(Grade not allow)该课程只允许指定年级[$course_sel_grade]选择!\");";
                    echo "location.href=\"../views/chooseCourse.php\"";
                    echo "</script>";
                } else {
                    $n = $db->query("insert into cc(sid,cid) VALUES($sid,$cid)");
                    $db->query("update course set course.ccurrent=course.ccurrent+1 WHERE cid=$cid");

                    if((int)$n>0){
                        echo "<script>";
                        echo "alert(\"(Success)选课成功, 请刷新页面查看选课结果!\");";
                        echo "location.href=\"../actions/myCoursesCore.php\"";
                        echo "</script>";
                    }else{
                        echo "选课失败！";
                    }
                }
            } else {

                $n = $db->query("insert into cc(sid,cid) VALUES($sid,$cid)");
                $db->query("update course set course.ccurrent=course.ccurrent+1 WHERE cid=$cid");

                if((int)$n>0){
                    echo "<script>";
                    echo "alert(\"(Success)选课成功, 请刷新页面查看选课结果!\");";
                    echo "location.href=\"../actions/myCoursesCore.php\"";
                    echo "</script>";
                }else{
                    echo "选课失败！";
                }
            }
        }


    }
}







//    if ($num_rows > 0) {
//        // 该课程已被当前学生选择
//        echo "<script>";
//        echo "alert(\"(Duplicated course selected) 重复选课! 请重新选择\");";
//        echo "location.href=\"../views/chooseCourse.php\"";
//        echo "</script>";
//    } else if ($num_rows_special > 0) {
//        // 该学生为特殊学生，不能选择
//        $s_special_a = $student_special[0];
//        $s_special_content = $s_special_a['specialreason'];
//        echo "<script>";
//        echo "alert(\"$s_special_content\");";
//        echo "location.href=\"../views/chooseCourse.php\"";
//        echo "</script>";
//    } else if ($course_sel_grade > 0 && $student_current_grade_s != $course_sel_grade ) {
//        // 该学生不能选择该课程，因课程年级设置
//
//        echo "<script>";
//        echo "alert(\"(Grade not allow)该课程只允许指定年级[$course_sel_grade]选择!\");";
//        echo "location.href=\"../views/chooseCourse.php\"";
//        echo "</script>";
//    }
//
//    else {
//        $n = $db->query("insert into cc(sid,cid) VALUES($sid,$cid)");
//        $db->query("update course set course.ccurrent=course.ccurrent+1 WHERE cid=$cid");
//
//        if((int)$n>0){
//            echo "<script>";
//            echo "alert(\"(Success)选课成功, 请刷新页面查看选课结果!\");";
//            echo "location.href=\"../actions/myCoursesCore.php\"";
//            echo "</script>";
//        }else{
//            echo "选课失败！";
//        }
//    }


