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

  $query = "SELECT * FROM student where email='$gmail'";
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

    $sql = "SELECT name as total from student where email='$gmail'";
    $query2 = mysqli_query($con, $sql);
    $values = mysqli_fetch_assoc($query2);
    $name = $values['total'];

    $query1 = "UPDATE student set password='$str' where email='$gmail'";


    mysqli_query($con, $query1);
    // PHP function to send mail
    if (mail($recipient, $subject, $message, $sender)) {
      echo "<script>alert('Mail successfully sent to $recipient')</script>";
      $query = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$name'
            , '$gmail', 'student','Student $name has requested for new password as old password was forgotten', 'unread', CURRENT_TIMESTAMP,'forgot')";


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
  <center> &nbsp
    <form method="post" action="index.php">
      <h3>
        <p><b align="center">Forgot Password? Enter your Email Address to get new random Passwordd <b></p>
      </h3>
      <input type="text" name="gmail">
      <input type="submit" name="submit_email">
    </form>
  </center>

  <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
      <div style="color:white;background-color:blueviolet" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registration Form Student</h4>
        </div>
        <div class="modal-body">

          <form id="addform">
            <fieldset>
              <style>
                .required:after {
                  content: " *";
                  color: red;

                }
              </style>
              <div class="form-group">
                <label style="margin-right:210px" class="required">Name</label>
                <input class="form-control form_data" placeholder="Name" id="name" name="name" type="text">
                <span id="name_error" style="color:#EED202"></span>
              </div>

              <div class="form-group">
                <label style="margin-right:210px" class="required">Email</label>
                <input class="form-control form_data" placeholder="Email" id="email" name="email" type="email">
                <span id="email_error" style="color:#EED202"></span>
              </div>
              <div class="form-group">
                <label style="margin-right:210px" class="required">Phone</label>
                <input class="form-control form_data" placeholder="Phone Number" id="phone" name="phone" type="text">
                <span id="phone_error" style="color:#EED202"></span>
              </div>

              <div class="form-group">
                <label style="margin-right:190px" class="required">Password</label>
                <input class="form-control form_data" placeholder="Password" id="pass" name="password" type="password">

                <div style="margin-right: 140px;"><input type="checkbox" onclick="myFunction()">Show Password
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
              </div>
              <div class="form-group">
                <label style="margin-right:130px" class="required">Confirm Password</label>
                <input class="form-control form_data" placeholder="Confirm Password" name="cpassword" id="cpass" type="password">
                <span id="pass_error" style="color:#EED202"></span>
                <div style="margin-right: 140px;"><input type="checkbox" onclick="myFunc()">Show Password
                  <script>
                    function myFunc() {
                      var x = document.getElementById("cpass");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script>
                </div>
              </div>
            </fieldset>
            <div class="modal-footer">

              <input onclick="save_stu(); return false;" type="submit" name="submit" id="submit" class="btn btn-md btn-success btn-block" value="Register">
              <button type="button" class="btn btn-md btn-danger btn-block" data-dismiss="modal">Cancel</button>

            </div>
          </form>
          <script>
            function save_stu() {
              var form_element = document.getElementsByClassName('form_data');

              var form_data = new FormData();

              for (var count = 0; count < form_element.length; count++) {
                form_data.append(form_element[count].name, form_element[count].value);
              }

              document.getElementById('submit').disabled = true;

              var ajax_request = new XMLHttpRequest();

              ajax_request.open('POST', 'addstu.php');

              ajax_request.send(form_data);

              ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                  document.getElementById('submit').disabled = false;

                  var response = JSON.parse(ajax_request.responseText);

                  if (response.success != '') {
                    // document.getElementById('addform').reset();

                    // document.getElementById('suc').innerHTML = response.success;



                    // document.getElementById('suc').innerHTML = '';
                    alert("Account successfully created");
                    location.reload();


                  } else {
                    document.getElementById('name_error').innerHTML = response.name_error;
                    document.getElementById('email_error').innerHTML = response.email_error;
                    document.getElementById('phone_error').innerHTML = response.phone_error;
                    document.getElementById("pass_error").innerHTML = response.pass_error;
                  }



                }
              }
            }
          </script>

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

          <?php
          if (empty($_GET)) {
          ?>
            <form role="form" method="post" action="userlogin.php">
              <fieldset>


                <div class="form-group">
                  <input class="form-control" placeholder="Email" name="email" type="email" required>
                </div>

                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" id="pass" type="password" required>
                  <div style="margin-right: 140px;"><input type="checkbox" onclick="myFunction()">Show Password
                  </div>

                </div>

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
        <?php
          } else {
        ?>
          <form role="form" method="post" action="userlogin.php?continue=<?php echo $_GET['continue']; ?>">
            <fieldset>


              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" required>
              </div>

              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" id="pass" type="password" required>
                <div style="margin-right: 140px;"><input type="checkbox" onclick="myFunction()">Show Password
                </div>

              </div>

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
        <?php
          }
        ?>



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

    &copy Online Donation Platform | <a style="color: #fff" target="_blank"></a>
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