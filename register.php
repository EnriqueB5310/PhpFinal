<?php
 if (isset($_POST['register'])) {
$mysqli = new mysqli("localhost","root","root","forum");

if ($mysqli->connect_error) {die ("Connection failed: " . $mysqli->connect_error); }

$stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); $stmt->bind_param("sss", $username, $email, $password); 

$username = $_POST['username']; $email = $_POST['email']; $password = $_POST['password']; 

$password = password_hash($password, PASSWORD_DEFAULT); 

// Execute the SQL statement 
if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; } 

header("Location: login.php");

// Close the connection 
$stmt->close(); $mysqli->close(); 

}
?>
