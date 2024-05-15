<?php
session_start();
include('db_connect.php');

if (isset($_SESSION['userid']) && isset($_POST['post_id']) && isset($_POST['body'])) {
    $userid = $_SESSION['userid'];
    $post_id = $_POST['post_id'];
    $body = $_POST['body'];

    $sql = "INSERT INTO comments (userid_commenting, body, post_id) VALUES ('$userid', '$body', '$post_id')";
    mysqli_query($conn, $sql);

    header("Location: forum.php");
    exit;
} else {
    echo "Error replying to post.";
}
?>
