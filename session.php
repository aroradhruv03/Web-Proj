<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "root");
// Selecting Database
$db = mysql_select_db("User", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select email,address_fk from user where email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['email'];
$login_addressfk =$row['address_fk'];

$ses_sql=mysql_query("select address1 from address where address_id='$login_addressfk'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_address =$row['address1'];


if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>