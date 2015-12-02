<?php

	include('');
	// Establishing Connection with Server by passing server_name, user_id, password & DB Name as a parameter
	$connection = mysql_connect($DB_host,$DB_user,$DB_pass,$DB_name);
	
	// Selecting Database
	$db = mysql_select_db("User", $connection);


?>