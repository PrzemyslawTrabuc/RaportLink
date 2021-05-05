<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    if($id != NULL){
      include "config.php"; 

      $sql_query = "select * from pracownicy where nrid = '$id'";

      $result = mysqli_query($link, $sql_query);
      $row = mysqli_fetch_array($result);
      
      $_SESSION['id'] = $row['nrid'];
      $_SESSION['name'] = $row['Imie'];
      $_SESSION['surname'] = $row['Nazwisko'];

      header("location: users.php");
      exit;
    }
  }else{
    if(isset($_SESSION['name'])){
      unset($_SESSION['name']);
    }
    if(isset($_SESSION['surname'])){
      unset($_SESSION['surname']);
    }
    if(isset($_SESSION['id'])){
      unset($_SESSION['id']);
    }
    header("location: users.php");
    exit;
  }
}else {
  echo "Error...";
}

// Redirect to page

?>