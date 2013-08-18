
<?php
if(isset($_GET['suc'])=='suc'){ ?>
<div style="color: green; font-size:15px;font-family:'Trebuchet MS';">
<td>  Data has been added successfully </td>
</div>
<?php
}
?>
<?PHP 
if(isset($_GET['update']))
{
  $deleteUrl =  Yii::app()->createAbsoluteUrl('EmployerSubscription/updatesub'); 
}
else
{
      $deleteUrl =  Yii::app()->createAbsoluteUrl('EmployerSubscription/addsub'); 
}
$deleteUrl1 =  Yii::app()->createAbsoluteUrl('EmployerSubscription/order1');
 $var=yii::app()->session['dimension1'];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#employer-subscription-list-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

$('.selectall').click(function(){
    var selectionIds = $.fn.yiiGridView.getSelection('employer-subscription-list-grid');
  
        var atLeastOneIsChecked = $('input[name=\"employer-subscription-list-grid_c0[]\"]:checked').length > 0;

        if (!atLeastOneIsChecked)
        {
                alert('Please select atleast one Campaign to Buy');
                return false;
        }
    else
       {
    
    $.ajax({
    type: 'POST',
    url:'$deleteUrl',
    data: {ids: selectionIds,},
    dataType: 'text',
    success:function(data){

    window.location.href='$deleteUrl1';

//     alert('You got your subscription successfully');
// $.fn.yiiGridView.update('employer-subscription-list-grid');
     }
    });
  }
});

");
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employer-subscription-form',
	'enableAjaxValidation'=>true,
    
    
)); ?>
<!-- <div class="login_header">
           Employer Subscription
        </div>  -->
<div class="Container">
    
 <?php
 $v='*';
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employer-subscription-list-grid',
	'dataProvider'=>$Subscription->Sub_search(),
//	'filter'=>$Subscription,
        'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
         'selectableRows' => 2,
	'columns'=>array(
            array(
                'class'=>'CCheckBoxColumn',
                'value'=>$Subscription->SUBSCRS_ID,
      
      ),
            array(
               'header'=>'S.No',
               'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                   $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            
                 ),
            array(
                'name'=>'SUBSCR_DESC',
                'value'=>$Subscription->SUBSCR_DESC,
                ),
            array(
                'name'=>'SUBSCR_RATE',
                'value'=>'\'$ \'.$data->SUBSCR_RATE',
                // 'value'=>$Subscription->SUBSCR_RATE,
                  'htmlOptions' =>  array('style'=>'text-align:right'),

                'header'=>'Price',
                'htmlOptions' => array('style'=>'text-align:right'),
                ),
           
      ),
));    
 echo CHtml::Button($model->isNewRecord ? 'Buy' : 'Save', array('class' => 'selectall','id'=>'Center_But'));    
//echo CHtml::SubmitButton('Delete Selected',array('name'=>'btndeleteall','class'=>'deleteall-button','id' => 'delete'));
?>    
</div><?php $this->endWidget(); ?>
<!-- login bg end here -->
<br>


