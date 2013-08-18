

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(yii::app()->session['Emp_Id']!='')
{   
        
        $criteria=new CDbCriteria();
        $criteria->condition='ESUB_EMP_ID='.yii::app()->session['Emp_Id'].' and ESUB_REMAIN_COUNT>0 and ESUB_STATUS=1'; 
        $criteria->distinct=true;
       
        $data=EmployerSubscription::model()->findAll($criteria);
        $a=array();
        $b=array(); 
        $countemp=Count($data);
        if($countemp>0)
        {
    	foreach($data as $v)
        { 
        $esu=$v->ESUB_SUBSCRS_ID;
        $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esu));
         $countesu=count($data1);
        if($countesu>0)
        {
        $a[]=$data1->SUBSCR_DESC;
        $b[]=$v->ESUB_ID;
        }
        }
       
        }
        
        
    ?>

    <?php    
                $Jobmodel=new JobPosting('search');
		$Jobmodel->unsetAttributes();
                if(isset($_GET['JobPosting']))
                $Jobmodel->attributes=$_GET['JobPosting'];
                $JobName=new JobMaster('search1'); ?>
   
 <?php 
    
   if($countemp>0)
        {
        $con=array('content'=>$this->renderPartial('/jobPosting/create',array('a'=>$a,'b'=>$b,'jobposting'=>new JobPosting,'JobName'=>$JobName),true),'id'=>'newpost');
        }
        else
        {
             $con=array('content'=>$this->renderPartial('/jobPosting/create',array('jobposting'=>new JobPosting,'JobName'=>$JobName),true),'id'=>'newpost');

        }
        
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
     "New Posting"=>$con,
       ), 
        'options' => array(
        'collapsible' => false,
        'selected'=>0
    ),
)); 
}else {?> 
    <?php echo $this->redirect('EmpLogin') ?>

<?php 
}
?>

