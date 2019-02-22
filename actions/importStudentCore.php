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

    $filePath = $_FILES ['excel_file'] ['tmp_name']; //[文件名][临时路径-写死的]
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

	for($currentSheetIndex = 0;$currentSheetIndex<$sheetCount;$currentSheetIndex++) {

        $currentSheet = $PHPExcel->getSheet($currentSheetIndex);         //读取第一张工作表
        $allColumn = $currentSheet->getHighestColumn(); //取得最大的列号
        $allRow = $currentSheet->getHighestRow();       //取得一共有多少行

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            for($currentColumn='A';$currentColumn<= $allColumn; $currentColumn++){
                $rowData[$currentColumn] = (string)$currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();
            }
            $sheetData[$currentRow-2]=$rowData;
        }

        $workbookData[$currentSheetIndex]=$sheetData;


    }

    echo "<pre>";
    print_r($workbookData);



    $n = $db->query("insert into student(sname,studentid,spersonid,sgender) VALUES('$cname','$cteacher','$ctime','$cmax')");
    if ($n > 0) {
        echo "<script>";
        echo "alert(\"新增成功！\");";
        echo "location.href=\"../actions/studentListCore.php\"";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"新增失败！\");";
        echo "location.href=\"#\"";
        echo "</script>";
    }


?>
