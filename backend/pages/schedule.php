<?php include_once '../includes/header.php'; ?>
<h2>Schedule a Session</h2>

<form action="../functions/session.php" method="POST">
    <label for="partner_email">Partner Email:</label>
    <input type="email" id="partner_email" name="partner_email" required>
    
    <label for="scheduled_time">Scheduled Time:</label>
    <input type="datetime-local" id="scheduled_time" name="scheduled_time" required>
    
    <input type="submit" name="schedule_session" value="Schedule Session">
</form>

<?php include_once '../includes/footer.php'; ?>
