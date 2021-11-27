    <aside class="main-sidebar sidebar-dark-primary elevation-4 " style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #8210b3 74%);">
      <!-- Brand Logo -->
      <a href="report.php" class="brand-link">
        <img src="./dist/img/SOP.jpeg" alt="Renew Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SOP</span>
      </a>
      <style>
        .nav-item>a>p {
          color: white;
        }
      </style>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex " style="  background-color: #8210b3;
  background-image: linear-gradient(315deg, #8210b3 0%, #6e72fc 200%);">
          <div class="image">
            <img src="./dist/img/blank.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><b>Employee Dashboard</b></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw" style="color: white;"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul id="tap" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->


            <li class="nav-item">
              <a href="donordetails.php" class="nav-link">
                <i class="fas fa-donate"></i>
                <p>
                  Details of donor
                  <!-- <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="category.php" class="nav-link">
                <i class="fas fa-donate"></i>
                <p>
                  Total donations for all categories
                  <!-- <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="studetails.php" class="nav-link">
                <i class="fas fa-users"></i>
                <p>List of applied students
                  <!-- <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="notify.php" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                <p>
                  Notify Students
                  <!-- <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a data-toggle="modal" class='nav-link' data-target="#setAccount">
                <i class="fas fa-cogs"></i>
                <p>
                  Account Settings
                  <!-- <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar -->
        <div class="whitespace" style="height:100px;"></div>
    </aside>


    <!-- Mediul Modal -->
    <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
      <div class="modal-dialog modal-md">
        <div style="color:white;background-color:#ad1deb" class="modal-content">
          <div class="modal-header">
            <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="post" action="settings.php">
              <fieldset>
                <style>
                  .req:after {
                    content: " *";
                    color: red;

                  }
                </style>
                <p class="req">Name:</p>
                <div class="form-group">

                  <input class="form-control" placeholder="Firstname" name="emp_name" type="text" value="<?php echo $emp_name; ?>" required>


                </div>


                <p class="req">Email:</p>
                <div class="form-group">

                  <input class="form-control" placeholder="Lastname" name="emp_email" type="text" value="<?php echo $emp_email; ?>" required>


                </div>

                <p class="req">Phone:</p>
                <div class="form-group">

                  <input class="form-control" placeholder="Address" name="emp_phone" type="text" value="0<?php echo $emp_phone; ?>" required>


                </div>

                <p class="req">Password:</p>
                <div class="form-group">

                  <input class="form-control" placeholder="Password" name="pass" id='pass' type="password" value="<?php echo $pass; ?>" required>
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
                <p class="req">Confirm Password:</p>
                <div class="form-group">

                  <input class="form-control" placeholder="Password" name="cpass" id="passs" type="password" value="<?php echo $pass; ?>">
                  <input type="checkbox" onclick="myFunc()">Show Password
                  <script>
                    function myFunc() {
                      var x = document.getElementById("passs");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script>
                </div>
                <div class="form-group">
                  <input class="form-control hide" name="emp_id" type="hidden" value="<?php echo $emp_id; ?>" readonly>
                </div>


              </fieldset>


          </div>
          <div class="modal-footer">

            <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>

            <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>


            </form>
          </div>
        </div>
      </div>
    </div>