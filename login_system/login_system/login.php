<?php
session_start();
include("db.php");

$message = "";

// Get saved email from cookie
$savedEmail = "";
if (isset($_COOKIE["user_email"])) {
    $savedEmail = $_COOKIE["user_email"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user["password"])) {
                // Store session
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];

                // Store email in cookie for auto-fill next time
                setcookie("user_email", $user["email"], time() + (86400 * 30), "/");

                // Store last login time cookie
                $lastLogin = date("Y-m-d h:i:s A");
                setcookie("last_login", $lastLogin, time() + (86400 * 30), "/");

                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Incorrect password.";
            }
        } else {
            $message = "Email not found.";
        }
    } else {
        $message = "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login Page</h2>

    <?php if (!empty($message)) { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $savedEmail; ?>" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>Do not have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>