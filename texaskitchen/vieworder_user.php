<html>
<head>
  <title>Texas Kitchen -- View Orders</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href="css/tablestyle.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="view_order.js"></script>


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
						<li><a href="userhome.php">menu</a></li>
						<li class="active"><a href="orderhistory.php">order history</a></li>
						<li><a href="useraccount.html">My account</a></li>
						<li><a href="cart_items.php">SHOPPING CART</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
					<form>
					</form>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
   <!----End-header----->
		 <!---start-content---->
		 <div class="contact">
			<div class="wrap">
				<div class="section group">
					<div class="col span_2_of_3">
						<div class="contact-form">
							<h3>ORDER DETAILS</h3>

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
							$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone,orders.amount,orders.tax,orders.additional_charges,orders.total from orders
							INNER JOIN users on orders.user_id=users.ID where orders.id='".$id."'");
							
						if ($result->num_rows > 0) {
							while($row = $result->fetch_array(MYSQLI_BOTH))
							{
							 echo "<div class='order-details'>";
							 echo "<form>";
							 echo "<span><label><b>ORDER ID : </b></label>".$row["id"]."</span>";
							 echo "<span><label><b>DATE ORDERED : </b></label>".$row["created"]."</span>";
							 if($row["order_status"] == 0)
							 {
								 $status = " In Progress";
							 }
							 else if($row["order_status"] == 1)
							 {
								 $status = " Delivered";
							 }
							 else
							 {
								 $status = " In Transit";
							 }
							 echo "<span><label><b>ORDER STATUS: </b></label>".$status."</span>";
							 echo "<span><label><b>USER ID : </b></label>".$row["Email"]."</span>";
							 echo "<span><label><b>USER NAME: </b></label>".$row["Name"]."</span>";
							 echo "<span><label><b>USER PHONE : </b></label>".$row["Phone"]."</span>";
							 echo "<span><label><b>AMOUNT ON ORDERED ITEMS : </b></label>".number_format((float)$row["amount"], 2, '.', '')."</span>";
							 echo "<span><label><b>TAX : </b></label>".number_format((float)$row["tax"], 2, '.', '')."</span>";
							 echo "<span><b><label>ADDITIONAL CHARGES : </label></b>".number_format((float)$row["additional_charges"], 2, '.', '')."</span>";
							 echo "<span><label><b>TOTAL AMOUNT: </b></label>".number_format((float)$row["total"], 2, '.', '')."</span>";
							 echo "</form>";
							 echo "</div>";
							 
							}
						}
						echo "<h3>ITEM DETAILS</h3>";
						$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							if ($mysqli->connect_errno) {
							echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						}
							$result=$mysqli->query("SELECT order_details.id,menu_items.name,order_details.quantity from orders	INNER JOIN order_details on orders.id=order_details.orders_id INNER JOIN menu_items on order_details.menu_items_id=menu_items.id where orders.id='".$id."'");
							if ($result->num_rows > 0) {
							 echo "<div class='order-details'>";
							 echo "<ul>";
							 while($row = $result->fetch_array(MYSQLI_BOTH))
							 {
							 echo "<li><span><label>".$row["name"]."</label>(Quantity:".$row["quantity"].")</span>";
							 }
							 echo "<span><input type='button' class='mybutton' id='vieworderback' value='Back To Orders'></span>";
							 echo "</div>";
							 
							}			
				
				?>
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