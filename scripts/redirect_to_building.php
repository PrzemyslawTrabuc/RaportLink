<?php
// Initialize the session
session_start();

foreach($_POST as $name => $content) { // Most people refer to $key => $value
    //echo "The HTML name: $name <br>";
    //echo "The content of it: $content <br>";
    include "config.php";    
    $sql_query = "select * from firma where nrid = '$name'";
    $result = mysqli_query($link,$sql_query);
    $_SESSION['firma'] = $result;

    $_SESSION['logo'] = $content;
 }
// Redirect to login page
header("location: ../raport_building.php");
?>