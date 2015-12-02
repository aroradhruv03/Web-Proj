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
$fname;
$lname;
$email;
$address;
$phone;
function UpdateContactInfo($mysqli)
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
		$GLOBALS["fname"] = $row["fname"];
		$GLOBALS["lname"] = $row["lname"];
		$GLOBALS["email"] = $row["email"];
		$GLOBALS["address"] = $row["address"];
		$GLOBALS["phone"] = $row["phone"];
	}
}
}
UpdateContactInfo($mysqli);
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Texas Kitchen -- Update Contact Information</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src="userupdatecontactinfo.js"></script>
 </head>
  <body>
	<!----start-header----->
	 <div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" title="logo" /></a>
				</div>
				<div class="clear"> </div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="userhome.php">menu</a></li>
						<li><a href="orderhistory.php">order history</a></li>
						<li class="active"><a href="useraccount.html">My account</a></li>
						<li><a href="cart_items.php">SHOPPING CART</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
   <!----End-header----->
		 <!---start-content---->
		 <div class="content">
		 	<!---start-contact---->
		 	<div class="contact">
		 		<div class="wrap">
				<div class="section group">
				  <div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>update contact information</h3>
					    <form method="POST" action="go_userupdatecontactinfo.php" id="userupdatecontactinfo-form">
					    	<div>
						    	<span><label>FIRST NAME</label></span>
						    	<span><input name="firstname" id="firstname" type="text" class="textbox" value="<?php echo htmlentities($fname); ?>"></span>
						    </div>
                            <div>
					    	  <span><label>LAST NAME</label></span>
						    	<span><input name="lastname" id="lastname" type="text" class="textbox" value="<?php echo htmlentities($lname); ?>"></span>
						    </div>
                            <div>
						    	<span><label>E-MAIL (Login id)</label></span>
						    	<span><input name="username" id="username" type="text" class="textbox" value="<?php echo htmlentities($email); ?>"></span>
                                <span id="user-result"></span>
						    </div>
                          <div>
					     	<span><label>MOBILE</label></span>
						    	<span><input name="phonenumber" id="phonenumber" type="text" class="textbox" value="<?php echo htmlentities($phone); ?>"></span>
						    </div>
						    <div>
						    	<span><label>ADDRESS</label></span>
						    	<span><textarea name="address" id="address"> <?php echo htmlentities($address); ?> </textarea></span>
						    </div>
					       <div>
					   		 <span><input type="submit" name="submit" class="mybutton" value="UPDATE"> 
                             <a href="userhome.php"><input type="button" class="mybutton" value="Cancel"></a></span>
						  </div>
					    </form>

				    </div>
  				</div>				
			  </div>
			</div>
			</div>
		 	<!---End-contact---->
		 <!---End-content---->
		 <!---start-footer---->
		 <div class="footer">
	     <p> </p>
	     </div>
		 <!---End-footer---->
	</body>
</html>

