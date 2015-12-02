<?php
include('signup_script.php'); // Includes Login Script

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><img src="" class="img-circle"><br>Sign Up</h2>
            </div>
            <div class="modal-body row">
                <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN UP</h6>
                <!-- DHRUV ADDING STUFF START -->
                <div id="login">
                    <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Enter your First Name" id="user_f_name" name="user_f_name" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Enter your Last Name" id="user_l_name" name="user_l_name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-lg" 
                            placeholder="Enter your Email" id="user_email" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" 
                            placeholder="Enter your Password" id="user_password" name="user_password" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Address Line 1" id="user_addr1" name="user_addr1" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Address Line 2" id="user_addr2" name="user_addr2" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Zipcode" id="user_zipcode" name="user_zipcode" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" 
                            placeholder="Phone Number" id="user_phone" name="user_phone" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-lg btn-block" type="submit" name="submit">Sign Up</button>
                            <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                        </div>
                        <span><?php echo $error_signup; ?></span></div>
                    </form>
                </div>
                <!-- DHRUV ADDING STUFF END -->
                <div class="modal-footer">
                    <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
                </div>
            </div>
        </div>

        <!--scripts loaded here-->

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/scripts.js"></script>
    </body>
    </html>