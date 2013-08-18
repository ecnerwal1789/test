<?php   
spl_autoload_unregister(array('YiiBase','autoload'));        
$phpExcelPath = Yii::getPathOfAlias('ext.PHPExcel');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
$objPHPExcel = new EmpQuestionUpload();
$labels = $objPHPExcel->attributeNames();
$countcolumn=count($labels);
 $objPHPExcel = Yii::app()->excel;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
->setLastModifiedBy("Maarten Balliauw")
->setTitle("PDF Test Document")
->setSubject("PDF Test Document")
->setDescription("Test document for PDF, generated using PHP classes.")
->setKeywords("pdf php")
->setCategory("Test result file");
$objPHPExcel->setActiveSheetIndex(0);  
$rowCount = 1;  

$column = 'A';
$styleArray = array(
 'borders' => array(
       'outline' => array(
              'style' => PHPExcel_Style_Border::BORDER_NONE,
              'color' => array('argb' => 'FFFF0000'),
              'font' => array('bold' =>true),
             
       ),
 ),
);
  
for ($i = 0; $i < count($labels); $i++)  
{
  
    
    $labels[0]='S.No';
    $labels[2]='Question Description';
    $labels[4]='Option 1';
    $labels[6]='Option 2';
    $labels[8]='Option 3';
    $labels[10]='Option 4';
    $labels[12]='Option 5';
    $labels[14]='Option 6';
    $labels[16]='Answer Option Code';
    $labels[18]='Answer';

    if(($i=='1') ||($i=='3')  ||($i=='5') ||($i=='7') ||($i=='9')||($i=='11')||($i=='13')||($i=='15')||($i=='17') )
    {
        
    }
    else
    {
$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount,$labels[$i]);
$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setWidth(20);
$objPHPExcel->getActiveSheet()->getStyle("A1:M1")->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
$column++;
    }
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Questionupload.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
Yii::app()->end();
 spl_autoload_register(array('YiiBase','autoload'));
?>