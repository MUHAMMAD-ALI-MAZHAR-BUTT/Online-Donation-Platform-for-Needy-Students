<?php
include('db_connection.php');
if (isset($_POST["submit_email"])) {
  $gmail = $_POST['gmail'];

  $query = "SELECT * FROM student where email='$gmail'";
  $qu = mysqli_query(
    $con,
    $query
  );
  if (mysqli_num_rows($qu) == 0) {
    echo "<script>alert('This doesnt exists')</script>";
  } else {
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = str_shuffle($str);
    $str = substr($str, 0, 10);
    $recipient = $_POST['gmail'];
    $subject = "New random password";
    $message = "Your new password for SOP website is: $str";
    $sender = "From: abdullahrasheed937@gmail.com";

    $query1 = "UPDATE student set password='$str'";
    mysqli_query($con, $query1);
    // PHP function to send mail
    if (mail($recipient, $subject, $message, $sender)) {
      echo "<script>alert('Mail successfully sent to $recipient')</script>";
      $query = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$name'
            , '$email', 'student','Student $name has requested for new password as old password was forgotten', 'unread', CURRENT_TIMESTAMP,'forgot')";


      mysqli_query($con, $query);
    } else {
      echo "<script>alert('Error while sending mail successfully to $recipient')</script>";
    }
  }
}
