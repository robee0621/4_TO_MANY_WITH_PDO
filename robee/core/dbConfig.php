<?php
$host = "localhost";
$username = "root";
$password = "";  // Default for XAMPP
$dbname = "bar_management";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
