<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savar College - Login</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/login_background.css">
</head>
<body>
    <div class="container">
        <h1>Savar College</h1>
        <h2>Login to your account.</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Log In</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="message error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <p>Don't have an account? <a href="index.php?action=signup_page">Sign Up</a></p>
    </div>
</body>
</html>