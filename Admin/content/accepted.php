<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Accepted Students Lists</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from payment_history order by Id desc";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">Empty so far
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
                        <th>Form Id</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Amount Left</th>
                        <th>Amount Received</th>
                        <th>Category</th>
                        <th>Date fully received</th>
                        <th>Action</th>
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
                    $selectquery = "select * from payment_history inner join forms on payment_history.form_id=forms.form_id inner join 
                    student on payment_history.student_id=student.id order by payment_history.Id desc LIMIT $start, $limit";
                    $select = "select * from payment_history ";
                    $query1 = mysqli_query($con, $select);
                    while ($res1 = mysqli_fetch_array($query1)) {
                        if ($res1['req_amount'] == 0 & $res1['date_comp'] == NULL) {
                            $q = "UPDATE payment_history set date_comp=CURRENT_TIMESTAMP where Id='$res1[Id]'";
                            mysqli_query($con, $q);
                            $q1 = "UPDATE forms set date_of_complete=CURRENT_TIMESTAMP,forms.status='completed' where form_id='$res1[form_id]'";
                            mysqli_query($con, $q1);
                            $q2 = "INSERT INTO `stu_notification` (`stu_id`,`emp_id`, `emp_name`, `dt`, `status`, `message`,`venue`,`type`) 
        VALUES ('$res1[student_id]', '1', 'NULL',CURRENT_TIMESTAMP, 'unread','You have received your full grant','NULL','a')";
                            mysqli_query($con, $q2);
                        }
                    }
                    $query = mysqli_query($con, $selectquery);



                    while ($res = mysqli_fetch_array($query)) {
                        if ($res['date_comp'] == NULL) {
                            $date1 = 'NULL';
                        } else {
                            $date1 = date('F j, Y', strtotime($res['date_comp']));
                        }
                    ?>

                        <tr>
                            <td><?php echo $res['Id']; ?></td>
                            <td><?php echo $res['form_id']; ?></td>
                            <td><?php echo $res['student_id']; ?></td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['req_amount']; ?></td>
                            <td><?php echo $res['amount_received']; ?></td>
                            <td><?php echo $res['Category']; ?></td>
                            <td><?php echo $date1 ?></td>

                            <td>
                                <?php
                                if ($res['req_amount'] == 0) {
                                ?>
                                    <a href="#" class="btn btn-success" style="background-color:#ad1deb; border:#ad1deb;"><i class="fa fa-check"></i> <span>Completed</span></a>

                                <?php
                                } else {
                                ?>
                                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $res['Id']; ?>" id="getUser" class="btn btn-success" style="background-color:#ad1deb; border:#ad1deb;"><i class="fas fa-money-bill"></i> <span>Send Money</span></a>

                                <?php
                                }
                                ?>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog ">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        <i class="glyphicon glyphicon-user"></i>Send Money
                                    </h4>
                                    <button type="button" onclick=rel(); class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                </div>
                                <div class="modal-body">

                                    <div id="modal-loader" style="display: none; text-align: center;">
                                        <img src="ajax-loader.gif">
                                    </div>
                                    <!-- content will be load here -->
                                    <div id="dynamic-content"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" onclick=rel(); data-dismiss="modal">Close</button>
                                </div>
                                <script>
                                    function rel() {
                                        location.reload();
                                    }
                                </script>
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
                                        data: 'idd=' + uid,
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
                    student on payment_history.student_id=student.id order by payment_history.Id desc "));
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



<?php include('./content/footer.php'); ?>