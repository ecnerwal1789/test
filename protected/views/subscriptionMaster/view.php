<?php
/* @var $this SubscriptionMasterController */
/* @var $model SubscriptionMaster */

$this->breadcrumbs=array(
	'Subscription Masters'=>array('index'),
	$model->SUBSCRS_ID,
);
/*
$this->menu=array(
	array('label'=>'List SubscriptionMaster', 'url'=>array('index')),
	array('label'=>'Create SubscriptionMaster', 'url'=>array('create')),
	array('label'=>'Update SubscriptionMaster', 'url'=>array('update', 'id'=>$model->SUBSCRS_ID)),
	array('label'=>'Delete SubscriptionMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SUBSCRS_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubscriptionMaster', 'url'=>array('admin')),
);*/
?>

<div class="headings">Subscription Details For : <?php echo $model->SUBSCRS_ID; ?></div
<div class="Container_v">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'cssFile' => Yii::app()->request->baseUrl.'/css/detail_view_style.css',
	'attributes'=>array(
		'SUBSCRS_ID',
		'SUBSCR_CODE',
		'SUBSCR_DESC',
		'SUBSCR_RATE',
		'SUBSCR_RATE_WVID',
		'SUBSCR_CURR_CODE',
                'SUBSCRS_CAND_COUNT',
                'SUBSCRS_ACTIVE_DURATION',
                'SUBSCRS_POST_DURATION',
		'CREATED_DATE',
		'CREATED_USER',
		'UPDATED_DATE',
		'UPDATED_USER',
                'SUBSCRS_VIDEO_Y_N',
            
	),
)); ?>
</div>
<br>