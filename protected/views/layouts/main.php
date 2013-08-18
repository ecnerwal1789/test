<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>      
      <meta charset="utf-8" />
      <title>ii-me</title>
      
      <!-- Mobile Specific Metas
            ================================================== -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      
      <!-- All CSS Files
            ================================================== -->
      <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/All-Stylesheets.css" />
      
      <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->   
         
      <!-- Favicons
            ================================================== -->
      <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />
      <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png" />
      
</head>
<body>

<?php echo $content; ?>
              

</body>
</html>