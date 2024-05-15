<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
<button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#newPostModal">
    New Post
</button>

<a type="button" href="logout.php" class="btn btn-primary m-3"> Sign Out</a>

<!-- New Post modal -->
<div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPostModalLabel">New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="create_post.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" name="body" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
// Include your database connection file
include('db_connect.php');

// Fetch posts from the database
$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.userid = users.userid ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Display posts
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='card m-3'>";
    echo "<div class='card-header'>{$row['title']}</div>";
    echo "<div class='card-body'>{$row['body']}</div>";
    echo "<div class='card-footer'>Posted by {$row['username']} on {$row['created_at']}</div>";

    // Reply form
    echo "<div class='card-footer'>";
    echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#replyModal{$row['id']}'>Reply</button>";
    echo "</div>";

    echo "</div>";

    // Reply modal
    echo "<div class='modal fade' id='replyModal{$row['id']}' tabindex='-1' aria-labelledby='replyModalLabel{$row['id']}' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='replyModalLabel{$row['id']}'>Reply to Post</h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<form action='reply_post.php' method='post'>";
    echo "<input type='hidden' name='post_id' value='{$row['id']}'>";
    echo "<div class='mb-3'>";
    echo "<label for='body' class='form-label'>Reply</label>";
    echo "<textarea class='form-control' id='body' name='body' required></textarea>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Submit</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

<!-- Form to make a new post -->


</body>
</html>
