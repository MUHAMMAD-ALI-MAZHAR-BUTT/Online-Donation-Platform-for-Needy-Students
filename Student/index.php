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
  <title>Online Donation Platform | Employee Login</title>
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

                <!-- End Slider 01 -->

                <!-- Slider 02 -->
                <li>

                  <h1>Online Donation Platform | Student</h1>
                  <!--                           
						   <h3>High Quality Skateboard Products</h3>
                           
                            
							<a  href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                                SIGN IN
                            </a>
                             <a  href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                                SIGN UP
                            </a>
							-->
                  <a href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ln">
                    Student Login
                  </a>
                  <a href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#su">
                    Student Registration
                  </a>

                </li>
                <!-- End Slider 02 -->

                <!-- Slider 03 -->
                <li>

                  <h1>Platform for Needy students, Take benefit ASAP</h1>
                  <!--                           
						   <h3>High Quality Skateboard Products</h3>
                           
                            
							<a  href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                                SIGN IN
                            </a>
                             <a  href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                                SIGN UP
                            </a>
							-->
                  <a href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ln">
                    Student Login
                  </a>
                  <a href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#su">
                    Student Registration
                  </a>

                </li>
                <!-- End Slider 03 -->
              </ul>
            </div>




          </div>

        </div>
      </div>
    </div>

  </div>
  <center> &nbsp<form method="post" action="send_link.php">
      <h3>
        <p><b align="center">Forgot Password?Enter Email Address to get new Password Link<b></p>
      </h3>
      <input type="text" name="gmail">
      <input type="submit" name="submit_email">
    </form>
  </center>
  <!--HOME SECTION END-->


  <!--
<br />
           
             <div class="container">
             <div class="row set-row-pad"  >
    <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Our Location </strong></h2>
        <hr />
                    <div ">
                        <h4>Guang-Guang, Brgy. Dahican,Mati City</h4>
                        <h4>Davao Oriental,Philippines</h4>
						<h4>8200</h4>
                        
                    </div>


                </div>
                 <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1" data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Feedbacks </strong></h2>
        <hr />
                    <div >
                        <h4><strong>Call:</strong>  +63 555 444 333 </h4>
                        <h4><strong>Email: </strong>edgeskateshop@gmail.com</h4>
                    </div>
                    </div>


                </div>
                 </div>
                 
                 
               </div>
             </div>
      <!-- COURSES SECTION END-->
  <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:blueviolet" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registration Form Student</h4>
        </div>
        <div class="modal-body">


          <form role="form" method="post" action="register.php">
            <fieldset>

              <div class="form-group">
                <input class="form-control" placeholder="Name" name="username" type="text" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" required>
              </div>


              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" id="pass" type="password" required>
                <input type="checkbox" onclick="myFunction()">Show Password
                <script>
                  function myFunction() {
                    var x = document.getElementById("pass");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Confirm Password" name="password" id="pass" type="password" required>
                <input type="checkbox" onclick="myFunction()">Show Password
                <script>
                  function myFunction() {
                    var x = document.getElementById("pass");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>

            </fieldset>


        </div>
        <div class="modal-footer">

          <button class="btn btn-md btn-success btn-block" name="register">Register</button>

          <button type="button" class="btn btn-md btn-danger btn-block" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Script -->


  <div class="modal fade" id="ln" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:blueviolet" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color:white" class="modal-title" id="myModalLabel">Student Login</h4>
        </div>
        <div class="modal-body">


          <form role="form" method="post" action="userlogin.php">
            <fieldset>


              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" id="pass" type="password" required>
              </div>
              <input type="checkbox" onclick="myFunction()">Show Password
              <script>
                function myFunction() {
                  var x = document.getElementById("pass");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
              </script>

            </fieldset>


        </div>
        <div class="modal-footer">

          <button class="btn btn-md btn-success btn-block" name="user_login">Sign In</button>

          <button type="button" class="btn btn-md btn-warning btn-block" data-dismiss="modal">Cancel</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="an" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:#008CBA" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color:white" class="modal-title" id="myModalLabel">Administrator Credentials</h4>
        </div>



        <!--           
		   <div class="modal-body">
            
				
				 <form role="form" method="post" action="adminlogin.php">
                   <fieldset>
					
						
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="admin_username" type="text" required>
							</div>
							
							<div class="form-group">
                                <input class="form-control" placeholder="Password" name="admin_password" type="password" required>
							</div>
				   
					 </fieldset>
                  
            
              </div>
			  -->
        <div class="modal-footer">

          <button class="btn btn-md btn-warning btn-block" name="admin_login">Login</button>

          <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- forget -->
  <div class="modal fade" id="abc" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:#008CBA" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Forget Password</h4>
        </div>
        <div class="modal-body">


          <form role="form" method="post" action="forget.php">
            <fieldset>

              <div class="form-group">
                <input class="form-control" placeholder="Email" name="ruser_email" type="email" required>
              </div>


            </fieldset>


        </div>
        <div class="modal-footer">

          <button class="btn btn-md btn-warning btn-block" name="register">Submit</button>

          <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
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

    &copy Waste Management System | <a style="color: #fff" target="_blank">Design by : Admin</a>
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