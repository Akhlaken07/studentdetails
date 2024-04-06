<?php

$username = $_POST['username'];
$password = $_POST['password'];

//Database connection
$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}

// Regular expressions
$regexUsername = "/^[a-zA-Z][a-zA-Z0-9_-]{2,15}$/";
$regexPassword = "/^[A-Za-z\d]{6,}$/";

// Validate inputs
if (!preg_match($regexUsername, $username)) {
    echo 'Invalid name. Please use only letters and spaces.';
}
if (!preg_match($regexPassword, $password)) {
    echo 'Invalid password';
}

//validate
$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

$result = $conn->query($query);

if ($result->num_rows == 1) {
    header("Location: studentregister.php");
} else {
    echo 'Login failed';
}

?>