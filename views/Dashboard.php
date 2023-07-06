<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../controllers/RememberTokenController.php");
// Retrieve user information from the session
$user = $_SESSION['user'];
if(!$user) {
    if(!$rememberTokenController->isUserLoggedIn()) {
        header("Location: ?mod=auth&act=viewLogin");
    } else {
        header("Refresh:0");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome, <?php echo $user['name']; ?>!</h1>

    <h2>User Information</h2>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Name: <?php echo $user['name']; ?></p>
    <p>User ID: <?php echo $user['id']; ?></p>

    <!-- Add more information as needed -->
    <form action="../controllers/UserController.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>