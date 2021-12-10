<?php
session_start();

?>
<script type="text/javascript">
  window.history.forward();

  function noBack() {
    window.history.forward();
  }
</script>
<?php
include('db_connection.php');
if (isset($_POST["submit_email"])) {
  $gmail = $_POST['gmail'];

  $query = "SELECT * FROM emp where emp_email='$gmail'";
  $qu = mysqli_query(
    $con,
    $query
  );
  if (mysqli_num_rows($qu) == 0) {
    echo "<script>alert('This email doesnt exists')</script>";
  } else {
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = str_shuffle($str);
    $str = substr($str, 0, 10);
    $recipient = $_POST['gmail'];
    $subject = "New random password";
    $message = "Your new password for SOP website is: $str";
    $sender = "From: abdullahrasheed937@gmail.com";

    $sql = "SELECT emp_name as total from emp where emp_email='$gmail'";
    $query2 = mysqli_query($con, $sql);
    $values = mysqli_fetch_assoc($query2);
    $name = $values['total'];

    $query1 = "UPDATE emp set pass='$str' where emp_email='$gmail'";


    mysqli_query($con, $query1);
    // PHP function to send mail
    if (mail($recipient, $subject, $message, $sender)) {
      echo "<script>alert('Mail successfully sent to $recipient')</script>";
      $query = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$name'
            , '$gmail', 'employee','Employee $name has requested for new password as old password was forgotten', 'unread', CURRENT_TIMESTAMP,'forgot')";


      mysqli_query($con, $query);
    } else {
      echo "<script>alert('Error while sending mail successfully to $recipient')</script>";
    }
  }
}
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
                <li>

                  <h1>Online Donation Platform | Employee</h1>
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
                    Employee Login
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
  <center> &nbsp
    <form method="post" action="index1.php">
      <h3>
        <p><b align="center">Forgot Password? Enter your Email Address to get new random Password <b></p>
      </h3>
      <input type="text" name="gmail">
      <input type="submit" name="submit_email">
    </form>
  </center>
  <div class="modal fade" id="an" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:blueviolet" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color:white" class="modal-title" id="myModalLabel">Employee Credentials</h4>
        </div>
        <?php
        if (empty($_GET)) {
        ?>
          <div class="modal-body">


            <form role="form" method="post" action="index1.php">
              <fieldset>
                <div class=" form-group">
                  <input class="form-control" placeholder="Email" name="emp_email" type="text">
                </div>

                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="pass" id="pass" type="password">

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
            <button class="btn btn-md btn-success btn-block" name="admin_login">Login</button>

            <button type="button" class="btn btn-md btn-danger btn-block" data-dismiss="modal">Cancel</button>
            </form>
          </div>
      </div>
    <?php
        } else {
    ?>
      <div class="modal-body">


        <form role="form" method="post" action="index1.php?continue=<?php echo $_GET['continue']; ?>">
          <fieldset>
            <div class=" form-group">
              <input class="form-control" placeholder="Email" name="emp_email" type="text">
            </div>

            <div class="form-group">
              <input class="form-control" placeholder="Password" name="pass" id="pass" type="password">

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
        <button class="btn btn-md btn-success btn-block" name="admin_login">Login</button>

        <button type="button" class="btn btn-md btn-danger btn-block" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  <?php
        }
  ?>




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

include("db_connection.php");



if (isset($_POST['admin_login'])) {

  $emp_email = $_POST['emp_email'];
  $pass = $_POST['pass'];




  $check_admin = "select * from emp WHERE emp_email='$emp_email' AND pass='$pass'";


  $run = mysqli_query($con, $check_admin);

  if (mysqli_num_rows($run)) {
    if (empty($_GET)) {
      $_SESSION['emp_email'] = $emp_email;

      echo "<script>alert('Login was successful!')</script>";

      echo "<script>window.open('../donordetails.php','_self')</script>";
    } else {
      $_SESSION['emp_email'] = $emp_email;
      echo "<script>alert('Login was successful!')</script>";
      $g = $_GET['continue'];
      echo "<script>window.open(' $g','_self')</script>";
    }
  } else {
    $g = $_GET['continue'];
    echo "<script>alert('Email or Password is incorrect!')</script>";
    if (empty($g))
      echo "<script>window.open('index1.php','_self')</script>";
    else
      echo "<script>window.open('index1.php?continue=$g','_self')</script>";

    exit();
  }
}
?>