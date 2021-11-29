<?php
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Online Donation Platform</title>
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />


  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/css/flexslider.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />

</head>

<body>

  <div class="home-sec" id="home" style="  background-color:purple;
">
    <div class="overlay">
      <div class="container">
        <div class="row text-center ">

          <div class="col-lg-12  col-md-12 col-sm-12">

            <div class="flexslider set-flexi" id="main-section">
              <ul class="slides move-me">
                <!-- Slider 01 -->
                <li>

                  <h1>Online Donation Platform</h1>
                  <!--                           
						   <h3>High Quality Skateboard Products</h3>
                           
                            
							<a  href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                                SIGN IN
                            </a>
                             <a  href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                                SIGN UP
                            </a>
							-->
                  <a href="#features-sec" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#an">
                    ADMIN LOGIN
                  </a>

                </li>
                <!-- End Slider 01 -->

                <!-- Slider 02 -->

                <!-- End Slider 02 -->


                <!-- End Slider 03 -->
              </ul>
            </div>




          </div>

        </div>
      </div>
    </div>

  </div>

  <!-- <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:#008CBA" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registration Form</h4>
        </div>
        <div class="modal-body">


          <form role="form" method="post" action="register.php">
            <fieldset>

              <div class="form-group">
                <input class="form-control" placeholder="Firstname" name="ruser_firstname" type="text" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Lastname" name="ruser_lastname" type="text" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Address" name="ruser_address" type="text" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Email" name="ruser_email" type="email" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Password" name="ruser_password" type="password" required>
              </div>

            </fieldset>


        </div>
        <div class="modal-footer">

          <button class="btn btn-md btn-warning btn-block" name="register">Sign Up</button>

          <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
   Script -->

  <!-- 
  <div class="modal fade" id="ln" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:#008CBA" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color:white" class="modal-title" id="myModalLabel">Customer Login</h4>
        </div>
        <div class="modal-body">


          <form role="form" method="post" action="userlogin.php">
            <fieldset>


              <div class="form-group">
                <input class="form-control" placeholder="Email" name="user_email" type="email" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Password" name="user_password" type="password" required>
              </div>

            </fieldset>


        </div>
        <div class="modal-footer">

          <button class="btn btn-md btn-warning btn-block" name="user_login">Sign In</button>

          <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
          </form>

        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="an" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:blueviolet" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color:white" class="modal-title" id="myModalLabel">Administrator Credentials</h4>
        </div>

        <div class="modal-body">


          <form role="form" method="post" action="adminn.php">
            <fieldset>


              <div class=" form-group">
                <input class="form-control" placeholder="Username" name="admin_username" type="text">
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Password" name="admin_password" type="password">
              </div>

            </fieldset>


        </div>

        <div class="modal-footer">

          <button class="btn btn-md btn-success btn-block" name="admin_login">Login</button>

          <button type="button" class="btn btn-md btn-danger btn-block" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
  <br />
  <!-- Script -->
  <!-- CONTACT SECTION END-->
  <br><br><br><br><br>
  <div id="footer">

    &copy Online Donation Platform
  </div>

  <!-- FOOTER SECTION END-->

  <!--  Jquery Core Script -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!--  Core Bootstrap Script -->
  <script src="assets/js/bootstrap.js"></script>
  <!--  Flexslider Scripts -->
  <script src="assets/js/jquery.flexslider.js"></script>
  <!--  Scrolling Reveal Script -->
  <script src="assets/js/scrollReveal.js"></script>
  <!--  Scroll Scripts -->
  <script src="assets/js/jquery.easing.min.js"></script>
  <!--  Custom Scripts -->
  <script src="assets/js/custom.js"></script>
</body>

</html>
<?php

include("../db_connection.php");



if (isset($_POST['admin_login'])) {

  $admin_username = $_POST['admin_username'];
  $admin_password = $_POST['admin_password'];
  $_SESSION['status'] = false;



  $check_admin = "select * from admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";


  $run = mysqli_query($con, $check_admin);

  if (mysqli_num_rows($run)) {
    $_SESSION['status'] = true;
    echo "<script>alert('Login was successful!')</script>";

    //echo "<script>window.open('Admin/index.php','_self')</script>";

    echo "<script>window.open('../report.php','_self')</script>";
    // $_SESSION['admin_username'] = $admin_username;
  } else {
    echo "<script>alert('Username or Password is incorrect!')</script>";
    echo "<script>window.open('adminn.php','_self')</script>";

    exit();
  }
}
?>