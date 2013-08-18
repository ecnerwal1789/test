
<?php 

$deleteUrl1 =  Yii::app()->createAbsoluteUrl('Paypal/order');
$upsub =  Yii::app()->createAbsoluteUrl('Site/Subscription',array('update'=>1));
$clearcart =  Yii::app()->createAbsoluteUrl('EmployerSubscription/removesuball');
 

?>
<div class="Container">
  <div style="margin:60px auto; width:99.4%" >

    	<div style="color:#F00"><?php //echo $msg?></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style=" font-size:13px; background-color:#E1E1E1" width="100%">
            	<tr bgcolor="#FFFFFF" style="font-weight:bold">
                    <td>Serial</td>
                    <td>Name</td> 
                    <td>Amount</td>
                    <td>Options</td>
                </tr>
			
		<?php 
             
              
                  $total='';
                 $var= TempTransDetail::model()->findAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID));
                  $j=1;
		  foreach ($var as $var1){
 

        $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$var1->ttd_sub_id));
        $data1->SUBSCR_DESC;
        $total +=$data1->SUBSCR_RATE; //$data1->SUBSCRS_ID;
     
		?>
            	<tr bgcolor="#FFFFFF">
                    <td><?php echo $j;?></td>
                    <td><?php  echo $data1->SUBSCR_DESC;?></td>
                    <td style="text-align: right">$<?php echo $data1->SUBSCR_RATE;?></td>
                    <td><a onclick="clear_cart('<?php echo $var1->ttd_td_id; ?>','<?php  echo $var1->ttd_id; ?>')" style="text-decoration:underline" >Remove</a></td></tr>
            <?php					
				$j++;}
			?>
                <tr><td colspan="5" align="right"><b>Order Total: $ <?php  echo $total;?></b></td></tr>
                <?php yii::app()->session['total']=$total; ?>
                    <tr><td colspan="5" align="right">
                            <input type="button" value="Clear Cart"  class="delete" onclick="js:window.location.href='<?php echo $clearcart;?>'" style="width:90px;">
                            <input type="button" value="Update Cart"  class="delete" onclick="js:window.location.href='<?php echo $upsub;?>'" style="width:90px;">
                            <input type="button" value="Place Order"   class="delete" onclick="js: window.location.href='<?php echo $deleteUrl1;?>'"  style="width:90px;"></td></tr>
			<?php
            //}
//			else{
//			olor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
//			}	echo "<tr bgC
		?>
        </table>
    </div>  
</div>
<script type="text/javascript">
function clear_cart(ttd_td_id,key)
{

      $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("EmployerSubscription/removesub"); ?>',
     data:"key="+key+"&ttd_td_id="+ttd_td_id+"&sid="+Math.random(),
    success:function(data){
    
        if(data==0)
     {
         window.location.href='<?php echo $upsub;?>';
     }
     else
     {
        window.location.reload();
     }
 }
 });  

  //return true;

}
    
</script>

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
}
</style>