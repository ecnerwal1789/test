

<div class="tab">Job Posting Result</div>

<div class="Container">
<div class="summ">Answer Summary: <?php echo $Cand_Detail1 ?>/<?php echo $Cand_Detail ?></div>

<?php 
  $dataProvider=new CActiveDataProvider($model, array(
        'criteria'=>array(
            'condition'=>"EJPR_EJP_ID=$ejp_id AND EJPR_CAND_ID=$Cand_Id",
            ),  ));
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'job-posting-result-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
    'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	'columns'=>array(	
               
             array(
                   'name'=>'EJPR_CAND_ID',      
                 
                 //added by pandi on 25-jun-2013
                 
                  'value' => function($data,$row) 
             {
               global $lastDepartment; //import the global variable

               if ($lastDepartment != $data->eJPRCAND->CAND_FIRST_NAME) 
               {
                 $lastDepartment = $data->eJPRCAND->CAND_FIRST_NAME;
                 return $data->eJPRCAND->CAND_FIRST_NAME;
               } 
               else
                  return '';                                  
             }
             //end by pandi on 25-jun-2013

                 
                 
//                   'value'=>'$data->eJPRCAND->CAND_FIRST_NAME== "<same>" ? " " : $data->eJPRCAND->CAND_FIRST_NAME',
                 ),                 
            array(
                   'name'=>'EJPR_SKILL_ID',
                   'value'=>'$data->eJPRSKILL->SKILL_CATG',
                ),
                array(
                   'name'=>'EJPR_QUES_ASKED', 'htmlOptions' =>  array('style'=>'text-align:right'),
                       'header'=>'# of Questions',
                       
                    ),
                array(
                   'name'=>'EJPR_CORRECT_ANS', 'htmlOptions' =>  array('style'=>'text-align:right'),
                   'header'=>'Correct',
                    ),
                array(
                   
                    'value'=>'intval($data->EJPR_QUES_ANSWERED)-intval($data->EJPR_CORRECT_ANS)',
                    'htmlOptions' =>  array('style'=>'text-align:right'),
                    'header'=>'Incorrect',
                    ),                         
                         
                array(
                   'name'=>'EJPR_QUES_SKIPPED', 'htmlOptions' =>  array('style'=>'text-align:right'),
                    'header'=>'Skipped',
                    
                    ),
                         
                           array(             
                   'header'=>'Percentage',
                   'value'=>'$data->percentage($data->EJPR_QUES_ASKED,$data->EJPR_CORRECT_ANS)',
                    'htmlOptions' =>  array('style'=>'text-align:right'),
                
                    ),
            
		
	),
));  ?>
</div><br>
<div onclick="hide_div();" style="padding-left: 20px; font-family: 'myriad Pro';
    font-size: 16px;font-weight: bold;  width: 70px; cursor: pointer;" id="span_div">Details +</div>
<div id="hide_div" style="display: none; " >
<div class="Container">
    <div style="width:99.4%;height:300px;overflow: scroll;overflow-x: hidden" ><?php 
$model=new CandidateTest;
  $dataProvider=new CActiveDataProvider($model, array(
        'criteria'=>array(
            'condition'=>"CAND_TEST_EJP_ID=$ejp_id AND  CAND_TEST_CAND_ID=$Cand_Id order by CAND_TEST_SKILL_ID",
            ), 'pagination' => false,
 ));
  

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'job-posting-result-grid1',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
        'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	'columns'=>array(
              array(
        'header'=>'S.No',
        'value'=>'($row+1)',   
                  ),
              
            array(
                   'name'=>'CAND_TEST_SKILL_ID',
//                   'value'=>'$data->cANDTESTSKILL->SKILL_CATG',
                   'value' => function($data,$row) 
             {
               global $skill; //import the global variable

               if ($skill != $data->cANDTESTSKILL->SKILL_CATG) 
               {
                 $skill = $data->cANDTESTSKILL->SKILL_CATG;
                 return $data->cANDTESTSKILL->SKILL_CATG;
               } 
               else
                  return '';                                  
             }
                ),
                array(
                   
                      'header'=>'Question Type',
                     'value'=>'$data->cANDTESTQUES->QUES_TYPE',
                    ),
                array(
                   'name'=>'CAND_TEST_ANS_FLAG', 'htmlOptions' =>  array('style'=>'text-align:left'),
                   'header'=>'Correct/Incorrect',
                     'value'=>function($data)
                      {
                    if($data->CAND_TEST_ANS_FLAG=="Y")
                    {  
                                              
                        echo "<p style='color:green'>Correct</p>";
                    }
                    elseif($data->CAND_TEST_ANS_FLAG=="N")
                    {
                       
                        echo "<p style='color:red'>Incorrect</p>";
                    }
                    else
                    {
                      
                       echo "<p style='color:red'>Skip</p>";
                    }
                    
                      }
                    ),

            
		
	),
        ));  ?></div></div></div>
<script>
    function hide_div()
    {
        if(document.getElementById('hide_div').style.display=='none')
        {
        
        document.getElementById('hide_div').style.display='block';
        document.getElementById('span_div').innerHTML='Details -'
        
        }
        else
            {
                document.getElementById('hide_div').style.display='none';
                document.getElementById('span_div').innerHTML='Details +'
            }
    }
</script>

<style>
    
    #job-posting-result-grid1 td {line-height:8px}
    
</style>