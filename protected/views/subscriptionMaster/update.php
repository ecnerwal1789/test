<?php
/* @var $this SubscriptionMasterController */
/* @var $model SubscriptionMaster */

$this->breadcrumbs=array(
	'Subscription Masters'=>array('index'),
	$model->SUBSCRS_ID=>array('view','id'=>$model->SUBSCRS_ID),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List SubscriptionMaster', 'url'=>array('index')),
	array('label'=>'Create SubscriptionMaster', 'url'=>array('create')),
	array('label'=>'View SubscriptionMaster', 'url'=>array('view', 'id'=>$model->SUBSCRS_ID)),
	array('label'=>'Manage SubscriptionMaster', 'url'=>array('admin')),
);*/
?>
 <div class="headings">Edit Subscription</div> 
<!--<h1>Update SubscriptionMaster <?php //echo $model->SUBSCRS_ID; ?></h1>-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>