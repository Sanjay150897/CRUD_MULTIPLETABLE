<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
// set the PDO error mode to exception
try{
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>