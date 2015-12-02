<?php
session_start();
$db_username = 'root';
$db_password = '';
$db_name = 'texaskitchen';
$db_host = 'localhost';
if(isset($_SESSION["forgotpwduserid"]))
{

        //try connect to db
    $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
    
	$forgotuid = $_SESSION["forgotpwduserid"];
    //check username in db
    $results = mysqli_query($connecDB,"SELECT security_question FROM users WHERE id='$forgotuid'");
    
	$row = $results->fetch_array(MYSQLI_BOTH);
	
	$security_question= $row["security_question"];
    
    //close db connection
    mysqli_close($connecDB);
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Texas Kitchen -- Forgot Password Security Question</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src="forgotpassword.js"></script>
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
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="menu_search.php">Menu</a></li>
						<li><a href="contact.html">Contact</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
					<ul>
                <li class="active"><a href="login.html">login</a></li>
                <li><a href="signup.html">signup</a></li>
                </ul>
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
				  	<h3>Log in</h3>
					    <form method="POST" action="resetpassword.html" id="forgotpassword-form">
					    	<div></div>
                            <div></div>
                            <div>
						    	<span>
						    	<label>YOUR SECURITY QUESTION</label></span>
						    	<span><input name="securityquestion" type="text" class="textbox" id="securityquestion" value="<?php echo $security_question?>" readonly></span>
						    </div>
							<div>
						    	<span>
						    	<label>ANSWER</label></span>
						    	<span><input name="answer" type="text" class="textbox" id="answer"></span>
                                <span id="user-result"></span>
						    </div>
						   <div>
						   		<span><a href="forgotpassword.html"><input type="button" class="mybutton" value="Cancel"></a></span>
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

