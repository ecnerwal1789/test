<?php
/* @var $this EmployerMasterController */
/* @var $model EmployerMaster */

$this->breadcrumbs=array(
	'Employer Masters'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List EmployerMaster', 'url'=>array('index')),
//	array('label'=>'Manage EmployerMaster', 'url'=>array('admin')),
//);
?>


   <div class="tab">Register</div>

<?php echo $this->renderPartial('_form', array('EmployerMaster'=>$EmployerMaster,'User'=>yii::app()->session['id'],
    'action'=>'create','First_Record'=>$First_Record,'Emp_Id'=>yii::app()->session['Emp_Id'],'Action_Name'=>yii::app()->session['LoginAction'])); ?>