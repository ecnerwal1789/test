<?php
/* @var $this EmployerSubscriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Employer Subscriptions',
);

//$this->menu=array(
//	array('label'=>'Create EmployerSubscription', 'url'=>array('create')),
//	array('label'=>'Manage EmployerSubscription', 'url'=>array('admin')),
//);
?>

<h1>Employer Subscriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
