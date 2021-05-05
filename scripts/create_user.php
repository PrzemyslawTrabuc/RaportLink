<?php
// Initialize the session
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "config.php"; 
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "INSERT INTO pracownicy (imie, nazwisko, rola_w_systemie) VALUES ('$name', '$surname', 0)";

    if (mysqli_query($link, $sql) === TRUE) {

        $sql_query = "select count(*) as cnt from pracownicy";
        $result = mysqli_query($link, $sql_query);
        $row = mysqli_fetch_array($result);
        $cnt = $row['cnt'];

        $sql2 = "INSERT INTO dane_do_logowania (nrid_pracownika, login, haslo, email, ostatnia_zmiana_hasla) VALUES ('$cnt', '$login', '$password', 'test@mail.co','2021-04-15')";
        if (mysqli_query($link, $sql2) === TRUE) {
            header("location: users.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else {
    echo "Error...";
}
// $conn->close();

// Redirect to page

?>