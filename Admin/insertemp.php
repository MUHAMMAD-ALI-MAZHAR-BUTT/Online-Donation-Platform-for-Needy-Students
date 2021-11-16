
<?php
include('db_connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["emp_name"])) {
    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';


    $success = '';

    // $emp_name = $_POST["emp_name"];
    // $emp_email = $_POST["emp_email"];
    // $emp_phone = $_POST["emp_phone"];

    $emp_name = test_input($_POST["emp_name"]);
    $emp_phone = test_input($_POST["emp_phone"]);
    $emp_email = test_input($_POST["emp_email"]);
    $name_error = '';
    $email_error = '';
    $phone_error = '';



    if (empty($emp_name)) {
        $name_error = 'Name is Required';
    } else {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $emp_name)) {
            $name_error = 'Name format not correct';
        }
    }

    if (empty($emp_email)) {
        $email_error = 'Email is Required';
    } else {
        if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
            $email_error = 'Email format is not correct.';
        }
    }
    $query = "SELECT * FROM emp where emp_phone='$emp_phone'";
    $qu = mysqli_query(
        $con,
        $query
    );

    if (mysqli_num_rows($qu) != 0) {
        $phone_error = 'This Phone number already exists';
    }
    $query = "SELECT * FROM emp where emp_email='$emp_email'";
    $qu = mysqli_query(
        $con,
        $query
    );

    if (mysqli_num_rows($qu) != 0) {
        $email_error = 'This email already exists';
    }
    if (empty($emp_phone)) {
        $phone_error = 'Phone Number is Required';
    } else {
        if (!preg_match($pattern, $emp_phone)) {
            $phone_error = 'Phone Number is not in valid format, follow 03XXXXXXXXX format';
        }
    }




    if ($name_error == '' && $email_error == '' && $phone_error == '') {


        $data = array(
            ':emp_name'            =>    $emp_name,
            ':emp_email'        =>    $emp_email,
            ':emp_phone'        =>    $emp_phone

        );
        $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = str_shuffle($str);
        $str = substr($str, 0, 10);
        $today = date("Y/m/d");
        $query = "
		INSERT INTO emp 
		(emp_name, emp_email, emp_phone,pass,emp_joindate) 
		VALUES ('$emp_name', '$emp_email', '$emp_phone','$str','$today')
		";

        $statement = $connect->prepare($query);
        $mail_error = '';
        if ($statement->execute($data)) {
            $recipient = $_POST['emp_email'];
            $subject = "Your Initial password for log-in";
            $message = "Greetings! Your password for SOP website is: $str";
            $sender = "From: abdullahrasheed937@gmail.com";
            // PHP function to send mail
            if (mail($recipient, $subject, $message, $sender)) {

                $success =
                    "$emp_name has been added successfully and Initial Password for log-in sent to $recipient";
            } else {
                $success =
                    "$emp_name has been added successfully But error while sending mail for Password ";
            }
        }
    }

    $output = array(

        'success'        =>    $success,
        'name_error'    =>    $name_error,
        'email_error'    =>    $email_error,
        'phone_error'    =>    $phone_error

    );

    echo json_encode($output);
}

?>