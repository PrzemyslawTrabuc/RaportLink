<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "config.php"; 

    $sql_query = "select MAX(nrid) as cnt from pracownicy";
    $result = mysqli_query($link, $sql_query);
    $row = mysqli_fetch_array($result);
    $imagename = $row['cnt'];

    $image = $_POST['path'];

    $imagePath = "../images/";
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['path']['tmp_name'];

    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }

    $fullpath = "images/";
    $fullpath .= $imagename;

    $sql = "INSERT INTO `raportlink_db`.`zdjecie` (`nrid`, `nazwa`, `szerokosc`, `wysokosc`) VALUES ('$imagename', '$fullpath', '1', '1')";

    if (mysqli_query($link, $sql) === TRUE) {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $num = $_POST['number'];

        $sql2 = "INSERT INTO `raportlink_db`.`firma` (`nrid_zdjecie`, `nazwa`, `adr_kod_pocztowy`, `adr_miasto`, `adr_ulica`, `adr_numer`) VALUES ('$imagename', '$name', '$code', '$city', '$street', '$num')";
        if (mysqli_query($link, $sql2) === TRUE) {
            $_SESSION['users_edit_flag']=1;     
            header("location: ../company.php");          
        } else {
            echo "Error: " . $sql2 . "<br>" . $link->error;
        }
        echo "New record created successfully";  
        //$_SESSION['users_edit_flag']=1;
        // header("location: ../company.php");
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}else {
    echo "Error...";
}
?>