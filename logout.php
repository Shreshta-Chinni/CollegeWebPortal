<?php
session_start();
$conn = mysqli_connect ('localhost','root','root','webster',3308);
  echo "<script>window.open('login.php','_self');</script>";
  session_destroy();

?>