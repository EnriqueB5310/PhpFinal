<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$userid = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {
    $post_id = intval($_POST['post_id']);

    // Check if the user already liked this post
    $sql_check = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('ii', $post_id, $userid);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows == 0) {
        // If not liked already, insert a new like and update the likes_count
        $sql_insert = "INSERT INTO likes (post_id, user_id) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param('ii', $post_id, $userid);
        $stmt_insert->execute();

        $sql_update = "UPDATE posts SET likes_count = likes_count + 1 WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('i', $post_id);
        $stmt_update->execute();
    }

    // Redirect back to the page that displays posts
    header('Location: forum.php');
    exit();
} else {
    // Handle the case where the request method is not POST or post_id is not set
    header('Location: forum.php');
    exit();
}
?>
