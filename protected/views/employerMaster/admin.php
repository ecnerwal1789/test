<script type="text/javascript">
function deleteaction()
{
        var data=$("#autoId_all").serialize();
        
        alert(data)
        
}

</script>
<?php
/* @var $this EmployerMasterController */
/* @var $model EmployerMaster */

$this->breadcrumbs=array(
	'Employer Masters'=>array('index'),
	'Manage',
);


$deleteUrl =  Yii::app()->createAbsoluteUrl('EmployerMaster/DeleteAll');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#employer-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

$('.deleteall-button').click(function(){
    var selectionIds = $.fn.yiiGridView.getSelection('campaign-grid');
  
        var atLeastOneIsChecked = $('input[name=\"campaign-grid_c0[]\"]:checked').length > 0;

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
    alert(data)
     $.fn.yiiGridView.update('campaign-grid');
     }

    });
    
        }
});
");
?>
<div class="tab">Profile</div>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'campaign-search-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('/employerMaster/_search',array(
	'EmployerMaster'=>$EmployerMaster,
)); ?> 
</div><!-- search-form -->
<div class="Container_v">
<?php if(yii::app()->session['LoginAction']=='Admin'){
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'campaign-grid',
	'dataProvider'=>$EmployerMaster->search(),
	'filter'=>$EmployerMaster,
        'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
         'selectableRows' => 2,
	'columns'=>array(
                   array(
                            //'id'=>'autoId',
                            'class'=>'CCheckBoxColumn',
                        
                            'value'=>$EmployerMaster->EMP_ID,

                          ),

                array('header'=>'S.No',
                      'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)'),
		'EMP_COMP_NAME',
                'EMP_CODE',
		'EMP_PHONE_NO',
		'EMP_EMAIL_ID',
		'EMP_FIRST_NAME',
                'EMP_REFERRED_BY',
		array(
                'name'=>'EMP_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->EMP_STATUS=="1")?("Active"):("InActive")'
               ),
		'EMP_COMP_URL',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{edit}',
                            'buttons'=>array
                         (
                             'view'=>array (
                              'label'=>'view',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
                            'url'=>'Yii::app()->createUrl("employerMaster/view",array("id"=>$data->EMP_ID))',   
                             ),  
                            'edit' => array
                            (
                            'label'=>'Edit',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
                            'url'=>'Yii::app()->createUrl("employerMaster/update",array("id"=>$data->EMP_ID))',
                            ),
                              
                         ),
		),
	),
));
       echo CHtml::SubmitButton('Delete Selected',array('name'=>'btndeleteall','class'=>'deleteall-button','id' => 'delete')); 
}
else 
    {
        
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employer-master-grid',
	'dataProvider'=>$EmployerMaster->Disp_Emp(),
        'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
	'columns'=>array(
           array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                            'EMP_COMP_NAME',
                            'EMP_CODE',
                            'EMP_EMAIL_ID',
                            'EMP_FIRST_NAME',
                            'EMP_REFERRED_BY',
		
		array(
			'class'=>'CButtonColumn',
                         'template'=>'{view}{edit}',
                            'buttons'=>array
                         (
                             'view'=>array (
                              'label'=>'view',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
                            'url'=>'Yii::app()->createUrl("employerMaster/view",array("id"=>$data->EMP_ID))',   
                             ),  
                            'edit' => array
                            (
                            'label'=>'Edit',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
                            'url'=>'Yii::app()->createUrl("employerMaster/update",array("id"=>$data->EMP_ID))',
                            ),
                              
                         ),
		),
	),
));}


    ?>
<?php $this->endWidget();  ?>
</div>