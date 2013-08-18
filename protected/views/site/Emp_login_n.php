<?php
if(empty(yii::app()->session['LoginAction']))
 
{ $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form', 
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
           
	),
));
$FileUrl =  Yii::app()->createAbsoluteUrl('Employer');?>
   <?php if(isset($_GET['errorarray']))
        {
       ?><div  id="div1" class="error_emp_login_new">
<?php
       
   }
  else
{
     ?>
<div  id="div1">
 <?php
}
?>

<span  id="errmsg1"> <?php  
   if(isset($_GET['errorarray']))
        {
       echo $_GET['errorarray'];
        }
        ?></span></div>
<p class="float">
<?php echo $form->textField($employeemodel,'EMP_LOGIN_ID',array('value'=>'Username','onblur'=>'js:if(this.value=="") this.value="Username"','onfocus'=>'js:if(this.value=="Username") this.value=""'));?>

<i class="icon-user icon-large"></i>
</p>
<p class="float">
        <?php echo $form->passwordField($employeemodel,'EMP_PASSWORD',array('value'=>'Password','onblur'=>'js:if(this.value=="") this.value="Password"','onfocus'=>'js:if(this.value=="Password") this.value=""')); ?>

<i class="icon-lock icon-large"></i>
</p>
<p class="clearfix">
<?php echo CHtml::submitButton('Login',array('class'=>'log-twitter1','onclick'=>'return user_login()')); ?> 
<a  href="javascript: openPage()" class="log-twitter">Sign Up</a>        
</p>
<p class="clearfix"> 
</p>
<span style="padding-left:178px;font-family:'myriad Pro';font-size:14px;" ><?php echo CHtml::link('Forgot Password?',"#ForgotPassword", array('id'=>'ForgotLink')); ?></span>
    <?php $this->endWidget(); ?> 

<script type="text/javascript">
    	function user_login(){	
	  var element = document.getElementById("div1");
                element.classList.add("error_emp_login_new");
		var username=document.getElementById('EmployerMaster_EMP_LOGIN_ID').value;
               
		var password=document.getElementById('EmployerMaster_EMP_PASSWORD').value;
		if((username=="Username")||(username=="")){
			document.getElementById('errmsg1').innerHTML='Please enter username';
			document.getElementById('EmployerMaster_EMP_LOGIN_ID').focus();
		    return false;	
		}
		if((password=="Password")||(password=="")){
			document.getElementById('errmsg1').innerHTML='Please enter password';
			document.getElementById('EmployerMaster_EMP_PASSWORD').focus();
		    return false;	
		}
              
		
        }	
	        function openPage()
{
    window.location.href='<?php echo $FileUrl;?>';
}
</script>
    <?php
}
?>