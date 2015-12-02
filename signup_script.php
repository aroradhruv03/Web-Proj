<?php 
	//This File will contain the login processing details

	session_start(); // Starting Session
	$error_signup=''; // Variable to store error message

	


	function SignUp()
	{
			// SQL query to fetch information of registerd users and finds user match.
		$user_email = mysql_real_escape_string($_POST['user_email']);
		echo $user_email;
		echo "<br/>";
		//$query = mysql_query("SELECT * FROM User WHERE email = '$user_email'") or die(mysql_error());
		$query = mysql_query("select * from user where upper(email)=upper('".$user_email."')",$connection );
		
		while($rows = mysql_fetch_array($result)) {
			echo $rows['email'];
		}

		$row = mysql_fetch_array($query);
		echo "query is ",$query;
		echo "<br/>";
		echo " row is ",$row;
		echo "<br/>";
		if(!$row) 
		{ 
			echo "Adding a new users<br/>";
			NewUser(); 
		} 
		else 
		{ 
			$error_signup = "SORRY...YOU ARE ALREADY A REGISTERED USER..."; 
		}	
	}

	function NewUser()
	{
		$user_f_name = $_POST['user_f_name'];
		$user_l_name  = $_POST['user_l_name'];
		$user_email  = $_POST['user_email'];
		$user_password  = $_POST['user_password'];
		$user_addr1  = $_POST['user_addr1'];
		$user_addr2  = $_POST['user_addr2'];
		$user_zipcode  = $_POST['user_zipcode'];
		$user_phone  = $_POST['user_phone'];

		
		$query = "insert into user (first_name,last_name,email,password, address1,address2,zipcode,phone_no) 
		VALUES ('".$user_f_name."','".$user_l_name."','".$user_email."','".$user_password."'
			,'".$user_addr1."','".$user_addr2."','".$user_zipcode."','".$user_phone."')";

		$data = mysql_query ($query)or die(mysql_error()); 

		if($data) { 
			echo "YOUR REGISTRATION IS COMPLETED...";
			 }

	}

	if(isset($_POST['submit']))
	{

		if (mysqli_connect_errno($con)) { 
			echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
		} 
		else
		{ 	SignUp();
			echo "Successfully connected to your database…";
		mysql_close($connection); // Closing Connection
	}
}

?>