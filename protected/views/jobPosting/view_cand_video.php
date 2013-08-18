<head>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/flowplayer-3.2.12.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/style.css">-->

</head>

<div class="tab">View Candidate Video</div>


	<div class="Container">
            <div style="padding:10px 6px">
	<?php   // }
                 
        if(isset($data))
        {
          ?>
	   
		<a  
			 href="http://ii-me.com/candidate_videos/<?php echo $data->cv_video_url;?>"
			 style="display:block;width:240px;height:200px"  
			 id="player"> 
		</a> 
           
	<?php 
        }
        else
        {
        ?>
        <div class="reg_suc" style="font-size:20px; text-align: -moz-center;padding:0px;" >
        <table>
         <tr>
        <td colspan="3" height="60"> </td>
    </tr>
    <tr><td>No Records</td></tr>
      </table></div>
	<?php 
        }
?>
		<!-- this will install flowplayer inside previous A- tag. -->
		<script>
			flowplayer("player", "<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/flowplayer-3.2.16.swf");
		</script>
	
		
	
	</div>	
		
	
	</div>