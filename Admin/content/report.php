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
              $sql = "select total as tot from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              echo '<h3>' . $num_rows . ' Pkr</h3>';
              ?>

              <p>Total Money received by donators</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="employeescreen1.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select available as tot from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              echo '<h3>' . $num_rows . ' Pkr</h3>';
              ?>

              <p>Available Money</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="../Customm/customerjee/Admin/customers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select donated as tot from balance where id=1";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              echo '<h3 style="color:white">' . $num_rows . ' Pkr</h3>';
              ?>

              <p style="color:white">Total Money donated to students</p>
            </div>
            <div class="icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="productsscreen1.php" class="small-box-footer" style="color:white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              include 'db_connection.php';
              $sql = "select count(*) as tot from emp where emp_leftdate='0000-00-00'";
              $query = mysqli_query($con, $sql);
              $values = mysqli_fetch_assoc($query);
              $num_rows = $values['tot'];
              echo '<h3 style="color:white">' . $num_rows . ' </h3>';
              ?>

              <p style="color:white;">Total Employees</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="OnlineService.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

</div>
<!-- ./wrapper -->