<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Connect to the database (
    $pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");

    // Bind the parameters and execute the statement
    $stmt->execute([$firstname, $lastname, $email, $password]);

    // Redirect to a success page
    header("Location: success.php");
    exit();
}
?>
