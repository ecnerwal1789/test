<?php
/* @var $this JobPostingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Job Postings',
);

$this->menu=array(
	array('label'=>'Create JobPosting', 'url'=>array('create')),
	array('label'=>'Manage JobPosting', 'url'=>array('admin')),
);
?>

<h1>Job Postings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
