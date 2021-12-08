<?php
session_start();

if (!$_SESSION['email']) {

    header("Location: ../index.php");
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


// Check if coming from submitted form and do the validations on user inputs in form
if (isset($_POST['user_save'])) {
    $name = $email = $phone = "";
    $name_err = $email_err = $phone_err  = $pass_err = "";

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id'];
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';
    if ($password !== $cpassword) {
        $pass_err = "dfdd";
        echo "<script>alert('Passwords doesnt match')</script>";
        echo "<script>history.back()</script>";
    }
    if (empty($_POST["name"])) {
        $name_err = 'Name should not be empty';
        echo "<script>alert('Name should not be empty')</script>";
        echo "<script>history.back()</script>";
    } else {
        $name = test_input($_POST["name"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match("/^[a-zA-z ]*$/", $name)) {
            $name_err = "Name is not in valid format, can contain only letters.";
            echo "<script>alert('Name is not in valid format, can contain only letters.')</script>";
            echo "<script>history.back()</script>";
        }
    }
    if (empty($_POST["phone"])) {
        $phone_err = 'Phone number should not be empty';
        echo "<script>alert('Phone number should not be empty')</script>";
        echo "<script>history.back()</script>";
    } else {
        $phone = test_input($_POST["phone"]);
        // check for correctness of name or validate our name test_input
        if (!preg_match($pattern, $phone)) {
            $phone_err = "Phone Number is not in valid format, follow 03XXXXXXXXX format";
            echo "<script>alert(' Phone Number is not in valid format, follow 03XXXXXXXXX format')</script>";
            echo "<script>history.back()</script>";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "Email cannot be left blank.";
        echo "<script>alert('Email cannot be left blank.')</script>";
        echo "<script>history.back()</script>";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email format is not correct.";
            echo "<script>alert('Email format is not correct.')</script>";
            echo "<script>history.back()</script>";
        }
    }

    if (empty($password) || empty($cpassword)) {
        $pass_err = "Passwords should not be empty";
        echo "<script>alert('Passwords should not be empty')</script>";
        echo "<script>history.back()</script>";
    }
    if (isset($_POST['user_save']) and ($name_err == "" and $email_err == "" and $phone_err == "" and $pass_err == "")) {

        $selectquery = "select * from student";
        $res = mysqli_query($dbcon, $selectquery);

        $query = "SELECT * FROM student where phone='$phone' and id<>'$id'";
        $qu = mysqli_query(
            $dbcon,
            $query
        );

        if (mysqli_num_rows($qu) != 0) {
            echo "<script>alert('This Mobile Number already exists!')</script>";
            echo "<script>history.back()</script>";
        } else {
            $query = "SELECT * FROM student where email='$email' and id<>'$id'";
            $qu = mysqli_query($dbcon, $query);

            if (
                mysqli_num_rows($qu) != 0
            ) {
                echo "<script>alert('This Email already exists!')</script>";
                echo "<script>history.back()</script>";
            } else {

                $update_profile = "update student set password='$password', name='$name', email='$email', phone='$phone' where id='$id'";
                if (mysqli_query($dbcon, $update_profile)) {
                    $query1 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES 
                    ('$name', '$email', 'student','$name changed some account settings', 'unread', CURRENT_TIMESTAMP,'account')";
                    (mysqli_query($dbcon, $query1));


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
?>


<?php



if (isset($_POST["name"])) {
    sleep(2);

    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");

    $success = '';

    $name = $_POST["name"];

    $email = $_POST["email"];
    $subject = $_POST["subject"];

    $message = $_POST["message"];

    $subject_error = '';
    $message_error = '';





    if (empty($subject)) {
        $subject_error = 'Subject is Required!';
    }

    if (empty($message)) {
        $message_error = 'Message is Required Field!';
    }

    if ($subject_error == '' && $message_error == '') {


        $data = array(
            ':name'            =>    $name,
            ':email'        =>    $email,
            ':subject'        =>    $subject,
            ':message'        =>    $message

        );

        $query = "
		INSERT INTO feedback 
		(name, email, subject, message,dt) 
		VALUES (:name, :email, :subject, :message,CURRENT_TIMESTAMP)
		";

        $statement = $connect->prepare($query);

        $statement->execute($data);


        $success =
            "Your Query has been successfully submitted";
    }

    $output = array(
        'success'        =>    $success,
        'subject_error'    =>    $subject_error,
        'message_error'    =>    $message_error,

    );

    echo json_encode($output);
}

?>

