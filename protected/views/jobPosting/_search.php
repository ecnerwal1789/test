<?php
/* @var $this JobPostingController */
/* @var $model JobPosting */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'EJP_ID'); ?>
		<?php //echo $form->textField($model,'EJP_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EJP_NAME'); ?>
		<?php echo $form->textField($model,'EJP_NAME',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_EMP_ID'); ?>
		<?php //echo $form->textField($model,'EJP_EMP_ID'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_JOB_ID'); ?>
		<?php //echo $form->textField($model,'EJP_JOB_ID'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_ROLE_ID'); ?>
		<?php //echo $form->textField($model,'EJP_ROLE_ID'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_SUBSCR_ID'); ?>
		<?php //echo $form->textField($model,'EJP_SUBSCR_ID'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_DATE'); ?>
		<?php //echo $form->textField($model,'EJP_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EJP_PRIMARY_SKILL_CATG'); ?>
		<?php echo $form->textField($model,'EJP_PRIMARY_SKILL_CATG',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EJP_SEC_SKILL_CATG'); ?>
		<?php echo $form->textField($model,'EJP_SEC_SKILL_CATG',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EJP_CAND_EMAIL_ID'); ?>
		<?php echo $form->textField($model,'EJP_CAND_EMAIL_ID',array('size'=>30,'maxlength'=>2000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EJP_POST_START_DATE'); ?>
		<?php echo $form->textField($model,'EJP_POST_START_DATE',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_POST_END_DATE'); ?>
		<?php //echo $form->textField($model,'EJP_POST_END_DATE'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_LAST_UPDATE_DATE'); ?>
		<?php //echo $form->textField($model,'EJP_LAST_UPDATE_DATE'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_FLAG_UPLOAD_QUES'); ?>
		<?php //echo $form->textField($model,'EJP_FLAG_UPLOAD_QUES'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_POST_STATUS'); ?>
		<?php //echo $form->textField($model,'EJP_POST_STATUS'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_EMAIL_SENT_COUNT'); ?>
		<?php //echo $form->textField($model,'EJP_EMAIL_SENT_COUNT'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_TEST_TAKEN_COUNT'); ?>
		<?php //echo $form->textField($model,'EJP_TEST_TAKEN_COUNT'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_VIDEO_Y_N'); ?>
		<?php //echo $form->textField($model,'EJP_VIDEO_Y_N'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'EJP_CAND_ACTIVE_DAYS'); ?>
		<?php //echo $form->textField($model,'EJP_CAND_ACTIVE_DAYS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->