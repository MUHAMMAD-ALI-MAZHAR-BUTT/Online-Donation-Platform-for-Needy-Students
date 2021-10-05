<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'base';

$con = mysqli_connect($server, $username, $password, $db);

if ($con) {
    //echo "Connection successfull";
} else {
    echo "NO connection";
}
