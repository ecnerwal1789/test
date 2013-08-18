<?php
/* @var $this CandidateMasterController */
/* @var $model CandidateMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'CAND_ID'); ?>
		<?php //echo $form->textField($model,'CAND_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'First Name'); ?>
		<?php echo $form->textField($model,'CAND_FIRST_NAME',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Last Name'); ?>
		<?php echo $form->textField($model,'CAND_LAST_NAME',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date Of Birth'); ?>
		<?php echo $form->textField($model,'CAND_DOB',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email Id'); ?>
		<?php echo $form->textField($model,'CAND_EMAIL_ID',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone No'); ?>
		<?php echo $form->textField($model,'CAND_PHONE_NO',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'CAND_REG_DATE'); ?>
		<?php //echo $form->textField($model,'CAND_REG_DATE'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'UPDATED_DATE'); ?>
		<?php //echo $form->textField($model,'UPDATED_DATE'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'UPDATED_USER'); ?>
		<?php //echo $form->textField($model,'UPDATED_USER',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'CAND_GENDER'); ?>
		<?php //echo $form->textField($model,'CAND_GENDER',array('size'=>20,'maxlength'=>20)); ?>
	</div>
    <div class="row">
		<?php //echo $form->label($model,'CAND_STATUS'); ?>
		<?php //echo $form->textField($model,'CAND_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->