<?php

$dbServer = "localhost";
$dbName = "contactos";
$dbUsername = "root";
$dbPassword = "";
$conn = "";



try{
    $conn = mysqli_connect(
        $dbServer, 
        $dbUsername, 
        $dbPassword, 
        $dbName);
}catch(mysqli_sql_exception){
    echo "could not connect to sql";
}
