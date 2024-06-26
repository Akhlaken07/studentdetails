<?php
$name = $_POST['name'];
$matricno = $_POST['matricno'];
$cAddress = $_POST['cAddress'];
$hAddress = $_POST['hAddress'];
$email = $_POST['email'];
$hPhone = $_POST['hPhone'];
$mPhone = $_POST['mPhone'];
$password = $_POST['password'];

$hash_pass = password_hash($password, PASSWORD_DEFAULT);

// Regular expressions
$regexName = "/^[A-Za-z].{1,}/";
$regexMatricno = "/^[0-9].{6,}/";
$regexAddress = "/^[a-zA-Z0-9\s,.'-]{3,}$/";
$regexEmail = "/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z0-9]+$/";
$regexPhone = "/^[0-9].{9,}$/";
$regexPassword = "/^[A-Za-z\d]{6,}/";

// Validate inputs
if (!preg_match($regexName, $name)) {
    echo 'Invalid name. Please use only letters and spaces.';
}
if (!preg_match($regexMatricno, $matricno)) {
    echo 'Invalid matric number. Please use only numbers.';
}
if (!preg_match($regexAddress, $cAddress)) {
    echo 'Invalid current address. Please use address format.';
}
if (!preg_match($regexAddress, $hAddress)) {
    echo 'Invalid home address. Please use address format.';
}
if (!preg_match($regexEmail, $email)) {
    echo 'Invalid email. Please use email format.';
}
if (!preg_match($regexPhone, $hPhone)) {
    echo 'Invalid home phone number. Please use only numbers.';
}
if (!preg_match($regexPhone, $mPhone)) {
    echo 'Invalid mobile phone number. Please use only numbers.';
}
if (!preg_match($regexPassword, $password)) {
    echo 'Invalid password. Please use at least 6 characters.';
}

//Database connection
$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO studdetails(name, matricno, cAddress, hAddress, email, hPhone, mPhone,password) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssssss", $name, $matricno, $cAddress, $hAddress, $email, $hPhone, $mPhone,$hash_pass);
    $stmt->execute();
    header("Location: studentregister.php");
    $stmt->close();
    $conn->close();
}
?>