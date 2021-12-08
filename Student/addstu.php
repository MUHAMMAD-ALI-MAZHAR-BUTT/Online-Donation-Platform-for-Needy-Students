<?php
include('db_connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["name"])) {

    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';


    $success = '';

    // $emp_name = $_POST["emp_name"];
    // $email = $_POST["email"];
    // $phone = $_POST["phone"];

    $name = test_input($_POST["name"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    $name_error = '';
    $email_error = '';
    $phone_error = '';
    $pass_error = '';




    if (empty($name)) {
        $name_error = 'Name is Required';
    } else {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $name_error = 'Name format not correct';
        }
    }

    if (empty($email)) {
        $email_error = 'Email is Required';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = 'Email format is not correct.';
        }
    }
    $query = "SELECT * FROM student where phone='$phone'";
    $qu = mysqli_query(
        $con,
        $query
    );
    if (empty($password) || empty($cpassword)) {
        $pass_error = "Password's cannot be empty";
    } else if ($password !== $cpassword) {
        $pass_error = "Both Password's doesnt match";
    }

    if (mysqli_num_rows($qu) != 0) {
        $phone_error = 'This Phone number already exists';
    }
    $query = "SELECT * FROM student where email='$email'";
    $qu = mysqli_query(
        $con,
        $query
    );

    if (mysqli_num_rows($qu) != 0) {
        $email_error = 'This email already exists';
    }
    if (empty($phone)) {
        $phone_error = 'Phone Number is Required';
    } else {
        if (!preg_match($pattern, $phone)) {
            $phone_error = 'Phone Number is not in valid format, follow 03XXXXXXXXX format';
        }
    }




    if (
        $name_error == '' && $email_error == '' && $phone_error == ''
        && $pass_error == ''
    ) {


        $data = array(
            ':name'            =>    $name,
            ':email'        =>    $email,
            ':phone'        =>    $phone,
            ':password' => $password,
            ':cpassword' => $cpassword

        );

        $create_datetime = date("Y-m-d H:i:s");
        $query = "
		INSERT INTO student
		(name, email, phone,password,create_datetime) 
		VALUES ('$name', '$email', '$phone','$password','$create_datetime')
		";

        mysqli_query($con, $query);



        $success =
            "Account successfully created, Now you can login ";

        $query1 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$name'
            , '$email', 'student','Student $name has created account on the Platform', 'unread', CURRENT_TIMESTAMP,'newacc')";



        mysqli_query($con, $query1);
    }

    $output = array(

        'success'        =>    $success,
        'name_error'    =>    $name_error,
        'email_error'    =>    $email_error,
        'phone_error'    =>    $phone_error,
        'pass_error' => $pass_error

    );

    echo json_encode($output);
}
