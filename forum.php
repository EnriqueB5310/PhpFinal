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
<style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>


<section class="background-radial-gradient">
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

    // Display replies
    $post_id = $row['id'];
    $sql_replies = "SELECT comments.*, users.username AS commenter FROM comments JOIN users ON comments.userid_commenting = users.userid WHERE post_id = $post_id ORDER BY created_at";
    $result_replies = mysqli_query($conn, $sql_replies);

    echo "<div class='card-footer'>Replies:</div>";
    echo "<ul class='list-group list-group-flush'>";
    while ($reply = mysqli_fetch_assoc($result_replies)) {
        echo "<li class='list-group-item'>{$reply['commenter']}: {$reply['body']} ({$reply['created_at']})</li>";
    }
    echo "</ul>";
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
}
?>

<!-- Form to make a new post -->

</section>
</body>
</html>
