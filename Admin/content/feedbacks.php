<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-4">
                    <h2 style="font-family: sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Feedback Section</b></h2>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <!-- -->

                </div>
            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from feedback";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">No Feedbacks </h2>
                    </div>
                </div>

            </div>
        <?php
        } else {
        ?>
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Subject</th>
                        <th>Message</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from feedback";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>

                        <tr>

                            <td><?php echo $res['subject']; ?></td>
                            <td><?php echo $res['message']; ?></td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td>
                                <?php
                                if ($res['status'] == 'false') {
                                ?>
                                    <a href="reply.php?id=<?php echo $res['feedback_id']; ?>"> <i class="fa fa-envelope" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Reply"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="#"> <i class="fa fa-check" style="color: #ad1deb;" aria-hidden="true" data-toggle="tooltip" title="Replied already"></i></a>
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

<div id="reply" class="modal fade">
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