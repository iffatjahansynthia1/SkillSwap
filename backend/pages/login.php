<?php include_once '../includes/header.php'; ?>

<h2>Login</h2>
<form action="../functions/user.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" name="login" value="Login">
</form>

<?php include_once '../includes/footer.php'; ?>
