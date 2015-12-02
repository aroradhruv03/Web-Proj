<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UTD Buy n Sell</title>
    <meta name="description" content="This one page example has a fixed navbar and full page height sections. Each section is vertically centered on larger screens, and then stack responsively on smaller screens. Scrollspy is used to activate the current menu item. This layout also has a contact form example. Uses animate.css, FontAwesome, Google Fonts (Lato and Bitter) and Bootstrap." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="generator" content="Codeply"> -->

    
    <!-- Home Page Links -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    
    <!-- Login/Register Stylesheets -->
<!--     <link href="assets/css/login-register.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->

</head>
<body >
    <nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#section1">Launch</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapsible">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#section2">Features</a></li>
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
                            echo "<li><a class='fa fa-sign-in' href='login.php'>&nbsp;Welcome, (Login)</a></li>";

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

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">UTD Buy 'n' Sell</h1>
        <h2 class="text-center lato animate slideInDown">You don't need it, someone needs it..!</h2>
        <p class="text-center">
            <br>
            <?php
            if(!(isset($_SESSION['login_user'])) )
            {
                echo "<a href='login.php' class='btn btn-blue btn-lg btn-huge lato'>Sign In</a>";
                echo "&nbsp;&nbsp;<b>OR</b>&nbsp;&nbsp;<a href='signup.php' class='btn btn-blue btn-lg btn-huge lato'>Sign Up</a>";
            }
            else
            {
                echo "<b>Welcome, <em>".$_SESSION['first_name']."</em> ! &nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>";
                echo "<a class='btn btn-blue btn-lg btn-huge lato' href='logout.php'>Log Out</a></b>";
            }
            ?>
            
        </p>
    </div>
    <a href="#section2">
        <div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
        </div>
    </a>
</section>

