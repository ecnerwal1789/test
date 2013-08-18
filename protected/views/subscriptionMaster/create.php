<?php
/* @var $this SubscriptionMasterController */
/* @var $model SubscriptionMaster */

$this->breadcrumbs=array(
	'Subscription Masters'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List SubscriptionMaster', 'url'=>array('index')),
	array('label'=>'Manage SubscriptionMaster', 'url'=>array('admin')),
);*/
?>

 <div class="headings">Create Subscription</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'SUBSCR_CODE'=>$SUBSCR_CODE,'SUBSCR_CHAR'=>$SUBSCR_CHAR)); ?>

