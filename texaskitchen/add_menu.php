<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');
$p = strval($_GET['p']);
$q = intval($_GET['q']);
$r = intval($_GET['r']);

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function AddMenuItem($mysqli)
{
	$category = $_GET['t'];
	$menuitem = $_GET['p'];
	$description = $_GET['s'];
	$price = $_GET['q'];
	$quantity = $_GET['r'];
	date_default_timezone_set('America/Chicago');
	$date = date('m/d/Y h:i:s a', time());
	$q=$mysqli->query("SELECT * from menu_categories where name='".$category."'");
	$row = $q->fetch_array(MYSQLI_BOTH);
	$category_id= $row["id"];
	$query = "INSERT INTO texaskitchen.menu_items (name,menu_category_id,price,description,quantity,created,modified) VALUES ('".$menuitem."','".$category_id."','".$price."','".$description."','".$quantity."','".$date."','".$date."');";
	$data = $mysqli->query($query);
	if($data)
	{
		echo "Menu Added";
	}
	else
	{
		
		echo "Menu Item Could Not Be Added"; 

	}
}

function AddMenu($mysqli)
{
if(!empty($_GET['p']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = $mysqli->query("SELECT * FROM menu_items WHERE name = '".$_GET['p']."'");

	if(!$row = $query->fetch_array(MYSQLI_BOTH))
	{
		AddMenuItem($mysqli);
	}
	else
	{
		echo "Item Already Exists";
	}
}
else
{
	echo "Please Enter a Menu Item Name";
}
}
AddMenu($mysqli);
?>