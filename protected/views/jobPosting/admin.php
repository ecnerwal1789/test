<?php
/* @var $this JobPostingController */
/* @var $model JobPosting */

$this->breadcrumbs=array(
	'Job Postings'=>array('index'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#job-posting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!--<h1>Manage Job Postings</h1>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('/jobPosting/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="Container1">
  
 <?php if($jpmcount>0){ ?>
  
    
    
    
<?php 
if($action=='view')
    { 
    
   
//  if(($emptypost!='')){
//      
//  }else{
      
 
  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'job-posting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	  
      'columns'=>array(
                 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
		 array(
                 
            'name'  => 'EJP_NAME',
//            'value' => 'CHtml::link($data->EJP_NAME,array("JobPosting/ViewCandidateScore","Job_Post_Id"=>$data->EJP_ID))',
                 'type'  => 'raw',
               'value' =>function($data) {
                 
                           echo CHtml::link($data->EJP_NAME,array("jobPosting/view",
                       "id"=>$data->EJP_ID),array("title"=>"view",'class'=>'link'));
                    
               }
              ),
                      'EJP_LAST_UPDATE_DATE',
                  
            array(
                  
                    'name'=>'EJP_JOB_ID',
              
                    'value'=>'$data->eJPJOB->JOB_NAME',
                     'filter'=>CHtml::listdata(JobMaster::model()->findAll(), 'JOB_ID', 'JOB_NAME'),
//                'htmlOptions' =>  array('class'=>'dropdown'),
//                'htmlOptions' =>  array('class'=>'CLinkPager'),
                    ),
              array(
                  'name'=>'EJP_ROLE_ID', 
                 'filter'=> CHtml::listData(RoleMaster::model()->findAll(),'ROLE_ID','ROLE_NAME'),
                    'value'=>'$data->eJPROLE->ROLE_NAME',
                ),
            
               array(
                'name'=>'EJP_POST_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->EJP_POST_STATUS=="1")?("Active"):("InActive")'
               ),
                array(
           'name'=>'JOB_RESPONSE', 
             'filter'=>false,
             'value'=>'$data->EJP_TEST_TAKEN_COUNT.\' of \'.$data->EJP_EMAIL_SENT_COUNT',
                 
                ),
		/*
		'EJP_DATE',
		'EJP_PRIMARY_SKILL_CATG',
		'EJP_SEC_SKILL_CATG',
		'EJP_CAND_EMAIL_ID',
		'EJP_POST_START_DATE',
		'EJP_POST_END_DATE',
		'EJP_LAST_UPDATE_DATE',
		'EJP_FLAG_UPLOAD_QUES',
		'EJP_POST_STATUS',
		'EJP_EMAIL_SENT_COUNT',
		'EJP_TEST_TAKEN_COUNT',
		'EJP_VIDEO_Y_N',
		'EJP_CAND_ACTIVE_DAYS',
		*/
                      
                      	     array(
                'header'=>'Test Results',
                'value'=>function($data)
                      {
                    
                       echo CHtml::link('View Results',array("JobPosting/viewcandstatus","Job_Post_Id"=>$data->EJP_ID),array('title'=>'View Candidate Score','class'=>'link'));
//                     }
//                     else{ 
//                                             echo CHtml::link('View Results',array('title'=>'View Candidate Score','class'=>'link',));
//
//                              
//                         } 
                       
                      }
           ),
//		array(
//			'class'=>'CButtonColumn',
//                        'template'=>'{view}',
//                            'buttons'=>array
//                            (
//                             'view'=>array (
//                              'label'=>'view',
//                                 
//                                // 'header'=>'view',
//                            //'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
//                            'url'=>'Yii::app()->createUrl("JobPosting/view",array("id"=>$data->EJP_ID))',   
//                             ),  
////                            'edit' => array
////                            (
////                            'label'=>'Edit',
////                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
////                            'url'=>'Yii::app()->createUrl("JobPosting/update",array("id"=>$data->EJP_ID))',
////                            ),
//                            
//                         ),
//		),
	),
));


//    }
}

if($action=='edit'){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'job-posting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
         'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
         
	'columns'=>array(
                 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
		 array(
            'name'  => 'EJP_NAME',
           // 'value' => '$data->EJP_NAME',
                                            'value'=>function($data)
                      {
                    
                       echo CHtml::link($data->EJP_NAME,array("JobPosting/view","id"=>$data->EJP_ID),array('title'=>'View','class'=>'link'));
//                     }
//                     else{ 
//                                             echo CHtml::link('View Results',array('title'=>'View Candidate Score','class'=>'link',));
//
//                              
//                         } 
                       
                      },
            'type'  => 'raw',
                    ), 
                
               array(
                  
                   'name'=>'EJP_JOB_ID',
//                    'filter'=>CHtml::activeTextField($model,'EJP_JOB_ID'),
//                    'filter'=>CHtml::listdata(JobMaster::model()->findAll(), 'JOB_ID', 'JOB_NAME'),
                    'value'=>'$data->eJPJOB->JOB_NAME',

                    ),
            
               
              array(
                  'name'=>'EJP_ROLE_ID',
//                   'filter'=>CHtml::activeTextField($model,'EJP_ROLE_ID'),
//                  'filter'=> CHtml::listData(RoleMaster::model()->findAll(),'ROLE_ID','ROLE_NAME'),
                    'value'=>'$data->eJPROLE->ROLE_NAME',
                ),
                
             array(
                'name'=>'EJP_POST_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->EJP_POST_STATUS=="1")?("Active"):("InActive")'
               ),
            array(
                  'name'=>'JOB_RESPONSE',  
                'filter'=>'',
                    'value'=>'$data->EJP_TEST_TAKEN_COUNT.\' of \'.$data->EJP_EMAIL_SENT_COUNT',
                   
                ),
                
		/*
		'EJP_DATE',
		'EJP_PRIMARY_SKILL_CATG',
		'EJP_SEC_SKILL_CATG',
		'EJP_CAND_EMAIL_ID',
		'EJP_POST_START_DATE',
		'EJP_POST_END_DATE',
		'EJP_LAST_UPDATE_DATE',
		'EJP_FLAG_UPLOAD_QUES',
		'EJP_POST_STATUS',
		'EJP_EMAIL_SENT_COUNT',
		'EJP_TEST_TAKEN_COUNT',
		'EJP_VIDEO_Y_N',
		'EJP_CAND_ACTIVE_DAYS',
		
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{edit}',
                            'buttons'=>array
                            (
                             'view'=>array (
                              'label'=>'view',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
                            'url'=>'Yii::app()->createUrl("JobPosting/view",array("id"=>$data->EJP_ID))',   
                             ),  
                            'edit' => array
                            (
                            'label'=>'Edit',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
                            'url'=>'Yii::app()->createUrl("JobPosting/update",array("id"=>$data->EJP_ID))',
                            ),
                            
                         ),
                    
                    
		),*/
                              
                                         	     array(
                'header'=>'Edit',
                'value'=>function($data)
                      {
                    
                       echo CHtml::link('Edit',array("JobPosting/Update","id"=>$data->EJP_ID),array('title'=>'Edit','class'=>'link'));

                       
                      }
           ),
	),
));

}


?>  
 <?php }else{ ?>
    <div class="reg_suc" style="font-family: 'Oswald',sans-serif; font-size: 18px; margin: 30px 0 0 290px" >
        <table>
            <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td>No Records</td></tr>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr></table></div>
    <?php } ?><br>
    </div>
<script type="text/javascript">
function subvideoflag()
{
        $.ajax({
    type: 'POST',
    url:'Yii::app()->controller->createUrl("dele")',
   
    success:function(data){
    alert(data)
     //$.fn.yiiGridView.update('campaign-grid');
     }
    });
}

</script>

