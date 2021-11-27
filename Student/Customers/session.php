<?php
session_start();

if (!$_SESSION['email']) {
    $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: ../index.php?continue=$actual_link");
}
