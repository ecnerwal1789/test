<body oncontextmenu="return false;"> 
  <div class="Container" style="min-height:472px;" align="center">     
<div class="candidate_test">
    You are about to take a test in a secure environment
    which does not permit any other browsers or windows to be open.
    <br><br> <p> 
    This is a monitored test and candidates taking this test in an improper 
    fashion will be disqualified!</p><br><p style="padding-left:270px">Test Duration : <?php  echo  yii::app()->session['EJP_TEST_DURATION'];?> minutes <br><br>
No of Questions: <?php  echo  yii::app()->session['EJP_NO_QUES'];?><br><br>
<b>System Requirements:</b><br><br>
</p>
<style>
#loading {
background:url("../imgs/ajax-loader.gif") no-repeat center;
height: 100px; width: 100px;
position: fixed; left: 50%;top: 50%;
/*z-index: 1000;*/
margin: -25px 0 0 -25px;
}</style>

<div id="loading"></div>

<div style=" font-size: 15px;
  /*    font-weight: bold;
  text-align: center;*/
    color:#092962;padding-left: 270px">
    Flash Available:&nbsp;<span id="loadspanflash" style="font-weight: bold"></span>
</div><br>
<div style=" font-size: 15px;
  /*   font-weight: bold;
   text-align: center;*/
    color:#092962;padding-left: 270px">
    WebCam Available:&nbsp;<span id="loadspanwc" style="font-weight: bold"></span>
</div><br><br>

<p> High Bandwidth is recommended for a best performance of the software. </p>

<input type="hidden" id="SUBSCRS_VIDEO_Y_N" name="SUBSCRS_VIDEO_Y_N" value="<?php echo $SUBSCRS_VIDEO_Y_N;?>">


<script>
$(window).load(function(){
$("#loading").fadeOut('slow');
});
</script>


<div style="  padding:60px 10px 0 0;"><?php

echo CHtml::SubmitButton('Next',array('class'=>'create1','onclick' => 'javascript:return openWindow();'));
echo CHtml::hiddenField('flashavail');
?></div><br><br>

</div>
 <?php  
$jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/';
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'swfobject.js');
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'checkwebcam1.js');
?>


<script type="text/javascript">
if(swfobject.hasFlashPlayerVersion("1"))
{
 
   document.getElementById('loadspanflash').innerHTML='Yes';
   document.getElementById('loadspanflash').style.color = 'green';                                  
   document.getElementById("flashavail").value="1";
  
}
else
{
     document.getElementById('loadspanflash').innerHTML='No';
     document.getElementById('loadspanflash').style.color = 'red';                                   
     document.getElementById("flashavail").value="2";
     alert('Flash not available.so you are not eligible to attend the test');
     window.location='http://www.ii-me.com/site/index';
}



</script>

</div>

  </div>
  
 <SCRIPT type="text/javascript">
    
    function openWindow() {
        //Open a new window with no toolbar
var SUBSCRS_VIDEO_Y_N=document.getElementById('SUBSCRS_VIDEO_Y_N').value;
var x = $(window).width();
var y= $(window).height();

x= screen.width;
y=screen.height;

$('body').width(x);
$('body').height(y);

//window.open('http://cricinfo.com','mypage','fullscreen=1,scrollbars=yes')

//requestFullScreen(document.body) ;

var params = 'width='+ x +', height=' + y ;
        params += ', top=0, left=0';
        params += ', fullscreen=yes';
        params += ', directories=no';
        params += ', location=no';
        params += ', menubar=no';
        params += ', resizable=yes';
        params += ', scrollbars=yes';
        params += ', status=yes';
        params += ', toolbar=no';
        if(SUBSCRS_VIDEO_Y_N==1)
        {
        newwin = window.open('<?php echo Yii::app()->request->baseUrl;?>/flip', 'windowname5', params);
 
        //window.location.href='<?php echo Yii::app()->request->baseUrl;?>/flip';
        }
        
        else
        {
          


        newwin = window.open('<?php echo Yii::app()->request->baseUrl;?>/CandidateMaster/Candreg4', 'windowname5', params);
          //window.location.href='<?php echo Yii::app()->request->baseUrl;?>/Cand_Test';
        }

   refreshParent()

    }
           
             
                function refreshParent()
    {
        
   //window.opener.location.href ='http://ii-me.com';
        window.opener.close();
    }
         
</SCRIPT>

<script type="text/javascript">
 document.write(webcam.get_html(0, 0));
  </script>
</body>


<?php 
 CHtml::ajaxButton("Keep + Delete Others",$this->createUrl('/RoleMaster/test'),array(
    
        'type'=>'POST',
        'data'=>array('data'=>1),
        'success'=>'function(data){
            alert("d")
            //window.location="'.$this->createUrl('/contacts/view?id=').'"+data;
        }'
    ),array(
        'class'=>'x2-button highlight',
        'confirm'=>'Are you sure you want to delete all other records?'
    ));
?>

