<?php include_once '../includes/header.php'; ?>
<h2>Submit Feedback</h2>

<form action="../functions/session.php" method="POST">
    <label for="session_id">Session ID:</label>
    <input type="number" id="session_id" name="session_id" required>
    
    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    
    <label for="comments">Comments:</label>
    <textarea id="comments" name="comments"></textarea>
    
    <input type="submit" name="submit_feedback" value="Submit Feedback">
</form>

<?php include_once '../includes/footer.php'; ?>
