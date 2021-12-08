<?php
include("config.php");
include("db_connection.php");
$query = "SELECT * FROM forms where student_id=1";
$s = mysqli_query($dbcon, $query);

$nums = mysqli_num_rows($s);
if ($nums == 0) {
    echo '<script>alert("sss")</script>';
} else {
    echo '<script>alert("s")</script>';
}
