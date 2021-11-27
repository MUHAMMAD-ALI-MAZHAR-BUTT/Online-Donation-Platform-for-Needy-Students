<?php

require_once 'dbconfig.php';

if (isset($_REQUEST['id'])) {

    $id = intval($_REQUEST['id']);



?>

    <?php
    include('db_connection.php');
    $select = "select * from forms where student_id=$id";
    $res = mysqli_query($con, $select);
    if (mysqli_num_rows($res) == 0) {
    ?>
        <div class="container">
            <div class="row justify-content-centre">
                <div class="col-lg-6 col-md-6">
                    <h2 class="text-center p-1">Empty
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
                    <th>Form Id</th>
                    <th>Student Name</th>
                    <th>Associated Emp</th>
                    <th>Status</th>
                    <th>Date Filled</th>
                    <th>Category chosen</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include 'db_connection.php';
                $selectquery = "select * from forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id where student.id='$id'";

                $query = mysqli_query($con, $selectquery);

                $nums = mysqli_num_rows($query);

                while ($res = mysqli_fetch_array($query)) {

                    $date1 = date('F j, Y', strtotime($res['date_filled']));


                ?>

                    <tr>
                        <td><?php echo $res['form_id']; ?></td>
                        <td><?php echo $res['name']; ?></td>
                        <td><?php echo $res['emp_name']; ?></td>
                        <td><?php echo $res['status']; ?></td>
                        <td><?php echo $date1 ?></td>
                        <td><?php echo $res['category']; ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }

    ?>


<?php
}
