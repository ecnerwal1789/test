<?php
/* @var $this EmployerSubscriptionController */
/* @var $model EmployerSubscription */

$this->breadcrumbs=array(
	'Employer Subscriptions'=>array('index'),
	$model->ESUB_ID,
);

//$this->menu=array(
//	array('label'=>'List EmployerSubscription', 'url'=>array('index')),
//	array('label'=>'Create EmployerSubscription', 'url'=>array('create')),
//	array('label'=>'Update EmployerSubscription', 'url'=>array('update', 'id'=>$model->ESUB_ID)),
//	array('label'=>'Delete EmployerSubscription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ESUB_ID),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage EmployerSubscription', 'url'=>array('admin')),
//);
?>

<div class="headings">Subscription Details For : <?php echo $model->ESUB_ID; ?></h1>
<div class="Container_v">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'cssFile' => Yii::app()->request->baseUrl.'/css/detail_view_style.css',
	'attributes'=>array(
		'ESUB_ID',
		'ESUB_EMP_ID',
		'ESUB_SUBSCRS_ID',
		'ESUB_PURCHASE_DATE',
		'ESUB_PAYMENT_ID',
		array(
                 'name' => 'ESUB_STATUS',
                 'value' => ($model->ESUB_STATUS == 1) ? "Active" : "InActive"
                    ),
		'ESUB_EXPIRY_DATE',
		'ESUB_UTILIZED_COUNT',
		'ESUB_REMAIN_COUNT',
	),
)); ?>
</div>