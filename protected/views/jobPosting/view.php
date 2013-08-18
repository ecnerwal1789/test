<?php
/* @var $this JobPostingController */
/* @var $model JobPosting */

$this->breadcrumbs=array(
	'Job Postings'=>array('index'),
	$model->EJP_ID,
);

//$this->menu=array(
//	array('label'=>'List JobPosting', 'url'=>array('index')),
//	array('label'=>'Create JobPosting', 'url'=>array('create')),
//	array('label'=>'Update JobPosting', 'url'=>array('update', 'id'=>$model->EJP_ID)),
//	array('label'=>'Delete JobPosting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EJP_ID),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage JobPosting', 'url'=>array('admin')),
//);
?>

<!--<div class="headings">Posting Details For : 
    <?php echo $model->EJP_NAME; ?></div>-->
    
    <div class="tab">Posting Details</div> 
<div class="Container">

<?php 

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'cssFile' => Yii::app()->request->baseUrl.'/css/detail_view_style.css',
  
        'attributes'=>array(
		
		'EJP_NAME',
		'eJPEMP.EMP_CODE',
		'eJPJOB.JOB_NAME',
		'eJPROLE.ROLE_NAME',
            
                 'EJP_SUBSCR_ID',
//                'eJPSUBSCR.ESUB_ID',
//		'EJP_SUBSCR_ID',
//             array(
//                 'name' => 'EJP_SUBSCR_ID',
//                'value' =>$model->EJP_SUBSCR_ID
//                   // 'value'=>CHtml::value($model,"eJPSUBSCR.ESUB_SUBSCRS_ID")
//              //                if($model->ESUB_SUBSCRS_ID)
////                {
////                $criteria->together  =  true;
////                $criteria->with = ( 'eSUBSUBSCRS' );
////                $criteria->compare('eSUBSUBSCRS.SUBSCR_DESC', $model->ESUB_SUBSCRS_ID,true);
////                } 
//            ),
		'EJP_DATE',

            array(
                 'name' => 'EJP_PRIMARY_SKILL_CATG',
                
                 'value' =>$model->EJP_PRIMARY_SKILL_CATG
                
                  ),
         
             array(
                 'name' => 'EJP_SEC_SKILL_CATG',
                 'value' =>$model->EJP_SEC_SKILL_CATG
                
                  ),
//          	 array(
//                 
//                 'name' => 'EJP_CAND_EMAIL_ID',
//                 'value' =>$model->quesasked("'.$model->EJP_ID.'")
//                    ),
                     array(
//                  
                // 'header'=>'Total Score', 
                 'name' => 'EJP_CAND_EMAIL_ID', 
                            'type' => 'raw',
                            'value' =>$model->quesasked($model->EJP_ID)
                //  'value'=>$model->EJP_CAND_EMAIL_ID
               
                
                ),
		//'EJP_CAND_EMAIL_ID',
		'EJP_POST_START_DATE',
		'EJP_POST_END_DATE',
		'EJP_LAST_UPDATE_DATE',
          
	
                array(
                 'name' => 'EJP_FLAG_UPLOAD_QUES',
                 'value' => ($model->EJP_FLAG_UPLOAD_QUES == 1) ? "Yes" : "No"
                    ),
		 array(
                 'name' => 'EJP_POST_STATUS',
                 'value' => ($model->EJP_POST_STATUS == 1) ? "Active" : "InActive"
                    ),
           
		'EJP_EMAIL_SENT_COUNT',
            
                array(
                    
                 'name' => 'EJP_TEST_TAKEN_COUNT'
                ,'value'=>($model->EJP_TEST_TAKEN_COUNT) . (($model->emailtaken($model->EJP_ID)!='')? ' ( '.$model->emailtaken($model->EJP_ID).' ) ':'')),
                 // ,'value' => ($model->emailtaken($model->EJP_ID)>0) ? ' ( '.($model->EJP_TEST_TAKEN_COUNT).$model->emailtaken($model->EJP_ID).' ) ' : "0"  ),

                
                  
				
                array(
                'name' => 'EJP_VIDEO_Y_N',
                'value' => ($model->EJP_VIDEO_Y_N == 1) ? "Yes" : "No"
                 ),
		'EJP_CAND_ACTIVE_DAYS',
                'EJP_TEST_DUE_DATE',
	),
)); ?>
  
</div>
  <br>