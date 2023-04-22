<?php

echo("Welcome to database <br>");

$servername = "localhost";
$username = "root";
$password = "";
$dsn= "shop";
$conn = mysqli_connect($servername, $username, $password, $dsn);

if(!$conn){
    die("Sorry ,failed to connect:  " . mysqli_connect_error());
}
else{
echo("connection was successful!!");
}
?>