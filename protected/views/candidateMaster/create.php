<?php
/* @var $this CandidateMasterController */
/* @var $model CandidateMaster */

$this->breadcrumbs=array(
	'Candidate Masters'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List CandidateMaster', 'url'=>array('index')),
	array('label'=>'Manage CandidateMaster', 'url'=>array('admin')),
);*/
?>

 <div class="tab">Candidate Registration</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'action'=>'create')); ?>