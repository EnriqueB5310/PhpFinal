
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<section class="background-radial-gradient overflow-hidden">
  <style>
    body {
      background-color: hsl(218, 41%, 15%);
    }
  </style>



<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card bg-light text-black" style="width: 24rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form action="user_auth.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input id="username" class="form-control" name="username" required type="text">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input id="password" class="form-control" name="password" required type="password">
                </div>
                <div class="d-grid">
                    <button type="submit" name="user_auth" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>




</body>

</html>
