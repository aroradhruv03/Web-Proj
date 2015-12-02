<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Multicusine  Website Template | Services  :: W3layouts</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
						<li class="active"><a href="userhome.php">menu</a></li>
						<li><a href="orderhistory.php">order history</a></li>
						<li><a href="useraccount.html">My account</a></li>
						<li><a href="cart_items.php"><img src="images/shopping-cart.jpg" alt="Mountain View" style="width:45px;height:18px"></a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
					<form>
						<input type="text"><input type="submit" value="" />
					</form>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
	<div class="mid-grid"><h3>Hello <?php
			if(isset($_SESSION["name"]) && !empty($_SESSION["name"])) {
   			echo $_SESSION["name"]."\n";
}
else
{
	header('Location: not_authorized_user.html');
	exit;
}
?></h3></div>
	<?php
	$current_url = "usermenu.php";
	include_once("config.php");
	$sql = "SELECT items.id AS id,items.name AS name,items.price AS price,items.quantity AS quantity,items.description AS description,category.name AS categoryName FROM menu_items AS items LEFT JOIN menu_categories AS category ON category.id=items.menu_category_id WHERE items.available=1;";
	$items = $conn->query($sql);
    $sql = "SELECT DISTINCT name FROM menu_categories";
	$categories = $conn->query($sql);
	if ($categories->num_rows > 0) {
	while($row = $items->fetch_assoc()) {
		$results[$row['categoryName']][] =$row;
	}
	}
	$conn->close();
	?>

	<!----End-header----->
		 <!---start-content---->
		 <div class="content">
		 	<!---start-services---->
		 	<div class="services">
		 		<div class="wrap">
							<?php
							echo '<div class="specials">';
							echo  '<div class="specials-grids">';
							echo '<div class="special-grid">';
							echo  '<img src="images/slider2.jpg" title="image-name">';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							if ($categories->num_rows > 0) {

							while($cat = $categories->fetch_assoc()) {
								echo '<div class="services-header">';
								echo '<h3>' . $cat['name'] . '</h3>';
								echo '<div class="clear"> </div>';
								echo '</div>';
								foreach ($results[$cat['name']] as $row) {
									echo '<form action="update_cart.php" method="post">';
									echo '<div class="services-grid">';
									echo '<button >Add To Cart</button>';
									echo  '<select value="1" name="quantity">';
									for($value=1;$value<$row["quantity"];$value++){
										echo  '<option value="'.$value.'">'.$value.'</option>';
									}
                                    echo  '</select>';
									echo '<a href="#">'.$row["name"].'</a>';
									echo '<p>' . $row["description"] . '</p>';

									echo '</div>';
									echo '<input type="hidden" name="item" value="'.$row["id"] .'" />';
									echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
									echo '<input type="hidden" name="type" value="add" />';
									echo '</form>';

								}

								echo '<div class="clear"> </div>';

							}

							}else {
								echo "No Categories";
							}
							echo '<div class="clear"> </div>';

							?>

				</div>
				</div>
		 	<!---End-services---->
		 <!---End-content---->
		 <!---start-footer---->
		 <div class="footer">
		<div class="wrap">
			<div class="footer-grid">
				<h3>About us</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
				<a href="#">ReadMore</a>
			</div>
			<div class="footer-grid center-grid">
				<h3>Recent posts</h3>
				<ul>
					<li><a href="#">eiusmod tempor incididunt</a></li>
					<li><a href="#">adipisicing elit, sed</a></li>
					<li><a href="#">mod tempor incididunt ut</a></li>
					<li><a href="#">dipisicing elit, sed do</a></li>
					<li><a href="#">econsectetur adipisicing</a></li>
				</ul>
			</div>
			<div class="footer-grid twitts">
				<h3>Latest Tweets</h3>
				<p><label>@Lorem ipsum</label>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<span>10 minutes ago</span>
				<p><label>@consectetur</label>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<span>15 minutes ago</span>
			</div>
			<div class="footer-grid">
				<h3>DID YOU KNOW?</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
				<a href="#">ReadMore</a>
			</div>
			<div class="clear"> </div>
		</div>
		<div class="clear"> </div>
	</div>
	<div class="copy-right">
		<div class="top-to-page">
						<a href="#top" class="scroll"> </a>
						<div class="clear"> </div>
					</div>
		<p>Copyright © 2015 <a href="#"> Texas Kitchen </a></p>
	</div>
		 <!---End-footer---->
	</body>
</html>

