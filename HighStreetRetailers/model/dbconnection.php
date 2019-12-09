<?php

$servername = "db5000238781.hosting-data.io";
$username = "dbu302787";
$password = "Kay213Ty!";
$dbname = "dbs233190";
//Remove password before submitting

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>