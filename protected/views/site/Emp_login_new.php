<script type="text/javascript">
function DisplayMsg(data)
    {        
             
            if(data=="Password Sent to Your Registered Mail ID")
                {       
                   document.getElementById('Err_Msg').style.color='Green';
                   setTimeout(function(){document.getElementById('Err_Msg').innerHTML='';},5000);
                }
            else
                {
                    document.getElementById('Err_Msg').style.color='Red';
                    setTimeout(function(){document.getElementById('Err_Msg').innerHTML='';},5000);
                }
                $('#Err_Msg').html(data); 
                 document.getElementById('EmployerMaster_Forget_Login_Id').value='';
        
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I - me_login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<?php
if(empty(yii::app()->session['LoginAction']))
 {
    ?>
<div>
<p style="font-family:Lucida Grande; margin: 0px 0px 0px 130px; font-size:25px  "><font color="#ff893a"><b>Interview - Me</b></font></p>
</div>
    

<?php
 }
 
if(empty(yii::app()->session['LoginAction']))
 {
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#ForgotLink',
        'config'=>array(
        'scrolling'=>'No',
        'titleShow'=>true,
        ),
        )
    );
?> 
<?php $url =  Yii::app()->createAbsoluteUrl('Site/learnmore'); ?>
<div style="display:none">
        <div id="ForgotPassword">
            <?php echo CHtml::beginForm( array('enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true),));?>
                    <div class="row">
                        <?php echo CHtml::activeLabel($employeemodel,'Login'); ?>
                        <?php echo CHtml::activeTextField($employeemodel,'Forget_Login_Id');?> 
                        <?php echo CHtml::ajaxSubmitButton('submit',$this->createUrl("ForgotPassword"),
                                array(
                                    'type'=>'POST',
                                    'success'=>'DisplayMsg',),array('class' => 'create','style'=>'float:none;'));?><span id="Err_Msg"></span>
                </div>
            <?php echo CHtml::endForm();?>
        </div>
</div>

<!-- main banner part start here -->
<div class="banner">

<!-- leftside ing start here -->
<div class="banner_leftimg">
    
<!--  banner continer start here -->
<div class="banner_container_txt" style="font-weight: bold; font-size: 17px; font-family: 'Lucida Grande';padding: 370px 0 0 17px;  ">
    <p><font color="#FB6D2E"><b>Talent Management</b></font> in the Cloud.</br>
An Effective Tool for 
<font color="#FB6D2E"><b>Spotting</b></font> and 
<font color="#FB6D2E"><b>Managing Talent</b></font>.
</p>
</div>



<!--  banner continer end here -->


</div>
<!-- leftside ing start here -->

<!-- login bg start here -->
<?php //echo CHtml::beginForm('EmpLogin','post'); ?>




<div class="emp_login_new">
    <p> <i style="font-weight:bold;font-size:17px " >"People Inspire You or they Drain You. Pick them wisely"</i></p>
<p> <i style="margin-left: 290px;">- Hans F Hansen.</i></p> </br>

<p> <i class='icon-ok '>Tired of going over innumerous resumes,trying to find the right candidate?</i></p></br>
<p> <i class='icon-ok'>Bored of constantly being on the phone?</i></p></br>
<p> <i class='icon-ok'>Give it a break!We are here to help you out.</i></p></br>
<p> <i class='icon-ok'>Pre-filter candidates using our innovative tool,pick what skills you want,allow the candidates take a technology test and measure.</i></p></br>
</br>

<p class="clearfix" style="float: right;">
	
        <a href="#" class="log-twitter3" onclick="js:window.location.href='<?php echo $url;?>'" style="width:82px;">Learn more </a>
            

                                        </p>
</div>


<!--<div style=" 
    color: #092962;
    font-size: 20px;
    font-style: italic;
    font-weight: bolder;
    margin-left: 10px;">
  
   We are here to help you out.
Pre-filter candidates using our innovative tool, Pick what skills you want, 
Allow the candidates take a technology test.
Measure their performance.
</div>-->

</div>


</body>
</html>

<?php // echo CHtml::EndForm(); ?> 
<?php
 }
 else
 {
     echo $this->renderPartial('login');
 }
 ?>


