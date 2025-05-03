<?php
$userRouter->map('GET', '/', function() {
    render('user/dashboard');
});

$userRouter->map('GET', '/[i:id]', function($id) {
    require_once __DIR__ . '/../controller/UserController.php';
    showUserProfile($id);
});

$userRouter->map('GET', '/[i:id]/dashboard', function($id) {
    require_once __DIR__ . '/../controller/UserController.php';
    showDashboard($id);
});

// Authentifizierung

$userRouter->map('GET', '/login', function() {
    render('auth/login');
});

$userRouter->map('POST', '/login', function() {
    require_once __DIR__ . '/../controller/UserController.php';
    handleLogin();
});

$userRouter->map('GET', '/register', function() {
    render('auth/register');
});

$userRouter->map('POST', '/register', function() {
    require_once __DIR__ . '/../controller/UserController.php';
    handleRegister();
});

$userRouter->map('GET', '/logout', function() {
    session_destroy();
    header("Location: /");
    exit;
});
