<?php
/* @var $this CandidateMasterController */
/* @var $data CandidateMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CAND_ID), array('view', 'id'=>$data->CAND_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_FIRST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_FIRST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_LAST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_LAST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_DOB')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_DOB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_EMAIL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_EMAIL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_PHONE_NO')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_PHONE_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_REG_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_REG_DATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_USER')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAND_GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->CAND_GENDER); ?>
	<br />

	*/ ?>

</div>