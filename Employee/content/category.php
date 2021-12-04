<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="table-title">
        <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
            <div class="col-sm-10 " style="text-align: center;">
                <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Total Donation In Categories</b></h2>

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
                            $sql = "select sum(amount) as tot from donation_record where category='fee'";
                            $query = mysqli_query($dbcon, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            if ($num_rows == '')
                                echo '<h3>NULL</h3>';
                            else
                                echo '<h3>' . $num_rows . ' Pkr</h3>';
                            ?>

                            <p>Fee Category</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            include 'db_connection.php';
                            $sql = "select sum(amount) as tot from donation_record where category='expense'";
                            $query = mysqli_query($dbcon, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            if ($num_rows == '')
                                echo '<h3>NULL</h3>';
                            else
                                echo '<h3>' . $num_rows . ' Pkr</h3>';
                            ?>

                            <p>Expenses Category</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            include 'db_connection.php';
                            $sql = "select sum(amount) as tot from donation_record where category='health'";
                            $query = mysqli_query($dbcon, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            if ($num_rows == '')
                                echo '<h3 style="color:white">NULL</h3>';
                            else
                                echo '<h3 style="color:white">' . $num_rows . ' Pkr</h3>';
                            ?>

                            <p style="color:white">Health Category</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>




            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

</div>
<!-- ./wrapper -->