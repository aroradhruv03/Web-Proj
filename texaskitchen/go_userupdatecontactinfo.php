<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function GoUpdateContactInfo($mysqli)
{
	$newfname = $_POST['firstname'];
	$newlname = $_POST['lastname'];
	$newusername = $_POST['username'];
	$newphone = $_POST['phonenumber'];
	$newaddress = $_POST['address'];
	$newname = $newfname." ".$newlname;
	
	$query = "UPDATE texaskitchen.users SET name='".$newname."', fname='".$newfname."', lname='".$newlname."', email='".$newusername."', phone='".$newphone."', address='".$newaddress."' WHERE id=".$_SESSION["userid"].";";
	$data = $mysqli->query($query);
	if($data)
	{
		header('Location: userupdatecontactinfo_success.html');
		exit;
	}
	else
	{
		header('Location: userupdatecontactinfo_failure.html');
		//echo $query."\n";
		exit;
	}
}

function GoUpdate($mysqli)
{
if(!empty($_SESSION["userid"]))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = $mysqli->query("SELECT * FROM users WHERE id = '".$_SESSION["userid"]."'");

	if(!$row = $query->fetch_array(MYSQLI_BOTH))
	{
		echo "SORRY...YOU ARE NOT REGISTERED USER...";
	}
	else
	{
		GoUpdateContactInfo($mysqli);
	}
}
}
GoUpdate($mysqli);
?>