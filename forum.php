<!DOCTYPE html>
<html>
<head>
    <title>Message Board</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Message Board</h1>

        <!-- Post button -->
        <a href="create_post.php" class="btn btn-primary mb-3">Post</a>

        <!-- Display messages and replies -->
        <?php
        foreach ($messages as $message) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$message['title']}</h5>";
            echo "<p class='card-text'>{$message['body']}</p>";
            echo "<p class='text-muted'>Posted by: {$message['username']} on {$message['created_at']}</p>";

            // Reply form
            echo "<form action='reply.php' method='post'>";
            echo "<div class='mb-3'>";
            echo "<input type='hidden' name='post_id' value='{$message['id']}'>";
            echo "<label for='reply_body' class='form-label'>Reply</label>";
            echo "<textarea class='form-control' id='reply_body' name='reply_body' rows='3'></textarea>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Submit Reply</button>";
            echo "</form>";

            // Display replies
            if (!empty($message['replies'])) {
                echo "<ul class='list-group list-group-flush'>";
                foreach ($message['replies'] as $reply) {
                    echo "<li class='list-group-item'>{$reply['body']} - {$reply['username']} on {$reply['created_at']}</li>";
                }
                echo "</ul>";
            }

            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
