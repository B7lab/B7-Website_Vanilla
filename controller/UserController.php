<?php

function showUserProfile($id) {
    $pdo = getDatabaseConnection();

    // Nutzer laden
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(404);
        echo "Benutzer nicht gefunden.";
        return;
    }

    // Fähigkeiten ("superpowers")
    $stmt = $pdo->prepare("
        SELECT s.name 
        FROM skills s
        JOIN user_skills us ON s.id = us.skill_id
        WHERE us.user_id = :id
    ");
    $stmt->execute(['id' => $id]);
    $skills = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Eingebrachtes
    $stmt = $pdo->prepare("
        SELECT c.name, c.description, c.category 
        FROM contributions c
        JOIN user_contributions uc ON c.id = uc.contribution_id
        WHERE uc.user_id = :id
    ");
    $stmt->execute(['id' => $id]);
    $contributions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    render('user/profile', [
        'title' => 'Benutzerprofil',
        'user' => $user,
        'skills' => $skills,
        'contributions' => $contributions
    ]);
}

function showDashboard($id) {
    //session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $id) {
        header("Location: /login");
        exit;
    }

    $pdo = getDatabaseConnection();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Benutzer nicht gefunden.");
    }

    // Termine des Nutzers laden
    $stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY start ASC");
    $stmt->execute([$id]);
    $appointments = $stmt->fetch(PDO::FETCH_ASSOC);

    render('user/dashboard', [
        'title' => 'Benutzerprofil',
        'user' => $user,
        'appointments' => $appointments
    ]);
}


function showInventar($id) {
    //session_start();
    /*if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $id) {
        header("Location: /login");
        exit;
    }*/

    $pdo = getDatabaseConnection();

    $stmt = $pdo->prepare("    
            SELECT ii.id, c.name AS item_name, ii.condition, ii.location, ii.quantity,
            io.offer_type, io.price, io.rental_period, io.available_from, io.available_until
            FROM inventory_items ii
            LEFT JOIN contributions c ON ii.contribution_id = c.id
            LEFT JOIN item_offers io ON ii.id = io.item_id
            WHERE ii.owner_id = :user_id"
    );
    $stmt->execute(['user_id' => 1]);
    $inventory = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$inventory) {
        die("Benutzer nicht gefunden.");
    }

    render('user/inventar', [
        'title' => 'Benutzerprofil',
        'inventory' => $inventory
    ]);
}





// Authentifizierung

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

    echo "Registrierung erfolgreich. <a href='/user/login'>Jetzt einloggen</a>";
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
