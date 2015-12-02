<!DOCTYPE html>
<html>
<head>
  <title>Texas Kitchen -- Update Menu</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href="css/tablestyle.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="update_menu.js"></script>


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
						<li><a href="admin_order.html">Orders</a></li>
						<li ><a href="add_menu1.php">Add Items</a></li>
						<li class="active"><a href="updatemenu.php">Update Items</a></li>
						<li><a href="adminaccount.html"> My Account</a></li>
						<li><a href="logout.php"> Logout</a></li>
						<div class="clear"> </div>
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
							<h3>Update Menu Item</h3>
							<div id='message'></div>
<form method="post">
									<div>
										<span><label>CATEGORY</label></span>
									<?php

										$con = mysqli_connect('localhost','root','','texaskitchen');
										mysqli_select_db($con,"texaskitchen");
										$sql="SELECT name FROM menu_categories";
										$result = mysqli_query($con,$sql);

										echo "<select name='mcategory' id='mcate'>";
										while ($row = mysqli_fetch_array($result)) {
											echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
										}
										echo "</select>";

									?>
									</div>
									<div>
										<span><label>MENU ITEM</label></span>
										<span><input name="meitem" type="text" class="textbox" id="meitem"></span>
									</div>
									<div>
										<span><input type="button" class="mybutton" id='searchmenu' value="Search" ></span>
									</div>
									<div>
										<span><input type="reset" class="mybutton" id='searchmenu' value="Reset" ></span>
									</div>
								</form>
								<div id='menusearchresult'></div>
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