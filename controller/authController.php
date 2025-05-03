<?php

function handleRegister() {
    $pdo = getDatabaseConnection();

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$username || !$email || !$password) {
        echo "Alle Felder sind erforderlich.";
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "E-Mail wird bereits verwendet.";
        return;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO users (username, email, password_hash, joined_at)
        VALUES (?, ?, ?, CURDATE())
    ");
    $stmt->execute([$username, $email, $passwordHash]);

    echo "Registrierung erfolgreich. <a href='/auth/login'>Jetzt einloggen</a>";
}

function handleLogin() {
    $pdo = getDatabaseConnection();

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        echo "Bitte E-Mail und Passwort eingeben.";
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: /user/{$user['id']}/dashboard");
        exit;
    } else {
        echo "Login fehlgeschlagen.";
    }
}
