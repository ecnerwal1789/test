<html>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
	<head>
		<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<!--<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
		<!-- Please download the JW Player plugin from http://www.longtailvideo.com/jw-player/download -->
	
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<?php  
                $jqueryslidemenupath = Yii::app()->request->baseUrl.'/ScriptCam/';
                Yii::app()->clientScript->registerCoreScript('jquery');
                Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'scriptcam.js');
?>
<script language="JavaScript" src="<?php echo $jqueryslidemenupath ?>scriptcam.js"></script>

                <style>
			#webcam {
				float:left;
			}
			#volumeMeter {
				background-image:url('<?php echo $jqueryslidemenupath ?>ledsbg.png');
				width:19px;
				height:133px;
				padding-top:5px;
			}
			#volumeMeter img {
				padding-left:4px;
				padding-top:1px;
				display:block;
			}
			.ui-slider {
				background:none;
				background-image:url('<?php echo $jqueryslidemenupath ?>trackslider.png');
				border:0;
				height:107px;
				margin-top:16px;
			}
			.ui-slider .ui-slider-handle {
				width:14px;
				height:32px;
				margin-left:7px;
				margin-bottom:-16px;
				background:url('<?php echo $jqueryslidemenupath ?>volumeslider.png') no-repeat; 
			}
			#volumePanel {
				-moz-border-radius: 0px 5px 5px 0px;
				border-radius: 0px 5px 5px 0px;
				background-color:#4B4B4B;
				width:55px;
				height:160px;
				-moz-box-shadow: 0px 3px 3px #333333;
				-webkit-box-shadow: 0px 3px 3px  #333333;
				shadow: 0px 3px 3px #333333;
			}
			#setupPanel {
				width:400px;
				height:30px;
				margin:5px;
			}
		</style>
         <?php  $id=rand();?>
	
	</head>
	<body>
            <div  class="Container">
                <div class="candidate_test">
                <p> <?php echo $EMP_COMP_NAME;?> has requested a brief introduction from you, to be recorded over video.<br> Please accept to continue. You have 60 seconds. </p></div>
		<div id="message"></div>

               <div id="recorder"  style="padding-left:295px;width:686px; ">
                    
			<div id="webcam">
			</div>
			<div id="volumePanel" style="float:left;position:relative;top:10px;">
				<div id="volumeMeter" style="position:absolute;top:10px;left:7px;float:left;">
					<img id="LedBar32" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar31" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar30" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar29" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar28" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar27" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar26" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar25" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar24" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar23" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar22" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar21" src="<?php echo $jqueryslidemenupath ?>ledred.png">
					<img id="LedBar20" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar19" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar18" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar17" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar16" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar15" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar14" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar13" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar12" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar11" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar10" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar9" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar8" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar7" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar6" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar5" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar4" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar3" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar2" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
					<img id="LedBar1" src="<?php echo $jqueryslidemenupath ?>ledgreen.png">
				</div>
				<div id="slider" style="position:absolute;top:10px;left:30px;">
				</div>
			</div>
			<br clear="both"/>
<!--			<div id="setupPanel">
				<img src="<?php echo $jqueryslidemenupath ?>webcamlogo.png" style="vertical-align:text-top"/>
				<select id="cameraNames" size="1" onChange="changeCamera()" style="width:145px;font-size:10px;height:25px;">
				</select>
				<img src="<?php echo $jqueryslidemenupath ?>miclogo.png" style="vertical-align:text-top;padding-left:45px;"/>
				<select id="microphoneNames" size="1" onChange="changeMicrophone()" style="width:128px;font-size:10px;height:25px;">
				</select>
			</div>-->
<input type="hidden" id="videofilename" name="videofilename" > 
	<span style="padding-left:5px;padding-right:5px;">
	
                            <input type="text" id="timeLeft" style="width:50px;font-size:10px;" disabled >
			</span>
                        <input type="button" id="recordStartButton" class="btn btn-small" onclick="startRecording()" disabled  value="Start">&nbsp;
		
			<input type="button" id="recordPauseResumeButton" class="btn btn-small" onclick="pauseResumeCamera()" value="Pause" disabled> 
			<input type="button" id="recordStopButton" class="btn btn-small" onclick="closeCamera()"  value="Stop" disabled> 
                       	<input type="button" id="resetButton" class="btn btn-small" onclick="reset()"  value="Re-shoot" disabled>
                        <input type="button" id="previewButton" class="btn btn-small" value="Preview" disabled  onclick="preview()">
            <input type="button" id="nextButton" class="btn btn-small" value="Next" disabled  onclick="next()">
                        
		</div>
                
                <div id="mediaplayer" style="display: none" >
                     <?php
                 	
                        $this->renderPartial('/jobPosting/view_cand_video',array("Cand_Id"=>yii::app()->session['Cand'],"ejp_id"=>yii::app()->session['Job_Post_Id'])); ?>    
               
                </div>
                          
            </div>
	</body>
</html>
<!--<style>
#loading {
background:url("imgs/ajax-loader.gif") no-repeat center;
height: 100px; width: 100px;
position: fixed; left: 50%;top: 50%;
/*z-index: 1000;*/
margin: -25px 0 0 -25px;
}</style>

