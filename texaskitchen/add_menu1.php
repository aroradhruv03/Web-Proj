<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
  <title>Texas Kitchen -- Add Menu</title>
  <metahttp-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src= http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
      <script src="add_menu.js"></script>



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
						<li class="active"><a href="add_menu1.php">Add Items</a></li>
						<li><a href="updatemenu.php">Update Items</a></li>
						<li><a href="adminaccount.html"> My Account</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
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
   <!----End-header----->
  
	<div class="content">
		 	<!---start-contact---->
		 <div class="contact">
			<div class="wrap">
				<div class="section group">
					<div class="col span_2_of_3">
						<div class="contact-form">
							<h3>Add Menu Item</h3>
							<div id='messageaddmenu'></div>
								<form id= 'addmenu' method="POST">
									<div>
										<span><label>CATEGORY</label></span>
									<?php

										$con = mysqli_connect('localhost','root','','texaskitchen');
										mysqli_select_db($con,"texaskitchen");
										$sql="SELECT name FROM menu_categories";
										$result = mysqli_query($con,$sql);

										echo "<select name='category' id='cate'>";
										while ($row = mysqli_fetch_array($result)) {
											echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
										}
										echo "</select>";

									?>
									<div>
										<span><label>MENU ITEM</label></span>
										<span><input name="mitem" type="text" class="textbox" id="mitem"></span>
									</div>
									<div>
										<span><label>PRICE</label></span>
										<span><input name="mprice" type="text" class="textbox" id="mprice"></span>
									</div>
									<div>
										<span><label>QUANTITY</label></span>
										<span><input name="mquantity" type="text" class="textbox" id="mquantity"></span>
									</div>
									<div>
										<span><label>DESCRIPTION</label></span>
										<span><textarea name="mdesc" id="mdesc"> </textarea></span>
									</div>
									<div>
										<span><input type="button" name ='submit' class="mybutton" id='addmenubutton' value="ADD ITEM" ></span>
									</div>
								</form>
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