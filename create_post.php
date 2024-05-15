<?php
session_start();
include('db_connect.php');

if (isset($_SESSION['userid']) && isset($_POST['title']) && isset($_POST['body'])) {
    $userid = $_SESSION['userid'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "INSERT INTO posts (title, body, userid) VALUES ('$title', '$body', '$userid')";
    mysqli_query($conn, $sql);

    header("Location: forum.php");
    exit;
} else {
    echo "Error creating post.";
}
?>
