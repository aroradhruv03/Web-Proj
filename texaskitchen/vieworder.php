<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');



$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if(isset($_GET['q']))
{
	$q = intval($_GET['q']);
	if($q=='2'){
	$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone from orders INNER JOIN users on orders.user_id=users.ID");
	}else
	{
	$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone from orders INNER JOIN users on orders.user_id=users.ID where orders.order_status='".$q."'");

	}
}else if(isset($_GET['r']))
{
	$r = ($_GET['r']);
		$result=$mysqli->query("SELECT orders.id,orders.created,orders.order_status,users.Email,users.Name,users.Phone from orders INNER JOIN users on orders.user_id=users.ID where orders.created like'%".$r."%'");
}
	if ($result->num_rows > 0) {
	echo "<form id='adminorders' class='datagrid'>";
     echo "<table id='tablesss' border=1><thead><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th></thead>";
	 echo "<tbody>";
	 while($row = $result->fetch_array(MYSQLI_BOTH))
     {
         echo "<tr class='alt'><td>" . $row["id"]. "</td><td>" . $row["created"]. " </td><td>" . $row["Email"]. "</td><td>" . $row["Name"]. " </td><td>" . $row["Phone"]. "</td>";
		 if ($row['order_status']=="1")
		 {echo"<td><input type='checkbox' id='deliver' checked disabled readonly/></td></tr>";}
		 else if ($row['order_status']=='0')
		 {echo"<td><input type='checkbox' value='". $row["id"]."' name='check_list[]' class='delivered'/></td></tr>";}
     }
	 echo "<tbody>";
     echo "</table>";
	 	echo "</form>";
	 echo "<br/>";
	 echo "<span><input type='button' id='button2' value='Save' id='button2' class='mybutton'></span>";
	 

} else {
		 echo "<form id='adminorders' class='datagrid'>";
	     echo "<table border=1><thead><tr><th>Order Number</th><th>Order Date</th><th>User ID</th><th>Customer Name</th><th>Customer Phone</th><th>Order Status</th></tr></thead>";
		 echo "<th colspan='3' ><td>No Records Found</td></th>";
		 echo "</table>";
		 echo "</form>";

}
?>