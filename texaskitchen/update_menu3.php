<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');
$p = strval($_GET['p']);
$q = intval($_GET['q']);
$r = intval($_GET['r']);
$s = intval($_GET['s']);
$t = intval($_GET['t']);
$u = intval($_GET['u']);


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function UpdateMenuItems($mysqli)
{
	$category = $_GET['t'];
	$menuitem = $_GET['p'];
	$description = $_GET['s'];
	$price = $_GET['q'];
	$quantity = $_GET['r'];
	$menuid = $_GET['u'];

	date_default_timezone_set('America/Chicago');
	$date = date('m/d/Y h:i:s a', time());
	$query=("UPDATE menu_items SET name='".$menuitem."', price='".$price."' , description='".$description."' , quantity='".$quantity."' , menu_category_id='".$category."' WHERE id='".$menuid."'");
	$data = $mysqli->query($query);
	if($data)
	{
		
		echo "Menu Item Updated";
		exit;
	}
	else
	{
		echo "Failed to save"."\n";
		exit;
	}
}

function updateMenus($mysqli)
{
if(!empty($_GET['p']))
{
	$query = $mysqli->query("SELECT id FROM menu_items WHERE name = '".$_GET['p']."'");
	$row = $query->fetch_array(MYSQLI_BOTH);
	
	if(!$row ||$row['id']==$_GET['u'] )
	{
		UpdateMenuItems($mysqli);
	}
	else
	{
		echo "Menu Item Name already exists.Please enter a different name";
	}
}
else
{
	echo "Please Enter All the Details";
}
}
updateMenus($mysqli);
?>