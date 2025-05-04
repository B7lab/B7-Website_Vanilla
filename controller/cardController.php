<?php
function showCards($id) {
    //session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $id) {
        header("Location: /login");
        exit;
    }

    $pdo = getDatabaseConnection();

    render('user/cards', [
        'title' => 'Trello Clone'
    ]);
}
