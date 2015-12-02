<?php
include('login_script.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form in PHP with Session</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="main">
		<h1>PHP Login Session </h1>
		<div id="login">
			<h2>Login Form</h2>
			<form action="" method="post">
				<label>UserName :</label>
				<input id="user_email" name="user_email" placeholder="username" type="text">
				<label>Password :</label>
				<input id="user_password" name="user_password" placeholder="**********" type="password">
				<input name="submit" type="submit" value=" Login ">
				<span><?php echo $error; ?></span>
			</form>
		</div>
	</div>
</body>
</html>