<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">

                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Accepted Students Completed Payment history</b></h2>

                    <!-- -->
                </div>
            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from payment_history where date_comp IS NOT NULL order by Id desc";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">Empty so far... </h2>
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
                        <th>Form Id</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Amount Received</th>
                        <th>Category</th>
                        <th>Date fully received</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $conn = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($conn, "base");
                    $start = 0;
                    $limit = 10;

                    if (!empty($_GET)) {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $start = ($id - 1) * $limit;
                        }
                    } else {
                        $id = 1;
                        $start = ($id - 1) * $limit;
                    }
                    $selectquery = "select * from payment_history inner join forms on payment_history.form_id=forms.form_id inner join 
                    student on payment_history.student_id=student.id where date_comp IS NOT NULL order by payment_history.date_comp desc LIMIT $start, $limit";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date1 = date('F j, Y', strtotime($res['date_comp']));
                    ?>

                        <tr>


                            <td><?php echo $res['Id']; ?></td>
                            <td><?php echo $res['form_id']; ?></td>
                            <td><?php echo $res['student_id']; ?></td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['amount_received']; ?></td>
                            <td><?php echo $res['Category']; ?></td>
                            <td><?php echo $date1 ?></td>



                        </tr>



                    <?php
                    }
                    ?>

                    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">
                                        <i class="glyphicon glyphicon-user"></i> User Profile
                                    </h4>
                                </div>
                                <div class="modal-body">

                                    <div id="modal-loader" style="display: none; text-align: center;">
                                        <img src="ajax-loader.gif">
                                    </div>
                                    <!-- content will be load here -->
                                    <div id="dynamic-content"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {

                            $(document).on('click', '#getUser', function(e) {

                                e.preventDefault();

                                var uid = $(this).data('id'); // it will get id of clicked row

                                $('#dynamic-content').html(''); // leave it blank before ajax call
                                $('#modal-loader').show(); // load ajax loader

                                $.ajax({
                                        url: 'getuser.php',
                                        type: 'POST',
                                        data: 'id=' + uid,
                                        dataType: 'html'
                                    })
                                    .done(function(data) {
                                        console.log(data);
                                        $('#dynamic-content').html('');
                                        $('#dynamic-content').html(data); // load response 
                                        $('#modal-loader').hide(); // hide ajax loader	
                                    })
                                    .fail(function() {
                                        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                                        $('#modal-loader').hide();
                                    });

                            });

                        });
                    </script>
                </tbody>
            </table>
        <?php
            echo "<br><div class='container'>";

            $rows = mysqli_num_rows(mysqli_query($conn, "select * from payment_history inner join forms on payment_history.form_id=forms.form_id inner join 
                    student on payment_history.student_id=student.id where date_comp IS NOT NULL order by payment_history.date_comp "));
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