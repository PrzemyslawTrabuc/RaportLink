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

    if($password == ""){
        $sql = "update pracownicy set Imie='$name', Nazwisko='$surname' where nrid='$id'";
    }else{
        $sql = "update pracownicy set Imie='$name', Nazwisko='$surname' where nrid='$id'";
        $sql2 = "update dane_do_logowania set password='$password' where nrid_pracownika='$id'";
        mysqli_query($link, $sql2);
    }
    if (mysqli_query($link, $sql) === TRUE) {
        header("location: ../redirect_to_users.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else {
    echo "Error...";
}
// $conn->close();

// Redirect to page

?>