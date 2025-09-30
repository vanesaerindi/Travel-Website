<?php
// config.example.php
// Copy this file to config.php and update with your real database details.
// Do NOT upload config.php to GitHub.

// Database connection settings
$host = "localhost";   // usually "localhost"
$user = "root";        // default XAMPP/WAMP MySQL username
$pass = "";            // leave empty if you didn't set a MySQL password
$dbname = "travel_db"; // name of your database

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>