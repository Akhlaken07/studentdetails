<?php
session_start(); // Start the session
echo "<br>session_id(): ".session_id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
<h1>Student Details</h1> 
    <a href="logout.php" style="
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#e53935'" onmouseout="this.style.backgroundColor='#f44336'">
        Logout
    </a><br><br>
</body>
</html>

<?php 
        $conn = new mysqli("localhost", "root", "", "test");

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            // Delete the record with this ID from the database
            $sql = "DELETE FROM studdetails WHERE id=$id";
            $conn->query($sql);
        }

        $sql = "SELECT id, name, matricno, cAddress, hAddress, email, hPhone, mPhone,password FROM studdetails";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tr><th>ID</th><th>Name</th><th>Matric No</th><th>Current Address</th><th>Home Address</th><th>Email</th><th>Home Phone</th><th>Mobile Phone</th><th>Password</th><th>Delete</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["matricno"]."</td><td>".$row["cAddress"]."</td><td>".$row["hAddress"]."</td><td>".$row["email"]."</td><td>".$row["hPhone"]."</td><td>".$row["mPhone"]."</td><td>".$row["password"]."</td>";
            echo "<td><form method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='delete' value='Delete'></form></td></tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>