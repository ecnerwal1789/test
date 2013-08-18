
<?php 
/* @var $this EmployerSubscriptionController */
/* @var $model EmployerSubscription */

$this->breadcrumbs=array(
	'Employer Subscriptions'=>array('index'),
	'Manage',
);

$upsub =  Yii::app()->createAbsoluteUrl('Site/Subscription');
$deleteUrl =  Yii::app()->createAbsoluteUrl('EmployerSubscription/DeleteAll');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
        
	return false;
});

$('.search-form form').submit(function(){
	$('#employer-subscription-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});


$('.deleteall-button').click(function(){
    var selectionIds = $.fn.yiiGridView.getSelection('employer-subscription-grid');
  
        var atLeastOneIsChecked = $('input[name=\"employer-subscription-grid_c0[]\"]:checked').length > 0;

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
     $.fn.yiiGridView.update('employer-subscription-grid');
     }

    });
    
        }
});

");
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_dates').datepicker();
}
");
?>

<?php
if($action=='none'){
}
if($action=='view'){
?>
<div class="tab ui-tabs" style="max-width: 220px">List of Purchased Subscriptions</div>
<?php }?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php  $this->renderPartial('/employerSubscription/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="Container">
    
<?php 

    if($empscount>0){
     

     if($action=='view'){

           
       $criteria=new CDbCriteria;
               $criteria->condition="ESUB_REMAIN_COUNT>0";
              
		$criteria->compare('ESUB_ID',$model->ESUB_ID,true);
		$criteria->compare('ESUB_EMP_ID',$model->ESUB_EMP_ID,true);

               
		$criteria->compare('ESUB_PURCHASE_DATE',$model->ESUB_PURCHASE_DATE,true);

                $criteria->with = array( 'eSUBSUBSCRS' );
                 $criteria->compare('eSUBSUBSCRS.SUBSCR_DESC', $model->ESUB_SUBSCRS_ID,true);
                $criteria->compare('eSUBSUBSCRS.SUBSCR_RATE', $model->ESUB_PAYMENT_ID,true);
		$criteria->compare('ESUB_STATUS',$model->ESUB_STATUS,true);
		$criteria->compare('ESUB_EXPIRY_DATE',$model->ESUB_EXPIRY_DATE,true);
		$criteria->compare('ESUB_UTILIZED_COUNT',$model->ESUB_UTILIZED_COUNT,true);
		$criteria->compare('ESUB_REMAIN_COUNT',$model->ESUB_REMAIN_COUNT,true);
                

		$dataProvider= new CActiveDataProvider($model, array(
			'criteria'=>$criteria,

                   
		) 
                );

               
  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employer-subscription-grid',
	'dataProvider'=>$dataProvider,

    
       'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',

	'filter'=>$model,

	'columns'=>array(
            
		 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                        $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                

            array('name'=>'ESUB_SUBSCRS_ID',
                  'value'=>'CHtml::value($data,"eSUBSUBSCRS.SUBSCR_DESC")'
                ),

              

                array(
                'name'=>'ESUB_PAYMENT_ID',
                'value'=>'\'$ \'.CHtml::value($data,"eSUBSUBSCRS.SUBSCR_RATE")',
                    
                       
                    
               'htmlOptions' => array('style'=>'text-align:right'),

                    
               ),
            
		array(
                'name'=>'ESUB_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->ESUB_STATUS=="1")?("Active"):("InActive")'
               ),
            
array(
	'name'=>'ESUB_UTILIZED_COUNT',
      'htmlOptions' =>  array('style'=>'text-align:right'),
    ),
           
//            array(
//                'name'=>'ESUB_UTILIZED_COUNT',
//                  'filter'=>CHtml::activeTextField($model,'ESUB_UTILIZED_COUNT'),
//                'value'=>'$data->ESUB_UTILIZED_COUNT',
//               ),
////           
		array('name'=>'ESUB_REMAIN_COUNT','htmlOptions' => array('style'=>'text-align:right'),),
            
//            array(
//                'name'=>'ESUB_REMAIN_COUNT',
//                 'filter'=>CHtml::activeTextField($model,'ESUB_REMAIN_COUNT'),
//                'value'=>'$data->ESUB_REMAIN_COUNT',
//               ),
            array(
                'name'=>'ESUB_PURCHASE_DATE',
               'filter'=>false,
////                    'filter'=>CHtml::activeTextField($model,'ESUB_PURCHASE_DATE'),
                'value'=>'$data->ESUB_PURCHASE_DATE',
               ),
//		'ESUB_EXPIRY_DATE',
           array(
                'name'=>'ESUB_EXPIRY_DATE',
                   'filter'=>false,
////                    'filter'=>CHtml::activeTextField($model,'ESUB_EXPIRY_DATE'),
//                'value'=>'$data->ESUB_EXPIRY_DATE',
//               ),
//		array(
//                'name'=>'ESUB_EXPIRY_DATE',
//                    'filter'=>CHtml::activeTextField($model,'ESUB_EXPIRY_DATE'),
                'value'=>'$data->ESUB_EXPIRY_DATE',
               ),
	),
));
   ?>
<?php }
if($action=='none'){

        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employer-subscription-grid',
        'dataProvider'=>$model->search(),

       'cssFile' => Yii::app()->request->baseUrl.'/css/grid_view_style.css',
        'filter'=>$model,
            

            
	'columns'=>array(
            
		 array(
                    'header'=>'S.No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage * 
                    $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    ),
                

                array('name'=>'ESUB_SUBSCRS_ID',
//                'filter'=>CHtml::listData(SubscriptionMaster::model()->findAll(), 'SUBSCRS_ID', 'SUBSCR_DESC'),
//              
                     'type'=>'raw',
//                'value'=>'($data->eSUBSUBSCRS) ? $data->eSUBSUBSCRS->SUBSCR_DESC : ""',
                   'value'=>'$data->eSUBSUBSCRS->SUBSCR_DESC',  
                ),
//		
            
//		'ESUB_PAYMENT_ID', 
                array(
                'name'=>'ESUB_PAYMENT_ID',
                    'htmlOptions' => array('style'=>'text-align:right'),

//                    'type'=>'raw',
//                 'filter'=>CHtml::listData(SubscriptionMaster::model()->findAll(), 'SUBSCRS_ID', 'SUBSCR_RATE'),
                 
              
                 
                 'value'=>'\'$ \'.$data->eSUBSUBSCRS->SUBSCR_RATE',
                    
//                    'value'=>'SubscriptionMaster::model()->Find($data->ESUB_PAYMENT_ID)->SUBSCR_RATE',
               ),
            
		array(
                'name'=>'ESUB_STATUS',
                'filter'=>array('1'=>'Active','0'=>'InActive'),
                'value'=>'($data->ESUB_STATUS=="1")?("Active"):("InActive")'
               ),
//          
//         
////         
		//'ESUB_UTILIZED_COUNT',
           
            array(
                'name'=>'ESUB_UTILIZED_COUNT',
               'htmlOptions' => array('style'=>'text-align:right'),

//                  'filter'=>CHtml::activeTextField($model,'ESUB_UTILIZED_COUNT'),
//                'value'=>'$data->ESUB_UTILIZED_COUNT',
               ),
////           
		//'ESUB_REMAIN_COUNT',
            
            array(
                'name'=>'ESUB_REMAIN_COUNT',
                'htmlOptions' => array('style'=>'text-align:right'),

//              
//                 'filter'=>CHtml::activeTextField($model,'ESUB_REMAIN_COUNT'),
//                'value'=>'$data->ESUB_REMAIN_COUNT',
               ),
//              'ESUB_PURCHASE_DATE',
            
            array(
                'name'=>'ESUB_PURCHASE_DATE',
              'filter'=>false,
//              'filter'=> $this->widget('zii.widgets.jui.CJuiDatePicker', 
//                	array(
//
//			      'model'=>$model,
//                            'attribute'=>'ESUB_PURCHASE_DATE',
//                          'options'=>array(
//			     'showAnim'=>'fold',
//                             'showButtonPanel'=>true,
//                              'dateFormat'=>'yy-mm-dd',
////                              'yearRange'=>'-50:-18', 
//                              'changeMonth'=>true, 
//                              'changeYear'=>true),
//                             'htmlOptions' => array(
//                            'id' => 'datepicker_for_due_date',
//                           
//                ),
//			      
//		),true),
                 'value'=>'$data->ESUB_PURCHASE_DATE',
//                'value'=>strtotime($model->ESUB_PURCHASE_DATE),
               
               ),
//		'ESUB_EXPIRY_DATE',
           
		array(
                'name'=>'ESUB_EXPIRY_DATE',
                'filter'=>false,
//                  'filter'=> $this->widget('zii.widgets.jui.CJuiDatePicker', 
//                	array(
//                            'model'=>$model,
//                            'attribute'=>'ESUB_EXPIRY_DATE',
//                            'options'=>array(
//			     'showAnim'=>'fold',
//                             'showButtonPanel'=>true,
//                              'dateFormat'=>'yy-mm-dd',
////                              'yearRange'=>'-50:-18', 
//                              'changeMonth'=>true, 
//                              'changeYear'=>true),
//                             'htmlOptions' => array(
//                            'id' => 'datepicker_for_due_dates',
//                           
//                ),
//			      
//		),true),
//                    'filter'=>CHtml::activeTextField($model,'ESUB_EXPIRY_DATE'),
                'value'=>'$data->ESUB_EXPIRY_DATE',
//                    'value'=>strtotime($model->ESUB_EXPIRY_DATE),
               ),
           
          	
	),
)); 
        
    } ?>
    <?php }
else{ ?>
    <div class="reg_suc" style="font-family: 'Oswald',sans-serif; font-size: 16px; margin: 0 0 0 180px" >
        <table>
            <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td> You have not yet purchased any subscription... <br>
            <p style="text-decoration: underline; margin: 0 0 0 60px;"><a href="<?php echo $upsub;?>" >Click here to purchase</a></p></td></tr>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr></table></div>
    <?php } ?>
 <br>
</div>
