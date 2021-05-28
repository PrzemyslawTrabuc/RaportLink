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

    $id = $_POST['id'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $num = $_POST['number'];

    $idzdj = $_POST['idzdj'];
    $path = $_POST['path'];

    $_SESSION['users_edit_flag']=1;
    $sql = "update firma set `nazwa`='$name', `adr_kod_pocztowy`='$code', `adr_miasto`='$city', `adr_ulica`='$street', `adr_numer`='$num' where `firma`.`nrid`='$id'";   
    mysqli_query($link, $sql);

    // if($path != "" && $path != null){

    //     $target_dir = "../images/";
    //     $target_file = $target_dir . basename($_FILES["path"]["name"]);
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //     // Check if image file is a actual image or fake image
    //     if(isset($_POST["submit"])) {
    //       $check = getimagesize($_FILES["path"]["tmp_name"]);
    //       if($check !== false) {
    //         $imagetype = $_FILES['path']['type'];
    //         $fullpath = "images/"+$imagename+"."+$imagetype;
    //         $sql2 = "update zdjecie set `nazwa`='$fullpath' where `zdjecie`.`nrid`='$idzdj'";
    //         mysqli_query($link, $sql2);
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //       } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //       }
    //     }

    //     $_SESSION['users_edit_flag']=1;
    // }
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