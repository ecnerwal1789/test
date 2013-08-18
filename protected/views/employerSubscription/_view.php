<?php
/* @var $this EmployerSubscriptionController */
/* @var $data EmployerSubscription */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ESUB_ID), array('view', 'id'=>$data->ESUB_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_EMP_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_EMP_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_SUBSCRS_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_SUBSCRS_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_PURCHASE_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_PURCHASE_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_PAYMENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_PAYMENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_EXPIRY_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_EXPIRY_DATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_UTILIZED_COUNT')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_UTILIZED_COUNT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESUB_REMAIN_COUNT')); ?>:</b>
	<?php echo CHtml::encode($data->ESUB_REMAIN_COUNT); ?>
	<br />

	*/ ?>

</div>