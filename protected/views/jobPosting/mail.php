<!--Hi, <?php echo $cand_mail;?><br />

<br />-->

<?php
    $connection=yii::app()->db;
    $Select="select EPE_TEST_DUE_DATE from employer_post_edits where EPE_ID=".$EPE_ID;
    $Active_Days=$connection->createCommand($Select)->queryScalar();

?>

<!--    You have received a link from <?php  //echo $EMP_COMP_NAME;?> to take an online test.Take the test within 
    <?php //echo $Active_Days;?> days<br />

     Please follow the link below:<br />
<a href="http://ii-me.com/takeurtest?id=<?php //echo $posting_id;?>&valemail=<?php //echo $cand_mail;?>">http://ii-me.com/<?php //echo $posting_id;?>?id=<?php //echo $posting_id;?></a><br />
<br>-->


<div>
<table style="max-width: 595px; border-top-width:20px; border-top-style: solid; border-top-color: #092962; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: 4px; font-family: 'Segoe UI','Lucida Sans Unicode','Lucida Grande',Arial,sans-serif; margin: 0px auto;" border="0" cellpadding="0" cellspacing="0" width="560">
<tbody>
    
<tr>
<td>
    <br>
<span style="margin: 5px 0px;">
    <img src="http://www.ii-me.com/imgs/logo.png">
<br>

</span>

<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="width: 560px; background-color: #DDF0F8;" width="560">
<div style="margin: 15px;">
    

<div style="color: rgb(0, 102, 153); text-decoration: none; font-weight: bold; font-style: normal; font-variant: normal; font-family: 'Segoe UI','Lucida Sans Unicode','Lucida Grande',Arial,sans-serif;padding-bottom:10px;" target="_blank">Hi, <?php echo $cand_mail;?></div><br>
<div style="font-weight: bold; font-style: normal; font-variant: normal; font-size: 13px; line-height: normal; font-family: 'Segoe UI','Lucida Sans Unicode','Lucida Grande',Arial,sans-serif;padding-bottom:10px;">You have received a link from <?php  echo $EMP_COMP_NAME;?> to take an online test.This has to be taken by
    <?php echo $Active_Days;?> </div><br>

</div>    
    
<table style="background-color: #F2F1ED; width: 560px; margin: 15px;" border="0" cellpadding="0" cellspacing="0" width="560">
<tbody>

<tr>
    <td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 13px; line-height: normal; font-family: 'Segoe UI','Lucida Sans Unicode','Lucida Grande',Arial,sans-serif; margin-left: 20px;background-color: #FFFFFF;padding-left: 10px; width: 560px;" >
<p>
Please follow the link below:<br></p>
<div style="margin-left: 50px;"><a href="http://ii-me.com/takeurtest?id=<?php echo $posting_id;?>&valemail=<?php echo $cand_mail;?>&epd=<?php echo $EPE_ID?>">http://www.ii-me.com</a></div>
<br>
</td>
</tr>
</tbody>
</table>

</td>

</tr>
</tbody>
</table>

</td>
</tr>
</tbody>
</table>
</div>
  