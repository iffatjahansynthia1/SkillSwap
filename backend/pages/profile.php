<?php 
include_once '../includes/header.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please <a href='login.php'>login</a> to view your profile.</p>";
    include_once '../includes/footer.php';
    exit;
}

// Fetch user details from the database using $_SESSION['user_id']
// This is a placeholder example; you would normally query the DB.
echo "<h2>Profile</h2>";
echo "<p>Welcome, " . htmlspecialchars($_SESSION['user_name']) . "!</p>";
?>

<?php include_once '../includes/footer.php'; ?>
