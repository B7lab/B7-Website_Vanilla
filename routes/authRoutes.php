<?php

$authRouter->map('GET', '/login', function() {
    render('auth/login');
});

$authRouter->map('POST', '/login', function() {
    require_once __DIR__ . '/../controller/AuthController.php';
    handleLogin();
});

$authRouter->map('GET', '/register', function() {
    render('auth/register');
});

$authRouter->map('POST', '/register', function() {
    require_once __DIR__ . '/../controller/AuthController.php';
    handleRegister();
});

$authRouter->map('GET', '/logout', function() {
    session_destroy();
    header("Location: /");
    exit;
});