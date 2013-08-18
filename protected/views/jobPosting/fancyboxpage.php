     <div style="border: 1px solid gray; border-radius: 10px 10px 10px 10px; background-color: #E6E6E6;padding-left: 10px; font-family: 'myriad pro';font-size: 13px; text-align: justify;">
        
           <?PHP 
         //  print_r($Cand_Test);
        
         $i=1;     
if(count($Cand_Test)>0)
{
            foreach($Cand_Test as $Questions)
            {               
                      
                ?><p style=" text-align: justify; width: 500px;"> <?php echo   $i.'. '.nl2br($Questions['QUES_DESC']);?></p><?php  //echo "</br>";
  
  ?><p style="padding:0 0 0 10px;width: 500px;"><?php 

/*echo CHtml::radioButtonList('cc','gender_code',
  array($Questions['QUES_OPT_CDE_1']=>$Questions['QUES_OPT_1'],
      $Questions['QUES_OPT_CDE_2']=>$Questions['QUES_OPT_2'],
       $Questions['QUES_OPT_CDE_3']=>$Questions['QUES_OPT_3'],
       $Questions['QUES_OPT_CDE_4']=>$Questions['QUES_OPT_4'],
      // $Questions['QUES_OPT_CDE_1']=>$Questions['QUES_OPT_1'],
      
      ),array('separator'=>'<br>',
    
          ));*/ 
  if($Questions['QUES_OPT_1']!='')
  {
      echo 'A) '.$Questions['QUES_OPT_1'].'<br>';
  }
  
    if($Questions['QUES_OPT_2']!='')
  {
      echo 'B) '.$Questions['QUES_OPT_2'].'<br>';
  }
     if($Questions['QUES_OPT_3']!='')
  {
      echo 'C) '.$Questions['QUES_OPT_3'].'<br>';
  }
    if($Questions['QUES_OPT_4']!='')
  {
      echo 'D) '.$Questions['QUES_OPT_4'].'<br>';
  }
  
     if($Questions['QUES_OPT_5']!='')
  {
      echo 'E) '.$Questions['QUES_OPT_5'].'<br>';
  }
      if($Questions['QUES_OPT_6']!='')
  {
      echo 'F) '.$Questions['QUES_OPT_6'].'<br>';
  }
  
  
  ?></p><br><?php 
                                                
  //                
                      
                  $i++;  
            }}
 else {
     ?>
  <div style="height: 185px;padding: 132px 0 0;text-align: center;">No record found </div>
  <?php
 }
             ?>
</div>

<style>
   label {  
    display: inline-block;  
    cursor: pointer;  
    position: relative;   
    font-size: 15px; 
/*    border-bottom: 2px solid #CCCCCC;*/
    padding:0px 0px 0px 20px;
/*    width:600px;*/
/*    border-radius:8px;*/
    font-family: "myriad pro";
    left:-1px;
  
} 

input[type=radio] {  

    display: inline-block;  
    width: 18px;  
  
    position: absolute;  
    left: 35px;  
 
} 

    input[type=radio]:checked + label:before {  
/*         background: url("../imgs/icons-18-white.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0.4);*/
        content: "\2022";  
/*        color: #092952;  */
        color:#ffffff;
        font-size: 25px;  
        text-align: center;  
        line-height: 19px;
       
        background-color: #cccccc
    }  
    p
    {
       font-family: "myriad pro";  
    }
</style>

