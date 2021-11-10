<?php
session_start();

if (!$_SESSION['email']) {

    header("Location: ../index.php");
}

?>
<?php
include("db_connection.php");
if (isset($_POST['u'])) {

    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];
    $pass = $_POST['pass'];
    $emp_id = $_POST['emp_id'];


    $update_profile = "update emp set pass='$pass', emp_name='$emp_name', emp_email='$emp_email', emp_phone='$emp_phone' where emp_id='$emp_id'";
    if (mysqli_query($dbcon, $update_profile)) {
        echo "<script>alert('Account successfully updated!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    } else {
        echo "<script>alert('Error Found!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
}

?>
   <?php

    include("db_connection.php");



    if (isset($_POST['usersend'])) {

        $emp_email = $_POST['emp_email'];
        $emp_name = $_POST['emp_name'];
        $emp_id = $_POST['emp_id'];
        $message = $_POST['message'];



        $query = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$emp_name'
            , '$emp_email', 'employee','$message', 'unread', CURRENT_TIMESTAMP,'resign')";



        if (mysqli_query($dbcon, $query)) {

            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $str = str_shuffle($str);
            $str = substr($str, 0, 10);
            $query1 = "UPDATE emp set emp_email='a@gmail.com',pass='$str' where emp_id='$emp_id'";
            if (mysqli_query($dbcon, $query1)) {
                echo "<script>alert('Message Sent.Now you cant access the account')</script>";

                echo "<script>window.open('../da.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Something went wrong')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";

            exit();
        }
    }
    ?>
<?php

include 'db_connection.php';
$connect = new PDO("mysql:host=localhost; dbname=base", "root", "");

extract($_POST);

define("BR", "<BR>");


function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//initialize variables for value as well as errors
$username = $email = $phone = "";
$name_err = $email_err = $phone_err  = "";

// Check if coming from submitted form and do the validations on user inputs in form
if (isset($_POST['user_save'])) {

    $password = $_POST['password'];
    $id = $_POST['id'];
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';
    if (empty($_POST["username"])) {
        $name_err = 'Name should not be empty';
        echo "<script>alert('Name should not be empty')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        $username = test_input($_POST["username"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match("/^[a-zA-z ]*$/", $username)) {
            $name_err = "Name is not in valid format, can contain only letters.";
            echo "<script>alert('Name is not in valid format, can contain only letters.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    if (empty($_POST["phone"])) {
        $phone_err = 'Phone number should not be empty';
        echo "<script>alert('Phone number should not be empty')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        $phone = test_input($_POST["phone"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match($pattern, $phone)) {
            $phone_err = "Phone Number is not in valid format, follow 03XXXXXXXXX format";
            echo "<script>alert(' Phone Number is not in valid format, follow 03XXXXXXXXX format')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "Email cannot be left blank.";
        echo "<script>alert('Email cannot be left blank.')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email format is not correct.";
            echo "<script>alert('Email format is not correct.')</script>";
            // echo "<script>window.open('index.php','_self')</script>";
        }
    }

    if (isset($_POST['user_save']) and ($name_err == "" and $email_err == "" and $phone_err == "")) {

        $selectquery = "select * from student";
        $res = mysqli_query($dbcon, $selectquery);

        $query = "SELECT * FROM student where phone='$phone' and id<>'$id'";
        $qu = mysqli_query(
            $dbcon,
            $query
        );

        if (mysqli_num_rows($qu) != 0) {
            echo "<script>alert('This Mobile Number already exists!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $query = "SELECT * FROM student where email='$email' ali123mazhar@gmail.com";
            $qu = mysqli_query($dbcon, $query);

            if (
                mysqli_num_rows($qu) != 0
            ) {
                echo "<script>alert('This Email already exists!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {

                $update_profile = "update student set password='$password', username='$username', email='$email', phone='$phone' where id='$id'";
                if (mysqli_query($dbcon, $update_profile)) {
                    echo "<script>alert('Account successfully updated!')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                } else {
                    echo "<script>alert('Error Found!')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            }
        }
    }
}
