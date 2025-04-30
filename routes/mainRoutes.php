<?php
$mainRouter->map('GET', '/', function() {
    render('pages/home');
});

$mainRouter->map('GET', '/kontakt', function() {
    render('pages/kontakt');
});

$mainRouter->map('GET', '/user/[i:id]', function($id) {
    render('pages/user');
});

$mainRouter->map('GET', '/impressum', function() {
    render('pages/impressum');
});

$mainRouter->map('GET', '/datenschutz', function() {
    render('pages/datenschutz');
});
