<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Texas Kitchen -- Logout</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="css/slider.css" rel="stylesheet" type="text/css"  media="all" />
  <script type="text/javascript" src="js/jquery.min.js"></script> 
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="js/camera.min.js"></script>
  <script type="text/javascript" src="js/jquery.lightbox.js"></script> 
  <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
	  <script type="text/javascript">
		  $(function() {
			$('.gallery a').lightBox();
		  });
	  </script>
	 <script type="text/javascript">
			   jQuery(function(){
				jQuery('#camera_wrap_1').camera({
					pagination: false,
				});
			});
	 </script>
 </head>
  <body>
	<!----start-header----->
	 <div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" title="logo" /></a>
				</div>
				<div class="clear"> </div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="index.html">Home</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
    <?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>
   <!----End-header----->
		 <!---start-content---->
		 <div class="content">
		 	<div class="top-grids">
		 		<div class="wrap">
		 		  <div class="clear"> </div>
		 		</div>
		 	</div>
		 	<div class="mid-grid">
            <p>Logged Out Successfully</p>
		 	  <p>&nbsp;</p>
		 	  <h3><a href="login.html">Click here to sign in again</a></h3>
		 	</div>
	<div class="footer">
		<p></p>
	</div>
		 <!---End-footer---->
	</body>
</html>

