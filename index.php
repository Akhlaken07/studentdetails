<?php
session_start();
 $conn = new mysqli('localhost','root','','test');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT usertype FROM logintable WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($row['usertype'] == 'admin') {
            header("Location: admin_display.php"); 
            exit();
        } elseif ($row['usertype'] == 'user') {
            header("Location: users_display.php"); 
            exit();
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
    
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form id="loginaccess" action="#" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" pattern="[a-zA-Z][a-zA-Z0-9_-]{2,15}$" title="Follow Format"><br><br>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" pattern="[A-Za-z\d]{6,}" title="Must be at least 6 characters"><br><br>
        </div>
        <input type="submit" name="login" value="Login">
    </form>
    <script src="patternregexlogin.js"></script>
</body>
</html>