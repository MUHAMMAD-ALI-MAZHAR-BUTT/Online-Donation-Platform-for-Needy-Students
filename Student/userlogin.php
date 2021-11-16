<?php
session_start();

?>
<?php

include("db_connection.php");



if (isset($_POST['user_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_user = "select * from student WHERE email='$email' AND password='$password'";


    $run = mysqli_query($con, $check_user);

    if (mysqli_num_rows($run)) {
        echo "<script>alert('Login was successfull')</script>";

        echo "<script>window.open('Customers/index.php','_self')</script>";

        $_SESSION['email'] = $email;
    } else {
        echo "<script>alert('Email or password is incorrect')</script>";
        echo "<script>window.open('index.php','_self')</script>";

        exit();
    }
}
?>