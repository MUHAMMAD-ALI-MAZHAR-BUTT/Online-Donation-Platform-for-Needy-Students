
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
        if (empty($_GET)) {
            $_SESSION['email'] = $email;

            echo "<script>alert('Login was successful!')</script>";
            echo "<script>window.open('Customers/index.php','_self')</script>";
        } else {
            $_SESSION['email'] = $email;
            echo "<script>alert('Login was successful!')</script>";

            $g = $_GET['continue'];

            echo "<script>window.open(' $g','_self')</script>";
        }
    } else {
        $g = $_GET['continue'];
        echo "<script>alert('Email or password is incorrect')</script>";
        if (empty($g))
            echo "<script>window.open('index.php','_self')</script>";
        else
            echo "<script>window.open('index.php?continue=$g','_self')</script>";
        exit();
    }
}
?>