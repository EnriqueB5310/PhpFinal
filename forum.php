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
    echo "</div>";
}
?>

<!-- Form to make a new post -->
<div class="card m-3">
    <div class="card-header">New Post</div>
    <div class="card-body">
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

</body>
</html>
