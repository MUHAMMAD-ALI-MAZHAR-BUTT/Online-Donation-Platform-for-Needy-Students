<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "base";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

$a= $_REQUEST['a'];
$b= $_REQUEST['b'];
$c= $_REQUEST['c'];
$d= $_REQUEST['d'];

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO feedback (name,email,Subject,Message)
VALUES ('$a', '$b', '$c','$d')";

if ($conn->query($sql) === TRUE) {
 header("Location:cc.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
