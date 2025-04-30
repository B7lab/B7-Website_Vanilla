<?php
$mainRouter->map('GET', '/', function() {
    render('main/home');
});

$mainRouter->map('GET', '/kontakt', function() {
    render('main/kontakt');
});

$mainRouter->map('GET', '/user/[i:id]', function($id) {
    render('main/user');
});

$mainRouter->map('GET', '/impressum', function() {
    render('main/impressum');
});

$mainRouter->map('GET', '/datenschutz', function() {
    render('main/datenschutz');
});
