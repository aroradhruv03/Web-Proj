<!DOCTYPE HTML>
<html>
<head>
    <title>Texas Kitchen -- My Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<!----start-header----->
<?php session_start(); //start session
$current_url = "cart_items.php";
$currency="$";

?>
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
						<li><a href="useraccount.html">My account</a></li>
						<li class="active"><a href="cart_items.php">SHOPPING CART</a></li>
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

                <div class="col span_1_of_3">
                    <div class="contact-form">
                        <div class="shopping-cart">
                            <h3>Your Shopping Cart</h3>
                            <?php
                            if(isset($_SESSION["items"]))
                            {
                                $total = 0;
                                echo '<ol>';
                                foreach ($_SESSION["items"] as $cart_itm)
                                {
                                    echo '<li class="cart-itm">';
                                    echo '<h4>'.$cart_itm["name"].'&nbsp;&nbsp;&nbsp;<a href="update_cart.php?removep='.$cart_itm["id"].'&return_url='.$current_url.'">&times;</a></h4>';

                                    echo '<div class="p-qty">Qty : '.$cart_itm["quantity"].'</div>';
                                    echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
                                    echo '</li>';
                                    $subtotal = ($cart_itm["price"]*$cart_itm["quantity"]);
                                    $total = ($total + $subtotal);
                                }
                                echo '</ol>';
								$tax= $total*0.0825;
								$charges=2;
								$bill= $charges+$tax+$total;
                                echo '<span class="check-out-txt"><strong><br>Subtotal :'.$currency.number_format($total, 2, '.', '').'<br>Tax : '.$currency.number_format($tax, 2, '.', '').'<br>Additional Charges : '.$currency.number_format($charges, 2, '.', '').'<br><h3>Total : '.$currency.number_format($bill, 2, '.', '').'</h3></strong></span><br><br><span><a href="checkout.php?total='.$total.'"><button class="mybutton">Check-out!</button></a>&nbsp;&nbsp;&nbsp;';
                                echo '<a href="update_cart.php?emptycart=1&return_url='.$current_url.'"><button class="mybutton">Empty Cart!</button></a></span>';
                            }else{
                                echo 'Your Cart is empty';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!---End-contact---->
    <!---End-content---->
<!---start-footer---->
<div class="footer">
    <div class="wrap">
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

