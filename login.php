<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    if (!empty($username)) {
        // Redirect to the quiz page with the username as a query parameter
        header("Location: quiz.php?username=" . urlencode($username));
        exit;
    } else {
        $error = "Please enter a username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Enter Your Username</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Your Username" required>
        <input type="submit" value="Start Quiz">
    </form>
</body>
</html>
