<?php
/* @var $this SubscriptionMasterController */
/* @var $data SubscriptionMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCRS_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SUBSCRS_ID), array('view', 'id'=>$data->SUBSCRS_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCR_CODE')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCR_CODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCR_DESC')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCR_DESC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCR_RATE')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCR_RATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCR_RATE_WVID')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCR_RATE_WVID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCR_CURR_CODE')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCR_CURR_CODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATED_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CREATED_DATE); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('SUBSCRS_VIDEO_Y_N')); ?>:</b>
	<?php echo CHtml::encode($data->SUBSCRS_VIDEO_Y_N); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATED_USER')); ?>:</b>
	<?php echo CHtml::encode($data->CREATED_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_USER')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_USER); ?>
	<br />

	*/ ?>

</div>