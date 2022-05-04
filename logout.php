<?php

session_start();
session_unset();
session_destroy();
// echo "Session destroyed!";
echo "<script>window.open('login.php','_self')</script>";

?>