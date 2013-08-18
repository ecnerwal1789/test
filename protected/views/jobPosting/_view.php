<?php
/* @var $this JobPostingController */
/* @var $data JobPosting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EJP_ID), array('view', 'id'=>$data->EJP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_EMP_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_EMP_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_JOB_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_JOB_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_ROLE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_ROLE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_SUBSCR_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_SUBSCR_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_DATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_PRIMARY_SKILL_CATG')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_PRIMARY_SKILL_CATG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_SEC_SKILL_CATG')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_SEC_SKILL_CATG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_CAND_EMAIL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_CAND_EMAIL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_POST_START_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_POST_START_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_POST_END_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_POST_END_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_LAST_UPDATE_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_LAST_UPDATE_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_FLAG_UPLOAD_QUES')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_FLAG_UPLOAD_QUES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_POST_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_POST_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_EMAIL_SENT_COUNT')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_EMAIL_SENT_COUNT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_TEST_TAKEN_COUNT')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_TEST_TAKEN_COUNT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_VIDEO_Y_N')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_VIDEO_Y_N); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EJP_CAND_ACTIVE_DAYS')); ?>:</b>
	<?php echo CHtml::encode($data->EJP_CAND_ACTIVE_DAYS); ?>
	<br />

	*/ ?>

</div>