<?php
// Initialize the session
session_start();


    if (isset($_POST['firma1']))
    {        
   $logo = "images/test.jpg";   
   $_SESSION['logo'] = $logo;
    }elseif (isset($_POST['firma2']))
    {        
   $logo = "images/Raport_Link_logo_light.svg";   
   $_SESSION['logo'] = $logo;
    }
// Redirect to login page
header("location: ../raport_building.php");
?>