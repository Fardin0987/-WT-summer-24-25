<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savar College - Student Dashboard</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="navbar">
        <h1>Welcome, <?= htmlspecialchars($userProfile['full_name']) ?>!</h1>
        <div class="navbar-links">
            <a href="#attendance">Attendance</a>
            <a href="index.php?action=academic_calendar">Academic Calendar</a>
            <a href="#fees">Fees</a>
            <a href="index.php?action=profile">Manage Profile</a>
            <a href="index.php?action=logout">Log Out</a>
        </div>
    </div>
    <div class="container dashboard">
        <div class="card" id="attendance">
            <h3>Attendance</h3>
            <table>
                <thead>
                    <tr><th>Date</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php foreach($attendance as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['date']) ?></td>
                            <td><?= htmlspecialchars($record['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card" id="calendar">
            <h3>Academic Calendar</h3>
            <table>
                <thead>
                    <tr><th>Date</th><th>Event</th></tr>
                </thead>
                <tbody>
                    <?php foreach($calendar as $event): ?>
                        <tr>
                            <td><?= htmlspecialchars($event['event_date']) ?></td>
                            <td><?= htmlspecialchars($event['event_name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card" id="fees">
            <h3>Fees</h3>
            <table>
                <thead>
                    <tr><th>Due Date</th><th>Amount</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php foreach($fees as $fee): ?>
                        <tr>
                            <td><?= htmlspecialchars($fee['due_date']) ?></td>
                            <td>$<?= htmlspecialchars($fee['amount']) ?></td>
                            <td><?= htmlspecialchars($fee['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card" id="notes">
    <h3>Notes</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Uploaded By</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($notes)): ?>
                <?php foreach($notes as $note): ?>
                    <tr>
                        <td><?= htmlspecialchars($note['title']) ?></td>
                        <td><?= htmlspecialchars($note['teacher_name']) ?></td>
                        <td><a href="<?= htmlspecialchars($note['file_path']) ?>" download>Download</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No notes available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
    </div>
</body>
</html>