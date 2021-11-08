<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-4">
                    <h2 style="font-family: sans-serif; padding-top:2%; padding-left:2% "><b> Accepted Student Details</b></h2>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <!-- -->
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from accepted";
        $res = mysqli_query($dbcon, $selectquery);
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

                        <th>Id</th>
                        <th>Student Name</th>

                        <th>Student Email</th>



                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from accepted";

                    $query = mysqli_query($dbcon, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>

                        <tr>

                            <td><?php echo $res['id']; ?></td>
                            <td><?php echo $res['username']; ?></td>

                            <td><?php echo $res['email']; ?></td>


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