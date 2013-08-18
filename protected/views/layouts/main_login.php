<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"> 
	<meta name="language" content="en">
        <meta name="keywords" content="Candidate test, online interview,i-me,interview me">
      <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />
      <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png" />
<!--<link rel="icon" href="/imgs/favicon.ico" type="image/x-icon">
<link rel="shortcut-icon" href="/imgs/favicon.ico" type="image/x-icon">-->

<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/style/style.css" media="screen, projection">
        

<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/style/select2.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/style/jqueryslidemenu.css">-->
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery_003.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery_002.js"></script>-->
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>-->
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryslidemenu.js"></script>-->
<title>I-Me</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/style/ui-style.css" media="screen, projection">
<script type="text/javascript">
function noError(){return true;}
window.onerror = noError;
</script>
<!--    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery_001.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2.js"></script>-->
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('a[rel="tooltip"]').tooltip();
jQuery('a[rel="popover"]').popover();

//$('.search-button').click(function(){
//	$('.search-form').toggle();
//        
//	return false;
//});
//jQuery('#job-posting-grid').yiiGridView({'ajaxUpdate':['job-posting-grid'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items','selectableRows':1,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','pageVar':'JobPosting_page'});
//
//function reinstallDatePicker(id, data) {
//    $('#datepicker_for_due_dates').datepicker();
//}
//
//jQuery('#employer-subscription-grid').yiiGridView({'ajaxUpdate':['employer-subscription-grid'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items','selectableRows':1,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','pageVar':'EmployerSubscription_page'});
//jQuery('#tabs').tabs({'collapsible':false,'selected':0});
//jQuery('#EmployerProspects_PROS_MAIL_LIST').select2({'tags':[],'separator':';','width':234,'height':50});
//jQuery('body').on('click','#delete',function(){jQuery.ajax({'type':'POST','success':DisplayMsg,'url':'/site/ReferFriend?Emp_Id=1','cache':false,'data':jQuery(this).parents("form").serialize()});return false;});
//});
/*]]>*/
</script>
    </head>
<body>
<div class="total_bg_register">
<div class="wholesite">
<div >
      
 <div class="logo"><a href="#"></a></div>
 <?php if(empty(yii::app()->session['id']))
 {
     ?>

 <div class="test_header_div" id="test_header_div">
  <?php echo 'Welcome To i-me';?></div>
 <?php
 }
 else
 {
 ?>
<div class="back_buttonqpanel" style="float:right"> <a href="javascript:history.back(1);">Back</a> </div>

<div class="wrap">
<nav>
  <ul class="primary">
<!--    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('Site/index'); ?>">Home</a></li>-->
    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('Site/Dashboard'); ?>">Dashboard</a></li>
    <li ><a href="javascript:void(0)">Job Posting</a> 
      <ul class="sub">
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('Site/New_Posting'); ?>">New Posting</a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('Site/Edit_Posting'); ?>">Edit Posting</a></li>
      </ul> 
   </li>
    <li>
      <a href="javascript:void(0)">Subscription</a>
      <ul class="sub">
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('Site/Subscription'); ?>">Purchase</a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('EmployerSubscription/admin'); ?>">View</a></li>
      </ul>  
    </li>
    <li>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('CandidateMaster/admin'); ?>">Candidate</a></li>
   <li><a href="<?php echo Yii::app()->createAbsoluteUrl('EmployerMaster/view',array('id'=>yii::app()->session['Emp_Id'])); ?>">View Profile</a> </li>
    <li> <a href="<?php echo Yii::app()->createAbsoluteUrl('Logout'); ?>">Logout (<?php echo yii::app()->session['User_Name'];?>)</a> </li>
	
  </ul>
</nav>
</div>
<?php
 }
 ?>
<div class="both" style="width:945px;"></div>

    <?php echo $content;?> </div>

        <div class="both"></div>
        <div class="clear"></div>              
 </div> 
  </div>  
  
<!-- login bg end here -->

<!-- main banner part end here -->

<div class="both"></div>

<?php include 'footer.php'; ?>





</body></html>