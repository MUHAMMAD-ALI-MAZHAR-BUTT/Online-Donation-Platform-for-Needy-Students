<?php
include('db_connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["stu_id"])) {

    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';


    $success = '';


    $message = test_input($_POST["message"]);
    $venue = test_input($_POST["venue"]);

    $date = date('Y-m-d\TH:i:s', strtotime($_POST['date1']));
    $stu_id = $_POST["stu_id"];
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $message_error = '';
    $venue_error = '';


    if (empty($message)) {
        $message_error = 'Message is Required';
    }

    if (empty($venue)) {
        $venue_error = 'Location field cant be empty';
    }


    if (
        $message_error == '' && $venue_error == ''
    ) {


        $data = array(
            ':message'            =>    $message,
            ':venue'        =>    $venue,
            ':date1'        =>    $date1,
            ':stu_id' => $stu_id,
            ':emp_id' => $emp_id,
            ':emp_name' => $emp_name

        );

        // $create_datetime = date("Y-m-d H:i:s");
        // $query = "
        // INSERT INTO student
        // (name, email, phone,password,create_datetime) 
        // VALUES ('$name', '$email', '$phone','$password','$create_datetime')
        // ";

        // $statement = $connect->prepare($query);
        // $mail_error = '';
        // if ($statement->execute($data)) {


        $query = "INSERT INTO `stu_notification` (`stu_id`,`emp_id`, `emp_name`, `dt`, `status`, `message`,`venue`,`type`,`date1`) 
        VALUES ('$stu_id', '$emp_id', '$emp_name',CURRENT_TIMESTAMP, 'unread','$message','$venue','i','$date')";
        if (mysqli_query($dbcon, $query)) {
            $success =
                "Details sucessfully sent to student's dashboard ";
        } else {
            $success =
                "Details ";
        }
    }

    $output = array(

        'success'        =>    $success,
        'message_error'    =>    $message_error,
        'venue_error'    =>    $venue_error

    );

    echo json_encode($output);
}
?>
<?php
include('db_connection.php');


if (isset($_POST["stuu_id"])) {

    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
    $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';



    $message = $_POST["message"];
    $venue = $_POST["venue"];
    // $date1 = $_POST["date1"];
    $stu_id = $_POST["stu_id"];
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];

    echo "<script>alert('$stu_id')</script>";
    echo "<script>alert('$emp_id')</script>";
    echo "<script>alert('$emp_name')</script>";
    echo "<script>alert('$message')</script>";
    echo "<script>alert('$venue')</script>";
}
