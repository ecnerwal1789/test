
<style>
    select { width: 15em }
    .Err_Msg
    {
        color: red;
    }
</style>
<script type="text/javascript">
 function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
//alert(charCode)
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       {
           document.getElementById('Zip_Code_err').innerHTML="Enter Only Numbers";
           document.getElementById('Zip_Code_err').style.color='red';
           setTimeout(function(){document.getElementById('Zip_Code_err').innerHTML='';},4000);
           
            return false;
       }
     
   
   return true;
}

 function isNumberKey1(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
//alert(charCode)
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       {
           document.getElementById('Phone_No_Err').innerHTML="Enter Only Numbers";
           document.getElementById('Phone_No_Err').style.color='red';
           setTimeout(function(){document.getElementById('Phone_No_Err').innerHTML='';},4000);
           
            return false;
       }
     
   document.getElementById('Phone_No_Err').innerHTML="";
   return true;
}

function MailAsLogin()
{
    var checked = document.getElementById("EmployerMaster_EMP_MAIL_AS_LOGIN").checked;
    if(checked)
        {
//            alert("enter");
//            alert(document.getElementById('EMAIL_ID').value);
            document.getElementById('EmployerMaster_EMP_LOGIN_ID').value =document.getElementById('EmployerMaster_EMP_EMAIL_ID').value;
            document.getElementById('EmployerMaster_EMP_LOGIN_ID').readOnly=true;
            
        }
    else
        { 
             document.getElementById('EmployerMaster_EMP_LOGIN_ID').value ='' ;
             document.getElementById('EmployerMaster_EMP_LOGIN_ID').readOnly=false;
           
             
        }        
 
}


</script>
<body>


  <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#PasswordLink',
        'config'=>array(
        'scrolling'=>'No',
        'titleShow'=>true,
        ),
        )
    );
  
?> 
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employer-master-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'action' => Yii::app()->createUrl("EmployerMaster/create"),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'afterValidate'=>'js:ajaxAfterValidate',
//            'beforeValidate'=>'js:MailAsLogin',
            )
)); ?>
   
<div class="page-header">
                  <div class="container">
                        <div class="sixteen columns">
                              <h1 class="one"><span>SIGN UP</span></h1>
                              <h3 class="center medium-top-padding"></h3>
                        </div>
                  </div>
				  
            </div>                  
                        <!-- Form Starts -->
<div class="form-element">
<div class="sixteen columns center">
<div class="done"> <strong>You Have Registered Successfully. </strong></div>
</div>
<div class="form">                             
<div class="eight columns">
<label>Company Name *</label>
<?php echo $form->textField($EmployerMaster,'EMP_COMP_NAME',array('class'=>'text','maxlength'=>240,'tabindex'=>1)); ?>
<?php echo $form->error($EmployerMaster,'EMP_COMP_NAME',array('class'=>'errorf')); ?>
<label>Last Name </label>
<?php echo $form->textField($EmployerMaster,'EMP_LAST_NAME',array('class'=>'text','maxlength'=>240,'tabindex'=>3)); ?>
<?php echo $form->error($EmployerMaster,'EMP_LAST_NAME',array('class'=>'errorf')); ?>	
<label>Country *</label>
<button type="button" title="click" class="select_country_button select_button">
<em style="width: 180px;" id="em_country" tabindex="5">Select</em></button>
<div id="country_toggle" style="display: none">
<div id='country' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
<?php echo CHtml::activeDropDownList($EmployerMaster,'EMP_COUNTRY_ID',CHtml::listData(CountryMaster::model()->findAll(), 'COUNTRY_ID', 'COUNTRY_NAME'),
array(
'ajax'=>array('type'=>'POST',
'url'=>CController::createURL('EmployerMaster/CountryDropDown'),
'update'=>'#EmployerMaster_EMP_STATE_ID', 
),
'size'=>10)
); ?>
<div style='font-size: 1px'>&nbsp</div></div></div>
<?php echo $form->error($EmployerMaster,'EMP_COUNTRY_ID',array('class'=>'errorf')); ?>
<label>Street *</label>
<?php echo $form->textField($EmployerMaster,'EMP_STREET',array('class'=>'text','tabindex'=>7)); ?>
<?php echo $form->error($EmployerMaster,'EMP_STREET',array('class'=>'errorf')); ?>	
<label>Phone No *</label>
<?php echo $form->textField($EmployerMaster,'EMP_PHONE_NO',array('class'=>'text','maxlength'=>20,
      'onkeypress'=>'return isNumberKey1(event);','tabindex'=>9)); ?>
