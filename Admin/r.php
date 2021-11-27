<?php

include 'db_connection.php';

$idd = $_GET['idd'];
$query = "UPDATE notifications set status='read' where id=$idd";
$q = mysqli_query($con, $query);


if ($q) {

    echo    "<script>window.history.back();</script>";
} else {

    echo   "<script>window.history.back();</script>";
}
