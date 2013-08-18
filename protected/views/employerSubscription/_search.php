<?php
/* @var $this EmployerSubscriptionController */
/* @var $model EmployerSubscription */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ESUB_ID'); ?>
		<?php echo $form->textField($model,'ESUB_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_EMP_ID'); ?>
		<?php echo $form->textField($model,'ESUB_EMP_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_SUBSCRS_ID'); ?>
		<?php echo $form->textField($model,'ESUB_SUBSCRS_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_PURCHASE_DATE'); ?>
		<?php echo $form->textField($model,'ESUB_PURCHASE_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_PAYMENT_ID'); ?>
		<?php echo $form->textField($model,'ESUB_PAYMENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_STATUS'); ?>
		<?php echo $form->textField($model,'ESUB_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_EXPIRY_DATE'); ?>
		<?php echo $form->textField($model,'ESUB_EXPIRY_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_UTILIZED_COUNT'); ?>
		<?php echo $form->textField($model,'ESUB_UTILIZED_COUNT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESUB_REMAIN_COUNT'); ?>
		<?php echo $form->textField($model,'ESUB_REMAIN_COUNT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->