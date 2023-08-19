<?php
$servername = "localhost";
$username = "root";
$password = "";
$tablename = "music player";

// Create connection
$conn = new mysqli($servername, $username, $password, $tablename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>