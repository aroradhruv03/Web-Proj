<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function NewUser($mysqli)
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = $firstname." ".$lastname;
	$email = $_POST['username'];
	$password =  $_POST['password'];
	$phonenumber = $_POST['phonenumber'];
	$address = $_POST['address'];
	$securityquestion = $_POST['security_question'];
	$securityanswer = $_POST['security_answer'];
	
	$query = "INSERT INTO texaskitchen.users (name,fname,lname,password,address,phone,email,security_question,answer,user_groups_id,created,modified) VALUES ('".$name."','".$firstname."','".$lastname."','".$password."','".$address."','".$phonenumber."','".$email."','".$securityquestion."','".$securityanswer."','2',curdate(),curdate());";
	$data = $mysqli->query($query);
	if($data)
	{
		header('Location: registration_success.html');
		exit;
	//echo "YOUR REGISTRATION IS COMPLETED...";
	}
	else
	{
		header('Location: registration_failure.html');
		exit;
	}
}

function SignUp($mysqli)
{
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = $mysqli->query("SELECT * FROM users WHERE email = '$_POST[username]'");

	if(!$row = $query->fetch_array(MYSQLI_BOTH))
	{
		NewUser($mysqli);
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
SignUp($mysqli);
?>