<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$userName = $_SESSION["user_name"];
$lastLogin = "This is your first login.";

if (isset($_COOKIE["last_login"])) {
    $lastLogin = $_COOKIE["last_login"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Dashboard</h2>
    <p>Welcome, <strong><?php echo $userName; ?></strong></p>
    <p>Last Login Time: <?php echo $lastLogin; ?></p>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

</body>
</html>