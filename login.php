
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    
    <form action="user_auth.php" method="post">
        <label for="username">Username:</label>
        <input userid="username" name="username" required="" type="text" /><br>
        <label for="password">Password:</label>
        <input userid="password" name="password" required="" type="password" /><br>
        <input name="user_auth" type="submit" value="Login" />
    </form>
</body>

</html>
