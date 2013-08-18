<?php 
echo 'ffgdfg'?>  <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
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
            <?php $this->renderPartial('/employerMaster/ChangePassword',array('EmployerMaster'=>new EmployerMaster,'Emp_Id'=>1));?>
        </div>
    </div>

<?php
 echo CHtml::link('Change Password',"#ChangePassword", array('id'=>"PasswordLink")); 
?>