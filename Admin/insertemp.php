<?php

include 'db_connection.php';
$connect = new PDO("mysql:host=localhost; dbname=base", "root", "");



if (isset($_POST['submit'])) {
    $emp_name = $_POST['emp_name'];
    $emp_phone = $_POST['emp_phone'];
    $emp_email = $_POST['emp_email'];
    $pattern = "03[0-9]{2}-(?!1234567)(?!1111111)(?!7654321)[0-9]{7}";

    if (!preg_match("/^[a-zA-Z-' ]*$/", $emp_name)) {
        echo "<script>alert(Invalid Name format)</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    }



    if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert(Invalid Email format)</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    }


    if (!preg_match($pattern, $emp_phone)) {
        echo "<script>alert(Invalid Phone number format)</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    }

    $query = "SELECT * FROM emp where emp_phone=$emp_phone";
    $qu = mysqli_query($con, $query);

    if (mysqli_num_rows($qu) != 0) {
        echo "<script>alert('This Mobile Number already exists!')</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    } else {
        $query = "SELECT * FROM emp where emp_email=$emp_email";
        $qu = mysqli_query($con, $query);

        if (mysqli_num_rows($qu) != 0) {
            echo "<script>alert('This Email already exists!')</script>";
            echo "<script>window.open('empdetails.php','_self')</script>";
        } else {

            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $str = str_shuffle($str);
            $str = substr($str, 0, 10);
            $today = date("Y/m/d");
            $q = "INSERT into emp(emp_name,emp_email,emp_phone,username,pass,emp_joindate) values 
            ('$emp_name','$emp_email','$emp_phone','$emp_name','$str','$today')";

            if ($query = mysqli_query($con, $q)) {
                echo "<script>alert('$emp_name successfully added')</script>";
            } else {
                echo "<script>alert('Error occured')</script>";
            }

            echo "<script>window.open('empdetails.php','_self')</script>";
        }
    }
};
