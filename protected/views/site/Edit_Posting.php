
<script type="text/javascript">
  
//    $('.viewprofile').live('click',function(e){
////        $(this).removeClass('viewprofile');
////       $(this).addClass('newposting');
//         $(this).toggleClass("newposting");
//    });
</script>



<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(yii::app()->session['Emp_Id']!='')
{   
                $Jobmodel=new JobPosting('search');
		$Jobmodel->unsetAttributes();
                if(isset($_GET['JobPosting']))
                $Jobmodel->attributes=$_GET['JobPosting'];
                 $jpmcount=JobPosting::model()->count("EJP_EMP_ID='".yii::app()->session['Emp_Id']."'");?>
   
 <?php    
    $this->widget('zii.widgets.jui.CJuiTabs', array('id'=>'tabs',
    'tabs' => array(       
        "Edit Posting"  =>
                        array('content'=>$this->renderPartial('/jobPosting/admin',array('model'=>$Jobmodel,'action'=>'edit','jpmcount'=>$jpmcount),true),'id'=>'EditPost'),
        
       
       ), 
        'options' => array(
        'collapsible' => false,
        'selected'=>0
    ),
)); 
}?> 




