<?php
$areaRouter->map('GET', '/vision', function() {
    render('area/vision');
});

$areaRouter->map('GET', '/umbauarbeiten', function() {
    render('area/umbauarbeiten');
});

$areaRouter->map('GET', '/veranstaltungen', function() {
    render('area/veranstaltungen');
});

$areaRouter->map('GET', '/fotogalerie', function() {
    render('area/fotogalerie');
});

$areaRouter->map('GET', '/teaser5', function() {
    render('area/teaser5');
});

$areaRouter->map('GET', '/kooperationspartner_innen', function() {
    render('area/kooperationspartner_innen');
});

$areaRouter->map('GET', '/rundgang', function() {
    render('area/virtuellerRundgang');
});
