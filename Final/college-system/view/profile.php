<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="navbar">
        <h1>My Profile</h1>
        <div class="navbar-links">
            <a href="index.php?action=dashboard">Dashboard</a>
            <a href="index.php?action=logout">Log Out</a>
        </div>
    </div>
    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <p class="message success">Profile updated successfully!</p>
        <?php endif; ?>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="update_profile">
            <label>Full Name:</label>
            <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
            <button type="submit">Update Profile</button>
        </form>
        <p><a href="index.php?action=change_password_page">Change Password</a></p>
    </div>
</body>
</html>