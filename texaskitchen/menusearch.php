<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'texaskitchen');
define('DB_USER','root');
define('DB_PASSWORD','');


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


	$query=("Select menu_items.name, menu_items.description,menu_items.price from menu_items INNER JOIN menu_categories on menu_items.menu_category_id=menu_categories.id WHERE menu_categories.name='".$_GET["p"]."'");
	$result= $mysqli->query($query);
	
	if ($result->num_rows > 0) {
	echo "<form id='adminorders' class='datagrid'>";
     echo "<table id='tablesss' border=1>";
	 while($row = $result->fetch_array(MYSQLI_BOTH))
     {
		 echo "<tbody>";
		 echo "<dl>";
         echo "<thead><th><dt>".$row["name"]."<th>".$row["price"]."$</dt></th></thead>";
		 echo "<dd><tr class='alt'><td colspan='2'>" . $row["description"]. "</dd></td>";
		 echo "</dl>";
		 echo "<tbody>";

     }
     echo "</table>";
	 	echo "</form>";
	 echo "<br/>";
	}
?>