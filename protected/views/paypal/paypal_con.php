
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" 
media="screen, projection" />
<?php
$this->pageTitle=Yii::app()->name;
?>
     <?php
     $controlactionid=yii::app()->getController()->getAction()->controller->action->id;          
     if(($action=='success'))
     {

    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Subscription"=>array('id'=>'Purchase'),
         "Order Details" =>array('id'=>'card'),
            "Confirmation" =>array('content'=>$this->renderPartial('/paypal/success',array( ),true),'id'=>'payment'),
 
        ),
        'options' => array(
        'collapsible' => false,
        'selected'=>2
    ),
)); 
     }
     elseif($action=='cancel')
     {
               $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Subscription"=>array('id'=>'Purchase'),
         "Order Details" =>array('id'=>'card'),
          "Confirmation" =>array('content'=>$this->renderPartial('/paypal/cancel',array( ),true),'id'=>'payment'),
 ),
       
        'options' => array(
        'collapsible' => false,
        'selected'=>2
    ),
));      
     }
         
     else {
            $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Subscription"=>array('id'=>'Purchase'),
         "Order Details" =>array('id'=>'card'),
         "Confirmation" =>array('content'=>$this->renderPartial('/paypal/paypalpayment',array( ),true),'id'=>'payment'),
 ),
       
        'options' => array(
        'collapsible' => false,
        'selected'=>2
    ),
)); 
         
}
?> 
     <script>
$(function() {

$( "#tabs" ).tabs({ disabled: [ 0,1 ] });
});
</script>


