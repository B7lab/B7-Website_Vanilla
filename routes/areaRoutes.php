<?php
$router->map('GET', '/vision', function() {
    render('pages/vision');
});

$router->map('GET', '/umbauarbeiten', function() {
    render('pages/umbauarbeiten');
});

$router->map('GET', '/veranstaltungen', function() {
    render('pages/veranstaltungen');
});

$router->map('GET', '/fotogalerie', function() {
    render('pages/fotogalerie');
});

$router->map('GET', '/teaser5', function() {
    render('pages/teaser5');
});

$router->map('GET', '/kooperationspartner_innen', function() {
    render('pages/kooperationspartner_innen');
});
