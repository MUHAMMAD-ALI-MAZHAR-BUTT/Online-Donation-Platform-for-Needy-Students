<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-10 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Applied Student Details</b></h2>

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
                        <th>Date of Form filling</th>
                        <th>Category</th>
                        <th>Date of Rejection</th>
                        <th>Date of Acceptance</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id where emp.emp_id=$emp_id";

                    $query = mysqli_query($dbcon, $selectquery);

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



                    ?>

                        <tr>

                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $res['category']; ?></td>
                            <td><?php echo $date1 ?></td>
                            <td><?php echo $date2 ?></td>
                            <td><?php echo $res['status']; ?></td>

                            <td>

                                <a href="#" data-toggle="modal" data-target="#view" data-id="<?php echo $res['form_id']; ?>" id="get" type="btn" class="material-icons" title="View Form Detail"><i class="fa fa-list" style="color:#ad1deb;"></i></a>&nbsp;
                                &nbsp;&nbsp;
                                <?php
                                if ($res['status'] == 'pending' & $res['informed'] == 'true') {
                                ?>
                                    <a href="update.php?id=<?php echo $res['form_id']; ?>" class="material-icons" title="Edit Status"> <i class="fas fa-edit" style="color:#ad1deb;"></i></a>
                                <?php
                                } else if ($res['status'] == 'pending' & $res['informed'] == 'false') {
                                ?>
                                    <a href="#" data-toggle="modal" data-target="#v" type="btn" class="material-icons" title="Edit Status"><i class="fas fa-edit" style="color:#ad1deb;"></i></a>&nbsp;

                                <?php
                                }

                                ?>


                            </td>

                        </tr>

                    <?php
                    }
                    ?>
                    <div id="v" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        <i class="glyphicon glyphicon-user"></i> Cannot edit status as student not yet interviewed or informed about interview
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                </div>


                            </div>
                        </div>
                    </div><!-- /.modal -->
                    <div id="view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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

                            $(document).on('click', '#get', function(e) {

                                e.preventDefault();

                                var uid = $(this).data('id'); // it will get id of clicked row

                                $('#dynamic-content').html(''); // leave it blank before ajax call
                                $('#modal-loader').show(); // load ajax loader

                                $.ajax({
                                        url: 'get.php',
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
        }

        ?>


    </div>

</div>

<!-- ./wrapper -->