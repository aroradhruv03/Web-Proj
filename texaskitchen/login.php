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

function Login($mysqli)
{
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = $mysqli->query("SELECT * FROM texaskitchen.users WHERE email = '$_POST[username]' AND password = '$_POST[password]'");

	if(!$row = $query->fetch_array(MYSQLI_BOTH))
	{
		header('Location: userauth_failure.html');
		exit;
	}
	else
	{
		$_SESSION["userid"] = $row["id"];
		$_SESSION["name"] = $row["name"];
		if($row[10] == 2)
		{
			header('Location: userhome.php');
			exit;
		}
		else if($row[10] == 1)
		{
			header('Location: admin_order.html');
			exit;
		}
		else
		{
			header('Location: userauth_failure.html');
			exit;	
		}
	}
}
}
Login($mysqli);
?>