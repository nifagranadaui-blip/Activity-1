<?php

$host = "localhost";
$dbname = "secure_app";
$username = "root";
$password = "";

try {

    // Create database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Enable exception mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // User input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Secure prepared statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");

    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "User found";
    } else {
        echo "Invalid login";
    }

} catch (PDOException $e) {

    echo "Database error: " . $e->getMessage();

}

?>
