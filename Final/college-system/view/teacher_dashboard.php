<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savar College - Teacher Dashboard</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="navbar">
        <h1>Welcome, <?php echo isset($userProfile['full_name']) ? htmlspecialchars($userProfile['full_name']) : 'Teacher'; ?>!</h1>
        <div class="navbar-links">
            <a href="#students">Students</a>
            <a href="#notes-upload">Upload Notes</a>
            <a href="index.php?action=profile">Manage Profile</a>
            <a href="index.php?action=logout">Log Out</a>
        </div>
    </div>
    <div class="container dashboard">
        <?php if (isset($_GET['status']) && $_GET['status'] === 'upload_success'): ?>
            <p class="message success">Notes uploaded successfully!</p>
        <?php endif; ?>
        <div class="card" id="students">
            <h3>My Students</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    if (isset($students) && is_array($students) && !empty($students)): 
                    ?>
                        <?php foreach($students as $student): ?>
                            <tr>
                                <td><?= isset($student['user_id']) ? htmlspecialchars($student['user_id']) : 'N/A'; ?></td>
                                <td><?= isset($student['full_name']) ? htmlspecialchars($student['full_name']) : 'N/A'; ?></td>
                                <td><?= isset($student['email']) ? htmlspecialchars($student['email']) : 'N/A'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card" id="notes-upload">
            <h3>Upload New Notes</h3>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="upload_notes">
                <label>Note Title:</label>
                <input type="text" name="note_title" required>
                <label>Select File:</label>
                <input type="file" name="note_file" required>
                <button type="submit">Upload Notes</button>
            </form>
        </div>
    </div>
</body>
</html>