<?php
session_start();

?>
<?php

include("../db_connection.php");



if (isset($_POST['admin_login'])) {

    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];


    $check_admin = "select * from admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";


    $run = mysqli_query($con, $check_admin);

    if (mysqli_num_rows($run)) {
        echo "<script>alert('Login was successful!')</script>";

        //echo "<script>window.open('Admin/index.php','_self')</script>";

        echo "<script>window.open('../report.php','_self')</script>";
        $_SESSION['admin_username'] = $admin_username;
    } else {
        echo "<script>alert('Username or Password is incorrect!')</script>";
        echo "<script>window.open('adminn.php','_self')</script>";

        exit();
    }
}
?>