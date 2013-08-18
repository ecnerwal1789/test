<?php
/* @var $this SubscriptionMasterController */
/* @var $model SubscriptionMaster */

$this->breadcrumbs=array(
	'Subscription Masters'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List SubscriptionMaster', 'url'=>array('index')),
	array('label'=>'Create SubscriptionMaster', 'url'=>array('create')),
);*/
$deleteUrl =  Yii::app()->createAbsoluteUrl('SubscriptionMaster/DeleteAll');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subscription-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

$('.deleteall-button').click(function(){
    var selectionIds = $.fn.yiiGridView.getSelection('subscription-master-grid');
  
        var atLeastOneIsChecked = $('input[name=\"subscription-master-grid_c0[]\"]:checked').length > 0;

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
    alert('Employer has been used this Subscription');
		}
     $.fn.yiiGridView.update('subscription-master-grid');
     }
    });    
        }
});
");
?>

<div class="headings">List Of Subscriptions</div>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="Container_v">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subscription-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
         'selectableRows' => 2,
	'columns'=>array(
                array('class'=>'CCheckBoxColumn',                        
                      'value'=>$model->SUBSCRS_ID,
                     ),
		 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
		'SUBSCR_CODE',
		'SUBSCR_DESC',
		'SUBSCR_RATE',
		'SUBSCRS_CAND_COUNT',
		'SUBSCRS_ACTIVE_DURATION',
                'SUBSCRS_POST_DURATION',
                'SUBSCRS_VIDEO_Y_N',
            
		/*
		'CREATED_DATE',
		'CREATED_USER',
		'UPDATED_DATE',
		'UPDATED_USER',
		*/
		array(
			'class'=>'CButtonColumn',
                       'template'=>'{view}{edit}{delete}',
                            'buttons'=>array
                         (
                             'view'=>array (
                              'label'=>'view',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/view_icon.png',
                            'url'=>'Yii::app()->createUrl("subscriptionMaster/view",array("id"=>$data->SUBSCRS_ID))',   
                             ),  
                            'edit' => array
                            (
                            'label'=>'Edit',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/edit_icon.png',
                            'url'=>'Yii::app()->createUrl("subscriptionMaster/update",array("id"=>$data->SUBSCRS_ID))',
                            ),
                                'delete'=>array (
                              'label'=>'delete',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/imgs/delete_icon.png',
                            'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",   
                             ), 
                         ),
		),
	),
)); 
echo CHtml::SubmitButton('Delete Selected',array('name'=>'btndeleteall','class'=>'deleteall-button','id' => 'delete'));
?>
</div>