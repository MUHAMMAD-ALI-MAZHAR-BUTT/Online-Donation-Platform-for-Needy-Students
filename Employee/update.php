<?php
session_start();
if (!$_SESSION['emp_email']) {

    echo "<script>window.open('./login/index1.php','_self')</script>";
}
?>


<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM emp WHERE emp_email =:emp_email');
$stmt_edit->execute(array(':emp_email' => $emp_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notify </title>

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    /* custom css styling */
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    html,
    body {
        background: #ad1deb !important;
    }

    ::selection {
        color: #fff;
        background: #ad1deb !important;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Poppins', sans-serif;
    }

    .container .mail-form {
        background: #fff;
        padding: 25px 35px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .container form .form-control {
        height: 43px;
        font-size: 15px;
    }

    .container .mail-form form .form-group .button {
        font-size: 17px !important;
    }

    .container form .textarea {
        height: 100px;
        resize: none;
    }

    .container .mail-form h2 {
        font-size: 30px;
        font-weight: 600;
    }

    .container .mail-form p {
        font-size: 14px;
    }
</style>

<body>
    <?php
    include 'db_connection.php';

    $ids = $_GET['id'];

    $showquery = "select * from forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id where forms.form_id=$ids";

    $showdata = mysqli_query($dbcon, $showquery);

    $arrdata = mysqli_fetch_array($showdata);


    if (isset($_POST['edit'])) {
        $status = $_POST['status'];
        if ($status == 'Pending') {
            $query = "update forms set status='pending' where form_id=$ids";
            mysqli_query($dbcon, $query);
            echo "<script>window.open('studetails.php','_self')</script>";
        } else if ($status == 'Reject') {
            $query = "update forms set status='rejected' where form_id=$ids";
            mysqli_query($dbcon, $query);
            $query1 = "INSERT INTO `stu_notification` (`stu_id`,`emp_id`, `emp_name`, `dt`, `status`, `message`,`venue`,`type`) 
        VALUES ('$arrdata[id]', '$arrdata[emp_id]', '$arrdata[emp_name]',CURRENT_TIMESTAMP, 'unread','You have been rejected for grant','NULL','s')";
            mysqli_query($dbcon, $query1);
            $query4 = "UPDATE student set rejected_no=rejected_no+1 where id='$arrdata[id]'";
            mysqli_query($dbcon, $query4);
            echo "<script>alert('Student Rejected for grant')</script>";
            echo "<script>window.open('studetails.php','_self')</script>";
        } else if ($status == 'Accept') {
            $query = "update forms set status='accepted' where form_id=$ids";
            mysqli_query($dbcon, $query);
            $query1 = "INSERT INTO `stu_notification` (`stu_id`,`emp_id`, `emp_name`, `dt`, `status`, `message`,`venue`,`type`) 
        VALUES ('$arrdata[id]', '$arrdata[emp_id]', '$arrdata[emp_name]',CURRENT_TIMESTAMP, 'unread','You have been Accepted for grant','NULL','s')";
            mysqli_query($dbcon, $query1);
            $query2 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) 
        VALUES ('$arrdata[name]', '$arrdata[email]', 'student','Student $arrdata[name] has been accepted for grant by employee $arrdata[emp_name]'
        , 'unread',CURRENT_TIMESTAMP,'accepted')";
            mysqli_query($dbcon, $query2);
            $query3 = "INSERT INTO `payment_history` (`form_id`,`student_id`, `amount_received`, `req_amount`, `category`,`easypaisa_acc`) 
        VALUES ('$ids','$arrdata[id]',0,'$arrdata[amount_required]','$arrdata[category]','$arrdata[easypaisa_acc]')";
            mysqli_query($dbcon, $query3);
            $query4 = "UPDATE student set accepted_no=accepted_no+1 where id='$arrdata[id]'";
            mysqli_query($dbcon, $query4);
            echo "<script>alert('Student Accepted for grant')</script>";
            echo "<script>window.open('studetails.php','_self')</script>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Accept or Reject student <?php echo $arrdata['name']; ?>?</h2>

                <!-- starting php code -->

                <!-- end of php code -->
                <form method="POST">

                    <div class="form-group">

                        <label>Status</label>
                        <select name="status" class="form-control" required="">
                            <option hidden>Pending</option>
                            <option>Accept</option>
                            <option>Reject</option>

                        </select>

                    </div>



                    <div class="modal-footer">
                        <input onclick=m(); type="button" class="btn btn-default" value="Back">
                        <script>
                            function m() {
                                window.location = "studetails.php";
                            }
                        </script>
                        <input type="submit" name="edit" class="btn btn-success" value="Edit">


                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>