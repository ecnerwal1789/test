<body oncontextmenu="return false;">  

<?php
if(isset($_GET['suc'])=='suc'){ ?>
<div style="color: green; font-size:15px;font-family:'Trebuchet MS';">
<td>  Data has been added successfully</td>
</div>
<?php
}
?>
    
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'candidate-master-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
    
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'afterValidate'=>'js:ajaxAfterValidate',
//            'beforeValidate'=>'js:MailAsLogin',
            )
)); ?>
<!-- leftside ing start here -->

<!-- login bg start here -->

<div class="Container">
<table width="407" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
 
  <tr>
    <td colspan="3" height="60"> </td>
    </tr>
  <tr>
    <td width=."111"><div class="user_txt"><?php echo $form->labelEx($model,'First Name'); ?> </div></td>
    <td width="14">&nbsp;</td>
    <td width="282"><div >
	

                 <?php echo $form->textField($model,'CAND_FIRST_NAME',array('maxlength'=>54,'class'=>'textbox')); ?>
                <?php echo $form->error($model,'CAND_FIRST_NAME',array('class'=>'errorf')); ?>
        	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'Last Name'); ?> </div></td>
    <td>&nbsp;</td>
    <td><div>
	<?php echo $form->textField($model,'CAND_LAST_NAME',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($model,'CAND_LAST_NAME',array('class'=>'errorf')); ?>
	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="34"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'Date Of Birth'); ?></div></td>
    <td>&nbsp;</td>
    <td><div>
	<?php  
   	  $this->widget('zii.widgets.jui.CJuiDatePicker', 
                	array('name'=>'CandidateMaster[CAND_DOB]',
                              'value'=>$model->CAND_DOB,
			      'model'=>$model,// additional javascript options for the date picker plugin
                              'options'=>array(
			      'showAnim'=>'fold',
			      'dateFormat'=>'yy-mm-dd',
//                            'minDate'=> '-50y',
//                            'yearRange'=> '-100',
//                            'maxDate'=> '-18y',  
//                            'maxYear'=>'new Date()-18y',
                              'yearRange'=>'-50:-18', 
                              'changeMonth'=>'true', 
                              'changeYear'=>'true'),
			      'htmlOptions'=>array(
			      'style'=>'height:20px;',
                              'readonly'=>"readonly",
                              'class'=>'textbox'
			),
		));
   	  ?>   <?php echo $form->error($model,'CAND_DOB',array('class'=>'errorf')); ?>
	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'Email Id'); ?></div></td>
    <td>&nbsp;</td>
    <td><div>
                <?php echo $form->textField($model,'CAND_EMAIL_ID',array('maxlength'=>54,'class'=>'textbox','readonly'=>true)); ?> 
                    <?php echo $form->error($model,'CAND_EMAIL_ID',array('class'=>'errorf')); ?>
              </div></td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'Phone No'); ?></div></td>
    <td>&nbsp;</td>
    <td><div>
	<?php echo $form->textField($model,'CAND_PHONE_NO',array('class'=>'textbox','maxlength'=>11,'onKeyPress'=>'return isNumberKey(event);')); ?>
                    <?php echo $form->error($model,'CAND_PHONE_NO',array('class'=>'errorf')); ?>
            <span id='errorj' class='errorMessage'></span>
	</div></td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'Gender'); ?></div></td>
    <td>&nbsp;</td>
    <td>
	<?php echo $form->radioButton($model,'CAND_GENDER', array('value'=>'Male','uncheckValue'=>null,'id'=>'male','class'=>'radioclass')) . 'Male'; ?> 
                <?php echo $form->radioButton($model,'CAND_GENDER',array('value'=>'Female','uncheckValue'=>null,'id'=>'female','class'=>'radioclass')) . 'Female'; ?> 
                    <?php echo $form->error($model,'CAND_GENDER',array('class'=>'errorf')); ?>
	</td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
    <?php if($action=='create'){}?>
            <?php if ($action=='update'){?>
  <tr>
    <td><div class="user_txt"> <?php echo $form->labelEx($model,'CAND_STATUS'); ?></div></td>
    <td>&nbsp;</td>
    <td>
	<?php echo $form->checkBox($model,'CAND_STATUS',array('value' => '1', 'uncheckValue'=>'0'));?> 
         <?php echo $form->error($model,'CAND_STATUS',array('class'=>'errorf')); ?>
             <?php } ?>
	</td>
  </tr>
  
  <tr>
         
         <td width="14" style="float: right"><input id="terms" type="checkbox" value="y" name="terms">
        </td>  <td width="111"></td>
        <td class="user_txt" style="padding-left:10px">Please accept
        <span>
        <a style="text-decoration: underline;" href="<?php echo Yii::app()->createAbsoluteUrl("CandidateMaster/agreement_policy")?>" target="_blank">our privacy policy</a>
        </span><br><br><span id="privacy" class="errorf" ></span></td>
      </tr>
  
  <tr>
    <td colspan="3" height="31"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="140" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="43"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'create')); ?></a></td>
        
      </tr>
    </table></td>
  </tr>
</table>
    <br>
</div><?php $this->endWidget(); ?>
<!-- login bg end here -->
<br>

<script type="text/javascript">
    function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
//alert(charCode)
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       {
           document.getElementById('errorj').innerHTML='Enter Only Numbers';
           document.getElementById('errorj').style.color='red';
           setTimeout(function(){document.getElementById('errorj').innerHTML='';},4000);
            return false;
       }
     
   
   return true;
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

</body>