<div class="content-wrapper">


    <div class="table-wrapper" style="background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2 style="font-family: sans-serif; font-weight:bold; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latest News Section</h2>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>


    </div>

    <div class="container" style="padding-top:1%">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Education'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>
                        <?php
                        }
                        ?>


                        <div class="card-tools">


                            <a href="news.php?id=<?php echo $res['id']; ?>" data-toggle="modal" type="button" name="edit" data-target="#setAccount"> <i class="fas fa-edit "></i> </a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';

                    // $selectquery = "select * from latest_news where category=$cat";
                    $selectquery = "select * from latest_news where category='Education'";
                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>
                        <div class="card-body">
                            <?php echo $res['message']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Health'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>



                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" title="Edit News"><i class="fas fa-edit"></i>
                                </button>

                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Other Expenses'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>
                        <?php
                        }
                        ?>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" title="Edit News"><i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</div>
<div id="setAccount" class="modal fade">

    <?php

    include 'connection.php';

    $ids = $_GET['id'];

    $showquery = "select * from realemployees where employee_id={$ids}";

    $showdata = mysqli_query($con, $showquery);

    $arrdata = mysqli_fetch_array($showdata);

    if (isset($_POST['edit'])) {
        $employeename = $_POST['employee_name'];
        $employeemobilenumber = $_POST['employee_mobile_number'];
        $employeejoindate = $_POST['employee_join_date'];
        $employeeemail = $_POST['employee_email'];
        $employeesalary = $_POST['employee_salary'];

        //$insertquery="insert into realemployees(employee_id,employee_name,employee_gender,employee_mobile_number,employee_join_date, employee_email,employee_shift_type,employee_salary) values('$employeeid', '$employeename','$employeegender', '$employeemobilenumber', '$employeejoindate','$employeeemail', '$employeeshifttype', '$employeesalary')";



        $query = "update realemployees set employee_name='$employeename', employee_mobile_number='$employeemobilenumber',employee_join_date='$employeejoindate', employee_email='$employeeemail', employee_salary='$employeesalary' where employee_id=$ids";

        $res = mysqli_query($con, $query);
        if ($res) {
    ?>
            <script>
                alert("Employee updated successfully");
                window.location.href = "employeescreen1.php";
            </script>
        <?php
        } else {

        ?>
            <script>
                alert("data NOT entered properly");
            </script>
    <?php
        }
    }



    ?>





    <div class="modal-dialog">

        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--<div class="form-group">
            <label>ID</label>
            <input type="text" name="employee_id" value="<? //php echo $arrdata['employee_id']; 
                                                            ?>" class="form-control" required>
          </div>-->
                    <div class="form-group" action="news.php">
                        <label>Name</label>
                        <input type="text" name="employee_name" value="<?php echo $arrdata['employee_name']; ?>" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="employee_mobile_number" value="<?php echo $arrdata['employee_mobile_number']; ?>" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Join Date</label>
                            <input type="text" name="employee_join_date" value="<?php echo $arrdata['employee_join_date']; ?>" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="employee_email" value="<?php echo $arrdata['employee_email']; ?>" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Salary (in Rupees)</label>
                            <input type="number" name="employee_salary" value="<?php echo $arrdata['employee_salary']; ?>" class="form-control" required="">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input formaction="employeescreen1.php" type="button" class="btn btn-default" data-dismiss="modal" value="Back">

                        <input type="submit" name="edit" class="btn btn-success" value="Save">


                    </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#priceinput').keypress(function(event) {
            return isNumber(event, this)
        });
    });

    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<scrip src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>


    <!-- ./wrapper -->