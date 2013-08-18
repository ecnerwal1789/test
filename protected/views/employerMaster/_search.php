<?php
/* @var $this EmployerMasterController */
/* @var $model EmployerMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_ID'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_COMP_NAME'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_COMP_NAME',array('size'=>30,'maxlength'=>240)); ?>
	</div>
        
       <div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_CODE'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_CODE',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_STREET'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_STREET',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_CITY_ID'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_CITY_ID'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_STATE_ID'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_STATE_ID'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_COUNTRY_ID'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_COUNTRY_ID',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_ZIP_CODE'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_ZIP_CODE'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_PHONE_NO'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_PHONE_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_EMAIL_ID'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_EMAIL_ID',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_FIRST_NAME'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_FIRST_NAME',array('size'=>30,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_LAST_NAME'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_LAST_NAME',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_REG_DATE'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_REG_DATE'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_LOGIN_ID'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_LOGIN_ID',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_PASSWORD'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_PASSWORD',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_STATUS'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_COMP_URL'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_COMP_URL',array('size'=>30,'maxlength'=>240)); ?>
	</div>
        
        <div class="row">
		<?php echo $form->label($EmployerMaster,'EMP_REFERRED_BY'); ?>
		<?php echo $form->textField($EmployerMaster,'EMP_REFERRED_BY',array('size'=>30,'maxlength'=>240)); ?>
	</div>
    

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'UPDATED_DATE'); ?>
		<?php // echo $form->textField($EmployerMaster,'UPDATED_DATE'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'UPDATED_USER'); ?>
		<?php // echo $form->textField($EmployerMaster,'UPDATED_USER',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($EmployerMaster,'EMP_MAIL_AS_LOGIN'); ?>
		<?php // echo $form->textField($EmployerMaster,'EMP_MAIL_AS_LOGIN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->