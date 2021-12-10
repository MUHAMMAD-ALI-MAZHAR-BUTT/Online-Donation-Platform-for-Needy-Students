<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Form Details</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from forms";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">No Forms yet
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
                        <th>Student Id</th>
                        <th>Employee Id</th>
                        <th>Date filled</th>
                        <th>Category</th>
                        <th>Informed?</th>
                        <th>Date of Rejection</th>
                        <th>Date of Acceptance</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
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
                    include 'db_connection.php';
                    $selectquery = "select * from forms limit $start,$limit ";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['date_filled']));
                        if ($res['date_of_reject'] == NULL) {
                            $date1 = 'NULL';
                        } else {
                            $date1 = date('F j, Y', strtotime($res['date_of_reject']));
                        }
                        if ($res['date_of_accept'] == NULL) {
                            $date2 = 'NULL';
                        } else {
                            $date2 = date('F j, Y', strtotime($res['date_of_accept']));
                        }
                        // $date1 = date('F j, Y, g:i a', strtotime($res['last_active']));
                    ?>

                        <tr>

                            <td><?php echo $res['form_id']; ?></td>
                            <td><?php echo $res['student_id']; ?></td>
                            <td><?php echo $res['emp_id']; ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $res['category']; ?></td>
                            <td>
                                <?php
                                if ($res['informed'] == 'false') {
                                ?>
                                    No
                                <?php
                                } else {
                                ?>
                                    Yes <?php
                                    }

                                        ?>

                            </td>
                            <td><?php echo $date1 ?></td>
                            <td><?php echo $date2 ?></td>
                            <td><?php echo $res['status']; ?></td>


                            <td>

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $res['form_id']; ?>" id="getUser" class="btn btn-success" style="background-color:#ad1deb; border:#ad1deb;"><i class="fa fa-list"></i> <span>View Detail</span></a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        <i class="glyphicon glyphicon-user"></i> Student Form detail
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

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
                                        data: 'form_id=' + uid,
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

            $rows = mysqli_num_rows(mysqli_query($conn, "select * from forms "));
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