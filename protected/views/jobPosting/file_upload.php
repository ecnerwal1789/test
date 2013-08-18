<?php
error_reporting(E_ALL ^ E_NOTICE);
//require_once 'excel_reader2.php';
include 'excel_reader2.php';
$temp='xlsfile/'.$temp;

//$data = new Spreadsheet_Excel_Reader($temp);


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
 <?php //$xls = new Spreadsheet_Excel_Reader('example.xls'); ?>


<?php
$csvfile="xlsfile/questioncsv.csv";
 $excel = new Spreadsheet_Excel_Reader();
    $excel->setOutputEncoding('CP1251');
  
    $var=$excel->read($temp);//xls files
if($var=='1')
{
     unlink($temp);// echo "File Not in Correct Format";
     header("location:upload?err=1");
    
}
 else {
    

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
while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
  
 
 	//$val3 = mysql_real_escape_string($data[2]);
         /*$ds=Yii::app()->db;
      
	 $sql1= "INSERT INTO 'back_user' ('id','name') VALUES ('{$val1}','{$val2}')";
         $command1=$ds->createCommand($sql1);
         $command1->query();*/
        $connection=Yii::app()->db;
        if($i!=1)
        {
            if(($data[1]!='')&&(($data[2]!='')||($data[3]!='')||($data[4]!='')||($data[5]!='')||($data[6]!='')||($data[7]!=''))&&($data[10]!='')&&($data[11]!= '')&&($data[12]!=''))
            {
                
    $QUES_DESC= htmlspecialchars($data[1]);
    $QUES_OPT_1 = htmlspecialchars($data[2]);
    $QUES_OPT_2 = htmlspecialchars($data[3]);
    $QUES_OPT_3 = htmlspecialchars($data[4]);
    $QUES_OPT_4 = htmlspecialchars($data[5]);
    $QUES_OPT_5 = htmlspecialchars($data[6]);
    $QUES_OPT_6 = htmlspecialchars($data[7]);
    $QUES_ANS_OPT = htmlspecialchars($data[8]);
    $QUES_ANS_OPT_CDE = strtoupper(htmlspecialchars($data[9]));
    $QUES_INIT_JOB= htmlspecialchars($data[10]);
    $QUES_INIT_SKILL= htmlspecialchars($data[11]);
    $QUES_INIT_ROLE= htmlspecialchars($data[12]);
              $sql1= "INSERT INTO `employer_ques_upload`
                (`EQU_EJP_ID`,
                `EQU_QUES_DESC`,
                `QUES_OPT_1`,
                `QUES_OPT_2`, 
                `QUES_OPT_3`, 
                `QUES_OPT_4`,
                `QUES_OPT_5`,
                `QUES_OPT_6`,
                `QUES_ANS_OPT_CDE`,
                `QUES_ANS_OPT`,
                `QUES_INIT_JOB`,
                `QUES_INIT_SKILL`,
                `QUES_INIT_ROLE`
                )
                VALUES (
                '{$QUES_DESC}',
                '{$QUES_OPT_1}',
                '{$QUES_OPT_2}',
                '{$QUES_OPT_3}',
                '{$QUES_OPT_4}',
                '{$QUES_OPT_5}',
                '{$QUES_OPT_6}',
                '{$QUES_ANS_OPT_CDE}',
                '{$QUES_ANS_OPT}',
                '{$QUES_INIT_JOB}',
                '{$QUES_INIT_SKILL}',
                '{$QUES_INIT_ROLE}'
                    )";
           // echo  mysql_query($sql1);
            $transaction=$connection->beginTransaction();
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
                
               // $connection->createCommand($sql2)->execute();
                //.... other SQL executions
                $transaction->commit();
                 }
                }
            }
            catch(Exception $e) // an exception is raised if a query fails
            {
                $transaction->rollback();
                 $i;
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
    header("location:admin");
    unlink($csvfile);
    }
?>

