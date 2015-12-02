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


function ChangePassword($mysqli)
{
	$newpassword =  $_POST['newpassword'];
	$confirmnewpassword =  $_POST['confirmnewpassword'];
	
	$query = "UPDATE texaskitchen.users SET password='".$newpassword."' WHERE id=".$_SESSION["forgotpwduserid"].";";
	$data = $mysqli->query($query);
	if($data)
	{
		header('Location: userchangepassword_success.html');
		exit;
	//echo "YOUR REGISTRATION IS COMPLETED...";
	}
	else
	{
		header('Location: userchangepassword_failure.html');
		exit;
	}
}

ChangePassword($mysqli);
?>