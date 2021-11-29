<?php
include('db_connection.php');
$message = "dddd";
$venue = "ddddddd";
// $date1 = $_POST["date1"];
$stu_id = "1";
$emp_id = "2";
$emp_name = "ddd";
$query = "INSERT INTO `stu_notification` (`stu_id`,`emp_id`, `emp_name`, `dt`, `status`, `message`,`venue`,`type`) 
VALUES ('$stu_id', '$emp_id', '$emp_name',CURRENT_TIMESTAMP, 'unread','$message','$venue','i')";



if (mysqli_query($dbcon, $query)) {
    echo "<script>alert('done')</script>";
} else {
    echo "<script>alert('dne')</script>";
}
