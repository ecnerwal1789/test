<?php $jqueryslidemenupath = Yii::app()->request->baseUrl.'/css/'; ?>
<!--[if !IE]><!-->
	<link rel="stylesheet" type="text/css" href="<?php echo $jqueryslidemenupath?>/test.css" />
 <!--<![endif]-->

 <!--[if IE]><!-->
	<link rel="stylesheet" type="text/css" href="<?php echo $jqueryslidemenupath?>/test_i.e.css" />
 <!--<![endif]-->
 

<body >
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Candidate_Test',      
    'action'=>'CandidateTest/SubmitTest',
	'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
    
    )); ?>
    <?php       $i=1; 
    //$j=1;
  $count=count($Cand_Test);
  $count1=count($Cand_Test);
  $EJP_NO_QUES=yii::app()->session['EJP_NO_QUES'];
  
  
 ?>
     <input type="hidden" id="EJP_FLAG_UPLOAD_QUES" name="EJP_FLAG_UPLOAD_QUES" value="<?php echo $EJP_FLAG_UPLOAD_QUES;?>">  
          <input type="hidden" id="EJP_NO_QUES" name="EJP_NO_QUES" value="<?php echo yii::app()->session['EJP_NO_QUES'];?>">  

 <?php
    if($EJP_FLAG_UPLOAD_QUES==0)
    {
        ?>
    <input type="hidden" id="count" value="<?php echo $count;?>">            
    <div id="tabs">
     <div id="tab-ques" style="padding-left: 150px;">
        
   <?php
            foreach($Cand_Test as $cand)
            { 
                
                        $Questions=QuestionMaster::model()->findByAttributes(array('QUES_ID'=>$cand->CAND_TEST_QUES_ID));
                        $Cand_Test=new CandidateTest;
                        ?>
         <span class="ques_desc" style="text-align: justify;"><?php echo nl2br(ucfirst($Questions->QUES_DESC));?></span><?php echo "</br>";echo "</br>";
                        
                        //
                        
                                                   
         ?>  <fieldset class="fieldset">     <?php

                if (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)&&($Questions->QUES_OPT_6)!='') 
                {   
                    ?> <?php echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4),
                      "$Questions->QUES_OPT_CDE_5:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_5),
                      "$Questions->QUES_OPT_CDE_6:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_6)				
                      ), array('separator' => '<br>'
                                                        ));
 ?><?php }
                                   
elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)!='') 
                {     
      ?><?php echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4),
                      "$Questions->QUES_OPT_CDE_5:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_5),
                     				
                      ), array('separator' => '<br>'
                                   ));
 ?><?php }
 elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)!='')
                {  
        ?><?php echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4,array('style'=>'border:none')),
                      
                     				
                      ), array('separator' => '<br>'
                                   ));
  ?><?php }
elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)!='')
                { 
      ?><?php   echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                     				
                      ), array('separator' => '<br>'
                                   ));
 ?><?php }
 elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)!='')
                { 
     ?><?php   echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                     
                     				
                      ), array('separator' => '<br>'
                                   ));
