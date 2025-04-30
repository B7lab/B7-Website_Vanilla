<?php
$router->map('GET', '/', function() {
    render('pages/home');
});

$router->map('GET', '/kontakt', function() {
    render('pages/kontakt');
});

$router->map('GET', '/user/[i:id]', function($id) {
    render('pages/user');
});

$router->map('GET', '/impressum', function() {
    render('pages/impressum');
});

$router->map('GET', '/datenschutz', function() {
    render('pages/datenschutz');
});
