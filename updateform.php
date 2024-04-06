<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "test");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if update or delete request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM studdetails WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
        //echo "Name: <input type='text' name='name' value='".$row["name"]."'><br>";
        echo "Matric No: <input type='text' name='matricno' value='".$row["matricno"]."'><br>";
        echo "Current Address: <input type='text' name='cAddress' value='".$row["cAddress"]."'><br>";
        echo "Home Address: <input type='text' name='hAddress' value='".$row["hAddress"]."'><br>";
        echo "Email: <input type='text' name='email' value='".$row["email"]."'><br>";
        echo "Home Phone: <input type='text' name='hPhone' value='".$row["hPhone"]."'><br>";
        echo "Mobile Phone: <input type='text' name='mPhone' value='".$row["mPhone"]."'><br>";
        echo "<input type='submit' name='submit_update' value='Update'>";
        echo "</form>";
    } 

    // Check if form is submitted to update data
    if (isset($_POST['submit_update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $matricno = $_POST['matricno'];
        $cAddress = $_POST['cAddress'];
        $hAddress = $_POST['hAddress'];
        $email = $_POST['email'];
        $hPhone = $_POST['hPhone'];
        $mPhone = $_POST['mPhone'];

        $sql = "UPDATE studdetails SET name='$name', matricno='$matricno', cAddress='$cAddress', hAddress='$hAddress', email='$email', hPhone='$hPhone', mPhone='$mPhone' WHERE id=$id";
        $conn->query($sql);

        // Redirect to display.php
        header("Location: studentregister.php");
        exit;
    }
}

$conn->close();
?>