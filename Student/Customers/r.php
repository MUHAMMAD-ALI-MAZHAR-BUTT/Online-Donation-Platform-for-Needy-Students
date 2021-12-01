<?php

include 'db_connection.php';

$idd = $_GET['idd'];
$query = "UPDATE stu_notification set status='read' where idd=$idd";
$q = mysqli_query($dbcon, $query);


if ($q) {

    echo    "<script>window.history.back();</script>";
} else {

    echo   "<script>window.history.back();</script>";
}
