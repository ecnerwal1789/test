 <?php
error_reporting(E_ALL ^ E_NOTICE);
//require_once 'excel_reader2.php';
include 'excel_reader2.php';
$temp='xlsfile/'.$temp;


//$data = new Spreadsheet_Excel_Reader($temp);		
//$name = "What does DLL stands for ? "; // kanji		
//encodeHeader($name);


?>
<html>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<?php // echo $data->dump(true,true); ?>
</body>
</html>
 <?php
   $connection=Yii::app()->db;
  $DB_DSN= $connection->connectionString;
  $DB_USER= $connection->username;
   $DB_PASS=$connection->password;
 //$xls = new Spreadsheet_Excel_Reader('example.xls'); ?>


<?php
$csvfile="xlsfile/questioncsv.csv";
 $excel = new Spreadsheet_Excel_Reader();
    $excel->setOutputEncoding('CP1251');
  
    $var=$excel->read($temp);//xls files
if($var=='1')
{
     unlink($temp);// echo "File Not in Correct Format";
     header("location:create?err=1");
    
}
 else {
     set_time_limit(0);

    $x=1;
    $sep = ",";
    ob_start();
    while($x<=$excel->sheets[0]['numRows']) {
     $y=1;
     $row="";
     while($y<=$excel->sheets[0]['numCols']) {
         $cell = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
         $row.=($row=="")?"\"".$cell."\"":"".$sep."\"".$cell."\"";
         $y++;
     } 
     echo $row."\n"; 
     $x++;
    }
    $fp = fopen($csvfile,'w');
    fwrite($fp,ob_get_contents());
    fclose($fp);
    ob_end_clean();
    

$output = array('Pass' => 0, 'Fail' => 0);
 
ini_set('auto_detect_line_endings',1);

//$myFile = "upload.csv";
//echo $fh = fopen($myFile, 'r');
 
$handle = fopen($csvfile, 'r');
$i=1;
$j=0;
while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
       $pdo = new NestedPDO($DB_DSN, $DB_USER, $DB_PASS);
       $pdo->beginTransaction();
      // $connection->autoCommit=0;
        if($i!=1)
        {
          //  echo $result = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[1]);
         	 
    $QUES_DESC=getcode(trim($data[1]));
    $QUES_OPT_1 = getcode(trim($data[2]));
    $QUES_OPT_2 = getcode(trim($data[3]));
    $QUES_OPT_3 = getcode(trim($data[4]));
    $QUES_OPT_4 = getcode(trim($data[5]));
    $QUES_OPT_5 = getcode(trim($data[6]));
    $QUES_OPT_6 = getcode(trim($data[7]));
    $QUES_ANS_OPT = getcode(trim($data[9]));
    $QUES_ANS_OPT_CDE = strtoupper(getcode(trim($data[8])));


    //$transaction=$connection->beginTransaction();
            if(($QUES_DESC!='')&&(($QUES_OPT_1!='')||($QUES_OPT_2!='')||($QUES_OPT_3!='')||($QUES_OPT_4!='')||($QUES_OPT_5!='')||($QUES_OPT_6!='')))
            {		
            $sql1= "INSERT INTO `employer_ques_upload`			
	                (`EQU_EJP_ID`,	
                        `EQU_EPE_ID`,
	                `EQU_QUES_DESC`,			
	                `EQU_OPT_1`,			
	                `EQU_OPT_2`, 			
	                `EQU_OPT_3`, 			
	                `EQU_OPT_4`,			
	                `EQU_OPT_5`,			
	                `EQU_OPT_6`,			
	                `EQU_ANS_OPT_CDE`,			
	                `EQU_ANS_OPT` )			
	                 VALUES (
                         '{$EQU_EJP_ID}',
                         '{$EPE_ID}',   
	                '{$QUES_DESC}',			
	                '{$QUES_OPT_1}',			
	                '{$QUES_OPT_2}',			
	                '{$QUES_OPT_3}',			
	                '{$QUES_OPT_4}',			
	                '{$QUES_OPT_5}',			
	                '{$QUES_OPT_6}',			
	                '{$QUES_ANS_OPT_CDE}',			
	                '{$QUES_ANS_OPT}')";			

            try
            {
                if($QUES_ANS_OPT_CDE!='')
                {
                    if($QUES_ANS_OPT_CDE=='A')
                    {
                        if($QUES_OPT_1!='')
                        {
                         $val='1';
                        }
                        else
                        {
                          $val='2';
                        }
                    }
                    elseif($QUES_ANS_OPT_CDE=='B')
                    {
                        if($QUES_OPT_2!='')
                        {
                        $val='1';
                        }
                        else
                        {
                          $val='2';
                        }
                    }
                    elseif($QUES_ANS_OPT_CDE=='C')
                    {
                        if($QUES_OPT_3!='')
                        {
                        $val='1';
                        }
                        else
                        {
                          $val='2';
                        }
                    }
                   elseif($QUES_ANS_OPT_CDE=='D')
                    {
                        if($QUES_OPT_4!='')
                        {
                        $val='1';
                        }
                        else
                        {
                          $val='2';
                        }
                    }
                   elseif($QUES_ANS_OPT_CDE=='E')
                    {
                        if($QUES_OPT_5!='')
                        {
                        $val='1';
                        }
                        else
                        {
                          $val='2';
                        }
                    }
                    elseif($QUES_ANS_OPT_CDE=='F')
                    {
                        if($QUES_OPT_6!='')
                        {
                        $val='1';
                        }
                         else
                        {
                          $val='2';
                        }
                    }
                    
                 if($val=='1')
                 {
                 $connection->createCommand($sql1)->execute();
                 $pdo->commit();
                 $j++;
                 } 
                }
           
            }
            catch(Exception $e) // an exception is raised if a query fails
            {
                set_time_limit(0);
                $pdo->rollback();
                
               
            }
            
            
//if(!$row->save()){
//      // by throwing the exception we will go directly to catch
//      // we can even get the errors of the model that wasn't saved
//      throw new CException('Transaction failed: ');
//} 
        }
     
    
   
        }
$i++;
}
 fclose($handle);
    unlink($temp);
    unlink($csvfile);
    header("Location:http://www.ii-me.com/JobPosting/admin/quescount/".$j);
    exit;
//    header("Location: http://theos.in/");
//exit;
    }
?>
<?php 

function getcode($str)
{
$str1 = str_replace("?>","",$str);
$srt2 = str_replace("<?","",$str1);
$strre=preg_replace('/[\x80-\xFF]/', '', $srt2);
 return $strre;
}
?>