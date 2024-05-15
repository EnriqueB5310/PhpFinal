<?php
ob_start();
session_start();

if (isset($_POST['user_auth'])) {
    $mysqli = new mysqli("localhost", "root", "root", "forum");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;

            header("Location: index.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
    $mysqli->close();

}
ob_end_clean(); // Clean the output buffer
?>