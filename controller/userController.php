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
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
    echo '<pre>';
    var_dump($appointments);
    echo '</pre>';
*/
    render('user/dashboard', [
        'user' => $user,
        'appointments' => $appointments
    ]);
}


