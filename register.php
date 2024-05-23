<?php
if (isset($_POST['register'])) {
    // Create a new MySQLi object for database connection
    $mysqli = new mysqli("localhost", "root", "", "forum");

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Sanitize and validate user input
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Hash the password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL statement with placeholders
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $mysqli->error);
    }

    // Bind parameters to the SQL query
    $stmt->bind_param("sss", $username, $email, $password_hashed);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "New account created successfully!";
        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $mysqli->close();
}
?>
