<?php
/* @var $this SubscriptionMasterController */
/* @var $model SubscriptionMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SUBSCR_CODE'); ?>
		<?php echo $form->textField($model,'SUBSCR_CODE',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBSCR_DESC'); ?>
		<?php echo $form->textField($model,'SUBSCR_DESC',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBSCR_RATE'); ?>
		<?php echo $form->textField($model,'SUBSCR_RATE',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBSCR_RATE_WVID'); ?>
		<?php echo $form->textField($model,'SUBSCR_RATE_WVID',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBSCR_CURR_CODE'); ?>
		<?php echo $form->textField($model,'SUBSCR_CURR_CODE',array('size'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBSCRS_CAND_COUNT'); ?>
		<?php echo $form->textField($model,'SUBSCRS_CAND_COUNT',array('size'=>30)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'SUBSCRS_ACTIVE_DURATION'); ?>
		<?php echo $form->textField($model,'SUBSCRS_ACTIVE_DURATION',array('size'=>30)); ?>
	</div>
        <div class="row">
		<?php echo $form->label($model,'SUBSCRS_POST_DURATION'); ?>
		<?php echo $form->textField($model,'SUBSCRS_POST_DURATION',array('size'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->