<?php
$array=json_decode($_GET['q']);
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
for ($i = 0; $i < count($array); ++$i) {

	$result=$mysqli->query("Update orders SET order_status='1' where id='".$array[$i]."'");		
    }
echo"Successfully Saved";
	
?>