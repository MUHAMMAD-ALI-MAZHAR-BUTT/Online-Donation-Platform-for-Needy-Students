<?php
session_start();

if (!$_SESSION['emp_email']) {

    echo "<script>window.open('./login/index1.php','_self')</script>";
}

?>
<?php
include("db_connection.php");
if (isset($_POST['u'])) {

    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $emp_id = $_POST['emp_id'];


    $update_profile = "update emp set pass='$pass', emp_name='$emp_name', emp_email='$emp_email', emp_phone='$emp_phone' where emp_id='$emp_id'";
    if (mysqli_query($dbcon, $update_profile)) {
        echo "<script>alert('Account successfully updated!')</script>";
        echo "<script>history.back()</script>";
    } else {
        echo "<script>alert('Error Found!')</script>";
        echo "<script>history.back()</script>";
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
            echo "<script>history.back()</script>";

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
$emp_name = $emp_email = $emp_phone = "";
$name_err = $email_err = $phone_err = $pass_err = "";

// Check if coming from submitted form and do the validations on user inputs in form
if (isset($_POST['user_save'])) {

    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $emp_id = $_POST['emp_id'];
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';
    if ($pass !== $cpass) {
        $pass_err = "dfdd";
        echo "<script>alert('Passwords doesnt match')</script>";
        echo "<script>history.back()</script>";
    }
    if (empty($_POST["emp_name"])) {
        $name_err = 'Name should not be empty';
        echo "<script>alert('Name should not be empty')</script>";
        echo "<script>history.back()</script>";
    } else {
        $emp_name = test_input($_POST["emp_name"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match("/^[a-zA-z ]*$/", $emp_name)) {
            $name_err = "Name is not in valid format, can contain only letters.";
            echo "<script>alert('Name is not in valid format, can contain only letters.')</script>";
            echo "<script>history.back()</script>";
        }
    }
    if (empty($pass) || empty($cpass)) {
        $pass_err = "Passwords should not be empty";
        echo "<script>alert('Passwords should not be empty')</script>";
        echo "<script>history.back()</script>";
    }
    if (empty($_POST["emp_phone"])) {
        $phone_err = 'Phone number should not be empty';
        echo "<script>alert('Phone number should not be empty')</script>";
        echo "<script>history.back()</script>";
    } else {
        $emp_phone = test_input($_POST["emp_phone"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match($pattern, $emp_phone)) {
            $phone_err = "Phone Number is not in valid format, follow 03XXXXXXXXX format";
            echo "<script>alert(' Phone Number is not in valid format, follow 03XXXXXXXXX format')</script>";
            echo "<script>history.back()</script>";
        }
    }

    if (empty($_POST["emp_email"])) {
        $email_err = "Email cannot be left blank.";
        echo "<script>alert('Email cannot be left blank.')</script>";
        echo "<script>history.back()</script>";
    } else {
        $emp_email = test_input($_POST["emp_email"]);
        if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email format is not correct.";
            echo "<script>alert('Email format is not correct.')</script>";
            echo "<script>history.back()</script>";
        }
    }

    if (isset($_POST['user_save']) and ($name_err == "" and $email_err == "" and $phone_err == "" and $pass_err == "")) {

        $selectquery = "select * from emp";
        $res = mysqli_query($dbcon, $selectquery);

        $query = "SELECT * FROM emp where emp_phone='$emp_phone' and emp_id<>'$emp_id'";
        $qu = mysqli_query(
            $dbcon,
            $query
        );

        if (mysqli_num_rows($qu) != 0) {
            echo "<script>alert('This Mobile Number already exists!')</script>";
            // echo "<script>history.back()</script>";
        } else {
            $query = "SELECT * FROM emp where emp_email='$emp_email'and  emp_id<>'$emp_id'";
            $qu = mysqli_query($dbcon, $query);

            if (
                mysqli_num_rows($qu) != 0
            ) {
                echo "<script>alert('This Email already exists!')</script>";
                echo "<script>history.back()</script>";
            } else {

                $update_profile = "update emp set pass='$pass', emp_name='$emp_name', emp_email='$emp_email', emp_phone='$emp_phone' where emp_id='$emp_id'";
                if (mysqli_query($dbcon, $update_profile)) {
                    echo "<script>alert('Account successfully updated!')</script>";
                    echo "<script>history.back()</script>";
                } else {
                    echo "<script>alert('Error Found!')</script>";
                    echo "<script>history.back()</script>";
                }
            }
        }
    }
}