?><?php }
elseif (($Questions->QUES_OPT_1)!='')
                { 
     ?><?php   echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      				
                      ), array('separator' => '<br>'
                                   ));
}?><?php
 if (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)&&($Questions->QUES_OPT_6)=='') 
                {   
                  }
 ?></fieldset><?php 
                                                
                                                
  //                                              
                        echo "</br>";
                        echo "</br>";
                        echo CHtml::hiddenField('counti',$i);
                        
                        $i++;?>   </div>
                    <span id="nextid" style="display: none">Click submit if you are done taking the test else click previous to review your answers.The Test needs to be submitted before the allocated time elapses!</span> 
                        <div>
     <?php
            }} ?> </div>     
 
               
                        

 </div>	
   
 <?php
 if($EJP_FLAG_UPLOAD_QUES==1)
    
 {
     ?>    <input type="hidden" id="count" value="<?php echo $count;?>">            
    <div id="tabs">
     <div id="tab-ques" style="padding-left: 150px;">
    <?php
    
            foreach($Cand_Test as $cand)
            { 
                
                        $Questions=EmpQuestionUpload::model()->findByAttributes(array('EQU_QUES_ID'=>$cand->CAND_UT_QUES_ID));
                
                        ?>
         <span class="ques_desc" style="text-align: justify;"><?php echo nl2br(ucfirst($Questions->EQU_QUES_DESC));?></span><?php echo "</br>";echo "</br>";
                        
                        //
                        
                                                   
         ?>  <fieldset class="fieldset">     <?php

                if (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)&&($Questions->EQU_OPT_3)&&($Questions->EQU_OPT_4)&&($Questions->EQU_OPT_5)&&($Questions->EQU_OPT_6)!='') 
                {   
                    ?> <?php echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      "$Questions->EQU_OPT_CDE_2:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_2),
                      "$Questions->EQU_OPT_CDE_3:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_3),
                      "$Questions->EQU_OPT_CDE_4:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_4),
                      "$Questions->EQU_OPT_CDE_5:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_5),
                      "$Questions->EQU_OPT_CDE_6:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_6)				
                      ), array('separator' => '<br>'
                                                        ));
 ?><?php }
                                   
elseif (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)&&($Questions->EQU_OPT_3)&&($Questions->EQU_OPT_4)&&($Questions->EQU_OPT_5)!='') 
                {     
      ?><?php echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      "$Questions->EQU_OPT_CDE_2:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_2),
                      "$Questions->EQU_OPT_CDE_3:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_3),
                      "$Questions->EQU_OPT_CDE_4:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_4),
                      "$Questions->EQU_OPT_CDE_5:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_5),
                     				
                      ), array('separator' => '<br>'
                                   ));
 ?><?php }
 elseif (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)&&($Questions->EQU_OPT_3)&&($Questions->EQU_OPT_4)!='')
                {  
        ?><?php echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      "$Questions->EQU_OPT_CDE_2:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_2),
                      "$Questions->EQU_OPT_CDE_3:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_3),
                      "$Questions->EQU_OPT_CDE_4:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_4,array('style'=>'border:none')),
                      
                     				
                      ), array('separator' => '<br>'
                                   ));
  ?><?php }
elseif (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)&&($Questions->EQU_OPT_3)!='')
                { 
      ?><?php   echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      "$Questions->EQU_OPT_CDE_2:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_2),
                      "$Questions->EQU_OPT_CDE_3:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_3),
                     				
                      ), array('separator' => '<br>'
                                   ));
 ?><?php }
 elseif (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)!='')
                { 
     ?><?php   echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      "$Questions->EQU_OPT_CDE_2:$cand->CAND_UT_QUES_ID" => Yii::t('dashboard', $Questions->EQU_OPT_2),
                     
                     				
                      ), array('separator' => '<br>'
                                   ));
