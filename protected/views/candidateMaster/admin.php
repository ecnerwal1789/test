
<?php
/* @var $this CandidateMasterController */
/* @var $model CandidateMaster */

$this->breadcrumbs=array(
	'Candidate Masters'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List CandidateMaster', 'url'=>array('index')),
	array('label'=>'Create CandidateMaster', 'url'=>array('create')),
);*/
$deleteUrl =  Yii::app()->createAbsoluteUrl('CandidateMaster/DeleteAll');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#candidate-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

$('.deleteall-button').click(function(){
    var selectionIds = $.fn.yiiGridView.getSelection('candidate-master-grid');
  
        var atLeastOneIsChecked = $('input[name=\"candidate-master-grid_c0[]\"]:checked').length > 0;

        if (!atLeastOneIsChecked)
        {
                alert('Please select atleast one Campaign to delete');
        }
    else
       {
    
    $.ajax({
    type: 'POST',
    url:'$deleteUrl',
    data: {ids: selectionIds},
    dataType: 'text',
    success:function(data){
					
		if(data!='')
		{
    alert('Candidate having records cant be deleted');
		}
     $.fn.yiiGridView.update('candidate-master-grid');
     }
    });
  }
});

");
?>
<div class="tab">Candidate list</div>
<!--<div class="headings">List Of Candidates</div>-->


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
    
    
    
</div><!-- search-form -->
<div class="Container">
    
<?php 
 if($candscount>0){
     $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'candidate-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'cssFile' =>Yii::app()->request->baseUrl.'/css/grid_view_style.css',
        'selectableRows' => 2,
	'columns'=>array(
//            array(   'class'=>'CCheckBoxColumn',
//                     'value'=>$model->CAND_ID,
//                 ),
		 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
		'CAND_FIRST_NAME',
		'CAND_LAST_NAME',
		'CAND_DOB',
		'CAND_EMAIL_ID',
            array(
		'name'=>'CAND_PHONE_NO',
                'value'=>'preg_replace("/\d{3}/", "$0-", str_replace(".", null, trim($data->CAND_PHONE_NO)), 2)',
                ),
                array(
                'name'=>'CAND_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->CAND_STATUS=="1")?("Active"):("InActive")'
               ),
                /*
		'CAND_REG_DATE',
		'UPDATED_DATE',
		'UPDATED_USER',
		'CAND_GENDER',
		*/
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{view}{edit}',
                            'buttons'=>array
                         (
                             'view'=>array (
                              'label'=>'view',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
                            'url'=>'Yii::app()->createUrl("candidateMaster/view",array("id"=>$data->CAND_ID))',   
                             ),  
                            'edit' => array
                            (
                            'label'=>'Edit',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
                            'url'=>'Yii::app()->createUrl("candidateMaster/update",array("id"=>$data->CAND_ID))',
                            ),
//                                'delete'=>array (
//                              'label'=>'delete',
//                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/delete_icon.png',
//                            'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",   
//                             ), 
                         ),
		),
	),
));
 }
     
 else{ ?>
    <div class="reg_suc" style="text-align: -moz-center; font-size: 18px;font-family: 'Oswald',sans-serif; margin: 0 0 0 -60px; ">
        <table>
            <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td>No Records</td></tr>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr></table></div>
    <?php } 

//echo CHtml::SubmitButton('Delete Selected',array('name'=>'btndeleteall','class'=>'deleteall-button','id' => 'delete'));
?><br>



</div>

