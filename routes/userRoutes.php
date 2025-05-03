<?php
$userRouter->map('GET', '/', function() {
    render('user/dashboard');
});

$userRouter->map('GET', '/[i:id]', function($id) {
    require_once __DIR__ . '/../controller/UserController.php';
    showUserProfile($id);
});