<div id="loading"></div>-->

	<script>
			$(document).ready(function() {
				$("#webcam").scriptcam({ 
					fileReady:fileReady,
					cornerRadius:20,
					cornerColor:'e3e5e2',
					onError:onError,
					promptWillShow:promptWillShow,
					showMicrophoneErrors:false,
					onWebcamReady:onWebcamReady,
					setVolume:setVolume,
					timeLeft:timeLeft,
                                        maximumTime:10,
					fileName:'<?php echo $id;?>',
					connected:showRecord
				});
				setVolume(0);
				$("#slider").slider({ animate: true, min: 0, max: 100 , value: 50, orientation: 'vertical', disabled:true});
				$("#slider").bind( "slidechange", function(event, ui) {
					$.scriptcam.changeVolume($( "#slider" ).slider( "option", "value" ));
				});
			});
			function showRecord() {
				$( "#recordStartButton" ).attr( "disabled", false );
			}
			function startRecording() {
                       
				$( "#recordStartButton" ).attr( "disabled", true );
				$( "#recordStopButton" ).attr( "disabled", false );
				$( "#recordPauseResumeButton" ).attr( "disabled", false );
				$.scriptcam.startRecording();
			}
			function closeCamera() {
                        
				//$("#slider").slider( "option", "disabled", true);
				$("#recordPauseResumeButton" ).attr( "disabled", true );
				$("#recordStopButton" ).attr( "disabled", true );
				$.scriptcam.closeCamera();
				//$('#message').html('Please wait for the file conversion to finish...');
                                $("#recordPauseResumeButton" ).attr( "disabled", true );
				$("#recordStopButton" ).attr( "disabled", true );
			}
			function pauseResumeCamera() {
                           var recordPauseResumeButton= document.getElementById('recordPauseResumeButton').value;
                          
				if (recordPauseResumeButton== 'Pause') {
					document.getElementById('recordPauseResumeButton').value='Resume';
					$.scriptcam.pauseRecording();
				}
				else {
					document.getElementById('recordPauseResumeButton').value= 'Pause';
					$.scriptcam.resumeRecording();
				}
			}
			function fileReady(fileName) {
                       
				$('#recorder').show();
                               $("#recordPauseResumeButton" ).attr( "disabled", true );
				$("#recordStopButton" ).attr( "disabled", true );
				//$('#message').html('This file is now dowloadable for five minutes over <a href='+fileName+'">here</a>.');
				var fileNameNoExtension=fileName.replace(".mp4", "");
                                var fileName1=fileName.replace("http://europe.www.scriptcam.com/dwnld/", "");
                                var fileName2=fileName1.replace(".mp4", "");
                                         
                           
                                 $.ajax({
                                type: 'POST',
                                url: '<?php echo Yii::app()->createAbsoluteUrl("CandidateTest/video"); ?>',
                                 data:"fileName1="+fileName1+"&sid="+Math.random(),
                                success:function(data){

                                if(data!='')
                                    {
                                        document.getElementById('videofilename').value=data;
                                        document.getElementById('previewButton').disabled=false;
                                         document.getElementById('nextButton').disabled=false;
                                         
                                    }
                                    else
                                    {
                                        setTimeout('alert(\'Some problem in video.please capture aother one time\')', 2000);
                                        window.location.reload();
                                    }
                             }
                             });  
                             
                             
			}
			function onError(errorId,errorMsg)
                        {
                                  
                          if(errorId=='11')
                              {
                                  alert("Your video captured successfully .please hold few minutes to save that in our server");
                                  //$("#loading").fadeOut('slow');
                              }
                              else if(errorId=='4')
                                  {
                                       alert("Video recording is mandatory. You cannot proceed without this");
                                         window.location.reload();
                                  }
                        else
                            {
                                setTimeout('countdown_trigger(\''+errorMsg+'\')', 1000);

                            }
                              
                              
                            
			}
                        
                        function countdown_trigger(errorMsg)
                        {
                              alert(errorMsg)
                              window.location.reload();
                        }
			function onWebcamReady(cameraNames,camera,microphoneNames,microphone,volume) {
				$( "#slider" ).slider( "option", "disabled", false );
				$( "#slider" ).slider( "option", "value", volume );
				$.each(cameraNames, function(index, text) {
					$('#cameraNames').append( $('<option></option>').val(index).html(text) )
				}); 
				$('#cameraNames').val(camera);
				$.each(microphoneNames, function(index, text) {
					$('#microphoneNames').append( $('<option></option>').val(index).html(text) )
				}); 
				$('#microphoneNames').val(microphone);
                               $( "#recordStartButton" ).attr( "disabled", false );
				$( "#recordStopButton" ).attr( "disabled", true );
				$( "#recordPauseResumeButton" ).attr( "disabled", true );
//				$.scriptcam.startRecording();

//$('#recordStartButton').trigger('click');
			}
			function promptWillShow() {
				alert('A security dialog will be shown. Please click on ALLOW.');
			}
			function setVolume(value) {
				value=parseInt(32 * value / 100) + 1;
				for (var i=1; i < value; i++) {
					$('#LedBar' + i).css('visibility','visible');
				}
				for (i=value; i < 33; i++) {
					$('#LedBar' + i).css('visibility','hidden');
				}
			}
			function timeLeft(value) {
                         
				$('#timeLeft').val(value);
			}
			function changeCamera() {
				$.scriptcam.changeCamera($('#cameraNames').val());
			}
			function changeMicrophone() {
				$.scriptcam.changeMicrophone($('#microphoneNames').val());
			}
                      
                        $(function (e) {

  window.opener.close();

});  
   function preview() {
                            
                    var videofilename= document.getElementById('videofilename').value;
                    if(videofilename=='')
                        {
                            alert("You dont have preview");
                        }
                       else
                           {
                            
                              //document.getElementById('mediaplayer').style.display='block'; 
                               document.getElementById('mediaplayer').style.display='block';
                           }
                        }
                     function next() {
                              window.location.href='<?php echo Yii::app()->request->baseUrl;?>/CandidateMaster/Candreg4'
                      
                     }                        
                     
		</script>