<?php
session_start();
session_unset();

echo "<script>window.open('./login/index1.php','_self')</script>";
