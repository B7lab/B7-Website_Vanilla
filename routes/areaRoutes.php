<?php
$areaRouter->map('GET', '/vision', function() {
    render('pages/vision');
});

$areaRouter->map('GET', '/umbauarbeiten', function() {
    render('pages/umbauarbeiten');
});

$areaRouter->map('GET', '/veranstaltungen', function() {
    render('pages/veranstaltungen');
});

$areaRouter->map('GET', '/fotogalerie', function() {
    render('pages/fotogalerie');
});

$areaRouter->map('GET', '/teaser5', function() {
    render('pages/teaser5');
});

$areaRouter->map('GET', '/kooperationspartner_innen', function() {
    render('pages/kooperationspartner_innen');
});
