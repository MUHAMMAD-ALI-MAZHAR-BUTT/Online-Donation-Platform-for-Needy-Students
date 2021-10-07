<?php

include 'connection.php';
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'test');


if (isset($_POST['submit'])) {
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];


    $query = "SELECT * FROM emp where emp_phone=$emp_phone";
    $qu = mysqli_query($con, $query);
    if (mysqli_num_rows($qu) > 0) {
        echo "<script>alert('This Mobile Number already exists!')</script>";
        echo "<script>window.open('wastepickers.php','_self')</script>";
    } else {
        $query = "SELECT * FROM emp where emp_mail=$emp_mail";
        $qu = mysqli_query($con, $query);
        if (mysqli_num_rows($qu) > 0) {
            echo "<script>alert('This Email already exists!')</script>";
            echo "<script>window.open('wastepickers.php','_self')</script>";
        } else {

            $q = "insert into emp(Picker_Name,Picker_Phone,Picker_JoinDate,Picker_Salary) values ('$Picker_Name','$Picker_Phone','$Picker_JoinDate','$Picker_Salary')";

            $query = mysqli_query($con, $q);
            header('location: wastepickers.php');
        }
    }
};
?>
<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-4">
                    <h2 style="font-family: sans-serif; padding-top:2%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Employee Details</b></h2>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <!-- -->
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-sm-4" style="padding-top: 1%;">
                    <a href="#addpickerModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Add Employee</span></a>

                </div>
            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from emp";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">No Employees
                        </h2>
                    </div>
                </div>

            </div>
        <?php
        } else if (mysqli_num_rows($res) >= 10) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">Maximum already done
                        </h2>
                    </div>
                </div>

            </div>
        <?php
        } else {
        ?>
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Emp. Name</th>
                        <th>Emp. Email</th>
                        <th>Emp. Phone</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from emp";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>

                        <tr>

                            <td><?php echo $res['emp_id']; ?></td>
                            <td><?php echo $res['emp_name']; ?></td>
                            <td><?php echo $res['emp_email']; ?></td>
                            <td><?php echo $res['emp_phone']; ?></td>
                            <td><?php echo $res['emp_joindate']; ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }

        ?>


    </div>

</div>
<div id="addpickerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="myform" action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--<div class="form-group">
            <label>ID</label>
            <input type="text" name="employee_id" class="form-control" required>
          </div>-->
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Employee Phone</label>
                            <input type="number" name="phone" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Employee Email</label>
                            <input type="email" name="email" class="form-control" required="">
                        </div>



                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Add">


                    </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        var form = $('#myform');

        $('#submit').click(function() {

            $.ajax({

                url: form.attr("action"),
                type: 'post',
                data: $("#myform input").serialize(),
                success: function(data) {
                    console.log(data);
                }
            });

        });


    });
</script>

<!-- ./wrapper -->