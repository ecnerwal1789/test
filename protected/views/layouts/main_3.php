
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /> 
	<meta name="language" content="en" />
        <meta name="keywords" content='Candidate test, online interview,i-me,interview me'></meta>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/imgs/ii-me.ico"></link> 

<!--<link rel="icon" href="<?php //echo Yii::app()->request->baseUrl; ?>/imgs/favicon.ico" type="image/x-icon">
<link rel="shortcut-icon" href="<?php //echo Yii::app()->request->baseUrl; ?>/imgs/favicon.ico" type="image/x-icon">-->

<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" 
media="screen, projection" />
        
	
	
<?php
   $controlactionid=yii::app()->getController()->getAction()->controller->action->id;
   $controllerid=yii::app()->getController()->getAction()->controller->id;
 $jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/jqueryslidemenu/';

//Register jQuery, JS and CSS files
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'jqueryslidemenu.css');	
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'jqueryslidemenu.js');
 ?>        
<title><?php echo CHtml::encode($this->pageTitle); ?></title>






<!--<script type="text/javascript">
   if( window.console && window.console.firebug ){
      alert("Sorry! This system does not support Firebug.\nClick OK to log out.");
      window.location='/login_out';
   }
</script>-->
<!--<script type="text/javascript">
if (! ('console' in window) || !('firebug' in console)) {
    var names = ['log', 'debug', 'info', 'warn', 'error', 'assert', 'dir', 'dirxml', 'group', 'groupEnd', 'time', 'timeEnd', 'count', 'trace', 'profile', 'profileEnd'];
    window.console = {};
    for (var i = 0; i < names.length; ++i) window.console[names[i]] = function() {};
}
</script>-->
    
    
    
    
    
    
    



</head>
<script type="text/javascript">
function noError(){return true;}
window.onerror = noError;
</script>

<body>
<div class="total_bg_register">
        
        <div class="wholesite">
            <div style="width:945px; alignment-adjust:a ">
            
   
            <?php
            if((yii::app()->session['Emp_Id']!='' )||
               (yii::app()->getController()->getAction()->controller->id=='employerMaster'))
		{
                ?>
           <a href="<?php echo Yii::app()->request->baseUrl; ?>"> <div class="logo"></div></a>
           <?php } 
           else {
           ?>
           <div class="logo"></div>
           <?php }
           if($controlactionid!='starttest') {?>
           <div class="dashboard_bg"><?php } ?>
                <div>
                <?php
//                $jpmcount=JobPosting::model()->count(array('ESUB_EMP_ID'=>yii::app()->session['Emp_Id']));
            
//               $Emp_Referred=$_POST['EmployerMaster']['EMP_LOGIN_ID'];
                
                if($controllerid=='candidateMaster')
                {
                    yii::app()->session['Emp_Id']='';
                    yii::app()->session['id']='';
                    yii::app()->session['User_Name']='';
                    yii::app()->session['LoginAction']='';
                }
 else {
		if(yii::app()->session['Emp_Id']!='')
		{
                ?>
                    <div id="myslidemenu" class="jqueryslidemenu"> <?php  $this->widget('zii.widgets.CMenu',array(
			'items'=>array
			(
				array('label'=>'Home', 'url'=>array('/site/index')),
                                array('label'=>'Dashboard', 'url'=>array('/site/Dashboard'),),
                                array('label'=>'Job Posting', 'url'=>'javascript:void(0)',
                                'items'=>array
				(      
                                                array('label'=>'New Posting', 'url'=>array('/site/New_Posting')),
						array('label'=>'Edit Posting', 'url'=>array('/site/Edit_Posting')),
						
                                              
				)),
                                array('label'=>'Subscription', 'url'=>'javascript:void(0)',
                                'items'=>array
				(      
                                                array('label'=>'Purchase', 'url'=>array('/site/Subscription')),
						array('label'=>'View', 'url'=>array('/EmployerSubscription/admin')),
						
				)),
                                   
                                 array('label'=>'Candidates', 'url'=>array('/CandidateMaster/admin'),
                                ),
                  
				array('label'=>'Logout ('.yii::app()->session['User_Name'].')', 
'url'=>array('/site/logout'), 'visible'=>!empty(Yii::app()->session['id'])),
			),
		));?></div>
                    <div id="myslidemenu" class="jqueryslidemenu" style="margin-left: 120px;">  
                        <?php  $a=new EmployerMaster();
                        $this->widget('zii.widgets.CMenu',array(
			'items'=>array
			(   
                           
                            array('label'=>'View Profile','url'=>array('EmployerMaster/view','id'=>yii::app()->session['Emp_Id'])
			)
		)));
                  ?></div>
                               
              
               <?php }
 }
		?>
                    
                            
        </div>
    
        
<?php 
if($controllerid=='candidateMaster')
{
?>
<div id="myslidemenu" class="jqueryslidemenu" style="margin-left: 60px;"></div>
<div style="height:30px;"><div class="head_1" style="margin-left:260px;"><?php echo 'Welcome To i-me';?></div>
</div>
<?php
}
else
{
if(yii::app()->session['Emp_Id']!='' ){  ?>
<a href="javascript:history.back(1);"><div class="back_buttonqpanel" style="float:right"> Back</div></a>      
 <?php }
if(($controllerid=='employerMaster') 
 &&($controlactionid=='create')
 &&(yii::app()->session['Emp_Id']=='')) {
  ?>
 <div style="height:30px;"><div class="head_1"><?php echo 'Welcome To i-me';?></div>
 <a href="javascript:history.back(1);"><div class="back_buttonqpanel" style="float:right">Back</div></a> </div>
 <?php }
 

  
 if(($controlactionid=='register_suc'))
  {
  ?>

 <div style="height:30px;"><div class="head_1"><?php echo 'Welcome To i-me';?></div>
     
     <div class="clear"></div>
     
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/EmpLogin"><div class="back_buttonqpanel" style="float:right"> Back</div></a> </div>
 <?php } }?>

<?php if($controlactionid!='starttest') {?> </div> <?php }?>
<div class="both" style="width:945px;"></div>

<hr style="color:blue; margin:-256px -1090px 0 0 ">

<div><?php echo $content; ?></div></div>

        <div class="both"></div>
        <div class="clear"></div>              
 </div> 
  </div>  
  <?php include 'footer.php'?>  
    </body>
</html>

<?php  
/*if(yii::app()->session['id']!='')
		{
                $jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/jqueryslidemenu/';

               //Register jQuery, JS and CSS files
               Yii::app()->clientScript->registerCoreScript('jquery');
               Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'jqueryslidemenu.css');	
               Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'jqueryslidemenu.js');
                          
                }*/?>   



