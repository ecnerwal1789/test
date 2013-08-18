
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /> 
	<meta name="language" content="en" />
        <meta name="keywords" content='Candidate test, online interview,i-me,interview me'></meta>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/imgs/ii-me.ico"></link> 

<!--<link rel="icon" href="<?php //echo Yii::app()->request->baseUrl; ?>/imgs/favicon.ico" type="image/x-icon">
<link rel="shortcut-icon" href="<?php //echo Yii::app()->request->baseUrl; ?>/imgs/favicon.ico" type="image/x-icon">-->

<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" 
media="screen, projection" />
        
	
	
<?php
   $controlactionid=yii::app()->getController()->getAction()->controller->action->id;
   $controllerid=yii::app()->getController()->getAction()->controller->id;
 $jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/jqueryslidemenu/';

//Register jQuery, JS and CSS files
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'jqueryslidemenu.css');	
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'jqueryslidemenu.js');
 ?>        
<title><?php echo CHtml::encode($this->pageTitle); ?></title>






<!--<script type="text/javascript">
   if( window.console && window.console.firebug ){
      alert("Sorry! This system does not support Firebug.\nClick OK to log out.");
      window.location='/login_out';
   }
</script>-->
<!--<script type="text/javascript">
if (! ('console' in window) || !('firebug' in console)) {
    var names = ['log', 'debug', 'info', 'warn', 'error', 'assert', 'dir', 'dirxml', 'group', 'groupEnd', 'time', 'timeEnd', 'count', 'trace', 'profile', 'profileEnd'];
    window.console = {};
    for (var i = 0; i < names.length; ++i) window.console[names[i]] = function() {};
}
</script>-->
    
    
    
    
    
    
    



</head>
<script type="text/javascript">
function noError(){return true;}
window.onerror = noError;
</script>

<body>
<div class="total_bg_register">
        
        <div class="wholesite">
            <div style="width:945px;">
            
   
     



<div><?php echo $content; ?></div></div>

        <div class="both"></div>
        <div class="clear"></div>              
 </div> 
  </div>  

    </body>
</html>

<?php  
/*if(yii::app()->session['id']!='')
		{
                $jqueryslidemenupath = Yii::app()->request->baseUrl.'/scripts/jqueryslidemenu/';

               //Register jQuery, JS and CSS files
               Yii::app()->clientScript->registerCoreScript('jquery');
               Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'jqueryslidemenu.css');	
               Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'jqueryslidemenu.js');
                          
                }*/?>   



