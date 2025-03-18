<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['schedule_session'])) {
    // Schedule a new session
    if (!isset($_SESSION['user_id'])) {
        echo "Please log in to schedule a session.";
        exit;
    }
    $initiator_id = $_SESSION['user_id'];
    $partner_email = $_POST['partner_email'];
    $scheduled_time = $_POST['scheduled_time'];
    
    // Find partner by email
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->execute([$partner_email]);
    $partner = $stmt->fetch();
    
    if (!$partner) {
        echo "Partner not found.";
        exit;
    }
    $partner_id = $partner['user_id'];
    
    $stmt = $pdo->prepare("INSERT INTO sessions (initiator_id, partner_id, scheduled_time, status) VALUES (?, ?, ?, 'pending')");
    if ($stmt->execute([$initiator_id, $partner_id, $scheduled_time])) {
        header("Location: ../pages/schedule.php");
        exit;
    } else {
        echo "Failed to schedule session.";
    }
}

if (isset($_POST['submit_feedback'])) {
    // Submit feedback for a session
    if (!isset($_SESSION['user_id'])) {
        echo "Please log in to submit feedback.";
        exit;
    }
    $session_id = $_POST['session_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    
    $stmt = $pdo->prepare("INSERT INTO feedback (session_id, rating, comments) VALUES (?, ?, ?)");
    if ($stmt->execute([$session_id, $rating, $comments])) {
        header("Location: ../pages/feedback.php");
        exit;
    } else {
        echo "Failed to submit feedback.";
    }
}
?>
