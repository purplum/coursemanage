<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-02-22
 * Time: 19:24
 */
    header("Content-type: text/html; charset=utf-8");
    require_once '../Classes/PHPExcel.php';

    session_start();
    include("../db/db_properties.php");
    $db = new PDO('mysql:dbname=' . $DB_NAME, $DB_LOGIN, $DB_PASSWORD);
    $db->query('set names utf8');

    $filePath = $_FILES ['excel_special_file'] ['tmp_name']; //[文件名][临时路径-写死的]
	$PHPReader = new PHPExcel_Reader_Excel2007();
	if(!$PHPReader->canRead($filePath)){
	    $PHPReader = new PHPExcel_Reader_Excel5();
	    if(!$PHPReader->canRead($filePath)){
	       echo 'no Excel';
	       return;
	    }
	}
    $PHPExcel = $PHPReader->load($filePath);
	$sheetCount = $PHPExcel->getSheetCount();

	$records=0;

	for($currentSheetIndex = 0;$currentSheetIndex<$sheetCount;$currentSheetIndex++) {

        $currentSheet = $PHPExcel->getSheet($currentSheetIndex);         //读取第一张工作表
        $allColumn = $currentSheet->getHighestColumn(); //取得最大的列号
        $allRow = $currentSheet->getHighestRow();       //取得一共有多少行

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            for($currentColumn='A';$currentColumn<= $allColumn; $currentColumn++){
                $rowData[$currentColumn] = (string)$currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();
            }
            $sheetData[$currentRow-2]=$rowData;


            $studentid=$rowData['A'];
            $studentname=$rowData['B'];
            $specialreason=$rowData['E'];

            $rs_exist = $db->query("select * from student WHERE studentid='$studentid' OR sname='$studentname' ");
            $num_exists = $rs_exist->rowCount();
            if ($num_exists > 0) {
                $n = $db->query("update student set isspecial='1',specialreason='$specialreason' WHERE studentid='$studentid' OR sname='$studentname'  ");
                if ($n > 0) {
                    $records++;
                }
            } else {
                continue;

            }

        }

        $workbookData[$currentSheetIndex]=$sheetData;


    }

//    echo "<pre>";
//    print_r($workbookData);



//    $n = $db->query("insert into student(sname,studentid,spersonid,sgender) VALUES('$cname','$cteacher','$ctime','$cmax')");

    if ($records > 0) {
        echo "<script>";
        echo "alert(\"导入 [$records] 条记录成功 ！\");";
        echo "location.href=\"specialStudentListCore.php\"";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"导入失败！\");";
        echo "location.href=\"specialStudentListCore.php\"";
        echo "</script>";
    }


?>
