<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        header('Location: ../register.php?error=empty');
        exit;
    }

    if ($password !== $confirmPassword) {
        header('Location: ../register.php?error=mismatch');
        exit;
    }

    try {
        // Check if username exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            header('Location: ../register.php?error=exists');
            exit;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        header('Location: ../login.html?success=registered');
        exit;
    } catch (PDOException $e) {
        header('Location: ../register.php?error=server');
        exit;
    }
} else {
    header('Location: ../register.php');
    exit;
}

?>
