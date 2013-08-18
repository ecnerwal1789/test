<?php
/* @var $this EmployerSubscriptionController */
/* @var $model EmployerSubscription */

$this->breadcrumbs=array(
	'Employer Subscriptions'=>array('index'),
	$model->ESUB_ID=>array('view','id'=>$model->ESUB_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployerSubscription', 'url'=>array('index')),
	array('label'=>'Create EmployerSubscription', 'url'=>array('create')),
	array('label'=>'View EmployerSubscription', 'url'=>array('view', 'id'=>$model->ESUB_ID)),
	array('label'=>'Manage EmployerSubscription', 'url'=>array('admin')),
);
?>
<!--
<h1>Update EmployerSubscription <?php //echo $model->ESUB_ID; ?></h1>-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>