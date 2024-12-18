<?php
// Database connection configuration
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'user_registration';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>