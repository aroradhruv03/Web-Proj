<?php
session_start();
    // include('login_script.php'); // Includes Login Script

    if(isset($_SESSION['login_user'])){
        header("Location: index.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- <link rel="icon" type="image/png" href="assets/img/shopping_cart.png"> -->

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk-base.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- For submission of form using Ajax -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>

    <!-- For Form Validation -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script>
      //Configuration
      //    var minEmailLen = 5, maxEmailLen = 30;
      //    var minPassLen = 8, maxPassLen = 4096;
      //    var emailMsg = "Username must be between " + minEmailLen + " and " +
      //                      maxEmailLen + " characters, inclusive.";
      //    var passwordMsg = "Password must be between " + minPassLen + " and " +
      //                      maxPassLen + " characters, inclusive.";
      //    jQuery.validator.setDefaults({
      //       debug: true,      //Avoids form submit. Comment when in production.
      //       success: "valid",
      //       submitHandler: function() {
      //          alert("Success! The form was pretend-submitted!");
      //       }
      //    });
      // $(document).ready(function() {
      //    // validate signup form on keyup and submit
      //    $("#signupForm").validate({
      //       rules: {
      //          email: {
      //             required: true,
      //             minlength: minEmailLen,
      //             maxlength: maxEmailLen

      //          },
      //          password: {
      //             required: true,
      //             minlength: minPassLen,
      //             maxlength: maxPassLen

      //          },
      //       },
      //       messages: {
      //          email: {
      //             required: "Email required",
      //             minlength: emailMsg,
      //             maxlength: emailMsg
      //          },
      //          password: {
      //             required: "Password required",
      //             minlength: passwordMsg,
      //             maxlength: passwordMsg
      //          }
      //       }
      //    });
      // });
</script>

<style type="text/css">
    div{
        floar:right;
    }

    #pswd_info {
        position:absolute;

        background:#fefefe;
        font-size:.875em;
        border-radius:5px;
        box-shadow:0 1px 3px #ccc;
        border:1px solid #ddd;
        clear: both;
        list-style-type:none;
    }

    #pswd_info h4 {
        /*margin:0 0 10px 0;*/
        padding:0;
        font-weight:normal;
    }

    #pswd_info::before {
        content: "\25B2";


        font-size:14px;
        line-height:14px;
        color:#ddd;
        text-shadow:none;
        display:block;
    }

    .invalid {
        background:url(img/cancel.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#ec3f41;
    }
    .valid {
        background:url(img/accept.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#3a7d34;

    }

    #pswd_info {
    display:none;
}

</style>
</head>

<body>
  

<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Launch</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapsible">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php#section2">Features</a></li>
                    <li><a href="#section3">Categories</a></li>
                    <li><a href="#section4">About Us</a></li>
                    <li><a href="#section5">Feedback</a></li>
                    <li>&nbsp;</li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        
                        <!-- <a href="login.php" data-toggle="modal" data-target="#myModal">
                        <!- <i class="fa fa-heart-o fa-lg"></i> -->
                        <?php
                        if(!(isset($_SESSION['login_user'])) )
                        {
                            echo "<li><a class='fa fa-user' href='signup.php'>&nbsp;Sign Up</a></li>";
                            echo "<li><a class='fa fa-sign-in' href='login_view.php'>&nbsp;Welcome, (Login)</a></li>";

                            // echo "<li><a class='fa fa-user' data-toggle='modal' href='javascript:void(0)' onclick='openRegisterModal();'>&nbsp;Sign Up</a></li>";
                            // echo "<li><a class='fa fa-sign-in' data-toggle='modal' href='javascript:void(0)' onclick='openLoginModal();'>&nbsp;Welcome, (Login)</a></li>";

                            // echo "<a class='btn big-login' data-toggle='modal' href='javascript:void(0)' onclick='openLoginModal();'>Log in</a>";
                        }
                        else
                        {
                            echo "<li>Welcome, <b><em>".$_SESSION['first_name']."</em> ! &nbsp;&nbsp;&nbsp;&nbsp;</li>";
                            echo "<li><span class='fa fa-sign-out'></span><a href='logout.php'>&nbsp;Log Out</a></b></li>";
                        }
                        ?>
                    </a>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-boat.jpg')">
    <!--   Creative Tim Branding   -->
    <!-- <a href="http://creative-tim.com">
     <div class="logo-container">
      <div class="logo">
        <img src="assets/img/new_logo.png">
      </div>
      <div class="brand">
        Creative Tim
      </div>
    </div>
</a> -->

<!--   Big container   -->
<div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">

        <!--      Wizard container        -->   
        <div class="wizard-container"> 
          <div class="card wizard-card ct-wizard-azzure" id="wizard">
            <form action="#" method="post" class="form" enctype="multipart/form-data" id="signupForm">
              <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

              <div class="wizard-header">
                 <h3> LOGIN !<br>
                    <small>Please enter the foll info...</small>
                </h3>
            </div>
            <ul>
              <li><a href="#details" data-toggle="tab">Details</a></li>
              <!-- <li><a href="#categ" data-toggle="tab">Item Category</a></li> -->
              <!-- <li><a href="#description" data-toggle="tab">Description</a></li> -->
          </ul>

          <div class="tab-content">
              <div class="tab-pane" id="details">
                <div class="row">

                   <h4 class="info-text" id="error"></h4>
                   <div class="col-sm-4 col-sm-offset-1">
                   <!-- <div class="picture-container">
                    <div class="picture">
                      <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                      <input name="uploadedimage" type="file" id="wizard-picture">
                    </div>
                    <h6>Upload an Item Picture</h6>
                </div> -->
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Email : <small>(required)</small></label>
                <input name="email" type="email" id="email" class="form-control" placeholder="Example: xyz@abc.com...">
            </div>
            <div class="form-group">
                <label>Password <small>(required)</small></label>
                <input name="password" type="password" id="password" class="form-control" placeholder="You password here...">
                <!-- <span class="input-group-addon">$</span> -->
                <span id="result"></span>
            </div>
            <div id="pswd_info">
                <h6>Password must meet the following requirements:</h6>
                <ul>
                    <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                    <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                    <li id="number" class="invalid">At least <strong>one number</strong></li>
                    <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                </ul>
            </div>

        </div>

    </div>
</div>


            <!-- <div class="tab-pane" id="categ">
              <h4 class="info-text">Do you include a captain? </h4>
              <div class="row">
                <div class="col-sm-10 col-sm-offset-1">


                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for Cars, Bikes, Bicycles, Trucks or their parts!">
                      <input type="radio" name="category" value="auto">
                      <div class="icon">
                        <i class="fa fa-car"></i>
                      </div>
                      <h6>Automotive</h6>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for all Electronics including Computers &amp; Laptops.">
                      <input type="radio" name="category" value="comp">
                      <div class="icon">
                        <i class="fa fa-laptop"></i>
                      </div>
                      <h6>Electronics &amp; Computers</h6>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Toys, or Kids/Baby items.">
                      <input type="radio" name="category" value="toys">
                      <div class="icon">
                        <i class="fa fa-cube"></i>
                      </div>
                      <h6>Toys, Kids &amp; Baby</h6>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Clothing, Shoes, Jewelry. ">
                      <input type="radio" name="category" value="clothes">
                      <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                      </div>
                      <h6>Clothing, Shoes &amp; Jewelry </h6>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Beauty, Health, Fitness, Sports products.">
                      <input type="radio" name="category" value="beauty">
                      <div class="icon">
                        <i class="fa fa-linux"></i>
                      </div>
                      <h6>Beauty, Health &amp; Sports</h6>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Home products like Furniture, Garden tools, plants, etc.">
                      <input type="radio" name="category" value="home">
                      <div class="icon">
                        <i class="fa fa-fort-awesome"></i>
                      </div>
                      <h6>Furniture, Home, Garden &amp; Tools</h6>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Books, Music/Movie/Game DVDs/CDs!">
                      <input type="radio" name="category" value="books">
                      <div class="icon">
                        <i class="fa fa-gamepad"></i>
                      </div>
                      <h6>Books, Movie, Music &amp; Games</h6>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Choose for selling Misc items or hand crafted items!">
                      <input type="radio" name="category" value="8">
                      <div class="icon">
                        <i class="fa fa-male"></i>
                      </div>
                      <h6>Hand-made &amp; Misc</h6>
                    </div>
                  </div>

                </div>
              </div>
          </div> -->

            <!-- <div class="tab-pane" id="description">
              <div class="row">
                <h4 class="info-text"> Give us a small description </h4>
                <div class="col-sm-6 col-sm-offset-1">
                 <div class="form-group">
                  <label>Item description</label>
                  <textarea name="desc" class="form-control" placeholder="" rows="9">

                  </textarea>
                </div>
              </div>
              <div class="col-sm-4">
               <div class="form-group">
                <label>Example</label>
                <p class="description">"Detailed description about the item. Why you want to sell."</p>
              </div>
            </div>
          </div>
      </div> -->


  </div>
  <div class="wizard-footer">
     <div class="pull-right">
        <!-- <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' /> -->
        

    </div>
    <div class="pull-left">
    <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' id="login" name='login' value='Login' />
        <!-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' /> -->
    </div>
    <div class="clearfix"></div>
</div>  
</form>
</div>
</div> <!-- wizard container -->
</div>
</div> <!-- row -->
</div> <!--  big container -->

<div class="footer">
  <!-- <div class="container">
   Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
</div> -->
</div>
</div>
</body>
<!-- <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script> -->

<!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--   plugins   -->
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
<!--  methods for manipulating the wizard and the validation -->
<script src="assets/js/wizard.js"></script>

</html>