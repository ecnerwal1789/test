<script type="text/javascript">
    function DispMsg(data)
    {  
        if(data!='')
        {
         //var emp_id=data.split('...');
       if(data=='Password Changed Successfully')
        { 
             var elt=document.getElementById('Pass_Msg');
              elt.style.color="Green";
            $('#Pass_Msg').html(data);
            setTimeout(function(){
             document.getElementById('EmployerMaster_Old_Password').value='';
             document.getElementById('EmployerMaster_New_Password').value='';
             document.getElementById('EmployerMaster_Confirm_Password').value='';  
             document.getElementById('Pass_Msg').innerHTML='';
             $.fancybox.close();
            },750)
            
        }
        else
        {   
            var elt=document.getElementById('Pass_Msg');
            elt.style.color="Red";
            $('#Pass_Msg').html(data);
             document.getElementById('EmployerMaster_Old_Password').value='';
             document.getElementById('EmployerMaster_New_Password').value='';
             document.getElementById('EmployerMaster_Confirm_Password').value='';
        }
        }
        
   }
                    
</script>

<?php echo CHtml::beginForm()?>
        <?php echo CHtml::activeLabelEx($EmployerMaster,'Old_Password');?>
        <div style="float:right"><?php echo CHtml::activePasswordField($EmployerMaster,'Old_Password');?></div>
            <?php echo "</br>";?>
             <?php echo "</br>";?>
        <?php echo CHtml::activeLabelEx($EmployerMaster,'New_Password');?>
        <div style="float:right"><?php echo CHtml::activePasswordField($EmployerMaster,'New_Password');?></div>
             <?php echo "</br>";?>
             <?php echo "</br>";?>
        <?php echo CHtml::activeLabelEx($EmployerMaster,'Confirm_Password');?>
        <div style="float:right"><?php echo CHtml::activePasswordField($EmployerMaster,'Confirm_Password');?></div>
             <?php echo "</br>";?>
             <?php echo "</br>";?>
        <?php //  echo CHtml::submitButton('Change Password',array('submit'=>array('EmployerMaster/ChangePassword?Emp_Id='.$Emp_Id))); ?>
        <?php echo CHtml::ajaxSubmitButton('Change Password',$this->createUrl('ChangePassword?Emp_Id='.$Emp_Id),array('id'=>'change',
                                    'type'=>'POST',
                                    'success'=>"DispMsg",));
        ?>
        <span id="Pass_Msg"  style="color:red"></span>
 <?php echo CHtml::EndForm(); ?> 

