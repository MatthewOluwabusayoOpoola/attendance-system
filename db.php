<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";

try{
    $conn = new PDO ("mysql:host=$servername;dbname=qr", $dBUsername, $dBPassword);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected succefully";
}
catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}