<section class="container-fluid" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInLeft animate">
                            <div class="panel-heading">
                                <h3>Post An AD..!</h3></div>
                                <div class="panel-body">
                                    <p>Click to post an ad for <b>FREE</b>...!!! </p>
                                    <hr> <u><a href="item_add.php">GO</a></u>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="panel panel-default slideInUp animate">
                                <div class="panel-heading">
                                    <h3>View All ADs</h3></div>
                                    <div class="panel-body">
                                        <p>Click here to view all the ads posted here...!</p>
                                        <hr> <u><a href="category.php">GO</a></u>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Removing the third column ...-->
                        <!--
                        <div class="col-sm-4 text-center">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div class="panel panel-default slideInRight animate">
                                        <div class="panel-heading">
                                            <h3>Clean</h3></div>
                                            <div class="panel-body">
                                                <p>There is other content and snippets of details or features that can be placed here..</p>
                                                <hr>GO
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->
                    <!--/row-->
                    <div class="row">
                        <br>
                    </div>
                </div>
                <!--/container-->
            </section>

            <!-- CATEGORIES SECTION -->
            <section class="container-fluid" id="section3">
                <div class="container-fluid v-center">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=1">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_auto.png">
                                </a>
                                <h3 class="text-center">Automotive</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=2">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_computer.png">
                                </a>
                                <h3 class="text-center">Electronics &amp; Computers</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=3">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_allstars.png">
                                </a>
                                <h3 class="text-center">Clothing, Shoes &amp; Jewelry</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=4">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_folder_backup.png">
                                </a>
                                <h3 class="text-center">Beauty, Health &amp; Sports</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=5">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_work.png">
                                </a>
                                <h3 class="text-center">Furniture, Home, Garden &amp; Tools</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=6">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/hp_ebook.png">
                                </a>
                                <h3 class="text-center">Books, Movie, Music &amp; Games</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=7">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/">
                                </a>
                                <h3 class="text-center">Toys, Kids &amp; Baby</h3>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <div class="text-center">
                                <a href="category2.php?category=8">
                                    <img style="width:100px;" class="img-circle img-responsive center-block" src="/img/categ/">
                                </a>
                                <h3 class="text-center">Misc &amp; Hand-made Items</h3>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </section>


            <section id="section4">
                <h1 class="text-center">About Us</h1>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h3 class="text-center lato slideInUp animate">UTD Buy <strong>'n'</strong> Sell </h3>
                        <br>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-1">This is a forum for UT Dallas Students to sell what is not needed for them and for others to buy it.</div>
                            <div class="col-xs-2"></div>
                            <div class="col-xs-4 text-right">Got something to tell us, to make this better ? Feel free to write to us, by clicking the link below.</div>
                        </div>
                        <br>
                        <p class="text-center">
                            <a href="#section5">Feedback</a>
                            <!--
                                <img src="//placehold.it/444x222/444/FFF" class="img-responsive thumbnail center-block ">
                            -->
                        </p>
                    </div>
                </div>
            </section>

            <section id="section5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Make Contact</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required="">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Middle Name" required="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="phone" placeholder="Phone" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-11">
                                    <input type="homepage" class="form-control" placeholder="Website URL" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-11">
                                    <button class="btn btn-default btn-lg pull-right">Contact Us</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well well-sm pull-right">
                                <address>
                                  <strong>UTD Buy n Sell Group</strong><br>
                                  123 Invisible Ave<br>
                                  Hidden City, TX 007123<br>
                                  P: (123) 456-7890
                              </address>
                              <address>
                                  <strong>Email Us</strong><br>
                                  <a href="mailto:first.last@example.com<">first.last@example.com</a>
                              </address>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

              <!--
              <section class="container-fluid" id="section5">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h2 class="text-center lato">Section with Marketing Highlights.</h2>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-left">
                                <img src="">
                            </div>
                            <div class="media-body media-middle">
                                <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-body media-middle">
                                <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                            <div class="media-right">
                                <img src="//placehold.it/100">
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-left">
                                <img src="//placehold.it/100">
                            </div>
                            <div class="media-body media-middle">
                                <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-body media-middle">
                                <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                            <div class="media-right">
                                <img src="//placehold.it/100">
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-left">
                                <img src="//placehold.it/100">
                            </div>
                            <div class="media-body media-middle">
                                <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <h3>Boom</h3>
                            <div class="media-body media-middle">
                                <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                            </div>
                            <div class="media-right">
                                <img src="//placehold.it/100">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        -->

            <!--

            <section class="container-fluid" id="section6">
                <ul class="row list-unstyled">
                    <li class="col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1">
                        <h3 class="text-center">This will scale down proportionately.</h3>
                    </li>
                    <li class="col-md-3 col-md-offset-0 col-xs-10 col-xs-offset-1 text-center">
                        <a href="" class="center-block btn btn-default btn-lg btn-huge lato animate slideInRight">Responsive Design</a>
                    </li>
                </ul>
            </section>
        -->

        <section class="container-fluid" id="section7">
            <div class="row">
                <!--fontawesome icons-->
                <div class="col-sm-1 col-sm-offset-3 col-xs-4 text-center">
                    <i class="fa fa-github fa-4x"></i>
                </div>
                <div class="col-sm-1 col-xs-4 text-center">
                    <i class="fa fa-foursquare fa-4x"></i>
                </div>
                <div class="col-sm-1 col-xs-4 text-center">
                    <i class="fa fa-pinterest fa-4x"></i>
                </div>
                <div class="col-sm-1 col-xs-4 text-center">
                    <i class="fa fa-google-plus fa-4x"></i>
                </div>
                <div class="col-sm-1 col-xs-4 text-center">
                    <i class="fa fa-twitter fa-4x"></i>
                </div>
                <div class="col-sm-1 col-xs-4 text-center">
                    <i class="fa fa-dribbble fa-4x"></i>
                </div>
            </div>
        </section>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 column">
                        <h4>Information</h4>
                        <ul class="nav">
                            <li><a href="about-us.html">Products</a></li>
                            <li><a href="about-us.html">Services</a></li>
                            <li><a href="about-us.html">Benefits</a></li>
                            <li><a href="elements.html">Developers</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3 column">
                        <h4>Follow Us</h4>
                        <ul class="nav">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Google+</a></li>
                            <li><a href="#">Pinterest</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3 column">
                        <h4>Contact Us</h4>
                        <ul class="nav">
                            <li><a href="#">Email</a></li>
                            <li><a href="#">Headquarters</a></li>
                            <li><a href="#">Management</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3 column">
                        <h4>Customer Service</h4>
                        <ul class="nav">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <!--/row-->
                <p class="text-right">©2015</p>
            </div>
        </footer>

        <div class="scroll-up">
            <a href="#"><i class="fa fa-angle-up"></i></a>
        </div>

        <!-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 class="text-center"><img src="" class="img-circle"><br>Login</h2>
                    </div>
                    <div class="modal-body row">
                        <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN UP</h6>
                        
                        <div id="login">
                            <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0" action="" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" placeholder="Enter your Email" id="user_email" name="user_email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" placeholder="Enter your Password" id="user_password" name="user_password" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger btn-lg btn-block" type="submit" name="submit">Sign In</button>
                                    <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                                </div>
                                <span><?php //echo $error; ?></span></div>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- login start -->

            <!-- <div class="modal fade login" id="loginModal">
              <div class="modal-dialog login animated">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="/auth/github">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="submit" name="submit" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to 
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>        
                  </div>
              </div>
          </div> -->
          <!-- login end -->

            <!--scripts loaded here-->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/scripts.js"></script>

            <!-- login modal scripts -->
            <!-- // <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
    <!-- // <script src="assets/js/bootstrap.js" type="text/javascript"></script> -->
    <!-- // <script src="assets/js/login-register.js" type="text/javascript"></script> -->
        </body>
        </html>