<script type="text/javascript">
    function DisplayMsg(data)
    {
        var splitArr = data.split('@@@'); 
        if(splitArr[0]=='')
        {
        var elt=document.getElementById('Refer_Err');
        elt.style.color="Green";
        $('#Refer_Err').html(splitArr[1]);
        
        // $.fancybox.close();
//        setInterval(function()
//        {
//             $.fancybox.close();
//        },1000)
        }
        else
        {
        var elt=document.getElementById('Refer_Err');
        elt.style.color="Red";
        var Err='Invalid Mail(s):'+ splitArr[0];
        $('.select2-search-choice').remove();
        $('#Refer_Err').html(Err);
    
         setInterval(function(){
             document.getElementById('Refer_Err').innerHTML='';
             var elt=document.getElementById('EmployerProspects_PROS_MAIL_LIST');
            },1000);
        }
    }
   
    
    
</script>
<?php echo CHtml::beginForm('Site/ReferFriend')?>
<div style="width:500px">
    <?php // echo CHtml::activeTextField($EmployerProspects,'Receipents')?>
    <?php  $this->widget('bootstrap.widgets.TbSelect2', array(
                        'asDropDownList' => false,
                        'model' => $EmployerProspects,
                        'attribute'=>'PROS_MAIL_LIST',
                        'options' => array(
                        'tags' => array(),
//                        'width' =>'100%',
                        'separator' => ";" ,
                        
                            'width'=>234,
                            'height'=>50,
                        )
                        ));	
                 ?>
    <?php echo CHtml::error($EmployerProspects,'PROS_MAIL_LIST'); ?>
    <span id="Refer_Err"></span>
    <div style="margin-left:156px">
        <?php // echo CHtml::submitButton('Mail it',array('submit'=>array('ReferFriend?Emp_Id='.$Emp_Id))); ?>
        <?php echo CHtml::ajaxSubmitButton('Refer Friend',$this->createUrl("ReferFriend?Emp_Id=".$Emp_Id),array(
                                    'type'=>'POST',
                                    'success'=>'DisplayMsg',), array('id' => 'delete'));?>

  </div>
</div>
<?php echo CHtml::endForm()?>

