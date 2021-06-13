<?php
// Initialize the session
session_start();

foreach($_POST as $name => $content) { // Most people refer to $key => $value
    include "config.php";    
    $sql_query = "select * from firma where nrid = '$name'";
    $result = mysqli_query($link,$sql_query);
    $row = mysqli_fetch_array($result);
    $_SESSION['nazwa_firmy'] = $row['nazwa'];
    $_SESSION['logo'] = $content;
 }
// Redirect to page
header("location: ../raport_building.php");
?>