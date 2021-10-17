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
$name_err = $email_err = $phone_err  = "";

// Check if coming from submitted form and do the validations on user inputs in form
if (isset($_POST['submit'])) {


    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';
    if (empty($_POST["emp_name"])) {
        $name_err = 'Name should not be empty';
        echo "<script>alert('Name should not be empty')</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    } else {
        $emp_name = test_input($_POST["emp_name"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match("/^[a-zA-z ]*$/", $emp_name)) {
            $name_err = "Name is not in valid format, can contain only letters.";
            echo "<script>alert('Name is not in valid format, can contain only letters.')</script>";
            echo "<script>window.open('empdetails.php','_self')</script>";
        }
    }
    if (empty($_POST["emp_phone"])) {
        $phone_err = 'Phone number should not be empty';
        echo "<script>alert('Phone number should not be empty')</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    } else {
        $emp_phone = test_input($_POST["emp_phone"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match($pattern, $emp_phone)) {
            $phone_err = "Phone Number is not in valid format, follow 03XXXXXXXXX format";
            echo "<script>alert(' Phone Number is not in valid format, follow 03XXXXXXXXX format')</script>";
            echo "<script>window.open('empdetails.php','_self')</script>";
        }
    }

    if (empty($_POST["emp_email"])) {
        $email_err = "Email cannot be left blank.";
        echo "<script>alert('Email cannot be left blank.')</script>";
        echo "<script>window.open('empdetails.php','_self')</script>";
    } else {
        $emp_email = test_input($_POST["emp_email"]);
        if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email format is not correct.";
            echo "<script>alert('Email format is not correct.')</script>";
            echo "<script>window.open('empdetails.php','_self')</script>";
        }
    }

    if (isset($_POST['submit']) and ($name_err == "" and $email_err == "" and $phone_err == "")) {

        $selectquery = "select * from emp";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) >= 10) {
            echo "<script>alert('Maximum employee are done')</script>";
            echo "<script>window.open('empdetails.php','_self')</script>";
        } else {
            $query = "SELECT * FROM emp where emp_phone='$emp_phone'";
            $qu = mysqli_query(
                $con,
                $query
            );

            if (mysqli_num_rows($qu) != 0) {
                echo "<script>alert('This Mobile Number already exists!')</script>";
                echo "<script>window.open('empdetails.php','_self')</script>";
            } else {
                $query = "SELECT * FROM emp where emp_email='$emp_email'";
                $qu = mysqli_query($con, $query);

                if (
                    mysqli_num_rows($qu) != 0
                ) {
                    echo "<script>alert('This Email already exists!')</script>";
                    echo "<script>window.open('empdetails.php','_self')</script>";
                } else {

                    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $str = str_shuffle($str);
                    $str = substr($str, 0, 10);
                    $today = date("Y/m/d");
                    $q = "INSERT into emp(emp_name,emp_email,emp_phone,pass,emp_joindate) values 
                ('$emp_name','$emp_email','$emp_phone','$str','$today')";

                    if ($query = mysqli_query($con, $q)) {
                        $recipient = $_POST['emp_email'];
                        $subject = "Your Initial password for log-in";
                        $message = "Greetings! Your password for SOP website is: $str";
                        $sender = "From: abdullahrasheed937@gmail.com";
                        // PHP function to send mail
                        if (mail($recipient, $subject, $message, $sender)) {


                            echo "<script>alert('Initial Password for log-in sent to $recipient')</script>";
                        } else {
                            echo "<script>alert('An error occured while sending message')</script>";
                        }

                        echo "<script>alert('Employee $emp_name successfully added')</script>";
                    } else {
                        echo "<script>alert('Error occured')</script>";
                    }

                    echo "<script>window.open('empdetails.php','_self')</script>";
                }
            }
        }
    }
}
