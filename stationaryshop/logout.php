<?php
session_start();
if(isset($_SESSION['userid'])){
session_destroy();
  echo "<script> alert('Logout From The Site');
        location.assign('index.php');
    </script>";}else{echo "<script> alert('Login First');
        location.assign('login.php') </script>";}
?>