<?php echo $form->error($EmployerMaster,'EMP_PHONE_NO',array('class'=>'errorf')); ?>
<span id='Phone_No_Err' class='Err_Msg'></span>
 <?php if($action=='create') {?>
<label>Login Id *</label>
<?php echo $form->textField($EmployerMaster,'EMP_LOGIN_ID',array('class'=>'text','maxlength'=>45,'id'=>'EmployerMaster_EMP_LOGIN_ID','tabindex'=>11)); ?>
<?php echo $form->error($EmployerMaster,'EMP_LOGIN_ID',array('class'=>'errorf')); ?>	
<label>Password *</label>
 <?php echo $form->passwordField($EmployerMaster,'EMP_PASSWORD',array('class'=>'text','maxlength'=>45,'tabindex'=>13)); ?>
<?php echo $form->error($EmployerMaster,'EMP_PASSWORD',array('class'=>'errorf')); }
else  echo CHtml::link('Change Password',"#ChangePassword", array('id'=>'PasswordLink'));   ?>
<input id="terms" type="checkbox" value="y" name="terms" tabindex="15">
Please accept         <span>
<a style="" href="<?php echo Yii::app()->createAbsoluteUrl("EmployerMaster/agreement_policy")?>" target="_blank" >our privacy policy</a>
</span><br><br><span id="privacy" class="errorf"></span>

</div>
<div class="eight columns">
       <label>First Name *</label>
            <?php echo $form->textField($EmployerMaster,'EMP_FIRST_NAME',array('class'=>'text','maxlength'=>240,'tabindex'=>2)); ?>
            <?php echo $form->error($EmployerMaster,'EMP_FIRST_NAME',array('class'=>'errorf')); ?>

      <label>Email *</label>
      <?php echo $form->textField($EmployerMaster,'EMP_EMAIL_ID',array('class'=>'text','maxlength'=>240,
          'onChange'=>'MailAsLogin()','onBlur'=>'MailAsLogin()','tabindex'=>4)); ?>
      <?php echo $form->error($EmployerMaster,'EMP_EMAIL_ID',array('class'=>'errorf')); ?>


<label>State *</label>

     <button type="button" title="click" class="select_state_button select_button">
         <em style="width: 180px;" id="em_state" tabindex="6">Select</em></button>
     <div id="state_toggle" style="display: none">
      <div id='state' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
   <?php echo CHtml::activeDropDownList($EmployerMaster,'EMP_STATE_ID',CHtml::listData(StateMaster::model()->findAllByAttributes(array('STATE_COUNTRY_ID'=>$EmployerMaster->EMP_COUNTRY_ID)),'STATE_ID', 'STATE_NAME'),
                          array(
                              'size'=>10  ////'empty' => '- - - - Select State - - - -',
//                                'ajax'=>array('type'=>'POST',
//                               'url'=>CController::createURL('StateDropDown'),
//                                'update'=>'#EmployerMaster_EMP_CITY_ID')
                              )
                                  );  
         ?>
      <div style='font-size: 1px'>&nbsp</div>


  </div></div>
<?php echo $form->error($EmployerMaster,'EMP_STATE_ID',array('class'=>'errorf')); ?>
<label>City *</label>
<?php echo $form->textField($EmployerMaster,'EMP_CITY_ID',array('class'=>'text','maxlength'=>240,'tabindex'=>8)); ?>   
<?php echo $form->error($EmployerMaster,'EMP_CITY_ID',array('class'=>'errorf')); ?>

  <label>Zip Code *</label>
  <?php echo $form->textField($EmployerMaster,'EMP_ZIP_CODE',array('class'=>'text','maxlength'=>20,
'onkeypress'=>'return isNumberKey(event);','tabindex'=>10)); ?>
<?php echo $form->error($EmployerMaster,'EMP_ZIP_CODE',array('class'=>'errorf')); ?>
<span id='Zip_Code_err' class='Err_Msg'></span>		

                                                      <label>Mailid As Login</label>
		<?php echo $form->checkBox($EmployerMaster,'EMP_MAIL_AS_LOGIN',array('onClick'=>'MailAsLogin()','tabindex'=>12)); ?>
		<?php echo $form->error($EmployerMaster,'EMP_MAIL_AS_LOGIN',array('class'=>'errorf')); ?>


   <?php if(($First_Record!=0)&&($action=='create'))
       {
       echo $form->label($EmployerMaster,'EMP_REFERRED_BY'); ?>

<?php echo $form->textField($EmployerMaster,'EMP_REFERRED_BY',array('class'=>'text','maxlength'=>45,'id'=>'EMP_REFERRED',
'ajax'=>array('type'=>'POST',
'url'=>CController::createURL('EmpReferred'),
'update'=>'#EmpRefered_err',
'success'=>"function(data)
  {
      if(data!='')
      {
      document.getElementById('EmpRefered_err').innerHTML='Employee Code Does Not exists';
      /*document.getElementById('EMP_REFERRED').value='';*/
      }
      else
      {
      document.getElementById('EmpRefered_err').innerHTML='';
      }
   }"
,),'tabindex'=>14)); ?>
<?php echo $form->label($EmployerMaster,'',array('id'=>'EmpRefered_err','class'=>'errorMessage','style'=>'color:red'));}?>

      <label>Company Website *</label>
 <?php echo $form->textField($EmployerMaster,'EMP_COMP_URL',array('class'=>'text','maxlength'=>240,'tabindex'=>16)); ?>
  <?php echo $form->error($EmployerMaster,'EMP_COMP_URL',array('class'=>'errorf')); ?>											
