<?php
session_start();
session_destroy();
echo "<script>alert('Logout succesfully')
    location.assign('login.php')</script>";
?>