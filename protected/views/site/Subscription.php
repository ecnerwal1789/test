

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" 
media="screen, projection" />
<?php

$this->pageTitle=Yii::app()->name;
?>

<?php           
                 $Subscription=new SubscriptionMaster('Sub_search');
                 $Subscription->unsetAttributes();
                  if(isset($_GET['SubscriptionMaster']))
                 $Subscription->attributes=$_GET['SubscriptionMaster'];
   ?>
                  
 <?php 
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Subscription"=>
                      array('content'=>$this->renderPartial('/employerSubscription/_form',array('model'=>new EmployerSubscription,'Subscription'=>$Subscription   ),true),'id'=>'Purchase'),
//                    array('ajax'=>$this->createUrl('JobPosting/Create')),
         "Order Details" =>
                        array('content'=>'','id'=>'card'),
         "Confirmation" =>
                        array('content'=>'','id'=>'payment'),
       
       ), 
        'options' => array(
        'collapsible' => false,
          
        
    ),
)); 
?> 



 <script>
$(function() {

$( "#tabs" ).tabs({ disabled: [ 1, 2 ] });
});
</script>