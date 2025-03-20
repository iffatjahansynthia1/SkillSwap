<?php include_once '../includes/header.php'; ?>

<h2>Login</h2>
<form action="../functions/user.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required placeholder="example@email.com">
    
    <label for="password">Password :</label>
    <input type="text" id="password" name="password" required pattern="\d{5}" title="Password must be a 5-digit PIN">
    
    <input type="submit" name="login" value="Login">
</form>

<?php include_once '../includes/footer.php'; ?>
