<?php

session_start();
include('db_connection.php');

session_destroy();

$id = $_GET['id'];
$sql = "UPDATE student set last_active=CURRENT_TIMESTAMP where id=$id";
if (mysqli_query($dbcon, $sql)) {
    header("Location: ../../Home/index.php");
} else {
    echo "<script>alert('Error occured')</script>";
    header("Location: index.php");
}
