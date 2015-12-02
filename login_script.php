<?php 
//This File will contain the login processing details

session_start(); // Starting Session
$error_login=''; // Variable to store error message

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost","root","root");
	// Selecting Database
$db = mysql_select_db("User", $connection);
	// SQL query to fetch information of registerd users and finds user match.

$user_email = $_POST['email1']; 
$user_password = $_POST['password1']; 


	// $user_email = stripslashes($user_email);
	// $user_password = stripslashes($user_password);

	// $user_email = mysql_real_escape_string($user_email);
	// $user_password = mysql_real_escape_string($user_password);

$query = mysql_query("select email,first_name,last_name,user_id from user where Password='$user_password' AND email='$user_email'", $connection);
$rows = mysql_num_rows($query);
$row = mysql_fetch_assoc($query);


if ($rows == 1) 
{
			$_SESSION['login_user']=$user_email; // Initializing Session
			$_SESSION['first_name']=$row['first_name']; // Initializing Session
			$_SESSION['user_id']=$row['user_id']; // Initializing Session
			// header("Location: index.php"); // Redirecting To Other Page
	echo "Successfully Logged in...!";
} 
else 
{
	 echo "Invalid Email/Password...!";
}
		mysql_close($connection); // Closing Connection

?>