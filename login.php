<?php
if (isset($_GET['error']) || isset($_GET['success'])) {
    include 'error_handling.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login Pengguna</h1>
    </header>

    <main>
        <section>
            <form id="loginForm" action="backend/login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <p>Belum punya akun? <a href="register.php">Register di sini</a>.</p>
        </section>
    </main>
</body>
</html>
