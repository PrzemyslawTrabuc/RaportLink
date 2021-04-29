<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
if(!empty($_ENV['MYSQL_HOST'])){
    $HOST = $_ENV['MYSQL_HOST'];
} else {
    $HOST = 'localhost';
}
if(!empty($_ENV['MYSQL_USER'])){
    $USER = $_ENV['MYSQL_USER'];
} else {
    $USER = 'root';
}
if(!empty($_ENV['MYSQL_ROOT_PASSWORD'])){
    $PASSWORD = $_ENV['MYSQL_ROOT_PASSWORD'];
} else {
    $PASSWORD = '';
}
if(!empty($_ENV['MYSQL_DB'])){
    $DB = $_ENV['MYSQL_DB'];
} else {
    $DB = 'raportlink_db';
}

/* Attempt to connect to MySQL database */
$link = mysqli_connect($HOST, $USER, $PASSWORD, $DB);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());    
}
?>