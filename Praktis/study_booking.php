<?php
$servername = "localhost";
$username = "root";  // Default for XAMPP
$password = "";  // Fixed: removed the space before empty string
$database = "study_booking"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Removed the debug message that was breaking your page
?>