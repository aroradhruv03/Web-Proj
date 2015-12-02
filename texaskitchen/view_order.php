<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');
$q = strval($_GET['q']);

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	$result=$mysqli->query("SELECT * from orders where order_status=0");
	if ($result->num_rows > 0) {
     echo "<table border=1><tr><th>Order Number</th><th>Order Date</th></tr>";
     while($row = $result->fetch_array(MYSQLI_BOTH))
     {
         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["created"]. " </td></tr>";
     }
     echo "</table>";
} else {
     echo "No Orders Found";
}
mysqli_close($mysqli);
?>