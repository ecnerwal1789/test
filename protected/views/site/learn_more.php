<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Moleskine Notebook with jQuery Booklet</title>

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/booklet/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>

		<link href="<?php echo Yii::app()->request->baseUrl; ?>/booklet/jquery.booklet.1.1.0.css" type="text/css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript">
			Cufon.replace('h1,p,.b-counter');
			Cufon.replace('.book_wrapper a', {hover:true});
			Cufon.replace('.title', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
			Cufon.replace('.reference a', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
			Cufon.replace('.loading', {textShadow: '1px 1px #000', fontFamily:'ChunkFive'});
		</script>
    </head>
    <body>
		<div class="book_wrapper">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>
			<div id="loading" class="loading">Loading pages...</div>
			<div id="mybook" style="display:none;">
				<div class="b-load">
					<div>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" height="67" width="87" style="padding:0px; border:0px; margin-left:47px; margin-top:150px;" alt=""/>
					<p style="font-size:20px; margin-left:50px;"><font color="#FB6D2E">Talent Management</font> in the Cloud.</p>
					<p style="font-size:20px; margin-left:50px;">An Effective Tool for <font color="#FB6D2E">Spotting </font>and <font color="#FB6D2E">Managing Talent.</font></p>
					</div>
						<div align="center" style="font-size:19px; line-height:52px; margin-top:80px;">
					<h1>Table of Contents</h1>
						<table width="200" border="0">
 					 <tr>
   					 <td>What's I-Me?</td>
						<td>3</td>
					  </tr>
					  <tr>
						<td>How we can Help?</td>
						<td>4</td>
					  </tr>
					  <tr>
						<td>How It Works?</td>
						<td>5</td>
					  </tr>
					  <tr>
						<td>Spot Talent</td>
						<td>7</td>
					  </tr>
					  <tr>
						<td>Do it the Easy Way!</td>
						<td>8</td>
					  </tr>
					</table>
					</div>
					<div style="font-size:16px; line-height:23px;">					
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" alt=""/>
						<h1>What's I-Me</h1>
						<ul style="margin-left:45px;">
						<li>I-me is a recruitment management platform that makes spotting talent so much easier.</li>
						<li>It Measures a person's skills across varied technologies.</li>
						</ul><br /><br />
						<a href="http://www.ii-me.com/Employer" target="_self" class="article" >Signup</a>
						<a href="http://www.ii-me.com" target="_self" class="demo">Home</a>
					</div>
					<div style="font-size:16px; line-height:23px;">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/2.jpg" alt="" />
						<h1>How we can Help?</h1>
						<ul style="margin-left:45px;">
						<li>So many candidates seem to have the right experience in paper,only to be abysmal in practice.</li>
   						<li>I-me puts them through a test ,that simulates the real work environment, to evaluate their skills.</li>
						   </ul><br />
						<a href="http://www.ii-me.com/Employer" target="_self" class="article">Signup</a>
						<a href="http://www.ii-me.com" target="_self" class="demo">Home</a>
					</div>
					<div style="font-size:16px; line-height:23px;">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.jpg" alt="" />
						<h1>How it Works?</h1>
						<ul style="margin-left:45px;">
						<li>Get the prospective job candidates from job sites,portals & referrals.</li>
						<li>Loop them through I-Me. Pick what technology you want to evaluate them.</li>
						<li>Set up a Group Test or Individual Test.</li>
						<li>Customize the time Limit,Number of questions and Many other variables.</li>
						<li>Preview and Send.</li>
						<li>Candidates now take the exam online in a monitored environment.</li>
						<li>Sit Back and Relax !!</li>
						</ul>
						<a href="http://www.ii-me.com/Employer" target="_self" class="article">Signup</a>
						<a href="http://www.ii-me.com" target="_self" class="demo">Home</a>
					</div>
					<div>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ime-flowchart.png" height="425" width="450" alt="" style="border:0px; margin-top:50px; margin-left:-20px;" />						
					</div>
					<div style="line-height:23px;">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/4.jpg" alt="" />
						<h1>Spot Talent</h1>
						<p><strong>"People Inspire You or They Drain You ; Pick Them Wisely"</strong></p>
						<p style="font-size:14px; text-align:right">- Hans F Hansen. </p><br />
						<p>Spot Talent and Surround Yourself with The Best Minds..</p><br />
						<a href="http://www.ii-me.com/Employer" target="_self" class="article">Signup</a>
						<a href="http://www.ii-me.com" target="_self" class="demo">Home</a>
					</div>
					<div style="font-size:16px; line-height:23px;">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5.jpg" alt="" />
						<h1>Do it the Easy Way!</h1>
						<ul style="margin-left:45px;">
						<li>Sometimes its easy to spot an open door than keep knocking on a closed one.</li>
   						<li>Be Smart.</li> 
						<li>Do it the Easy Way.</li>
						</ul><br />
						<a href="http://www.ii-me.com/Employer" target="_self" class="article">Signup</a>
						<a href="http://www.ii-me.com" target="_self" class="demo">Home</a>
					</div>					
				</div>
			</div>
	</div>
        <!-- The JavaScript -->

        <script type="text/javascript">
			$(function() {
				var $mybook 		= $('#mybook');
				var $bttn_next		= $('#next_page_button');
				var $bttn_prev		= $('#prev_page_button');
				var $loading		= $('#loading');
				var $mybook_images	= $mybook.find('img');
				var cnt_images		= $mybook_images.length;
				var loaded			= 0;
				//preload all the images in the book,
				//and then call the booklet plugin

				$mybook_images.each(function(){
					var $img 	= $(this);
					var source	= $img.attr('src');
					$('<img/>').load(function(){
						++loaded;
						if(loaded == cnt_images){
							$loading.hide();
							$bttn_next.show();
							$bttn_prev.show();
							$mybook.show().booklet({
								name:               null,                            // name of the booklet to display in the document title bar
								width:              895,                             // container width
								height:             570,                             // container height
								speed:              350,                             // speed of the transition between pages
								direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
								startingPage:       0,                               // index of the first page to be displayed
								easing:             'easeInOutQuad',                 // easing method for complete transition
								easeIn:             'easeInQuad',                    // easing method for first half of transition
								easeOut:            'easeOutQuad',                   // easing method for second half of transition

								closed:             null,                           // start with the book "closed", will add empty pages to beginning and end of book
								closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
								closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
								closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
								closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
								covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

								pagePadding:        10,                              // padding for each page wrapper
								pageNumbers:        true,                            // display page numbers on each page

								hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
								overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
								tabs:               false,                           // adds tabs along the top of the pages
								tabWidth:           60,                              // set the width of the tabs
								tabHeight:          20,                              // set the height of the tabs
								arrows:             false,                           // adds arrows overlayed over the book edges
								cursor:             'pointer',                       // cursor css setting for side bar areas

								hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
								keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
								next:               $bttn_next,          			// selector for element to use as click trigger for next page
								prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page

								menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
								pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
								chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

								shadows:            true,                            // display shadows on page animations
								shadowTopFwdWidth:  166,                             // shadow width for top forward anim
								shadowTopBackWidth: 166,                             // shadow width for top back anim
								shadowBtmWidth:     50,                              // shadow width for bottom shadow

								before:             function(){},                    // callback invoked before each page turn animation
								after:              function(){}                     // callback invoked after each page turn animation
							});
							Cufon.refresh();
						}
					}).attr('src',source);
				});
				
			});
        </script>
    </body>
</html>