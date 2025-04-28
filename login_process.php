<?php
session_start();

// Hardcoded username and password
$correct_username = "admin";
$correct_password = "admin123";

// Get input
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password are correct
if ($username === $correct_username && $password === $correct_password) {
    $_SESSION['username'] = $username; // Set session variable
    header("Location: secured.php");   // Redirect to secured page
    exit();
} else {
    header("Location: login.php");     // Redirect back to login page
    exit();
}
?>
