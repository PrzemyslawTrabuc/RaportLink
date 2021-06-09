<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "config.php"; 
    $id = $_POST['id'];
    $_SESSION['users_edit_falg']=0;

    $sql = "SELECT * FROM dane_do_logowania WHERE nrid_pracownika=$id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $id2 = $row['nrid'];
        $sql_query = "DELETE FROM dane_do_logowania WHERE nrid=$id2";
        if(mysqli_query($link, $sql_query)){
            $sql2 = "DELETE FROM pracownicy WHERE nrid=$id";
            mysqli_query($link, $sql2);
        }else {
            echo "Error: " . $sql_query . "<br>" . $conn->error;
        }
        
        if(isset($_SESSION['id'])){
            unset($_SESSION['id']);
          }
        if(isset($_SESSION['name'])){
            unset($_SESSION['name']);
          }
        //$_SESSION['users_edit_flag']=1;
        header("location: ../users.php");
}else {
    echo "Error...";
}

?>