<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "base";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

$a= $_REQUEST['a'];
$b= md5($_REQUEST['b']);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "Update donators set email='$a',password='$b'";

if ($conn->query($sql) === TRUE) {
 header("Location:dd.html");
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>