
<?php
$Ques_Asked=0;
$Job_Post_Id=$Job_Post_Id;
$Job_Detail=JobPosting::model()->findByAttributes(array('EJP_ID'=>$Job_Post_Id));
$Test_Summ=TestSummary::model()->findAll(array('condition'=>"CAND_TS_EJP_ID=$Job_Post_Id and CAND_TS_STATUS !=2"));
$Test_count= count($Test_Summ);

//$Test_Summ=TestSummary::model()->findAllByAttributes(array('CAND_TS_EJP_ID'=>$Job_Post_Id));

//Job Details
?>



<div class="Container">
<div>     
<div style="float:left" class="Font_Fam"><?php echo 'Name :  '.$Job_Name=$Job_Detail->EJP_NAME;?></div>
<div style="float:left;margin:5px 0px;width:683px;text-align: center" class="Font_Fam" >
    <?php if($Test_count>0){ ?>The below session has been terminated abruptly as the candidate may have violated test policy or encountered internet breakdown issues. Please re-activate test, only if necessary <?php } ?></div>
<!--<div style="float:left;margin-left: 100px;" class="Font_Fam"><?php //echo 'Send To :  '.$Sent_To=$Job_Detail->EJP_EMAIL_SENT_COUNT; ?> Candidates</div>


<div style="float:left;margin-left: 150px;" class="Font_Fam"><?php //echo 'Received from :  '.$Response_Received=$Test_count;?> Candidates</div>-->


</div><br>
<?php
// $connection=Yii::app()->db;   
//         
//        $Select_Count3="SELECT CAND_TS_SCORE,CAND_TS_CAND_ID candidate_test_summary WHERE CAND_TS_EJP_ID=$Job_Post_Id";
//               $Test_Summ1=$connection->createCommand($Select_Count3)->queryAll();
//               $dataProvider=new CArrayDataProvider($Test_Summ1);
               
//                $dataProvider=new CActiveDataProvider('TestSummary', array(
//        'criteria'=>array(
//            'condition'=>"CAND_TS_EJP_ID=$Job_Post_Id",
//            ),
//                    ));
               ?>
  
               <?php
/*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'job-posting-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$Cand_Det,
    'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	'columns'=>array(
         
		 array(
            'name'  => 'Candidates',
////                     ' => '$data->CAND_FIRST_NAME ." ".$data->CAND_LAST_NAME',
//            
                     'value' => function($data,$row) use($first_name,$last_name)
                      {
                        return ($first_name).''.($last_name);
                      }
                    ), 
                
               array(
//                  
                   'header'=>'Ranking',
                   'value'=>function($data,$row) use($rank1)
                      {
//                       
                        return $rank1;
                      },
//                   
                    ),
              array(
//                  
                  'header'=>'Total Score', 
//                  
                  'value'=>function($data,$row) use($tot_score,$candask)
                      {
                        return ($tot_score).'/'.($candask);
                      }
                
                ),
                array(
                  'header'=>'Score Sheet',  
                    'value'=>function($data,$row) use($cand)
                      {
                       echo CHtml::link('View Here',array("jobPosting/job_result",
                        "value"=>$cand),array("title"=>"Skill Wise Score"));
                      }
                
                      
                ),
             array(
                'header'=>'Video',
                'value'=>function($data,$row) use($cand)
                      {
                       echo CHtml::link('View Here',array());
                      }
           ),
        ),
))/*
?>
</div><?php
/* @var $this TestSummaryController */
/* @var $model TestSummary */

?>



