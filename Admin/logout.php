<?php
session_start();
session_unset();

echo "<script>window.open('./dist/adminn.php','_self')</script>";
