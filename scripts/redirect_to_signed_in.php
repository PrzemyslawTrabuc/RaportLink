<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: ../index.php');
}
// Redirect to page
header("location: ../signed_in.php");
?>