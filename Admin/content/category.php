<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="table-wrapper" style="background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Manage Categories</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
    </div>
    <div class="container" style="padding-top:1%">
        <br>
        <div class="row">

            <!-- /.col -->
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <h3 class="card-title"><b>Fee Category</b></h3>


                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';
                    // $selectquery = "select * from latest_news where category=$cat";
                    $sql = "select COUNT(*) as tot from payment_history where date_comp is NULL and category='fee'";
                    $query = mysqli_query($con, $sql);
                    $values = mysqli_fetch_assoc($query);
                    $num_rows = $values['tot'];
                    $sql1 = "select SUM(req_amount) as t from payment_history where date_comp is NULL and category='fee'";
                    $query1 = mysqli_query($con, $sql1);
                    $values1 = mysqli_fetch_assoc($query1);
                    $num = $values1['t'];
                    ?>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Present accepted forms in Fee</th>
                                <td><?php echo $num_rows ?></td>
                            </tr>
                            <tr>
                                <th>Total amount required in Fee </th>
                                <?php
                                if ($num == NULL) {

                                ?>
                                    <td>0</td>
                                <?php
                                } else {
                                ?>
                                    <td><?php echo $num ?></td>
                                <?php
                                }
                                ?>

                            </tr>
                        </table>

                    </div>



                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <h3 class="card-title"><b>Expenses Category</b></h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';
                    // $selectquery = "select * from latest_news where category=$cat";
                    $sql = "select COUNT(*) as tot from payment_history where date_comp is NULL and category='expense'";
                    $query = mysqli_query($con, $sql);
                    $values = mysqli_fetch_assoc($query);
                    $num_rows = $values['tot'];
                    $sql1 = "select SUM(req_amount) as t from payment_history where date_comp is NULL and category='expense'";
                    $query1 = mysqli_query($con, $sql1);
                    $values1 = mysqli_fetch_assoc($query1);
                    $num = $values1['t'];
                    ?>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Present accepted forms in Expenses</th>
                                <td><?php echo $num_rows ?></td>
                            </tr>
                            <tr>
                                <th>Total amount required in Expenses </th>
                                <?php
                                if ($num == NULL) {

                                ?>
                                    <td>0</td>
                                <?php
                                } else {
                                ?>
                                    <td><?php echo $num ?></td>
                                <?php
                                }
                                ?>

                            </tr>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <h3 class="card-title"><b> Health Category</b></h3>
                    </div>

                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';
                    // $selectquery = "select * from latest_news where category=$cat";
                    $sql = "select COUNT(*) as tot from payment_history where date_comp is NULL and category='health'";
                    $query = mysqli_query($con, $sql);
                    $values = mysqli_fetch_assoc($query);
                    $num_rows = $values['tot'];
                    $sql1 = "select SUM(req_amount) as t from payment_history where date_comp is NULL and category='health'";
                    $query1 = mysqli_query($con, $sql1);
                    $values1 = mysqli_fetch_assoc($query1);
                    $num = $values1['t'];
                    ?>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Present accepted forms in Health</th>
                                <td><?php echo $num_rows ?></td>
                            </tr>
                            <tr>
                                <th>Total amount required in Health </th>
                                <?php
                                if ($num == NULL) {

                                ?>
                                    <td>0</td>
                                <?php
                                } else {
                                ?>
                                    <td><?php echo $num ?></td>
                                <?php
                                }
                                ?>

                            </tr>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>

            </div>
        </div>
        <br>
        <div class="row">

            <!-- /.col -->
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>All Categories</b></h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';
                    // $selectquery = "select * from latest_news where category=$cat";
                    $sql = "select COUNT(*) as tot from payment_history where date_comp is NULL  ";
                    $query = mysqli_query($con, $sql);
                    $values = mysqli_fetch_assoc($query);
                    $num_rows = $values['tot'];
                    $sql1 = "select SUM(req_amount) as t from payment_history where date_comp is NULL  ";
                    $query1 = mysqli_query($con, $sql1);
                    $values1 = mysqli_fetch_assoc($query1);
                    $num = $values1['t'];
                    ?>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Present accepted forms</th>
                                <td><?php echo $num_rows ?></td>
                            </tr>
                            <tr>
                                <th>Total amount required</th>
                                <?php
                                if ($num == NULL) {

                                ?>
                                    <td>0</td>
                                <?php
                                } else {
                                ?>
                                    <td><?php echo $num ?></td>
                                <?php
                                }
                                ?>

                            </tr>
                        </table>

                    </div>


                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">

                        <h3 class="card-title"><b>Total Balance</b></h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';

                    // $selectquery = "select * from latest_news where category=$cat";
                    $selectquery = "select * from balance";
                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Total Amount Received</th>
                                    <td><?php echo $res['total_in_fee'] + $res['total_in_health'] + $res['total_in_expense']; ?> Pkr</td>
                                </tr>
                                <tr>
                                    <th>Available Amount</th>
                                    <td><?php echo $res['available_in_expense'] + $res['available_in_health'] + $res['available_in_fee']; ?> Pkr</td>
                                </tr>
                                <tr>
                                    <th>Amount Donated to Student</th>
                                    <td><?php echo $res['donated_in_fee'] + $res['donated_in_expense'] + $res['donated_in_health']; ?> Pkr</td>
                                </tr>
                            </table>

                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.card-body -->
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Main content -->

<!-- /.content -->
</div>

</div>
<!-- ./wrapper -->