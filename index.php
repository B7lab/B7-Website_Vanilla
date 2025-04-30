<?php

require_once __DIR__ . '/vendor/autoload.php';



function render($view, $data = []) {
    extract($data); // Macht $title, $name, etc. aus dem Array
    $viewFile = __DIR__ . "/views/$view.php";
    
    if (!file_exists($viewFile)) {
        http_response_code(500);
        echo "View $view nicht gefunden";
        return;
    }

    // Optional: Layout einbinden
    include __DIR__ . "/views/template/layout.php";
}

$router = new AltoRouter();

$router->setBasePath('');

// ROUTING

// 
// Default routes
// 

$router->map('GET', '/', function() {
    render('pages/home');
});

$router->map('GET', '/kontakt', function() {
    render('pages/kontakt');
});

$router->map('GET', '/user', function($id) {
    render('pages/user');
});

$router->map('GET', '/impressum', function() {
    render('pages/impressum');
});

$router->map('GET', '/datenschutz', function() {
    render('pages/datenschutz');
});


// 
// Areas
// 

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

$router->map('GET', '/kooperationsparterInnen', function() {
    render('pages/kooperationspartnerInnen');
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    echo "<h1>404</h1><p>Seite nicht gefunden.</p>";
}

?>

