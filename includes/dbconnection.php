<?php

$servername = "https://cafehouse.onrender.com/";
$username = "root";
$password = "";
$database = "college_project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional success message
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Display error message
    echo "Connection failed: " . $e->getMessage();
}
