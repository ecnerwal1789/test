<?php  
$jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/';
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'webcam.js');
 $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
 $EJPL2_CAND_ID=yii::app()->session['Cand'];
?>
	<script language="JavaScript">
		webcam.set_api_url( 'webcam_insert.php?ejpid=<?php echo $EJPL2_EJP_ID; ?>&ejpcid=<?php echo $EJPL2_CAND_ID; ?>' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( false );
                webcam.set_stealth( true );// play shutter click sound
	</script>
	
<body>
   <div class="divhasCountdown">
       <span id="ques_id" class="ques_class"></span>
<!--       <span id="significantLayout2" ></span>-->
   </div> 
<div class="Container3">
        <div id="tabs_lo"  style="display: none" ></div>
    <div style="padding:10px 0px" align="center">
<script language="JavaScript">
document.write( webcam.get_html(250, 240) );
</script>
    </div>
<div id="upload_results" style="background-color:#eee;"></div>
 <div style=" padding:0px 0px;" align="center">
     <input type="button" id="begintest" class="create1" value="Begin Test"  disabled  onclick="begintest()" style="float: none"></div>
   <input type="hidden" name="interval" id="interval" value="<?php echo yii::app()->session['image_interval']?>">
</div>
 	<script language="JavaScript">
	webcam.set_hook( 'onComplete', 'my_completion_handler' );
	webcam.set_hook( 'onLoad', 'my_load_handler' );
        webcam.set_hook( 'onAllow', 'my_allow_handler' );
  
		
function allowed() {
    

            var myVar=setInterval(function(){myTimer()},'<?php echo yii::app()->session['image_interval']?>');
            
            function myTimer()
            {
                
                       take_snapshot()
            } 
}
function my_load_handler(allowStatus) {

    if(allowStatus) {
        if(document.getElementById('begintest').disabled==true)
            {
              document.getElementById('tabs_lo').style.display='block';
              document.getElementById('begintest').disabled=false;
            }
       
    }
}
function my_allow_handler(msg) {

    if((msg==true)&&(document.getElementById('begintest').disabled==true))
        {
                   
              my_load_handler(true);
        }
        else
        {
              //window.location.href='http://www.ii-me.com' ; 
              window.close();
        }

   // allowed();
}
		function take_snapshot() {
			// take snapshot and upload to server
			
			webcam.snap();
		}
		
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = '';
				
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
     


           function begintest()
           {
         
                         //document.getElementById('begintest').disabled=false; 
                       $('#tabs_lo').load('<?php echo Yii::app()->request->baseUrl;?>/CandidateTest/TakeTest');
                        document.getElementById('begintest').style.display='none';
                         allowed();
                     } 
 </script>                   
