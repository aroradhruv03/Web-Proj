<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
  <title>Texas Kitchen -- Update Menu</title>
  <metahttp-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href="css/tablestyle.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src= http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
    <script src="updatemenu.js"></script>



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
						<li><a href="logout.php"> logout</a></li>
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
							<div id='message1'></div>

							<form id='updatemenus'>

				<?php
						define('DB_HOST', 'localhost');
						define('DB_NAME', 'texaskitchen');
						define('DB_USER','root');
						define('DB_PASSWORD','');

						$id=$_GET['idno'];
						$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							if ($mysqli->connect_errno) {
							echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						}
							$result=$mysqli->query("SELECT menu_categories.id as cid,menu_items.id,menu_items.name as menu,menu_items.price,menu_items.description,menu_items.quantity,menu_categories.name as category from menu_items	INNER JOIN menu_categories on menu_categories.id=menu_items.menu_category_id where menu_items.id='".$id."'");
							
						if ($result->num_rows > 0) 
							while($row = $result->fetch_array(MYSQLI_BOTH))
							{
										echo "<span><label>CATEGORY</label></span>";

										echo "<select name='category' id='categ'>";
											echo "<option value='" . $row['cid'] . "'>" . $row['category'] . "</option>";
										echo "</select>";
										echo "<input type='hidden' id='menuid' value='" . $row['id'] . "'>";
										echo "<span><label>MENU ITEM</label></span>";
										echo "<span><input name='menitem' type='text' class='textbox' id='menitem' value='".$row['menu']."'></span>";
										echo "<span><label>PRICE</label></span>";
										echo "<span><input name='menprice' type='text' class='textbox' id='menprice' value='".$row['price']."'></span>";
										echo "<span><label>Quantity</label></span>";
										echo "<span><input name='menquant' type='text' class='textbox' id='menquant' value='".$row['quantity']."'></span>";
										echo "<span><label>Description</label></span>";
										echo "<span><textarea name='mendesc' type='text' class='textbox' id='mendesc'>".$row['description']."</textarea></span>";
										echo "<span><input type='button' name='submit' class='mybutton' id='menusave' value='Save' ></span>";
										echo "<span><input type='button' class='mybutton' id='updatemenuitemback' value='Back to Search'></span>";

							 
							}			
				
				?>
				</form>
							</div>
						</div>				
					</div>
				</div>
			</div>
	<div class="footer">
		<p></p>
	</div>
		 <!---End-footer---->

	</body>
</html>