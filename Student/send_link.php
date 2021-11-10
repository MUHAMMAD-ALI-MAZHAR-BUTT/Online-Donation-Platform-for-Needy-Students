<?php

$gmail_from_form=$_POST['gmail'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO forgetpassword (Email)
VALUES ('$gmail_from_form')";

if ($conn->query($sql) === TRUE) {
?>
<script>
 alert("Your request has been successfully sent to the admin");
</script>
<?php
// echo "\n\t\tYour request has been successfully sent to the admin. ";
echo"<script>window.open('index.php','_self')</script>";
} else {
?>
<script>
alert("Your request is not submitted yet");
</script>
  <?php
echo "Error: " . $sql . "<br>" . $conn->error;
echo"<script>window.open('index.php','_self')</script>";
}

$conn->close();
?>