<?php
session_start();
?>
<!DOCTYPE HTML>
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
							<h3>Orders That are Currently In process</h3>

				<?php
						define('DB_HOST', 'localhost');
						define('DB_NAME', 'texaskitchen');
						define('DB_USER','root');
						define('DB_PASSWORD','');


						$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							if ($mysqli->connect_errno) {
							echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						}
							
							$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone,orders.total from orders INNER JOIN users on orders.user_id=users.ID where orders.order_status='0' and users.id=".$_SESSION["userid"]);
							if ($result->num_rows > 0) {
							 echo "<form id='orderhistory' method='GET' class='datagrid'>";
							 echo "<table id='tablesss' border=1><thead><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th><th>Total Amount</th></thead>";
							 echo "<tbody>";
							 while($row = $result->fetch_array(MYSQLI_BOTH))
							 {
								$tot = number_format((float)$row["total"], 2, '.', '');
								$url = "vieworder_user.php?idno=" . $row["id"];
								echo "<tr class='alt'><td class='orderid'><a href=\"" . $url . "\"> ". $row["id"]. "</td><td>" . $row["created"]. " </td><td>" . $row["Email"]. "</td><td>" . $row["Name"]. " </td><td>" . $row["Phone"]. "</td><td> In Process</td><td>" . $tot. " </td></tr>";
							 }
							 echo "<tbody>";
							 echo "</table>";
								echo "</form>";
							 echo "<br/>";
							 

						} else {
								 echo "<form id='adminorders' class='datagrid'>";
								 echo "<table border=1><thead><tr><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th><th>Total Amount</th></tr></thead>";
								 echo "<th colspan='3' ><td>No Records Found</td></th>";
								 echo "</table>";
								 echo "</form>";

						}
						echo "<h3>Delivered Orders</h3>";
						$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone,orders.total from orders INNER JOIN users on orders.user_id=users.ID where orders.order_status='1' and users.id=".$_SESSION["userid"]);
							
							if ($result->num_rows > 0) {
							 echo "<form id='adminorders' class='datagrid'>";
							 echo "<table id='tablesss' border=1><thead><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th><th>Total Amount</th></thead>";
							 echo "<tbody>";
							 while($row = $result->fetch_array(MYSQLI_BOTH))
							 {
								 $tot = number_format((float)$row["total"], 2, '.', '');	
								$url = "vieworder_user.php?idno=" . $row["id"];
								echo "<tr class='alt'><td class='orderid'><a href=\"" . $url . "\"> ". $row["id"]. "</td><td>" . $row["created"]. " </td><td>" . $row["Email"]. "</td><td>" . $row["Name"]. " </td><td>" . $row["Phone"]. "</td><td>Delivered</td><td>" . $tot. " </td></tr>";
							 }
							 echo "<tbody>";
							 echo "</table>";
								echo "</form>";
							 echo "<br/>";
							 

						} else {
								 echo "<form id='adminorders' class='datagrid'>";
								 echo "<table border=1><thead><tr><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th></tr></thead>";
								 echo "<th colspan='3' ><td>No Records Found</td></th>";
								 echo "</table>";
								 echo "</form>";

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

