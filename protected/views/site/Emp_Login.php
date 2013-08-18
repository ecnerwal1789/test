<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form', 
	'enableClientValidation'=>true,
        'action' => Yii::app()->createUrl("EmpLogin"),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
           
	),
));
 ?><div class="page-header">
                  <div class="container">
                        <div class="sixteen columns">
                              <h1 class="one"><span>LOGIN</span></h1>
                        </div>
                  </div>
				  
            </div>	
<div class="container">
			<!-- Form Starts -->
                        <div class="form-element">
                              <div class="sixteen columns center">
                                    <div class="done"> <strong> </strong></div>
                              </div>
                              <div class="form">
                                
                                          <div class="eight columns">
											   
					 <label>Login Id *</label>
                                                <?php echo $form->textField($employeemodel,'login_id',array('class'=>'text'));?>
                                           <span  class="errorf" id="errmsg1"></span>
                                          </div>
                                
										        <div class="eight columns">
  												 <label>Password *</label>
                                                                                                  <?php echo $form->passwordField($employeemodel,'EMP_PASSWORD',array('class'=>'textbox'));?>
						 <span  class="errorf" id="errmsg2"></span>																		
                                          </div>

                                          <div class="sixteen columns">                                                
                                             <?php echo CHtml::submitButton('Login',array('class'=>'log-twitter1','onclick'=>'return user_login()')); ?> 
                                          </div>
                                        </div>
                        </div>
                        <!-- Forms Ends -->
			</div>    <?php $this->endWidget(); ?> 
<span id="errmsg1"></span>

<script type="text/javascript">
    	function user_login(){	
         
//	  var element = document.getElementById("div1");
//                element.classList.add("error_emp_login_new");
		var username=document.getElementById('EmployerMaster_login_id').value;
                var password=document.getElementById('EmployerMaster_EMP_PASSWORD').value;
                 document.getElementById('errmsg1').innerHTML='';
                  document.getElementById('errmsg2').innerHTML='';
		if((username=="Username")||(username=="")){
			document.getElementById('errmsg1').innerHTML='Login Id cannot be blank.';
			document.getElementById('EmployerMaster_login_id').focus();
		    return false;	
		}
                
		if((password=="Password")||(password=="")){
			document.getElementById('errmsg2').innerHTML='Password cannot be blank.';
			document.getElementById('EmployerMaster_EMP_PASSWORD').focus();
		    return false;	
		}
              
		
        }	

</script>