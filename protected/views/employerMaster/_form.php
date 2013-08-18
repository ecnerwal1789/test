
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
<body onkeydown="myTrap()">
<?php
if(isset($_GET['suc'])=='suc'){ ?>
<div style="color: green; font-size:15px;font-family:'Trebuchet MS';">
    <td><i>You Have Registered Successfully</i></td>
</div>
<?php
}
?>  

  <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#PasswordLink',
        'config'=>array(
        'scrolling'=>'No',
        'titleShow'=>true,
        ),
        )
    );
?> 
    <div style="display:none">
        <div id="ChangePassword">
            <?php $this->renderPartial('ChangePassword',array('EmployerMaster'=>$EmployerMaster,'Emp_Id'=>$Emp_Id));?>
        </div>
    </div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employer-master-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
    
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            //'afterValidate'=>'js:ajaxAfterValidate',
//            'beforeValidate'=>'js:MailAsLogin',
            )
)); ?>
   
    <div class="Container">
<table width="310" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3"><div class="requiredf"> Fields with <span class="required">*</span> are required.</div></td>
    </tr>
    <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr>
  
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_COMP_NAME'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
            <?php echo $form->textField($EmployerMaster,'EMP_COMP_NAME',array('class'=>'textbox','maxlength'=>240)); ?>
            <?php echo $form->error($EmployerMaster,'EMP_COMP_NAME',array('class'=>'errorf')); ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" height="33"></td>
    </tr>
     <tr>
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_FIRST_NAME'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
            <?php echo $form->textField($EmployerMaster,'EMP_FIRST_NAME',array('class'=>'textbox','maxlength'=>240)); ?>
            <?php echo $form->error($EmployerMaster,'EMP_FIRST_NAME',array('class'=>'errorf')); ?>
        </td>
    </tr>
    <tr>
         <td colspan="3" height="33"></td>
    </tr>
    <tr>
        <td width="111"><div class="user_txt"><?php echo $form->label($EmployerMaster,'EMP_LAST_NAME'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
            <?php echo $form->textField($EmployerMaster,'EMP_LAST_NAME',array('class'=>'textbox','maxlength'=>240)); ?>
            <?php echo $form->error($EmployerMaster,'EMP_LAST_NAME',array('class'=>'errorf')); ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" height="33"></td>
    </tr>
    <tr>
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_EMAIL_ID'); ?> </div></td>
        <td width="14">&nbsp;</td>
                    <td width="282">
                        <?php echo $form->textField($EmployerMaster,'EMP_EMAIL_ID',array('class'=>'textbox','maxlength'=>240,
                                                    'onChange'=>'MailAsLogin()','onBlur'=>'MailAsLogin()')); ?>
                    <?php echo $form->error($EmployerMaster,'EMP_EMAIL_ID',array('class'=>'errorf')); ?>
                    </td>
    </tr>
    <tr>
         <td colspan="3" height="33"></td>
    </tr>
    <tr>
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_COUNTRY_ID'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
        <button type="button" title="click" class="select_country_button select_button">
        <em style="width: 180px;" id="em_country">Select</em></button>
        <div id="country_toggle" style="display: none">
        <div id='country' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
        <?php echo CHtml::activeDropDownList($EmployerMaster,'EMP_COUNTRY_ID',CHtml::listData(CountryMaster::model()->findAll(), 'COUNTRY_ID', 'COUNTRY_NAME'),
                                array(
                                'ajax'=>array('type'=>'POST',
                                'url'=>CController::createURL('CountryDropDown'),
                                'update'=>'#EmployerMaster_EMP_STATE_ID', 
                                   ),
                                  'size'=>10)
                                  ); ?>
       <div style='font-size: 1px'>&nbsp</div></div></div>
        <?php echo $form->error($EmployerMaster,'EMP_COUNTRY_ID',array('class'=>'errorf')); ?>
 </td>
    </tr>
    <tr>
        <td colspan="3" height="33"></td>
    </tr>
    <tr>
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_STATE_ID'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
                    <button type="button" title="click" class="select_state_button select_button">
        <em style="width: 180px;" id="em_state">Select</em></button>
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
               ?> <div style='font-size: 1px'>&nbsp</div>


</div></div>
        <?php echo $form->error($EmployerMaster,'EMP_STATE_ID',array('class'=>'errorf')); ?>
        </td>
    </tr>
    <tr>
         <td colspan="3" height="33"></td>
    </tr>
    <tr>
        <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_CITY_ID'); ?> </div></td>
        <td width="14">&nbsp;</td>
        <td width="282">
            
        <?php //echo CHtml::activeDropDownList($EmployerMaster,'EMP_CITY_ID',CHtml::listData(CityMaster::model()->findAllByAttributes(array('CITY_STATE_ID'=>$EmployerMaster->EMP_STATE_ID)),'CITY_ID', 'CITY_NAME'),
                     // array('empty' => '- - - - Select City - - - -'));?>
         <?php echo $form->textField($EmployerMaster,'EMP_CITY_ID',array('class'=>'textbox','maxlength'=>240)); ?>   
        <?php echo $form->error($EmployerMaster,'EMP_CITY_ID',array('class'=>'errorf')); ?>
        </td>
  </tr>
  <tr>
        <td colspan="3" height="33"></td>
  </tr>
  <tr>
    <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_STREET'); ?> </div></td>
    <td width="14">&nbsp;</td>
    <td width="282">
       <?php echo $form->textField($EmployerMaster,'EMP_STREET',array('class'=>'textbox','maxlength'=>240)); ?>
        <?php echo $form->error($EmployerMaster,'EMP_STREET',array('class'=>'errorf')); ?>
    </td>
  </tr>
  <tr>
        <td colspan="3" height="33"></td>
 </tr>
 <tr>
    <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_ZIP_CODE'); ?></div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
                  <?php echo $form->textField($EmployerMaster,'EMP_ZIP_CODE',array('class'=>'textbox','maxlength'=>20,
                                    'onkeypress'=>'return isNumberKey(event);')); ?>
		<?php echo $form->error($EmployerMaster,'EMP_ZIP_CODE',array('class'=>'errorf')); ?>
                <span id='Zip_Code_err' class='Err_Msg'></span>
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
     <tr>
    <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_PHONE_NO'); ?> </div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
                  <?php echo $form->textField($EmployerMaster,'EMP_PHONE_NO',array('class'=>'textbox','maxlength'=>20,
                                                'onkeypress'=>'return isNumberKey1(event);')); ?>
		<?php echo $form->error($EmployerMaster,'EMP_PHONE_NO',array('class'=>'errorf')); ?>
                <span id='Phone_No_Err' class='Err_Msg'></span>
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
     <tr>
    <td width="111"><div class="user_txt"> <?php if($action=='create') { echo $form->labelEx($EmployerMaster,'EMP_MAIL_AS_LOGIN'); ?> </div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
                 
		<?php echo $form->checkBox($EmployerMaster,'EMP_MAIL_AS_LOGIN',array('onClick'=>'MailAsLogin()')); ?>
		<?php echo $form->error($EmployerMaster,'EMP_MAIL_AS_LOGIN',array('class'=>'errorf')); ?>
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
    <tr>
    <td width="111"><div class="user_txt"><?php echo $form->labelEx($EmployerMaster,'EMP_LOGIN_ID'); ?> </div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
		<div><?php echo $form->textField($EmployerMaster,'EMP_LOGIN_ID',array('class'=>'textbox','maxlength'=>45,'id'=>'EmployerMaster_EMP_LOGIN_ID')); ?>
		<?php echo $form->error($EmployerMaster,'EMP_LOGIN_ID',array('class'=>'errorf'));} ?></div>
                
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
    <tr>  
    <td width="111"><div class="user_txt"> <?php if($action=='create') {echo $form->labelEx($EmployerMaster,'EMP_PASSWORD'); ?> </div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
                 <?php echo $form->passwordField($EmployerMaster,'EMP_PASSWORD',array('class'=>'textbox','maxlength'=>45)); ?>
		<?php echo $form->error($EmployerMaster,'EMP_PASSWORD',array('class'=>'errorf'));}
                      else  echo CHtml::link('Change Password',"#ChangePassword", array('id'=>'PasswordLink'));   ?>
		
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
    <tr>  
    <td width="111"><div class="user_txt"> 
    <?php if(($First_Record!=0)&&($action=='create')) {echo $form->label($EmployerMaster,'EMP_REFERRED_BY'); ?></div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
		<?php echo $form->textField($EmployerMaster,'EMP_REFERRED_BY',array('class'=>'textbox','maxlength'=>45,'id'=>'EMP_REFERRED',
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
                                         ,))); ?>
		<?php echo $form->label($EmployerMaster,'',array('id'=>'EmpRefered_err','class'=>'errorMessage','style'=>'color:red'));} ?>
                    
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
    <tr>  
    <td width="111"><div class="user_txt"> 
    <?php echo $form->labelEx($EmployerMaster,'EMP_COMP_URL'); ?></div></td>
    <td width="14">&nbsp;</td>
                <td width="282">
		<?php echo $form->textField($EmployerMaster,'EMP_COMP_URL',array('class'=>'textbox','maxlength'=>240)); ?>
		<?php echo $form->error($EmployerMaster,'EMP_COMP_URL',array('class'=>'errorf')); ?>
                    
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
<!--     <tr>
         
         <td width="14" style="float: right"><input id="terms" type="checkbox" value="y" name="terms">
        </td>  <td width="111"></td>
        <td class="user_txt" style="padding-left:10px">Please accept
        <span>
        <a style="" href="<?php echo Yii::app()->createAbsoluteUrl("EmployerMaster/agreement_policy")?>" target="_blank" >our privacy policy</a>
        </span><br><br><span id="privacy" class="errorf" style="font-family: none;"></span></td>
      </tr>-->
        <tr>
    <td colspan="3" height="33"></td>
    </tr>
  </table>
        
    <table width="279" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="float:right;"><?php echo CHtml::submitButton($EmployerMaster->isNewRecord ? 'Submit' : 'Update', array('class' => 'create')); ?></td>
      </tr>
      <tr>
    <td colspan="3" height="14"></td>
    </tr>
    </table> 
    </div>
    <br>
<?php $this->endWidget(); ?>  
     </body>
    
<!-- <script> 
window.history.forward(1); 
document.attachEvent("onkeydown", my_onkeydown_handler); 
function my_onkeydown_handler() 
{ 
switch (event.keyCode) 
{ 

case 116 : // 'F5' 
event.returnValue = false; 
event.keyCode = 0; 
window.status = "We have disabled F5"; 
break; 
} 
} 
</script>  -->
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
        
        
	
        
        

	

	
		
     
       
           
	
		
		
	

	

	

	
        
	
        
      
        
           
               
           
	
        
	
	

	
      

 
                