<?php
ob_start(); // Start output buffering
session_start();
include 'study_booking.php'; // Database connection

// Suppress error reporting for production
error_reporting(0);
ini_set('display_errors', 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter both username and password!'); 
        window.location.href='login.html';</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (trim($password) === trim($user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            header("Location: manage_reservation.html"); // Redirect
            exit(); // Don't forget the exit after header
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
ob_end_flush(); // Send output buffer and clean
?>
