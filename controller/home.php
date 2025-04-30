<?php

    $template = $twig->load('pages/home.twig');
    echo $template->render([
        'title' => 'Startseite',
        'name' => 'Max',
        'content' => '<p>Willkommen auf der Startseite!</p>'
    ]);