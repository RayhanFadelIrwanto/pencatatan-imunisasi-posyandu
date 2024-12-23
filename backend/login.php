<?php

require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header('Location: ../login.php?error=empty');
        exit;
    }

    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            header('Location: ../index.php');
            exit;
        } else {
            header('Location: ../login.php?error=invalid');
            exit;
        }
    } catch (PDOException $e) {
        header('Location: ../login.php?error=server');
        exit;
    }
} else {
    header('Location: ../login.php');
    exit;
}

?>
