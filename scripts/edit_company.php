<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
  exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "config.php"; 

    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $code = $_SESSION['code'];
    $city = $_SESSION['city'];
    $street = $_SESSION['street'];
    $num = $_SESSION['number'];

    $idzdj = $_SESSION['idzdj'];
    $path = $_SESSION['path'];

    $_SESSION['users_edit_flag']=0;

    $sql = "update firmy set nazwa='$name', adr_kod_pocztowy='$code', adr_miasto='$city', adr_ulica='$street', adr_numer='$num' where nrid='$id'";
    mysqli_query($link, $sql);

    if($path != "" || $path != null){

        $image = $_SESSION['path'];

        $imagePath = "../images/";
        $imagetype = $_FILES['pic']['type'];
        //Stores any error codes from the upload.
        $imageerror = $_FILES['pic']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $imagetemp = $_FILES['pic']['tmp_name'];
    
        if(is_uploaded_file($imagetemp)) {
            if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                $fullpath = "images/"+$imagename;
                $sql2 = "update zdjecie set nazwa='$fullpath' where nrid='$idzdj'";
                mysqli_query($link, $sql2);
                echo "Sussecfully uploaded your image.";
            }
            else {
                echo "Failed to move your image.";
                header("location: ../company.php");
            }
        }
        else {
            echo "Failed to upload your image.";
            header("location: ../company.php");
        }

        $_SESSION['users_edit_falg']=1;
    }
    if (mysqli_query($link, $sql) === TRUE) {
        if(isset($_SESSION['name'])){
            unset($_SESSION['name']);
          }
          if(isset($_SESSION['code'])){
            unset($_SESSION['code']);
          }
          if(isset($_SESSION['id'])){
            unset($_SESSION['id']);
          }
          if(isset($_SESSION['path'])){
            unset($_SESSION['path']);
          }
          if(isset($_SESSION['city'])){
            unset($_SESSION['city']);
          }
          if(isset($_SESSION['street'])){
            unset($_SESSION['street']);
          }
          if(isset($_SESSION['number'])){
            unset($_SESSION['number']);
          }
          if(isset($_SESSION['idzdj'])){
            unset($_SESSION['idzdj']);
          }
          header("location: ../company.php");
          exit;
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
} else {
    if(isset($_SESSION['name'])){
        unset($_SESSION['name']);
      }
      if(isset($_SESSION['code'])){
        unset($_SESSION['code']);
      }
      if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
      }
      if(isset($_SESSION['path'])){
        unset($_SESSION['path']);
      }
      if(isset($_SESSION['city'])){
        unset($_SESSION['city']);
      }
      if(isset($_SESSION['street'])){
        unset($_SESSION['street']);
      }
      if(isset($_SESSION['number'])){
        unset($_SESSION['number']);
      }
      if(isset($_SESSION['idzdj'])){
        unset($_SESSION['idzdj']);
      }
      header("location: ../company.php");
      exit;
}

?>