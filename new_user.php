<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get the form data
       $username = $_POST["board_username"]
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Connect to the database (
        $pdo = new PDO("mysql:host=localhost;dbname=forum", "root", "php");

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?, ?)");

        // Bind the parameters and execute the statement
        $stmt->execute([$firstname, $lastname, $email, $password]);

        // Redirect to a success page
        header("Location: forum.php");
        exit();
    } catch (PDOException $e) {
        // Display any errors
        echo "Error: " . $e->getMessage();
    }
}
?>
?>
