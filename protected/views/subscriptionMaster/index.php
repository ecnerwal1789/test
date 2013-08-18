<?php
/* @var $this SubscriptionMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subscription Masters',
);
/*
$this->menu=array(
	array('label'=>'Create SubscriptionMaster', 'url'=>array('create')),
	array('label'=>'Manage SubscriptionMaster', 'url'=>array('admin')),
);*/
?>

<h1>Subscription Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
