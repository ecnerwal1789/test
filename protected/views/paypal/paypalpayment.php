<?php $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id='thangapandi.k@tecneto.com'; 
$deleteUrl1 =  Yii::app()->createAbsoluteUrl('Paypal/Create');
$upsub =  Yii::app()->createAbsoluteUrl('Site/Subscription');
 $var=yii::app()->session['dimension1'];
?>

<form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1' id="frmPayPal1" >

<input type="hidden" value="http://ii-me.com/imgs/logo.png" name="image_url">
<input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type='hidden' name='cancel_return' value='http://www.ii-me.com/Paypal/cancel'>
<input type='hidden' name='return' value='http://www.ii-me.com/Paypal/success?session_id=<?php  echo Yii::app()->session->sessionID?>'> 
                
<div class="Container">
  <div style="margin:60px auto; width:99.4%;" >

    	<div style="color:#F00"><?php //echo $msg?></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
            	<tr bgcolor="#FFFFFF" style="font-weight:bold">
                         <td>Serial</td>
                    <td>Name</td> 
                    <td>Amount</td>
                </tr>
			
		<?php 
             
                  $var= TempTransDetail::model()->findAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID));

                  $total='';
                  $j=1;
		  foreach ($var as $key=>$var1){
 
             $sub_id=yii::app()->session['subsid'];
        $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$var1->ttd_sub_id));
       $data1->SUBSCR_DESC;
     $total +=$data1->SUBSCR_RATE; //$data1->SUBSCRS_ID;
     
		?>
            	<tr bgcolor="#FFFFFF">
                    <td><?php  echo $j;?></td>
                    <td><?php  echo $data1->SUBSCR_DESC;?></td>
                    <td style="text-align: right">$<?php echo $data1->SUBSCR_RATE;?></td>
                </tr>
 
<input type="hidden" name="item_name_<?php  echo $j;?>" value="<?php echo $data1->SUBSCR_DESC;?>">
<input type="hidden" name="amount_<?php  echo $j;?>" value="<?php echo $data1->SUBSCR_RATE;?>">



   <?php		$j++;			
				}
			?><tr><td colspan="3" align="right"><b>Order Total: $<?php  echo $total;?></b></td>
</tr>
			<?php
            //}
//			else{
//			olor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
//			}	echo "<tr bgC
		?>
<tr ><td colspan="5" align="right"><input type="submit"  border="0" name="submit" alt="Buy Now" class="delete" value="Buy Now" style="width:80px;font-size: 14px;">
</td></tr>
</form> 
        </table>
            </table>
    </div>  
    <?php echo CHtml::endform(); ?>
</div>

<style> 
    td  a
    {
        text-decoration: underline;
        cursor: pointer;
    }
  td  a:hover{
color:#ff5003;
cursor: pointer;
}
td{
    line-height: 25px;
}</style>