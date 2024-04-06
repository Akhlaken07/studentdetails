<?php
    session_start();
    //Database connection
    $conn = new mysqli('localhost','root','','test');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }

    header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
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
    <form id="loginaccess" action="login.php" method="post">
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
    <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //validate
            $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
            $result = $conn->query($query);
            if ($result->num_rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: studentregister.php");
            } else {
                echo 'Login failed';
            }
        }
    ?>
</body>
</html>