
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" 
media="screen, projection" />
<?php
$this->pageTitle=Yii::app()->name;
?>

                  
 <?php 
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Subscription"=> array('id'=>'Purchase'),

         "Order Details" =>
                        array('content'=>$this->renderPartial('/employerSubscription/order1',array( ),true),'id'=>'card'),

         "Confirmation" =>
                        array('id'=>'payment'),
       
       ), 
        'options' => array(
        'collapsible' => false,
        'selected'=>1
    ),
)); 
?> 



 <script>
$(function() {

$( "#tabs" ).tabs({ disabled: [ 0,2 ] });
});
</script>