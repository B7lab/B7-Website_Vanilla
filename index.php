<?php

require_once __DIR__ . '/public/AltoRouter.php';

function render($view, $data = []) {
    extract($data); // Macht $title, $name, etc. aus dem Array
    $viewFile = __DIR__ . "/views/$view.php";
    
    if (!file_exists($viewFile)) {
        http_response_code(500);
        echo "View $view nicht gefunden";
        return;
    }

    // Optional: Layout einbinden
    include __DIR__ . "/views/layout.php";
}

$router = new AltoRouter();

$router->setBasePath('');

$router->map('GET', '/', function() {
    render('home', ['title' => 'Start', 'name' => 'Max']);
});

$router->map('GET', '/kontakt', function() {
    render('kontakt', ['title' => 'Kontakt']);
});

$router->map('GET', '/user/[i:id]', function($id) {
    render('user', ['title' => "Benutzer $id", 'id' => $id]);
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    echo "<h1>404</h1><p>Seite nicht gefunden.</p>";
}

?>

