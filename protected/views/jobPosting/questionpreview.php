<script type="text/javascript">
    function DisplayMsg(data)
    {
        var splitArr = data.split('@@@'); 
        if(splitArr[0]=='')
        {
        var elt=document.getElementById('Refer_Err');
        elt.style.color="Green";
        $('#Refer_Err').html(splitArr[1]);
        setInterval(function()
        {
            location.href="<?php echo yii::app()->baseUrl;?>"+"/index.php"
        },1000)
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
<?php echo CHtml::beginForm()?>
<div style="width:500px">
    <?php print_r($model->attributes);
    print_r(isset($_POST['JobPosting']));?>
    <?php // echo CHtml::activeTextField($EmployerProspects,'Receipents')?>
    <?php  $this->widget('bootstrap.widgets.TbSelect2', array(
                        'asDropDownList' => false,
                        'model' => $EmployerProspects,
                        'attribute'=>'PROS_MAIL_LIST',
                        'options' => array(
                        'tags' => array(),
//                        'placeholder' => 'Choose Skills',
                        'width' =>'100%',
                        'separator' => ";",   
                        )));	
                 ?>
    <?php echo CHtml::error($EmployerProspects,'PROS_MAIL_LIST'); ?>
  

</div>
<?php echo CHtml::endForm()?>

