<head>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/flowplayer-3.2.12.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/style.css">-->

</head>

<div id="page1" style="padding:0px">

	
            <?php
        if(isset($data))
        {
//            if(file_exists('http://ii-me.com/candidate_videos/'.$data->cv_video_url))
//            {
          ?>
	
		
		<a  
			 href="http://ii-me.com/candidate_videos/<?php echo $data->cv_video_url;?>"
			 style="display:block;width:320px;height:240px;border-radius:10px;"  
			 id="player"> 
		</a> 
	<?php 
            }
            else
            {
                ?>
            <?php
           // }
        }
        
?>
		<!-- this will install flowplayer inside previous A- tag. -->
		<script>
		
        flowplayer("player", "<?php echo Yii::app()->request->baseUrl; ?>/flowplayer/flowplayer-3.2.16.swf", { // supply the configuration
    
     
      plugins: { // load one or more plugins
          controls: { // load the controls plugin
 
              // always: where to find the Flash object
            
 
              // now the custom options of the Flash object
              playlist: true,
              borderRadius: '10px',
             
              tooltips: { // this plugin object exposes a 'tooltips' object
                  buttons: true,
                  fullscreen: 'Enter Fullscreen mode'
              }
          }
      }
  });
		</script>
	
		
	
		
		
	
	</div>
	

<div id="loading"></div>
<script>
//$(window).load(function(){
//$("#loading").fadeOut('fast');
//});
</script>

<style>
#loading1 {
background:url("imgs/ajax-loader.gif") no-repeat center;
height: 100px; width: 100px;
position: fixed; left: 50%;top: 50%;
/*z-index: 1000;*/
margin: -25px 0 0 -25px;
}</style>