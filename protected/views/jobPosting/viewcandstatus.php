<script type="text/javascript">
  
//    $('.viewprofile').live('click',function(e){
////        $(this).removeClass('viewprofile');
////       $(this).addClass('newposting');
//         $(this).toggleClass("newposting");
//    });
</script>
<style>
.ui-tabs .ui-tabs-nav li a {
  float: left;
  padding: .5em 1em;
  text-decoration: none;
  float:none;
  font-size:16px;
/*  font-weight:bold;*/
  padding:0.2em 1em;
  text-decoration:none;
  font-family:"Myriad Pro";
  
}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" 
media="screen, projection" />

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>





 <?php 
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(
                
         "Test Summary"=>
                      array('content'=>$this->renderPartial('/jobPosting/ViewCandidateScore',array('Job_Post_Id'=>$Job_Post_Id
                          ),true),'id'=>'completecandidate'),
//                    array('ajax'=>$this->createUrl('JobPosting/Create')),
         "Re-Test Summary" =>
                        array('content'=>$this->renderPartial('/jobPosting/IncompleteCandidate',array('Job_Post_Id'=>$Job_Post_Id),true),'id'=>'Incompletecandidate'),
      
       
       ), 
        'options' => array(
        'collapsible' => false,
        'selected'=>0
    ),
)); 
   
   






 
   







