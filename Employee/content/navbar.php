  <div class="wrapper">

      <!-- Preloader -->
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
          <div class="spinner-border" role="status" style="color: purple; width: 6rem; height: 6rem;">
              <span class=" visually-hidden"></span>
          </div>
      </div> -->


      <!-- Navbar -->

      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-top:0%">

          <!-- Left navbar links -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" style="color:black" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>

          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">

              <li class="nav-item" style="margin-right:10px">
                  <?php
                    include("db_connection.php");
                    $selectquery = "select * from forms where emp_id='$emp_id' and status='pending'";
                    $res = mysqli_query($dbcon, $selectquery);
                    if (mysqli_num_rows($res) == 0) {
                    ?>
                      <a href="#" data-toggle="modal" data-target="#setAccountt" style="color:white;" class="btn btn-warning btn-sm">Resign
                      </a>
                  <?php

                    } else {
                    ?>
                      <a href="#" data-toggle="modal" data-target="#se" style="color:white;" class="btn btn-warning btn-sm">Resign
                      </a>
                  <?php
                    }
                    ?>


              </li>
              <li class="nav-item">

                  <!-- Brand Logo -->
                  <a href="logout.php" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to logout?');">Logout
                  </a>

              </li>
          </ul>
      </nav>

      <div class="modal fade" id="setAccountt" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-md">
              <div style="color:white;background-color:#ad1deb" class="modal-content">
                  <div class="modal-header">
                      <h2 style="color:white" class="modal-title" id="myModalLabel">Message reason</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
                  <div class="modal-body">
                      <form enctype="multipart/form-data" method="post" action="settings.php">
                          <fieldset>


                              <p>Name:</p>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Firstname" name="emp_name" type="text" value="<?php echo $emp_name; ?>" readonly>
                              </div>
                              <p>Email:</p>
                              <div class="form-group">

                                  <input class="form-control" placeholder="Lastname" name="emp_email" type="text" value="<?php echo $emp_email; ?>" readonly>
                              </div>

                              <p>Message:</p>
                              <div class="form-group">

                                  <textarea class="form-control" rows="4" cols="50" placeholder="Address" name="message" type="text" value="0<?php echo $emp_phone; ?>" required>
                                      </textarea>
                              </div>
                              <p>ID:</p>
                              <div class="form-group">

                                  <input class="form-control hide" name="emp_id" type="text" value="<?php echo $emp_id; ?>" readonly>
                              </div>

                          </fieldset>


                  </div>
                  <div class="modal-footer">

                      <button class="btn btn-block btn-success btn-md" name="usersend">Send</button>

                      <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="se" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <div class="modal-header">

                      <h2 class="modal-title" id="myModalLabel">Cannot resign as some students form status are still pending</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
              </div>
          </div>
      </div>


      <?php

        include("db_connection.php");



        if (isset($_POST['usersend'])) {

            $emp_email = $_POST['emp_email'];
            $emp_name = $_POST['emp_name'];
            $emp_id = $_POST['emp_id'];
            $message = $_POST['message'];


            echo "<script>alert('fff')</scrip>";
            // $query = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$emp_name'
            //     , '$emp_email', 'employee','$message', 'unread', CURRENT_TIMESTAMP,'resign')";

            $query = 'select * from emp';

            if (mysqli_query($dbcon, $query)) {
                echo "<script>alert('fff')</script>";
                // $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                // $str = str_shuffle($str);
                // $str = substr($str, 0, 10);
                // $query1 = "UPDATE emp set emp_email='a@gmail.com',pass='$str' where emp_id='$emp_id'";
                // if (mysqli_query($dbcon, $query1)) {
                //     echo "<script>alert('Message Sent.Now you cant access the account')</script>";

                //     echo "<script>window.open('../da.php','_self')</script>";
                // }

                // $_SESSION['admin_username'] = $admin_username;
            } else {
                echo "<script>alert('Something went wrong')</script>";
                echo "<script>window.open('dashboard.php','_self')</script>";

                exit();
            }
        }
        ?>