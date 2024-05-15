<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['user_auth'])) {
    // Your database connection code here
    $mysqli = new mysqli("localhost", "root", "root", "forum");

    // Check for errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $mysqli->prepare("SELECT userid, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Execute the SQL statement
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind the result to variables
        $stmt->bind_result($userid, $hashed_password);
        // Fetch the result
        $stmt->fetch();
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set the session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $username;
            // Redirect to the user's dashboard
            header("Location: forum.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }

    // Close the connection
    $stmt->close();
    $mysqli->close();
}
?>