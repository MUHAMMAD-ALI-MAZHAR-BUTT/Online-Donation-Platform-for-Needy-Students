<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "base";
include('db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
if (isset($_POST['sub'])) {

  $a = $_REQUEST['a'];
  $b = $_REQUEST['b'];
  $c = $_REQUEST['c'];

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "Update donators set email='$a',password='$b'";

  $query1 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$c'
            , '$a', 'donor','Donor $name has changed account settings', 'unread', CURRENT_TIMESTAMP,'account')";

  if ($conn->query($sql) === TRUE) {
    header("Location:dd.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
} else {
  echo "<script>alert('dnsse')</script>";
}
