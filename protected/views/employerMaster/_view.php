<?php
/* @var $this EmployerMasterController */
/* @var $data EmployerMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EMP_ID), array('view', 'id'=>$data->EMP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_COMP_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_COMP_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_STREET')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_STREET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_CITY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_CITY_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_STATE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_STATE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_COUNTRY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_COUNTRY_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_ZIP_CODE')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_ZIP_CODE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_PHONE_NO')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_PHONE_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_EMAIL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_EMAIL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_FIRST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_FIRST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_LAST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_LAST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_REG_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_REG_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_LOGIN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_LOGIN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_COMP_URL')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_COMP_URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATED_USER')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATED_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_MAIL_AS_LOGIN')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_MAIL_AS_LOGIN); ?>
	<br />

	*/ ?>

</div>