<?php

include 'db_connection.php';

$idd = $_GET['idd'];
$query = "UPDATE notifications set status='read' where id=$idd";
$q = mysqli_query($con, $query);


if ($q) {

    echo    "<script>window.location.href = 'notification.php?id='1''</script>";
} else {

    echo   "<script>window.location.href = 'notification.php?id='1''</script>";
}
