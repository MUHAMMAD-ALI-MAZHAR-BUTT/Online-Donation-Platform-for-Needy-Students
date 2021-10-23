<?php
session_start();
session_unset();

echo "<script>window.open('../../Home/index.php','_self')</script>";
