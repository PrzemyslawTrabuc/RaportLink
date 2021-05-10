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
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $_SESSION['users_edit_flag']=0;

    if($password == ""){
        $sql = "update pracownicy set Imie='$name', Nazwisko='$surname' where nrid='$id'";
        //$_SESSION['users_edit_falg']=1;
    }else{
        $sql = "update pracownicy set Imie='$name', Nazwisko='$surname' where nrid='$id'";
        if(strlen($password) > 5 && !ctype_space($password) && !str_contains($password, ' ')){
            $sql2 = "update dane_do_logowania set haslo='$password' where nrid_pracownika='$id'";
            mysqli_query($link, $sql2);
            $_SESSION['users_edit_flag']=1;
        }
    }
    if (mysqli_query($link, $sql) === TRUE) {
        if(isset($_SESSION['name'])){
            unset($_SESSION['name']);
          }
          if(isset($_SESSION['surname'])){
            unset($_SESSION['surname']);
          }
          if(isset($_SESSION['id'])){
            unset($_SESSION['id']);
          }
          header("location: ../users.php");
          exit;
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
} else {
    if(isset($_SESSION['name'])){
        unset($_SESSION['name']);
      }
      if(isset($_SESSION['surname'])){
        unset($_SESSION['surname']);
      }
      if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
      }
      header("location: ../users.php");
      exit;
}

?>