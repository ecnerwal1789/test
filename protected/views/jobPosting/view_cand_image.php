

<div class="tab">View Candidate Image</div>

<div class="Container">
    <div style="padding:10px 10px 10px;">
<?php
$countdata=count($data);
if($countdata>0)
{
$i=1;
foreach($data as $dd)
{
  
    ?>     <?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/image_capture/'.$dd->ci_img_url.'" style="height:200px;width:200px;" /> ',"#data_$i", array('id'=>'image')); ?>

<div style="display:none">
    <div id="data_<?php echo $i;?>">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/image_capture/<?php echo $dd->ci_img_url;?>" >

    </div>
</div>
<?php

$i++;
}
}
else
{
  ?>
   <div class="reg_suc" style="font-size:20px; text-align: -moz-center;" >
        <table>
            <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td>No Records</td></tr>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr></table></div>
    <?php
}
?>
</div>
</div>

<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#image',
        'config'=>array(
        'scrolling'=>'yes',
        'titleShow'=>true,
        ),
        )
);
?>
<style>
/*    img
    {
        height: 200px;
        width: 200px;
    }*/

a
{
    display: inline;
}
</style>