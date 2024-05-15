<?php
session_start();

// Unset specific session variables
unset($_SESSION['loggedin']);
unset($_SESSION['userid']);
unset($_SESSION['username']);

// Redirect to the index page
header("Location: index.php");
exit;
?>