<?php
$Username_from_form = $_POST['name'];
$subject_from_form = $_POST['subject'];
$gmail_from_form = $_POST['email'];
$messagee_from_form = $_POST['message'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO feedback(Name,Email,Subject,Message)
VALUES ('$Username_from_form','$gmail_from_form','$subject_from_form',  '$messagee_from_form')";

if ($conn->query($sql) === TRUE) {

    echo "<script>alert('Your feedback has been successfully submitted')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo "<script>alert('Some error occured!!!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}

$conn->close();
