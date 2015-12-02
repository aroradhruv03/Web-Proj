<?php
/**
 * Created by PhpStorm.
 * User: greeshma.madalam
 * Date: 4/19/15
 * Time: 12:19 PM
 */


session_start(); //start session
include_once("config.php");
if(!empty($_GET['total'])){
    $total = $_GET['total'];
    $tax= $total*0.0825;
    $charges=2;
    $bill= $charges+$tax+$total;
    $status=0;
}

$userId=$_SESSION["userid"];


$sql= 'INSERT INTO orders (`id`, `user_id`, `amount`, `tax`, `additional_charges`, `total`, `order_status`) VALUES ("",'.$userId.','.$total.','.$tax.','.$charges.','.$bill.','.$status.');';
$orderId = $conn->query($sql);

$insertedId = $conn->insert_id;
foreach ($_SESSION["items"] as $cart_itm){

    $sql= 'INSERT INTO order_details (`id`, `orders_id`, `menu_items_id`, `quantity`) VALUES ("",'.$insertedId.','.$cart_itm["id"].','.$cart_itm["quantity"].');';
   $result= $conn->query($sql);

    if($result==1){
        
    }
	else
	{
		header('Location: shopping_cart_failed.html');
		exit;
	}
}
unset($_SESSION["items"]);
header('Location: shopping_cart_success.html');
exit;



