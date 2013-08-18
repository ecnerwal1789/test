<script type="text/javascript">
  
//    $('.viewprofile').live('click',function(e){
////        $(this).removeClass('viewprofile');
////       $(this).addClass('newposting');
//         $(this).toggleClass("newposting");
//    });
</script>
<style>
.ui-tabs .ui-tabs-nav li a {
  float: left;
  padding: .5em 1em;
  text-decoration: none;
  float:none;
  font-size:16px;
/*  font-weight:bold;*/
  padding:0.2em 1em;
  text-decoration:none;
  font-family:"Myriad Pro";
  
}
</style>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" 
media="screen, projection" />-->

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(yii::app()->session['Emp_Id']!='')
    
{      
?>
 
    <?php    //render admin page in jobposting
                $model=new JobPosting('search');
		$model->unsetAttributes();
                if(isset($_GET['JobPosting']))
                $model->attributes=$_GET['JobPosting'];
                $jpmcount=JobPosting::model()->count("EJP_EMP_ID='".yii::app()->session['Emp_Id']."'");                
              ?>

<?php 
$model1=new EmployerSubscription('search');
		$model1->unsetAttributes();  // clear any default values
                 
              
                yii::app()->session['userid']=Yii::app()->user->name;
                $connection=Yii::app()->db;
                if(yii::app()->session['LoginAction']=='Emp_Login_Action')
                    {
                 $sql = 'SELECT EMP_ID from employer_master where EMP_FIRST_NAME ="'.yii::app()->session['userid'].'"';
                $model1->ESUB_EMP_ID=$connection->createCommand($sql)->queryScalar();
                    }
              
		if(isset($_GET['EmployerSubscription']))
		$model1->attributes=$_GET['EmployerSubscription'];
               $empscount=EmployerSubscription::model()->count("ESUB_EMP_ID='".yii::app()->session['Emp_Id']."'");
                 
                ?>

 <?php 
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Posting Summary"=>
                      array('content'=>$this->renderPartial('/jobPosting/admin',array('model'=>$model,'action'=>'view','jpmcount'=>$jpmcount
                          ),true),'id'=>'PostingSummary'),
//                    array('ajax'=>$this->createUrl('JobPosting/Create')),
         "Subscription Summary" =>
                        array('content'=>$this->renderPartial('/employerSubscription/admin',array('model'=>$model1,'action'=>'none','empscount'=>$empscount),true),'id'=>'SubscriptionSummary'),
      
       
       ), 
        'options' => array(
        'collapsible' => false,
        'selected'=>0
    ),
)); 
   
   
   ////////////



}?>


  <?php // $this->widget('application.extensions.fancybox.EFancyBox', array(
//        'target'=>'a#ReferLink',
//        'config'=>array(
//        'scrolling'=>'No',
//        'titleShow'=>true,
//        ),
//        )
//    );
?> 
    <div style="display:none;">
        <div id="ReferFriend1">
            <?php $this->renderPartial('ReferFriend',array('EmployerProspects'=> new EmployerProspects,'Emp_Id'=>yii::app()->session['Emp_Id']));?>
        </div>
    </div>




 <?php 
//    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
//    'tabs' => array(
//                
//         "Posting Summary"=>
//                      array('content'=>$this->renderPartial('/jobPosting/admin',array('model'=>$model,'action'=>'view','jpmcount'=>$jpmcount
//                          ),true),'id'=>'PostingSummary'),
////                    array('ajax'=>$this->createUrl('JobPosting/Create')),
//         "Subscription Summary" =>
//                        array('content'=>$this->renderPartial('/employerSubscription/admin',array('model'=>$model1,'action'=>'none','empscount'=>$empscount),true),'id'=>'SubscriptionSummary'),
//      
//       
//       ), 
//        'options' => array(
//        'collapsible' => false,
//        'selected'=>0
//    ),
//)); 
//}?>


