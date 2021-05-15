<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: ../index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    if($id != NULL){
      include "config.php"; 


      $sql_query = "select * from firma where nrid = '$id'";

      $result = mysqli_query($link, $sql_query);
      $row = mysqli_fetch_array($result);
      
      $_SESSION['id'] = $row['nrid'];
      $_SESSION['name'] = $row['nazwa'];
      $_SESSION['code'] = $row['adr_kod_pocztowy'];
      $_SESSION['city'] = $row['adr_miasto'];
      $_SESSION['street'] = $row['adr_ulica'];
      $_SESSION['number'] = $row['adr_numer'];
      $_SESSION['idzdj'] = $row['nrid_zdjecie'];

      $id_zdj = $row['nrid_zdjecie'];

      $sql_query2 = "select * from zdjecie where nrid = '$id_zdj'";

      $result2 = mysqli_query($link, $sql_query2);
      $row2 = mysqli_fetch_array($result2);

      $_SESSION['path'] = $row2['nazwa'];

      header("location: ../company.php");
      exit;
    }
  }else{
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
}else {
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
  header("location: company.php");
  exit;
}

// Redirect to page
header("location: ../company.php");
?>