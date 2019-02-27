<?php

header("Content-type: text/html; charset=utf-8");
require_once '../Classes/PHPExcel.php';

session_start();
include("../db/db_properties.php");
$db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
$db->query('set names utf8');


$objPHPExcel = new PHPExcel(); //实例化PHPExcel类，等同于在桌面上新建一个excel

for ($i = 0; $i <= 4; $i++) {
    //由于PHPExcel默认会创建一个序号为0的内置Sheet

    if ($i > 0) {
        try {
            $objPHPExcel->createSheet();
        } catch (PHPExcel_Exception $e) {
        } //创建新的内置表
    }

    try {
        $objPHPExcel->setActiveSheetIndex($i);
    } catch (PHPExcel_Exception $e) {
    } //把新创建的sheet设定为当前活动sheet

    try {
        $objSheet = $objPHPExcel->getActiveSheet();
    } catch (PHPExcel_Exception $e) {
    } //获取当前活动sheet

    $studentjoinyear=2018-$i;
    $objSheet->setTitle('入学年份 ' . $studentjoinyear); //给当前活动sheet取个名称

//    $data = $db->getDataByApply($i); //查询不同难度的院校

    $data = $db->query("select student.sid, student.studentid, student.sname, student.spersonid, student.sgrade, student.sclass, student.sgender, course.cname, student.isreg from student,course,cc WHERE cc.sid = student.sid AND cc.cid=course.cid AND student.sgrade='$studentjoinyear' ");
    $res = $data->fetchall(PDO::FETCH_ASSOC);

//    $res = array();
//    while($row){
//
//        $res[] = $row;
//        echo $row;
//    }


//    $_SESSION['allStaticsStudents'] = $allStaticsStudents;

    $objSheet->setCellValue('A1', '编号')->setCellValue('B1', '学号')->setCellValue('C1', '姓名')->setCellValue('D1', '身份证号')->setCellValue('E1', '入学年份')->setCellValue('F1', '班级')->setCellValue('G1', '性别')->setCellValue('H1', '课程名称')->setCellValue('I1', '是否注册'); //填充数据

    $j = 2;

    foreach ($res as $key => $val) {

        $isstudentreg='0';
        if($val['isreg'] == '0') {
            $isstudentreg = '是';
        } else {
            $isstudentreg = '否';
        }

        $staudentgender='男';
        if($val['sgender'] == 'male') {
            $staudentgender = '男';
        } else {
            $staudentgender = '女';
        }

        $objSheet->setCellValue('A' . $j, $val['sid'])->setCellValue('B' . $j, $val['studentid'])->setCellValue('C' . $j, $val['sname'])->setCellValue('D' . $j, $val['spersonid'])->setCellValue('E' . $j, $val['sgrade'])->setCellValue('F' . $j, $val['sclass'])->setCellValue('G' . $j, $staudentgender)->setCellValue('H' . $j, $val['cname'])->setCellValue('I' . $j, $isstudentreg);

        $j++;

    }

}

try {
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
} catch (PHPExcel_Reader_Exception $e) {
} //生成excel文件

browser_export('Excel2007', 'YF_course_choose_info.xls'); //输出到浏览器

try {
    $objWriter->save('php://output');
} catch (PHPExcel_Writer_Exception $e) {
}


//输出至浏览器 代码 首先找到下载的PHPExcel->Examples->01simple-download-xls.php 或者 01simple-download-xlsx.php

//这里的两个文件分别是教会我们如何将 Excel5 和 Excel2007 输出至浏览器的代码


function browser_export($type, $filename)
{

    if ($type == 'Excel5') {

        // Redirect output to a client’s web browser (Excel5)

        header('Content-Type: application/vnd.ms-excel'); //告诉浏览器将要输出excel03文件

        header('Content-Disposition: attachment;filename="' . $filename . '"'); //告诉浏览器将要输出文件的名称

        header('Cache-Control: max-age=0'); //禁止浏览器缓存

    } else if ($type == 'Excel2007') {

        // Redirect output to a client’s web browser (Excel2007)

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //告诉浏览器将要输出excel07文件

        header('Content-Disposition: attachment;filename="' . $filename . '"'); //告诉浏览器将要输出文件的名称

        header('Cache-Control: max-age=0'); //禁止浏览器缓存

    }

}

?>