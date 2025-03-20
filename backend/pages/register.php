<?php include_once '../includes/header.php'; ?>

<h2>Register</h2>
<form action="../functions/user.php" method="POST">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="example@example.com" required>

    <label for="password">Password (5 digits):</label>
    <input type="password" id="password" name="password" pattern="\d{5}" title="Please enter a 5-digit password" required>

    <input type="submit" name="register" value="Register">
</form>

<?php include_once '../includes/footer.php'; ?>