?><?php }
elseif (($Questions->EQU_OPT_1)!='')
                { 
     ?><?php   echo CHtml ::radioButtonList('CAND_UT_QUES_ID'.$i,'CAND_UT_QUES_ID'.$i, array(

                      "$Questions->EQU_OPT_CDE_1:$cand->CAND_UT_QUES_ID"=> Yii::t('dashboard', $Questions->EQU_OPT_1),
                      				
                      ), array('separator' => '<br>'
                                   ));
}?><?php
 if (($Questions->EQU_OPT_1)&&($Questions->EQU_OPT_2)&&($Questions->EQU_OPT_3)&&($Questions->EQU_OPT_4)&&($Questions->EQU_OPT_5)&&($Questions->EQU_OPT_6)=='') 
                {   
                  }
 ?></fieldset><?php 
                                                
                                                
  //                                              
                        echo "</br>";
                        echo "</br>";
                        echo CHtml::hiddenField('counti',$i);
                        
                        $i++;?>   </div>
                    <span id="nextid" style="display: none">Click submit if you are done taking the test else click previous to review your answers.The Test needs to be submitted before the allocated time elapses!</span> 
                        <div>
     <?php
            }} ?> </div>    </div>	 
    <!--</div>-->
  </body>
 <?php $this->endWidget();
 $deleteUrl =  Yii::app()->createAbsoluteUrl('CandidateTest/SubmitTest');?>
        
        
 <script>
     

    var countid=document.getElementById('count').value;

   $('#tabs div').first().attr('class', 'current');
			
			$('#tabs div').each(function(i) {
                            
				i = i + 1;
                               var  ci=i-1;
                               var tabid='tab-' + i;
                              $(this).attr('id', 'tab-' + i);
                                     if(tabid!='tab-1')
                                         {
                                             $("#"+tabid).addClass("tab-lab");
                                         }
                                         if(ci==countid)
                                             {
                                                 $(this).append('<p class="posting_suc_p">Click submit if you are done taking the test else click previous to review your answers.</p><br><p class="posting_suc_p">The Test needs to be submitted before the allocated time elapses!</p><br>');
                                                // $("#nextid").css("display", "block");
                                              
                                             }
                                             else
                                              {
                                                    if(tabid=='tab-1')
                                                      {
                                                            //
                                                            //  document.getElementById('ques_id').innerHTML='Question 1 of <?php echo yii::app()->session['EJP_NO_QUES'] ;?>';
                                                      
                                                            document.getElementById('test_header_div').innerHTML='Question 1 of <?php echo yii::app()->session['EJP_NO_QUES'] ;?>';
                                                    }
                                             
                                              }
				if(i !== 1) {
                                    
                                      
					$(this).append('<button class="tabPagination create2" rel="tab-' + (i - 1) + '">Previous</button>');
                                      
                                        //$("#Next").attr('disabled',true);
                                         $("#Next").hide();
                                         
                                       
				}
                                else
                                    {
                                    
                                      //$(this).append('<span class="prev_button" id="pre"></span>');
                                      $(this).append('<button class="tabPagination create2" id="Prev" rel="tab-' + (i - 1) + '">Previous</button>');
                                  
                                      //$("#Prev").attr('disabled',true);
                                      $("#Prev").hide();
                                   
                                       //$("#Prev").hide();
                                  
                                    }
				if(i !== $('#tabs div').size()) 
                                {
                                  
                                  if(i==1)
                                      {
                                            
                                      
                                      $(this).append('<button class="tabPagination create2 next_buton1" rel="tab-' + (i + 1) + '">Next</button>');
                                     

                                      }
                                      else
                                      {
					 $(this).append('<button class="tabPagination create2 next_buton" rel="tab-' + (i + 1) + '">Next</button>');
                                       
                                      }
                                     
				}
                                else
                                    {
                                    
                                        
                                  //$("#nextid").show();

                                        
                                        $(this).append('<button class="tabPagination create2 next_buton" id="Next" rel="tab-' + (i + 1) + '">Next</button>');
                                        
                                        //$("#Next").attr('disabled',true);
                                        $("#Next").hide();
                                        $(this).append('<button class="tabPagination create2" id="Submit" name="Submit" >Submit</button>');
                                    }
				
			});			

			$('#tabs div[class!="current"]').hide();
			
			$('.tabPagination').live('click', function(e) {
                      
				$('.current').removeAttr('class');
				$('#tabs div[class!="current"]').hide();
				$('#' + $(this).attr('rel')).show();
                                 var selrel = $(this).attr('rel');
                                
                                //$('#'+$(this).addClass('tab-lab'));
                           
                                e.preventDefault();
                                sel(selrel,countid)
			});
                        $('#Submit').click(function()
                        {   
                            
                            document.getElementById('Candidate_Test').submit();			
                        }


          


    );

             
                            
//                            $('#Submit').trigger('SubmitTest');
//                              $.ajax({
//                                'type':'POST',
//                                'url':'CandidateTest/SubmitTest'
//                              });  
//                            alert('hi');
                              //  $(this).attr('action','SubmitTest')
                    
                            
//                            $.yii.submitForm(
//                                     this,
//                                     'candidateTest/SubmitTest',{}
//                                          );return false;});



    document.onkeydown = function (e) {
      //alert(e.which)
     return false;
           
    }
//  $(window).on("blur", function(e) {
//    //alert('hi')
//    //window.location.href='ii-me.com';
////   $("html, body").css({ background: "", color: "" })
////   .find("h2").html("CLICK HERE TO GIVE THIS BOX FOCUS BEFORE PRESSING F5");
//});    

    var foucussedOut = 0 ;