<?php 
if($Test_count >0)
{

 // $dataProvider=new CActiveDataProvider('TestSummary');


       $dataProvider=new CActiveDataProvider('TestSummary', array(
        'criteria'=>array(
            'condition'=>"CAND_TS_EJP_ID=$Job_Post_Id and CAND_TS_STATUS!=2",
            'order'=>'CAND_TS_TEST_DATE DESC'
               
            ),
                   ));
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test-summary-inactive-grid',
	'dataProvider'=>$dataProvider,
	'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	'columns'=>array(
            	 array(
            'name'  => 'Candidates',
            'value'=>'$data->cANDTSCAND->CAND_FIRST_NAME ." ".$data->cANDTSCAND->CAND_LAST_NAME',

                    ), 

//	       array(             
//                   'header'=>'Ranking',
//                   'value'=>'$data->selectrank($data->CAND_TS_CAND_ID,$data->CAND_TS_EJP_ID)',
//                    'htmlOptions' =>  array('style'=>'text-align:right'),
//                
//                    ),
//		  array(
////                  
//                  'header'=>'Total Score', 
////                  
//                  'value'=>'$data->CAND_TS_SCORE."/".$data->Ques_Asked->EJPR_QUES_ASKED',
//                
//                ),
//            array(
////                  
//                  'header'=>'Total Score', 
////                  
//                  'value'=>function($data,$row) 
//                      {
//                        return ($data->CAND_TS_SCORE).'/'.($data->quesasked($data->CAND_TS_CAND_ID,$data->CAND_TS_EJP_ID));
//                      },
//                               'htmlOptions' =>  array('style'=>'text-align:right'),
//                
//                ),
                              
                              
                              'CAND_TS_TEST_DATE',
//	
//		 array(
//                  'header'=>'Score Sheet',  
//                    'value'=>function($data)
//                      {
//                       echo CHtml::link('View Here',array("jobPosting/job_result",
//                        "Cand_Id"=>$data->CAND_TS_CAND_ID,"ejp_id"=>$data->CAND_TS_EJP_ID),array("title"=>"Skill Wise Score"));
//                      }
//                
//                      
//                ),
		     array(
                'header'=>'Images',
                'value'=>function($data)
                      {
                       echo CHtml::link('View Here',array("jobPosting/view_cand_image",
                        "Cand_Id"=>$data->CAND_TS_CAND_ID,"ejp_id"=>$data->CAND_TS_EJP_ID),array("title"=>"View Candidate Image",'class'=>"link"));
                      }
           ),
                   	     array(
                'header'=>'Videos',
                'value'=>function($data)
                      {
            if(($data->video_enable($data->CAND_TS_CAND_ID,$data->CAND_TS_EJP_ID))==1)
            {
                       echo CHtml::link('View Here',array("jobPosting/view_cand_video",
                        "Cand_Id"=>$data->CAND_TS_CAND_ID,"ejp_id"=>$data->CAND_TS_EJP_ID),array("title"=>"View Candidate Video",'class'=>"link"));
            }
            else
            {
                 echo 'No Video';
            }
                      }
           ),
           array(
                'header'=>'Status',
                'value'=>function($data)
                      {
            if($data->CAND_TS_STATUS==1)
            {
                               echo   CHtml::ajaxButton("Active", array("jobPosting/active_cand","CAND_TS_CAND_ID"=>$data->CAND_TS_CAND_ID,"ejp_id"=>$data->CAND_TS_EJP_ID,array("id"=>"list".$data->CAND_TS_CAND_ID) ),
            array("success" => "afterupdate"),array('class'=>'delete','disabled'=>'disabled','style'=>'font-size: 12px; height: 22px;  text-align: center;  width: 65px;}'));
            }
            elseif($data->CAND_TS_STATUS==0)
            {
                   echo   CHtml::ajaxButton("Inactive", array("jobPosting/active_cand","CAND_TS_CAND_ID"=>$data->CAND_TS_CAND_ID,"ejp_id"=>$data->CAND_TS_EJP_ID,array("id"=>"list".$data->CAND_TS_CAND_ID) ),
            array("success" => "afterupdate"),array('class'=>'delete','style'=>'font-size: 12px; height: 22px;  text-align: center;  width: 65px;}'));

            }
            else
            {
                 echo 'Completed';
            }
                      }
           ),    
		/*
		'CAND_TS_ET',
		*/	
	),
)); 
}
else {
    

?>
<div class="reg_suc" style="font-family: 'Oswald',sans-serif; margin: 0px 0px 0px 115px; font-size: 15px;">
        <table>
            <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td>The candidate has not yet taken the test. Please check back later. </br>
            You will receive an email ,when the candidate completes the test.</td></tr>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr></table></div>
    
<?php

}
?>
</div>
 <script>
     function afterupdate(){
         alert("Candidate Status Changed Successfully")
        $('#test-summary-inactive-grid').yiiGridView('update', {
		data: $(this).serialize()
                });
     }
 </script>

