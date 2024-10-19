<?php
require 'vendor/autoload.php'; // Include Composer dependencies

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->hospital_db->users;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing
    $role = $_POST['role'];

    // Insert the user document into MongoDB
    $result = $collection->insertOne([
        'full_name' => $full_name,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'role' => $role
    ]);

    if ($result->getInsertedCount() > 0) {
        echo "Registration successful! <a href='login.html'>Login here</a>";
    } else {
        echo "Error: Could not register the user.";
    }
}
?>
