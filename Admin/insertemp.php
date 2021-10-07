<?php

include 'connection.php';
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'test');

extract($_POST);

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM picker where Picker_Phone=$Picker_Phone";
    $qu = mysqli_query($con, $query);

    if (mysqli_num_rows($qu) > 0) {
        echo "<script>alert('This Mobile Number already exists!')</script>";
        echo "<script>window.open('wastepickers.php','_self')</script>";
    } else {
        $q = "insert into picker(Picker_Name,Picker_Phone,Picker_JoinDate,Picker_Salary) values ('$Picker_Name','$Picker_Phone','$Picker_JoinDate','$Picker_Salary')";

        $query = mysqli_query($con, $q);
        header('location: wastepickers.php');
    }
};
