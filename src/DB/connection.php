<?php

$servername = "financespa-mysql-1";
$username = "user";
$password = "user";
$dataBase = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dataBase);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";