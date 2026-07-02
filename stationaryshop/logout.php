<?php
session_start();
session_destroy();
  echo "<script> alert('Logout From The Site');
        location.assign('index.php');
    </script>";
?>