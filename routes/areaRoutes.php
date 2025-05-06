<?php

//  UNSERE VISION
$areaRouter->map('GET', '/vision', function() {
    render('area/vision');
});

// PROJEKT ERKUNDEN
$areaRouter->map('GET', '/projekt-erkunden', function() {
    render('area/projekt-erkunden');

});$areaRouter->map('GET', '/umbauarbeiten', function() {
    render('area/umbauarbeiten');
});

$areaRouter->map('GET', '/fotogalerie', function() {
    render('area/fotogalerie');
});

$areaRouter->map('GET', '/rundgang', function() {
    render('area/virtuellerRundgang');
});

//  VERANSTALTUNGEN
$areaRouter->map('GET', '/veranstaltungen', function() {
    render('area/veranstaltungen');
});

// PARTNER:INNEN
$areaRouter->map('GET', '/partner_innen', function() {
    render('area/partner_innen');
});

$areaRouter->map('GET', '/partner_innen/kystlys', function() {
    render('area/partner_innen/kystlys');
});


$areaRouter->map('GET', '/teaser5', function() {
    render('area/teaser5');
});