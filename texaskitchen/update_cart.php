<?php
/**
 * Created by PhpStorm.
 * User: greeshma.madalam
 * Date: 4/17/15
 * Time: 11:43 AM
 */

session_start(); //start session
include_once("config.php");
$return_url = $_POST["return_url"]; //return url

if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
    $return_url = $_GET["return_url"];
	unset($_SESSION["items"]);
    header('Location:'.$return_url);
}




//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
    if(!empty($_POST['item'])){
        $selectedItem = $_POST['item'];
        $quantity = $_POST['quantity'];
    }
    //MySqli query - get details of item from db using product code
    $sql = "SELECT * FROM menu_items WHERE menu_items.id=$selectedItem;";
    $items = $conn->query($sql);
  //  print_r($items);
    $obj = $items->fetch_object();
    if ($items) { //we have the product info

        //prepare array for the session variable
        $new_product = array(array('id'=>$obj->id, 'name'=>$obj->name, 'price'=>$obj->price, 'quantity'=>$quantity));
        if(isset($_SESSION["items"])) //if we have the session
        {
            $found = false; //set found item to false

            foreach ($_SESSION["items"] as $cart_itm) //loop through session array
            {
                if($cart_itm["id"] == $selectedItem){ //the item exist in array

                    $product[] = array('id'=>$cart_itm["id"], 'name'=>$cart_itm["name"], 'price'=>$cart_itm["price"], 'quantity'=>$quantity);
                    $found = true;
                }else{
                    //item doesn't exist in the list, just retrive old info and prepare array for session var
                    $product[] = array('id'=>$cart_itm["id"], 'name'=>$cart_itm["name"], 'price'=>$cart_itm["price"], 'quantity'=>$cart_itm["quantity"]);
                }
            }

            if($found == false) //we didn't find item in array
            {
                //add new user item in array
                $_SESSION["items"] = array_merge($product, $new_product);
            }else{
                //found user item in array list, and increased the quantity
                $_SESSION["items"] = $product;
            }

        }else{
            //create a new session var if does not exist
            $_SESSION["items"] = $new_product;
        }

    }
    //redirect back to original page
    header('Location:'.$return_url);
}


//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["items"]))
{
    echo "remodhf";
    $selectedItem = $_GET["removep"];
    $return_url     = $_GET["return_url"]; //get return url


    foreach ($_SESSION["items"] as $cart_itm) //loop through session array var
    {
        if($cart_itm["id"]!=$selectedItem){ //item does't exist in the list
            $product[] = array('id'=>$cart_itm["id"], 'name'=>$cart_itm["name"], 'price'=>$cart_itm["price"], 'quantity'=>$cart_itm["quantity"]);
        }
        //create a new product list for cart
        $_SESSION["items"] = $product;
    }

    //redirect back to original page
    header('Location:'.$return_url);
}
?>
