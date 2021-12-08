<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Employee Details</b></h2>

                    <!-- -->
                </div>

                <div class="col-sm-4" style="padding-top: 1%;">
                    <?php
                    include('db_connection.php');
                    $query = "SELECT * FROM emp where emp_leftdate<>'NULL'";
                    $qu = mysqli_query(
                        $con,
                        $query
                    );
                    if (mysqli_num_rows($qu) < 10) {
                    ?>
                        <!-- <a href="addemp.php" class="btn btn-success"><i class="fa fa-plus"></i> <span>Add Employee</span></a> -->
                        <a data-toggle="modal" data-target="#addpickerModal" class="btn btn-success"><i class="fa fa-plus"></i> <span>Add Employee</span></a>
                    <?php
                    } else {
                    ?>
                        <a href="#" onclick="my();" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Add Employee</span></a>
                        <script>
                            function my() {
                                alert("Maximum Employees already added");
                            }
                        </script>
                    <?php
                    }
                    ?>

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
        } else {
        ?>
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Emp. Name</th>
                        <th>Emp. Email</th>
                        <th>Emp. Phone</th>
                        <th>Entry Date</th>
                        <th>Total Students</th>
                        <th>Active Students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from emp ";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['emp_joindate']));
                        $date1 = date('F j, Y', strtotime($res['emp_leftdate']));
                        $emp_id = $res['emp_id'];
                    ?>

                        <tr>

                            <td><?php echo $res['emp_id']; ?></td>
                            <td><?php echo $res['emp_name']; ?></td>
                            <td><?php echo $res['emp_email']; ?></td>
                            <td>0<?php echo $res['emp_phone']; ?></td>
                            <td><?php echo $date ?></td>

                            <td><?php
                                $q = "Select * from forms where emp_id='$emp_id'";
                                $s = mysqli_query($con, $q);
                                $nums = mysqli_num_rows($s);
                                echo $nums;
                                ?>
                            </td>
                            <td><?php
                                $q = "Select * from forms where emp_id='$emp_id' and status='pending'";
                                $s = mysqli_query($con, $q);
                                $nums = mysqli_num_rows($s);
                                echo $nums;
                                ?></td>

                            <!-- <td>
                                <a href="updateemp.php?id=<?php echo $res['emp_id']; ?>" title="Edit Employee"> <i class="fas fa-edit" style="color:#ad1deb"></i></a>
                            </td> -->
                            <td>
                                <?php
                                if ($res['emp_leftdate'] == NULL) {
                                ?>
                                    <a href="delemp.php?id=<?php echo $res['emp_id']; ?>" onclick="return confirm('Are you sure you want to remove this employee?');"> <i class="fa fa-trash" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Delete Employee"></i></a>
                                    <?php
                                } else {

                                    ?>Left on <?php echo $date1 ?>
                                <?php
                                }
                                ?>

                            </td>
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



<?php include('./content/footer.php'); ?>

<div id="addpickerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addform">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" onclick="location.reload();" class=" close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <style>
                            .required:after {
                                content: " *";
                                color: red;

                            }
                        </style>
                        <label class="required">Employee Name</label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control form_data" placeholder="Name">
                        <span id="name_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label class="required">Employee Phone</label>
                        <input type="text" name="emp_phone" id="emp_phone" class="form-control form_data" placeholder="03XXXXXXXXX">
                        <span id="phone_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label class="required">Employee Email</label>
                        <input type="email" name="emp_email" id="emp_email" class="form-control form_data" placeholder="email@domain.com">
                        <span id="email_error" class="text-danger"></span>
                        <span id="suc" class="text-success"></span>

                    </div>
                    <div class="modal-footer">
                        <input type="button" onclick="location.reload(); return false;" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <input onclick="save_emp(); return false;" type="submit" name="submit" id="submit" class="btn btn-success" value="Add">
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
    function save_emp() {
        var form_element = document.getElementsByClassName('form_data');

        var form_data = new FormData();

        for (var count = 0; count < form_element.length; count++) {
            form_data.append(form_element[count].name, form_element[count].value);
        }

        document.getElementById('submit').disabled = true;

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'insertemp.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                document.getElementById('submit').disabled = false;

                var response = JSON.parse(ajax_request.responseText);

                if (response.success != '') {
                    document.getElementById('addform').reset();

                    document.getElementById('suc').innerHTML = response.success;

                    setTimeout(function() {

                        document.getElementById('suc').innerHTML = '';
                        $('#addpickerModal').modal('hide');

                        location.reload();

                    }, 5000);

                    document.getElementById('name_error').innerHTML = '';

                    document.getElementById('email_error').innerHTML = '';
                    document.getElementById('phone_error').innerHTML = '';



                } else {
                    document.getElementById('name_error').innerHTML = response.name_error;
                    document.getElementById('email_error').innerHTML = response.email_error;
                    document.getElementById('phone_error').innerHTML = response.phone_error;

                }



            }
        }
    }
</script>