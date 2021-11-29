<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-10 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Notify Students</b></h2>

                    <!-- -->
                </div>
            </div>
        </div>
        <?php
        include('db_connection.php');
        $select = "select * from forms where emp_id=$emp_id";
        $res = mysqli_query($dbcon, $select);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">No Students
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

                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date of Form filling</th>
                        <th>Notify</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select forms.form_id,forms.informed,emp.emp_id,student.id,student.name,student.email,forms.status,forms.category,forms.date_filled from forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id where emp.emp_id=$emp_id order by date_filled desc";

                    $query = mysqli_query($dbcon, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['date_filled']));
                    ?>

                        <tr>


                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $res['category']; ?></td>
                            <td><?php echo $res['status']; ?></td>
                            <td><?php echo $date ?></td>
                            <td>
                                <?php
                                if ($res['informed'] == 'false' & $res['status'] == 'pending') {
                                ?>
                                    <a href="reply.php?id=<?php echo $res['id']; ?>"> <i class="fa fa-envelope" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Send interview details"></i></a>
                                <?php
                                } else if ($res['informed'] == 'true' & $res['status'] == 'pending') {
                                ?>
                                    <a href="reply.php?id=<?php echo $res['id']; ?>"> <i class="fa fa-envelope" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Update interview details??"></i></a>&nbsp;&nbsp;
                                    <a href="#"> <i class="fa fa-check" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Student Notified"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="#"> <i class="fa fa-check" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Student already interviewed"></i></a>
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

<div id="addpickerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="myform" action="insertstu.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--<div class="form-group">
            <label>ID</label>
            <input type="text" name="employee_id" class="form-control" required>
          </div>-->
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="student_name" class="form-control" placeholder="Name" required="">

                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Student Application Status</label>
                            <input type="text" name="student_application_status" class="form-control" placeholder="Pending/Approved/Rejected" required="">

                        </div>

                        <div class="form-group">
                            <label>Student Email</label>
                            <input type="email" name="student_email" class="form-control" placeholder="email@domain.com" required="">

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