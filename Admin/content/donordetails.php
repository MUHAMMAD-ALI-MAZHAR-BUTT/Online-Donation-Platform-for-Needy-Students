<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Donor Details</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from donators";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">No Donators
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
                        <th>Donor Name</th>
                        <th>Donor Email</th>

                        <th>Register Date</th>
                        <th>Last Active </th>
                        <th>Total amount donated</th>
                        <th>No of times donated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from donators ";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['create_datetime']));
                        $date1 = date('F j, Y, g:i a', strtotime($res['last_active']));
                    ?>

                        <tr>

                            <td><?php echo $res['id']; ?></td>
                            <td><?php echo $res['username']; ?></td>
                            <td><?php echo $res['email']; ?></td>

                            <td><?php echo $date ?></td>
                            <td><?php echo $date1 ?></td>
                            <td><?php echo $res['total_donated']; ?></td>
                            <td><?php echo $res['no_of_times']; ?></td>


                            <td>

                                <a href="#" data-toggle="modal" data-target="#view-donor" data-id="<?php echo $res['id']; ?>" id="donordetail">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list" style="color:#ad1deb" data-toggle="tooltip" title="Details"></i></a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    <div id="view-donor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        <i class="glyphicon glyphicon-user"></i> Donation record
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

                            $(document).on('click', '#donordetail', function(e) {

                                e.preventDefault();

                                var uid = $(this).data('id'); // it will get id of clicked row

                                $('#dynamic-content').html(''); // leave it blank before ajax call
                                $('#modal-loader').show(); // load ajax loader

                                $.ajax({
                                        url: 'donor.php',
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
        }

        ?>


    </div>


</div>



<?php include('./content/footer.php'); ?>