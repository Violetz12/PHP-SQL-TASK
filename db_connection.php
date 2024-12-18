<?php
// XAMPP Default Database Connection Configuration
$host = 'localhost';
$username = 'root';
$password = ''; // Empty string for XAMPP default setup
$database = 'user_registration';

// Create connection
try {
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database Connection Error: " . $e->getMessage());
}
?>