<?php include_once '../includes/header.php'; ?>
<h2>Manage Your Skills</h2>

<!-- Form to add a new skill -->
<form action="../functions/user.php" method="POST">
    <label for="skill">Add Skill:</label>
    <input type="text" id="skill" name="skill" required>
    
    <label for="skill_type">Skill Type:</label>
    <select name="skill_type">
        <option value="offered">Offered</option>
        <option value="desired">Desired</option>
    </select>
    
    <input type="submit" name="add_skill" value="Add Skill">
</form>

<!-- Placeholder: Display user's skills -->
<?php
// Ideally, query the database to fetch and display the logged-in user's skills.
echo "<p>Your skills will appear here.</p>";
?>

<?php include_once '../includes/footer.php'; ?>
