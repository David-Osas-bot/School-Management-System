<?php

 $config = [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "database" => "sms_db"
 ];

 $conn = new mysqli(
    $config["host"],
    $config["username"],
    $config["password"],
    $config["database"]
 );

 if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
 }
?>