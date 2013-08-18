<?php
/* @var $this EmployerMasterController */
/* @var $model EmployerMaster */
/*
$this->breadcrumbs=array(
	'Employer Masters'=>array('index'),
	$EmployerMaster->EMP_ID,
);*/

//$this->menu=array(
//	array('label'=>'List EmployerMaster', 'url'=>array('index')),
//	array('label'=>'Create EmployerMaster', 'url'=>array('create')),
//	array('label'=>'Update EmployerMaster', 'url'=>array('update', 'id'=>$model->EMP_ID)),
//	array('label'=>'Delete EmployerMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EMP_ID),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage EmployerMaster', 'url'=>array('admin')),
//);
?>

<div class="tab">Profile Details</div> <?php  //echo $EmployerMaster->EMP_CODE; ?>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/employerMaster/update/id/<?php echo yii::app()->session['Emp_Id']?>"><div  class="edit_profile"> Edit Profile</div></a>
<div class="Container">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$EmployerMaster,
    'cssFile' => Yii::app()->request->baseUrl.'/css/detail_view_style.css',
	'attributes'=>array(
		'EMP_CODE',
		'EMP_COMP_NAME',
                'EMP_FIRST_NAME',
		'EMP_LAST_NAME',
                'EMP_REFERRED_BY',
                'EMP_EMAIL_ID',
                'EMP_COMP_URL',
            
                array('label'=>'Country Name',
                       'value'=>$EmployerMaster->COUNTRY->COUNTRY_NAME),
            array('label'=>'State',
                       'value'=>$EmployerMaster->STATE->STATE_NAME),
//            array('label'=>'City',
//                       'value'=>$EmployerMaster->CITY->CITY_NAME),
//                'EMP_COUNTRY_ID',
//                'EMP_STATE_ID',
                'EMP_CITY_ID',
		'EMP_STREET',
		'EMP_ZIP_CODE',
		
             array(
		'name'=>'EMP_PHONE_NO',
                'value'=>preg_replace("/\d{3}/", "$0-", str_replace(".", null, trim($EmployerMaster->EMP_PHONE_NO)), 2),
                ),
		'EMP_REG_DATE',
//		'EMP_LOGIN_ID',
//		'EMP_PASSWORD',
//		'EMP_STATUS',
//                'UPDATED_USER',
//		'UPDATED_DATE', 
//		'EMP_MAIL_AS_LOGIN',
	),
)); ?>
</div>
<br>