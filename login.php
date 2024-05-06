<?php
session_start(); // Start the session at the beginning

$username = $_POST['username'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

// Regular expressions
$regexUsername = "/^[a-zA-Z][a-zA-Z0-9_-]{2,15}$/";
$regexPassword = "/^[A-Za-z\d]{6,}$/";

// Validate inputs
if (!preg_match($regexUsername, $username)) {
    die('Invalid name. Please use only letters and spaces.');
}
if (!preg_match($regexPassword, $password)) {
    die('Invalid password');
}

// Validate using prepared statements
$stmt = $conn->prepare("SELECT * FROM logintable WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Verify the password (assuming password column contains hashed passwords)
    if (password_verify($password, $row['password'])) {
        // Store user info in session
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];

        // Redirect based on usertype
        if ($row['usertype'] == 'admin') {
            header("Location: admin_display.php");
            exit();
        } elseif ($row['usertype'] == 'user') {
            header("Location: users_display.php");
            exit();
        }
    }
}

// echo "Invalid username or password";
?>