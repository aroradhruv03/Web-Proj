<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1><?php echo $_GET['category'];?></h1>


	<?php
	$category_id=$_GET['category'];
    $connection = mysql_connect("localhost","root","root");
        // Selecting Database
    $db = mysql_select_db("User", $connection);
    // echo "connected";
  	$query = mysql_query("select item_name,price,description,date_added,first_name from items left join user on user.user_id = items.user_id where ".$category_id."=category_id;",$connection );
    // $query = mysql_query("select item_name,date_added from items left join user on user.user_id = items.user_id where ".$category_id."=category_id;",$connection );
    // echo $query;
		//$ads = array();
	while($ad=mysql_fetch_assoc($query))
	{	//$ads[]=$ad['item_id'];
	echo "<br/>".$ad['item_name']." ".$ad['price']." ".$ad['description']." ".$ad['date_added']." ".$ad['first_name'];
	//header("Content-type: image/jpeg");
                  // echo base64_encode($ad['image']);
	// echo "<img src='".$ad['image_url']."' width='100' height='100'/>" ;
		// echo $ad['date_added']."<br/>";
		// echo date( "m/d/Y", strtotime($ad['date_added']));

// INSERT INTO `User`.`Items` (`Item_ID`, `Category_ID`, `User_ID`, `Item_Name`, `Price`, `Description`, `Date_Added`, `Date_Sold`, `SubCategory_ID`, `Image_Url`) VALUES (NULL, '2', '7', 'laptpie', '123123123', 'a priceless lappy', CURRENT_TIMESTAMP, NULL, NULL, NULL);

	}

	?>


</body>
</html>