</div>

<div class="sixteen columns">                                
    <?php echo CHtml::submitButton($EmployerMaster->isNewRecord ? 'SUBMIT' : 'Update', array('class' => 'create','onclick'=>'ajaxAfterValidate()','tabindex'=>18)); ?>

</div>
                       </div>
</div>
                        <!-- Forms Ends -->
<?php $this->endWidget(); ?>  
</body >                       
<script type="text/javascript">
    
   $('.select_country_button').click(function() {
   $('#country_toggle').toggle();
   var divid = 'country';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = document.getElementById(divid).getElementsByTagName('select')[0].offsetWidth+'px';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = document.getElementById(divid).offsetWidth+'px';
   document.getElementById(divid).onscroll = function scrollEvent() { this.getElementsByTagName('select')[0].style.width = parseInt(this.offsetWidth+this.scrollLeft)+'px'; }
    //$('.select_button1').hide();
});

$('#EmployerMaster_EMP_COUNTRY_ID').change(function()
{
   var str = "";
   $("#EmployerMaster_EMP_COUNTRY_ID option:selected").each(function () {
   str += $(this).text() + " ";
   });
   $("#em_country").text(str);
   var divid = 'country';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = '';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = '';
   $('#country_toggle').toggle();  
});


$('.select_state_button').click(function() {
   $('#state_toggle').toggle();
   var divid = 'state';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = document.getElementById(divid).getElementsByTagName('select')[0].offsetWidth+'px';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = document.getElementById(divid).offsetWidth+'px';
   document.getElementById(divid).onscroll = function scrollEvent() { this.getElementsByTagName('select')[0].style.width = parseInt(this.offsetWidth+this.scrollLeft)+'px'; }
    //$('.select_button1').hide();
});
$('#EmployerMaster_EMP_STATE_ID').change(function(){
var str = "";
$("#EmployerMaster_EMP_STATE_ID option:selected ").each(function () {
str += $(this).text() + " ";
});
$("#em_state").text(str);
   var divid = 'state';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = '';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = '';

   $('#state_toggle').toggle();  
});

$(function() {
var country=$("#EmployerMaster_EMP_COUNTRY_ID option:selected").text();
var state=$("#EmployerMaster_EMP_STATE_ID option:selected").text();
if(country=='')
var country='Select';
if(state=='')
var state='Select';
get_data(country,state)
});

function get_data(country,state)
{
$("#em_country").text(country);
$("#em_state").text(state);
}

function ajaxAfterValidate()
{
 
     if(document.getElementById('terms').checked==false)
         {
            document.getElementById('privacy').innerHTML="Please accept our privacy policy";
             return false;
         }
         else
             {
                 document.getElementById('privacy').innerHTML="";
             }
         
         return true;
 }
</script>

<style>
    
button 
    {
    background-image: url("imgs/dropdown_arrow.gif");
    font-family: 'myriad pro';
    font-size: 13px;
/*    outline: medium none;*/
    padding: 0 15px 3px 1px;
    background-position: right center;
    background-repeat: no-repeat;
    background-color:white;

/* background: none repeat scroll 0 0 #FFFFFF;*/
   opacity: 0.7;
    }
button em 
{
    cursor: default;
    display: block;
    font-style: normal;
    overflow: hidden;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.select_button
{
    width:245px;
    height: 28px;
/*    border: medium none;*/
    display: block;
    margin: 0; 
    font-family: 'myriad pro';
    font-size: 13px;
     
}
</style>