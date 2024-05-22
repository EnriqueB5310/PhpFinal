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
session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    // If not set, redirect to the login page
    header('Location: login.php');
    // Ensure no further code is executed after the redirect
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Board</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: hsl(218, 41%, 15%);
           
        }


    </style>
</head>
<body>

<section class="background-radial-gradient">
    <h1 class="text-white text-center">Signed in as: <?php echo htmlspecialchars($username); ?></h1> 

    <div class="container d-flex justify-content-center">
        <div class="row">
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#newPostModal">
                New Post
            </button>
            <a type="button" href="logout.php" class="btn btn-danger m-3"> Sign Out</a>
        </div>
    </div>

    <!-- New Post Modal -->
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
        echo "<div class='container'>";
        echo "<div class='card m-3 bg-glass'>";
        echo "<div class='card-header font-weight-bold'><h4>{$row['username']}: {$row['title']}</h4></div>";
        echo "<div class='card-body'>{$row['body']}</div>";
        echo "<div class='card-footer d-flex justify-content-between'>";
        echo "<div>Posted on {$row['created_at']}</div>";

        // Like button
        echo "<form action='likes.php' method='post'>";
        echo "<input type='hidden' name='post_id' value='{$row['id']}'>";
        echo "<button type='submit' class='btn btn-success'>Like ({$row['likes_count']})</button>";
        echo "</form>";
        echo "</div>";

        // Display replies
        $post_id = $row['id'];
        $sql_replies = "SELECT comments.*, users.username AS commenter FROM comments JOIN users ON comments.userid_commenting = users.userid WHERE post_id = $post_id ORDER BY created_at";
        $result_replies = mysqli_query($conn, $sql_replies);

        echo "<div class='card-footer font-weight-bold'><h6>Replies:</h6></div>";
        echo "<ul class='list-group list-group-flush'>";
        while ($reply = mysqli_fetch_assoc($result_replies)) {
            echo "<li class='list-group-item'><p>{$reply['commenter']}: {$reply['body']} ({$reply['created_at']})<p></li>";
        }
        echo "</ul>";

        // Reply form
        echo "<div class='card-footer'>";
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
    }
    ?>
</section>

</section>
</body>
</html>
