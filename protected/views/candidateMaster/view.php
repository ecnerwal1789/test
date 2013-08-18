<?php
/* @var $this CandidateMasterController */
/* @var $model CandidateMaster */

$this->breadcrumbs=array(
	'Candidate Masters'=>array('index'),
	$model->CAND_ID,
);

/*$this->menu=array(
	array('label'=>'List CandidateMaster', 'url'=>array('index')),
	array('label'=>'Create CandidateMaster', 'url'=>array('create')),
	array('label'=>'Update CandidateMaster', 'url'=>array('update', 'id'=>$model->CAND_ID)),
	array('label'=>'Delete CandidateMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CAND_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CandidateMaster', 'url'=>array('admin')),
);*/
?>

<!--<div class="headings">Details Of  '<?php echo $model->CAND_FIRST_NAME; ?>'</div>-->
<div class="tab">Candidate Profile </div>

<div class="Container">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'cssFile' => Yii::app()->request->baseUrl.'/css/detail_view_style.css',
	'attributes'=>array(
//		'CAND_ID',
		'CAND_FIRST_NAME',
		'CAND_LAST_NAME',
		'CAND_DOB',
		'CAND_EMAIL_ID',
             array('name' =>'CAND_PHONE_NO',
	        'value'=>preg_replace("/\d{3}/", "$0-", str_replace(".", null, trim($model->CAND_PHONE_NO)), 2)),            
		'CAND_REG_DATE',
//		'UPDATED_DATE',
//		'UPDATED_USER',
		'CAND_GENDER',
//                'CAND_STATUS',
            array(
                 'name' => 'CAND_STATUS',
                 'value' => ($model->CAND_STATUS == 1) ? "Active" : "InActive"
                    ),
	),
)); ?>
</div>
<br>