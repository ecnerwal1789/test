<?php
/* @var $this EmployerMasterController */
/* @var $model EmployerMaster */

$this->breadcrumbs=array(
	'Employer Masters'=>array('index'),
	$EmployerMaster->EMP_ID=>array('view','id'=>$EmployerMaster->EMP_ID),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List EmployerMaster', 'url'=>array('index')),
//	array('label'=>'Create EmployerMaster', 'url'=>array('create')),
//	array('label'=>'View EmployerMaster', 'url'=>array('view', 'id'=>$model->EMP_ID)),
//	array('label'=>'Manage EmployerMaster', 'url'=>array('admin')),
//);
?>

   <div class="tab">Edit Register</div>
<!--<h1>Update EmployerMaster <?php //echo $EmployerMaster->EMP_CODE; ?></h1>-->

<?php echo $this->renderPartial('_form', array('EmployerMaster'=>$EmployerMaster,'User'=>yii::app()->session['id'],
    'action'=>'update','First_Record'=>$First_Record,'Emp_Id'=>yii::app()->session['Emp_Id'],'Action_Name'=>yii::app()->session['LoginAction'])); ?>