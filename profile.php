<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : &nbsp;<i><?php echo $login_session; ?></i></b><br/>
<b id="logout"><a href="logout.php">Log Out</a></b>
<p>
Your address is : <?php echo $login_address; ?>
</p>
</div>
</body>
</html>