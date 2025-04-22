<?php
// Database configuration
$servername = "localhost"; // Change if your DB is hosted elsewhere
$username = "root";        // Default XAMPP/MySQL username
$password = "";            // Default XAMPP/MySQL password (empty)
$database = "nextgen_food"; // Make sure this matches your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
