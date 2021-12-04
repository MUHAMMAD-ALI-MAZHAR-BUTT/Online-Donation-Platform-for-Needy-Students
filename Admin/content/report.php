<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="table-title">
    <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
      <div class="col-sm-10 " style="text-align: center;">
        <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Reports</b></h2>

        <!-- -->
      </div>
    </div>
  </div>
  <!-- /.content-header -->
  <br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <?php
              include 'db_connection.php';
              $sql = "select * from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['total_in_fee'] + $values['total_in_health'] + $values['total_in_expense'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Pkr</h3>';
              ?>

              <p>Total Money received from donors</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="donationhistory.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select * from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['available_in_fee'] + $values['available_in_health'] + $values['available_in_expense'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Pkr</h3>';
              ?>

              <p>Available Money</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="donationhistory.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select * from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['donated_in_fee'] + $values['donated_in_health'] + $values['donated_in_expense'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Pkr</h3>';
              ?>

              <p style="color:white">Total Money donated to students</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="paymenthistory.php" class="small-box-footer" style="color:white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from emp where emp_leftdate IS NULL";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Employee(s)</h3>';     ?>

              <p style="color:white;">Active Employees</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="empdetails.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div><!-- /.container-fluid -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <?php
              include 'db_connection.php';
              $sql = "select username as total from donators where total_donated=(SELECT MAX(total_donated) FROM donators)";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['total'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' </h3>';
              ?>

              <p>Donor with most donations</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="donordetails.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "SELECT count(*) as tot from payment_history where date_comp is not NULL";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Student(s)</h3>';
              ?>

              <p>Total Students helped</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="paymenthistory.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from forms";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' form(s)</h3>';
              ?>

              <p style="color:white">Total Forms received so far</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="forms.php" class="small-box-footer" style="color:white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from forms where status='pending'";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' form(s)</h3>';
              ?>

              <p style="color:white;">Pending Forms</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="forms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div><!-- /.container-fluid -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from payment_history where date_comp IS NULL";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' </h3>';
              ?>

              <p>No. of pending payments of students</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="accepted.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from donators";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Donor(s)</h3>';
              ?>

              <p>Total Registered Donors</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="donordetails.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select category as tot from forms where category=(SELECT MAX(category) FROM forms)";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' </h3>';

              ?>

              <p style="color:white">Most Chosen Category</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="forms.php" class="small-box-footer" style="color:white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from notifications";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              if ($num_rows == '')
                echo '<h3 style="color:white">Null </h3>';
              else
                echo '<h3 style="color:white">' . $num_rows . ' Notification(s)</h3>';
              ?>

              <p style="color:white;">Total Notifications received</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="notification.php?id=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

</div>
<!-- ./wrapper -->