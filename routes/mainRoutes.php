<?php
$mainRouter->map('GET', '/', function() {
    render('main/home');
});

$mainRouter->map('GET', '/kontakt', function() {
    render('main/kontakt');
});

$mainRouter->map('GET', '/impressum', function() {
    render('main/impressum');
});

$mainRouter->map('GET', '/datenschutz', function() {
    render('main/datenschutz');
});

$mainRouter->map('GET', '/mitglied-werden', function() {
    render('main/mitglied-werden');
});

$mainRouter->map('GET', '/spenden', function() {
    render('main/spenden');
});
