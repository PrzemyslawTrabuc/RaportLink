<?php
// Initialize the session
session_start();

foreach($_POST as $name => $content) { // Most people refer to $key => $value
    //echo "The HTML name: $name <br>";
    //echo "The content of it: $content <br>";
    include "scripts/config.php";    
    $sql_query = "select * from firma where nrid = '$name'";
    $result = mysqli_query($link,$sql_query);
    $_SESSION['firma'] = $result;

    $id = $row['nrid_zdjecie'];
    $sql_query = "select * from zdjecie where nrid = '$id'";
    $result = mysqli_query($link,$sql_query);
    $row = mysqli_fetch_array($result);
    $_SESSION['logo'] = $row['nazwa'];
 }
// Redirect to login page
//header("location: ../raport_building.php");
?>