$(window).on("blur", function(e) {
  foucussedOut = foucussedOut + 1 ;
  foucussedOut < 3 ? alert('You are violating test policy') : function(){
  alert('You have violated the Test policy. Test is going to close');
   window.close();

}();



});
function sel(selrel,countid)
{
   var total_time= document.getElementById('total_time').value;
    var current_time=$("#significantLayout2").text();
    var spcurrent_time=current_time.split(':'); 
    var spmin=spcurrent_time[0]*60;
    var sptotal=parseInt(spmin) + parseInt(spcurrent_time[1]);
   // var current_time_c= current_time.replace(/:/g,"."); 
    

    //var timetosec=current_time_c* 60;
    //var current_time_c=current_time_c.toFixed(2);
    

    var time_diff=parseInt(total_time)-parseInt(sptotal);
   
    //document.getElementById('time_interval_'+splitArr[1]).value=timetosec;
   var splitArr = selrel.split('-'); 
   if(parseInt(splitArr[1])<=parseInt(countid))
       {
   document.getElementById('test_header_div').innerHTML='Question '+splitArr[1]+ ' of <?php echo yii::app()->session['EJP_NO_QUES'] ;?>';
     }               
   else
   {
  document.getElementById('test_header_div').innerHTML='';
   }
    var cid=splitArr[1]-1;
   document.getElementById('total_time').value=sptotal;
   var tim=document.getElementById('time_interval_'+cid).value;
   
  document.getElementById('time_interval_'+cid).value=parseInt(tim)+time_diff;


}
</script>      
<!--</body>-->
<?php
$jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/countdown/';
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'jquery.countdown.css');	
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'jquery.countdown.js');
//$from_time = strtotime("+20 minutes");
//$to_time = strtotime("now");
 $from_time =yii::app()->session['CAND_TS_ET'];
 $to_time =strtotime("now");
 $mi=abs($from_time-$to_time);

?>

<script type="text/javascript">
$(function () {

$('#significantLayout2').countdown({until: '<?php echo $mi ?>', significant: 2, 
    format:'MS',
    compact: true, 
    layout: $('#imageLayout').html(),
    onTick: warnUser}); 


});

function warnUser(periods) { 

   if ($.countdown.periodsToSeconds(periods) == 300) { 
    setTimeout(function(){alert("Five minutes remaining!"); },500);
   }
    if ($.countdown.periodsToSeconds(periods) == 60) { 
    setTimeout(function(){alert("one minute remaining..You can check all your answer"); },500);
   }
   if ($.countdown.periodsToSeconds(periods) == 0) { 
   setTimeout(function(){alert("Your Exam Time Over!"); },1000); 
     document.getElementById('Candidate_Test').submit();	
   }
   
}
adjust()
function adjust()
{
var vid=document.getElementById('webcam_movie'); // ID of your embed tag
vid.style.width='0px';
vid.style.height='0px';
}
//$('input[type=radio]').click(function() {
//var vadr=$(this).attr('id');
//alert(vadr)
//    e.preventDefault(); 
//  $('label[for=' + vadr + ']').css({ background: "green", color: "green" })
//           // $('input[type=radio]').addClass("checked");
//       
//   
//});

</script>
<input type="hidden" value="<?php echo $mi ?>" id="total_time" name="total_time">
<?php 
for($t=1;$t<=$EJP_NO_QUES;$t++)
{
 ?>
<input type="hidden" id="time_interval_<?php echo $t;?>" name="time_interval_<?php echo $t;?>" value="0">
<?php
}
?>

<style>
    
   .test_header_div
    {
        margin-left:159px;
        padding:33px 0 0 0;
        font-size: 18px;
        float:left;
      
    }
    
        @media only screen and (max-width:800px)     { 
.test_header_div {
margin-left:63px;
}

label{
    width:591px;
}

.next_buton{
    margin-left:337px;
}

.fieldset
{
   width: 607px
}
    } 
    
    
.current
{
padding-left:60px !important
}
body
{
    font-family: "myriad Pro";
    font-size:14px;
}
</style>
