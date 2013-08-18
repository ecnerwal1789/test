

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
      	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
if(isset($SUBSCR_CHAR))
{
$model->SUBSCR_CHAR=$SUBSCR_CHAR;
$model->SUBSCR_CODE=$SUBSCR_CODE;
}
?>
<!-- leftside ing start here -->

<!-- login bg start here -->

<div class="Container">
<table width="407" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3"> <div class="requiredf"> Fields with <span class="required">*</span> are required.</div></td>
    </tr>
  <tr>
    <td colspan="3" height="60"> </td>
    </tr>
  <tr>
    <td width=."111"><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCR_CODE'); ?> </div></td>
    <td width="14">&nbsp;</td>
    <td width="282">
	

                  <?php  if(isset($SUBSCR_CHAR))
                { 
                echo  $form->textField($model,'SUBSCR_CHAR',array('size'=>6,'maxlength'=>1,'readonly'=>true));?><?php echo $form->textField($model,'SUBSCR_CODE',array('size'=>10,'maxlength'=>3,'onkeypress'=>'return isNumberKey(event);'));
                    } 
                else {
                    ?>
               <?php echo $form->textField($model,'SUBSCR_CODE',array('size'=>20,'maxlength'=>3,'readonly'=>true)); 
                } ?>
            	<?php echo $form->error($model,'SUBSCR_CODE',array('class'=>'errorf')); ?><br>
            <span id='errorj' class='errorMessage'></span>
        	</td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCR_DESC'); ?> </div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
            <?php echo $form->textField($model,'SUBSCR_DESC',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCR_DESC',array('class'=>'errorf')); ?>
	
	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="34"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCR_RATE'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
	<?php echo $form->textField($model,'SUBSCR_RATE',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCR_RATE',array('class'=>'errorf')); ?>
	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="33"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCR_RATE_WVID'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
               <?php echo $form->textField($model,'SUBSCR_RATE_WVID',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCR_RATE_WVID',array('class'=>'errorf')); ?>
              </div></td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCR_CURR_CODE'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
	<?php echo $form->textField($model,'SUBSCR_CURR_CODE',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCR_CURR_CODE',array('class'=>'errorf')); ?>
            <span id='errorj' class='errorMessage'></span>
	</div></td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
  <tr>
    <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCRS_CAND_COUNT'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
	<?php echo $form->textField($model,'SUBSCRS_CAND_COUNT',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCRS_CAND_COUNT',array('class'=>'errorf')); ?>
    </div></td>
  </tr>
  <tr>
    <td height="33" colspan="3"></td>
    </tr>
   
    <td><div class="user_txt"> <?php echo $form->labelEx($model,'SUBSCRS_ACTIVE_DURATION'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
	<?php echo $form->textField($model,'SUBSCRS_ACTIVE_DURATION',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCRS_ACTIVE_DURATION',array('class'=>'errorf')); ?>
	</div></td>
  </tr>
  <tr>
    <td colspan="3" height="31"></td>
    </tr>
    <tr>
      <td><div class="user_txt"> <?php echo $form->labelEx($model,'SUBSCRS_POST_DURATION'); ?></div></td>
    <td>&nbsp;</td>
    <td><div class="register_search">
	<?php echo $form->textField($model,'SUBSCRS_POST_DURATION',array('maxlength'=>54,'class'=>'searchbox_regi')); ?>
		<?php echo $form->error($model,'SUBSCRS_POST_DURATION',array('class'=>'errorf')); ?>
        </div></td>
  </tr>
  <tr>
    <td colspan="3" height="31"></td>
    </tr>
      <tr>
      <td><div class="user_txt"><?php echo $form->labelEx($model,'SUBSCRS_VIDEO_Y_N'); ?></div></td>
    <td>&nbsp;</td>
    <td>
	<?php echo $form->checkBox($model,'SUBSCRS_VIDEO_Y_N',array('uncheckValue'=>'0')); ?>
		<?php echo $form->error($model,'SUBSCRS_VIDEO_Y_N',array('class'=>'errorf')); ?>
	</td>
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
</script>