<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="navbar">
        <h1>Change Password</h1>
        <div class="navbar-links">
            <a href="index.php?action=profile">Back to Profile</a>
            <a href="index.php?action=logout">Log Out</a>
        </div>
    </div>
    <div class="container">
        <?php if (isset($error)): ?>
            <p class="message error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <p class="message success">Password changed successfully!</p>
        <?php endif; ?>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="change_password">
            <input type="password" name="new_password" placeholder="New Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required><br>
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>