<?php

include 'db_connection.php';

$id = $_GET['id'];
$today = date("Y/m/d");
$query = "UPDATE emp set emp_leftdate='$today' where emp_id=$id";
$q = mysqli_query($con, $query);


if ($q) {
    echo "<script>alert('Employee with id $id removed successfully')</script>";
    echo    "<script>window.location.href = 'empdetails.php'</script>";
} else {
    echo "<script>alert('Some error occured')</script>";
    echo   "<script>window.location.href = 'empdetails.php'</script>";
}
