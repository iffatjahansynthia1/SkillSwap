<?php include_once '../includes/header.php'; ?>

<h2>Register</h2>
<form action="../functions/user.php" method="POST">
    <label for="user_name">Name:</label>
    <input type="text" id="user_name" name="user_name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" name="register" value="Register">
</form>

<?php include_once '../includes/footer.php'; ?>
