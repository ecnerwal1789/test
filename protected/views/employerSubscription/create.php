<?php
/* @var $this EmployerSubscriptionController */
/* @var $model EmployerSubscription */

$this->breadcrumbs=array(
	'Employer Subscriptions'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List EmployerSubscription', 'url'=>array('index')),
//	array('label'=>'Manage EmployerSubscription', 'url'=>array('admin')),
//);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'Subscription'=>$Subscription)); ?>