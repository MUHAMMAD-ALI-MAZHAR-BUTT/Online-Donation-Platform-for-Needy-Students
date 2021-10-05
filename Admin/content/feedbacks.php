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
        <table class="table table-striped table-hover">
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


                    </tr>



                <?php
                }
                ?>



            </tbody>
        </table>

    </div>

</div>

</div>
<!-- ./wrapper -->