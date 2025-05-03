<?php
// File: controllers/ShopController.php

require_once 'models/ShopItem.php';
require_once 'models/B7Credit.php';

function showCalendar($id) {
    //session_start();
    /*if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $id) {
        header("Location: /login");
        exit;
    }*/

    $pdo = getDatabaseConnection();

    render('user/calendar', [
        'title' => 'Kalender',
    ]);
}

