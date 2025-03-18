<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['register'])) {
    // Registration
    $name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (user_name, email, password, role) VALUES (?, ?, ?, 'user')");
    if ($stmt->execute([$name, $email, $password])) {
        header("Location: ../pages/login.php");
        exit;
    } else {
        echo "Registration failed.";
    }
}

if (isset($_POST['login'])) {
    // Login
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        header("Location: ../pages/profile.php");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}

if (isset($_POST['add_skill'])) {
    // Adding a new skill
    if (!isset($_SESSION['user_id'])) {
        echo "You must be logged in to add skills.";
        exit;
    }
    $skill = $_POST['skill'];
    $skill_type = $_POST['skill_type'];
    
    // Check if the skill exists in the skills table
    $stmt = $pdo->prepare("SELECT skill_id FROM skills WHERE skill_name = ?");
    $stmt->execute([$skill]);
    $skillData = $stmt->fetch();
    if ($skillData) {
        $skill_id = $skillData['skill_id'];
    } else {
        // Insert new skill into skills table
        $stmt = $pdo->prepare("INSERT INTO skills (skill_name) VALUES (?)");
        $stmt->execute([$skill]);
        $skill_id = $pdo->lastInsertId();
    }
    
    // Insert into userskills
    $stmt = $pdo->prepare("INSERT INTO userskills (user_id, skill_id, skill_type) VALUES (?, ?, ?)");
    if ($stmt->execute([$_SESSION['user_id'], $skill_id, $skill_type])) {
        header("Location: ../pages/skills.php");
        exit;
    } else {
        echo "Failed to add skill.";
    }
}
?>
