    <script type="text/javascript">
function DisplayMsg(data)
    {        
             
            if(data=="Password Sent to Your Registered Mail ID")
                {       
                   document.getElementById('Err_Msg').style.color='Green';
                }
            else
                {
                    document.getElementById('Err_Msg').style.color='Red';
                }
                $('#Err_Msg').html(data); 
                 document.getElementById('EmployerMaster_Forget_Login_Id').value='';
        
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ii - me_login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    

<?php
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

<div style="display:none">
        <div id="ForgotPassword">
            <?php echo CHtml::beginForm();?>
                    <div class="row">
                        <?php echo CHtml::activeLabel($employeemodel,'Login'); ?>
                        <?php echo CHtml::activeTextField($employeemodel,'Forget_Login_Id');?> 
                        <?php echo CHtml::ajaxSubmitButton('submit',$this->createUrl("ForgotPassword"),
                                array(
                                    'type'=>'POST',
                                    'success'=>'DisplayMsg',));?><span id="Err_Msg"></span>
                </div>
            <?php echo CHtml::endForm();?>
        </div>
</div>

<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#ForgotLink',
        'config'=>array(
        'scrolling'=>'No',
        'titleShow'=>true,
        ),
        )
    );
?> 
<!-- main banner part start here -->
<div class="banner">

<!-- leftside ing start here -->
<div class="banner_leftimg">

<!--  banner continer start here -->
<div class="banner_container_txt"></div>

<div class="banner_container_text">




</div>

<!--  banner continer end here -->


</div>
<!-- leftside ing start here -->

<!-- login bg start here -->
<?php echo CHtml::beginForm('EmpLogin','post'); ?>  
 <div style="padding-left: 220px">Fields with <span class="required">*</span> are required.</div>
<div class="login_bg">
   
<table width="407" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  
  <tr>
    <td colspan="3" height="30"> </td>
    </tr>
  <tr>
    <td width="86"><div class="login_usner_txt"> <?php echo CHtml::activeLabel($employeemodel,'EMP_LOGIN_ID'); ?> </div></td>
    <td width="5">&nbsp;</td>
    <td width="310">
                        <?php echo CHtml::activeTextField($employeemodel,'EMP_LOGIN_ID',array('maxlength'=>54,'class'=>'seracg_img'));?>  
                        <?php echo CHtml::error($employeemodel,'EMP_LOGIN_ID',array('class'=>'errorf')); ?>
	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
  <tr>
    <td><div class="login_usner_txt"><?php echo CHtml::activeLabel($employeemodel,'EMP_PASSWORD'); ?></div></td>
    <td>&nbsp;</td>
    <td>
                        <?php echo CHtml::activePasswordField($employeemodel,'EMP_PASSWORD',array('maxlength'=>54,'class'=>'seracg_img')); ?>
                        <?php echo CHtml::error($employeemodel,'EMP_PASSWORD',array('class'=>'errorf')); ?>
	</td>
  </tr>
  <tr>
    <td colspan="3" height="34"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="float:right"><?php echo CHtml::submitButton('Login',array('class' => 'create')); ?></td>
  </tr>
  <tr>
    <td colspan="3" height="28"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div class="new_usner_txt"> <?php echo CHtml::link('New User?', array('EmployerMaster/create')); ?></div></td>
     
  </tr>
  <tr>
    <td colspan="3" height="31"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div class="access_your_txt"><?php echo CHtml::link('Forgot Password?',"#ForgotPassword", array('id'=>'ForgotLink')); ?></div></td>
  </tr>
</table>


<?php echo CHtml::EndForm(); ?> 
<?php
 }
 else
 {
     echo $this->renderPartial('index');
 }
 ?>
</div>


</div>

</div>
</body>
</html>

