<?php

function showUserProfile($id) {
    $pdo = getDatabaseConnection();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(404);
        echo "Benutzer nicht gefunden.";
        return;
    }

    render('main/user', [
        'title' => 'Benutzerprofil',
        'user' => $user
    ]);
}
