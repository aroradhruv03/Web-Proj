<?php 
session_start();
$db_username = 'root';
$db_password = '';
$db_name = 'texaskitchen';
$db_host = 'localhost';

//check we have username post var
if(isset($_POST["answer"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }   

        //try connect to db
    $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
    
    //trim and lowercase username
    $username =  strtolower(trim($_POST["answer"])); 
    
    //sanitize username
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	$forgotuid = $_SESSION["forgotpwduserid"];
	$ans = $_POST["answer"];
    
    //check username in db
    $results = mysqli_query($connecDB,"SELECT id FROM users WHERE id='$forgotuid' and answer='$ans'");
    
    //return total count
    $username_exist = mysqli_num_rows($results); //total records
    
    //if value is more than 0, username is not available
    if($username_exist) {
        echo '<img src="images/available.png" />'."<font color=green> Click on submit to reset password</font>";
		?>
		<input type="submit" name="submit" class="mybutton" value="Submit">
    <?php }else{
        echo '<img src="images/not-available.png" />'."<font color=red> Sorry! This is not correct answer</font>";?>
		<input type="submit" name="submit" class="mybutton" value="Submit" <?php echo 'disabled="disabled"' ?>>
    <?php }
    
    //close db connection
    mysqli_close($connecDB);
}
?>