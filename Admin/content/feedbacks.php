<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Feedback Section</b></h2>

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
                        <th>Date-Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $conn = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($conn, "base");
                    $start = 0;
                    $limit = 9;

                    if (!empty($_GET)) {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $start = ($id - 1) * $limit;
                        }
                    } else {
                        $id = 1;
                        $start = ($id - 1) * $limit;
                    }
                    $selectquery = "select * from feedback order by feedback_id DESC LIMIT $start, $limit";

                    $query = mysqli_query($con, $selectquery);


                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date1 = date('F j, Y, g:i a', strtotime($res['dt']));
                    ?>

                        <tr>

                            <td><?php echo $res['subject']; ?></td>
                            <td><?php echo $res['message']; ?></td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $date1 ?></td>

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
            echo "<br><div class='container'>";

            $rows = mysqli_num_rows(mysqli_query($conn, "select * from feedback"));
            $total = ceil($rows / $limit);
            // echo "<br /><ul class='pager'>";
            // if ($id > 1) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            // }
            // if ($id != $total) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            // }
            // echo "</ul>";


            echo "<ul class='pagination justify-content-center'>";
            if ($id > 1) {
                echo "<li class='page-item'><a style='color:#ad1deb ' class='page-link' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            }
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='page-item active'><a style='background-color:#ad1deb; border-color:#ad1deb' class='page-link' >" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a style='color:#ad1deb; ' class='page-link' href='?id=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($id != $total) {
                echo "<li class='page-item'><a style='color:#ad1deb;' class='page-link' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }

        ?>


    </div>

</div>
<?php
include('./content/footer.php');
?>
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