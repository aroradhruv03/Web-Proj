<!DOCTYPE html>
<html>
<head>
  <title>Texas Kitchen -- Menu</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href="css/tablestyle.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
     <script src="menusearch.js"></script>



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
						<li><a href="about.html">About</a></li>
						<li class="active"><a href="menu_search.php">Menu</a></li>
						<li><a href="contact.html">Contact</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
					<ul>
                <li><a href="login.html">login</a></li>
                <li><a href="signup.html">signup</a></li>
                </ul>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
   <!----End-header----->
  
	<div class="content">
		 	<!---start-contact---->
		 <div class="contact">
			<div class="wrap">
				<div class="section group">
					<div class="col span_2_of_3">
						<div class="contact-form">
						<form method="post">
									<div>
										<div id="menu_message"></div>
										<span><label>CATEGORY</label></span>
									<?php

										$con = mysqli_connect('localhost','root','','texaskitchen');
										mysqli_select_db($con,"texaskitchen");
										$sql="SELECT name FROM menu_categories";
										$result = mysqli_query($con,$sql);

										echo "<select name='mcategory' id='mcategory'>";
										echo "<option value=''>Select a Category</option>";
										while ($row = mysqli_fetch_array($result)) {
											echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
										}
										echo "</select>";

									?>
									</div>
									
								</form>
								<div id='menusearchresults'></div>
							</div>
						</div>				
					</div>
				</div>
				

			</div>
			
		 	<!---End-contact---->
		 <!---End-content---->
		 <!---start-footer---->
	<div class="footer">
	     <p> </p>
	</div>
		 <!---End-footer---->
 </div>
</body>
</html>