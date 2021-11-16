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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from forms ";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['date_filled']));
                        // $date1 = date('F j, Y, g:i a', strtotime($res['last_active']));
                    ?>

                        <tr>

                            <td><?php echo $res['form_id']; ?></td>
                            <td><?php echo $res['student_id']; ?></td>
                            <td><?php echo $res['emp_id']; ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $res['category']; ?></td>
                            <td><?php echo $res['status']; ?></td>


                            <td>

                                <a href="#" onclick="my();" class="btn btn-success" style="background-color:#ad1deb; border:#ad1deb;" data-toggle="modal"><i class="fa fa-list"></i> <span>View Detail</span></a>

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