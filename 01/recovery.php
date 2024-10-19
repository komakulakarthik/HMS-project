<?php
require 'vendor/autoload.php'; // Use if using external libraries like PHPMailer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Dummy logic: Check if email exists (In real apps, query MongoDB/MySQL)
    $existing_users = ['user1@example.com', 'user2@example.com']; // Simulate users

    if (in_array($email, $existing_users)) {
        // Simulate sending an email (In real apps, use PHPMailer or SMTP)
        echo "A password reset link has been sent to: " . htmlspecialchars($email);
    } else {
        echo "No account found with that email.";
    }
}
?>
