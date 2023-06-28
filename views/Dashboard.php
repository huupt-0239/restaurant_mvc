<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Retrieve user information from the session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['username']; ?>!</h1>

    <h2>User Information</h2>
    <p>Name: <?php echo $user['username']; ?></p>
    <p>User ID: <?php echo $user['id']; ?></p>

    <!-- Add more information as needed -->

    <a href="logout.php">Logout</a>
</body>
</html>
