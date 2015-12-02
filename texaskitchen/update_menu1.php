<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');
$category = $_GET['p'];
	$menuitem = $_GET['q'];
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

	
	$result=$mysqli->query("SELECT menu_items.id,menu_categories.name as Category,menu_items.name as Item,menu_items.description,menu_items.quantity from menu_categories INNER JOIN menu_items on menu_items.menu_category_id=menu_categories.id WHERE menu_items.name like '%".$menuitem."%' and menu_categories.name='".$category."'");
	
	if ($result->num_rows > 0) {
							 echo "<form id='adminorders' class='datagrid'>";
							 echo "<table id='tabless' border=1><thead><th>Menu Item Name</th><th>Category Name</th><th>Quantiy</th><th>Description</th></thead>";
							 echo "<tbody>";
							 while($row = $result->fetch_array(MYSQLI_BOTH))
							 {
								$url = "update_menu2.php?idno=" . $row["id"];
								echo "<tr class='alt'><td class='menuid'><a href=\"" . $url . "\"> ". $row["Item"]. "</td><td>" . $row["Category"]. " </td><td>" . $row["quantity"]. "</td><td>" . $row["description"]. " </td></tr>";
							 }
							 echo "<tbody>";
							 echo "</table>";
							echo "</form>";
							 

						} else {
								 echo "<form id='adminorders' class='datagrid'>";
								 echo "<table id='tablesss' border=1><thead><th>Category Name</th><th>Menu Item Name</th><th>User ID</th><th>Quantiy</th><th>Description</th></thead>";
								 echo "<th colspan='3' ><td>No Records Found</td></th>";
								 echo "</table>";

						}
	
?>