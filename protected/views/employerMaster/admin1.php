<?php
$this->breadcrumbs=array(
        //'Campaigns'=>array('index'),
        //'Manage',
);

$this->menu=array(
        //array('label'=>'List Campaign', 'url'=>array('index')),
        //array('label'=>'New Campaign', 'url'=>array('create')),
);
$deleteUrl =  Yii::app()->createAbsoluteUrl('EmployerMaster/DeleteAll');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
});
$('.search-form form').submit(function(){
        $.fn.yiiGridView.update('campaign-grid', {
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

<h2>Search Campaigns</h2>

<!--<p>
You may optionally enter a comparison operator (<b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b><></b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'EmployerMaster'=>$EmployerMaster,
)); ?> 
</div>
<!-- search-form -->

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'campaign-search-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'campaign-grid',
        'selectableRows'=>2,
        'dataProvider'=>$EmployerMaster->search(),
        'filter'=>$EmployerMaster,
        'columns'=>array(
        
                        array(
                'value'=>$EmployerMaster->EMP_ID,
                'class'=>'CCheckBoxColumn',
      
                ),
          array('header'=>'Sl No',
                      'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)'),
		'EMP_COMP_NAME',
                'EMP_CODE',
//		'EMP_STREET',
//		'EMP_CITY_ID',
//		'EMP_STATE_ID',
//		'EMP_COUNTRY_ID',
		
//		'EMP_ZIP_CODE',
		'EMP_PHONE_NO',
		'EMP_EMAIL_ID',
		'EMP_FIRST_NAME',
                'EMP_REFERRED_BY',
//		'EMP_LAST_NAME',
//		'EMP_REG_DATE',
//		'EMP_LOGIN_ID',
//		'EMP_PASSWORD',
		'EMP_STATUS',
		'EMP_COMP_URL',
//		'UPDATED_DATE',
//		'UPDATED_USER',
//		'EMP_MAIL_AS_LOGIN',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}',
		),
        ),
)); ?>

<div class="row buttons">
        <?php echo CHtml::button('Delete',array('name'=>'btndeleteall','class'=>'deleteall-button')); ?>
</div>
<?php $this->endWidget(); ?>
</div>